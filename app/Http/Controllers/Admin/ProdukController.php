<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::latest();

        if ($request->search) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $produks = $query->paginate(10)->withQueryString();

        return view('admin.produks.index', compact('produks'));
    }

    public function create()
    {
        return view('admin.produks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'required|string|max:2000',
            'ukuran'    => 'nullable|string',
            'bahan'     => 'nullable|string',
            'foto'      => 'required|image|mimes:jpg,jpeg,png,webp|max:3072',
        ], [
            'nama.required'      => 'Nama produk wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'foto.required'      => 'Foto produk wajib diunggah.',
            'foto.image'         => 'File harus berupa gambar.',
            'foto.mimes'         => 'Format gambar harus jpg, jpeg, png, atau webp.',
            'foto.max'           => 'Ukuran foto maksimal 3 MB.',
        ]);

        $ukuranList = $this->parseLines($request->ukuran);
        $bahanList  = $this->parseLines($request->bahan);

        $validated['ukuran'] = $ukuranList;
        $validated['bahan']  = $bahanList;
        $validated['harga']  = $this->parseHargaMatrix($request->input('harga', []), $ukuranList, $bahanList);

        [$validated['harga_min'], $validated['harga_max']] = $this->computeMinMax($validated['harga']);

        $validated['slug'] = $this->uniqueSlug($validated['nama']);

        $path = $request->file('foto')->store('produks', 'public');
        $validated['foto'] = Storage::url($path);

        Produk::create($validated);

        return redirect()->route('admin.produks.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Produk $produk)
    {
        return view('admin.produks.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'required|string|max:2000',
            'ukuran'    => 'nullable|string',
            'bahan'     => 'nullable|string',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
        ], [
            'nama.required'      => 'Nama produk wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'foto.image'         => 'File harus berupa gambar.',
            'foto.mimes'         => 'Format gambar harus jpg, jpeg, png, atau webp.',
            'foto.max'           => 'Ukuran foto maksimal 3 MB.',
        ]);

        $ukuranList = $this->parseLines($request->ukuran);
        $bahanList  = $this->parseLines($request->bahan);

        $validated['ukuran'] = $ukuranList;
        $validated['bahan']  = $bahanList;
        $validated['harga']  = $this->parseHargaMatrix($request->input('harga', []), $ukuranList, $bahanList);

        [$validated['harga_min'], $validated['harga_max']] = $this->computeMinMax($validated['harga']);

        if ($validated['nama'] !== $produk->nama) {
            $slug = Str::slug($validated['nama']);
            $count = Produk::where('slug', $slug)->where('id', '!=', $produk->id)->count();
            $validated['slug'] = $count > 0 ? $slug . '-' . ($count + 1) : $slug;
        }

        if ($request->hasFile('foto')) {
            $oldPath = str_replace('/storage/', '', parse_url($produk->foto, PHP_URL_PATH));
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('foto')->store('produks', 'public');
            $validated['foto'] = Storage::url($path);
        } else {
            unset($validated['foto']);
        }

        $produk->update($validated);

        return redirect()->route('admin.produks.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Produk $produk)
    {
        $oldPath = str_replace('/storage/', '', parse_url($produk->foto, PHP_URL_PATH));
        if (Storage::disk('public')->exists($oldPath)) {
            Storage::disk('public')->delete($oldPath);
        }
        $produk->delete();

        return redirect()->route('admin.produks.index')
            ->with('success', 'Produk berhasil dihapus.');
    }

    // ── Helpers ──────────────────────────────────────────────────────────

    /**
     * Parse newline-separated text into a clean array, or null if blank.
     */
    private function parseLines(?string $value): ?array
    {
        if (blank($value)) {
            return null;
        }
        $lines = array_filter(array_map('trim', explode("\n", $value)));
        return count($lines) > 0 ? array_values($lines) : null;
    }

    /**
     * Build nested harga array from submitted harga[ukuran][bahan] inputs.
     * Skips cells with 0 or empty value.
     */
    private function parseHargaMatrix(array $rawHarga, ?array $ukuranList, ?array $bahanList): ?array
    {
        if (!$ukuranList && !$bahanList) {
            // flat pricing: harga['__flat__']['__flat__']
            $flat = (int) ($rawHarga['__flat__']['__flat__'] ?? 0);
            return $flat > 0 ? ['__flat__' => ['__flat__' => $flat]] : null;
        }

        $matrix = [];

        $ukurans = $ukuranList ?? ['__flat__'];
        $bahans  = $bahanList  ?? ['__flat__'];

        foreach ($ukurans as $uk) {
            foreach ($bahans as $bh) {
                $price = (int) ($rawHarga[$uk][$bh] ?? 0);
                if ($price > 0) {
                    $matrix[$uk][$bh] = $price;
                }
            }
        }

        return count($matrix) > 0 ? $matrix : null;
    }

    /**
     * Compute [min, max] from the harga matrix.
     */
    private function computeMinMax(?array $harga): array
    {
        if (blank($harga)) {
            return [0, 0];
        }
        $prices = [];
        foreach ($harga as $ukuranPrices) {
            foreach ((array) $ukuranPrices as $price) {
                if ($price > 0) {
                    $prices[] = $price;
                }
            }
        }
        return count($prices) > 0 ? [min($prices), max($prices)] : [0, 0];
    }

    /**
     * Generate a unique slug for the given name.
     */
    private function uniqueSlug(string $name): string
    {
        $slug  = Str::slug($name);
        $count = Produk::where('slug', $slug)->count();
        return $count > 0 ? $slug . '-' . ($count + 1) : $slug;
    }
}
