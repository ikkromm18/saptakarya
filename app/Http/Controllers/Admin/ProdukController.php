<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    /**
     * Display a listing of products.
     */
    public function index(Request $request)
    {
        $query = Produk::latest();

        if ($request->search) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $produks = $query->paginate(10)->withQueryString();

        return view('admin.produks.index', compact('produks'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('admin.produks.create');
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'required|string|max:2000',
            'harga_min' => 'required|integer|min:0',
            'harga_max' => 'required|integer|min:0|gte:harga_min',
            'ukuran'    => 'nullable|string',
            'bahan'     => 'nullable|string',
            'foto'      => 'required|image|mimes:jpg,jpeg,png,webp|max:3072',
        ], [
            'nama.required'       => 'Nama produk wajib diisi.',
            'deskripsi.required'  => 'Deskripsi wajib diisi.',
            'harga_min.required'  => 'Harga minimum wajib diisi.',
            'harga_max.required'  => 'Harga maksimum wajib diisi.',
            'harga_max.gte'       => 'Harga maksimum harus lebih besar atau sama dengan harga minimum.',
            'foto.required'       => 'Foto produk wajib diunggah.',
            'foto.image'          => 'File harus berupa gambar.',
            'foto.mimes'          => 'Format gambar harus jpg, jpeg, png, atau webp.',
            'foto.max'            => 'Ukuran foto maksimal 3 MB.',
        ]);

        // Parse ukuran & bahan: satu per baris → array
        $validated['ukuran'] = $this->parseLines($request->ukuran);
        $validated['bahan']  = $this->parseLines($request->bahan);

        // Generate slug
        $validated['slug'] = Str::slug($validated['nama']);
        // Ensure uniqueness
        $count = Produk::where('slug', $validated['slug'])->count();
        if ($count > 0) {
            $validated['slug'] .= '-' . ($count + 1);
        }

        // Upload foto
        $path = $request->file('foto')->store('produks', 'public');
        $validated['foto'] = Storage::url($path);

        Produk::create($validated);

        return redirect()->route('admin.produks.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Produk $produk)
    {
        return view('admin.produks.edit', compact('produk'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'required|string|max:2000',
            'harga_min' => 'required|integer|min:0',
            'harga_max' => 'required|integer|min:0|gte:harga_min',
            'ukuran'    => 'nullable|string',
            'bahan'     => 'nullable|string',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
        ], [
            'nama.required'       => 'Nama produk wajib diisi.',
            'deskripsi.required'  => 'Deskripsi wajib diisi.',
            'harga_min.required'  => 'Harga minimum wajib diisi.',
            'harga_max.required'  => 'Harga maksimum wajib diisi.',
            'harga_max.gte'       => 'Harga maksimum harus ≥ harga minimum.',
            'foto.image'          => 'File harus berupa gambar.',
            'foto.mimes'          => 'Format gambar harus jpg, jpeg, png, atau webp.',
            'foto.max'            => 'Ukuran foto maksimal 3 MB.',
        ]);

        $validated['ukuran'] = $this->parseLines($request->ukuran);
        $validated['bahan']  = $this->parseLines($request->bahan);

        // Re-generate slug only if name changed
        if ($validated['nama'] !== $produk->nama) {
            $slug  = Str::slug($validated['nama']);
            $count = Produk::where('slug', $slug)->where('id', '!=', $produk->id)->count();
            $validated['slug'] = $count > 0 ? $slug . '-' . ($count + 1) : $slug;
        }

        if ($request->hasFile('foto')) {
            // Delete old local file
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

    /**
     * Remove the specified product from storage.
     */
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

    /**
     * Convert newline-separated text to a clean array (or null if empty).
     */
    private function parseLines(?string $value): ?array
    {
        if (blank($value)) {
            return null;
        }
        $lines = array_filter(array_map('trim', explode("\n", $value)));
        return count($lines) > 0 ? array_values($lines) : null;
    }
}
