<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of portfolios.
     */
    public function index(Request $request)
    {
        $query = Portfolio::latest();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                    ->orWhere('kategori', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->kategori) {
            $query->where('kategori', $request->kategori);
        }

        $portfolios = $query->paginate(10)->withQueryString();
        $kategoris  = Portfolio::distinct()->orderBy('kategori')->pluck('kategori');

        return view('admin.portfolios.index', compact('portfolios', 'kategoris'));
    }

    /**
     * Show the form for creating a new portfolio.
     */
    public function create()
    {
        $kategoris = Portfolio::distinct()->orderBy('kategori')->pluck('kategori');
        return view('admin.portfolios.create', compact('kategoris'));
    }

    /**
     * Store a newly created portfolio in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'kategori'  => 'required|string|max:100',
            'deskripsi' => 'nullable|string|max:1000',
            'foto'      => 'required|image|mimes:jpg,jpeg,png,webp|max:3072',
        ], [
            'judul.required'    => 'Judul wajib diisi.',
            'kategori.required' => 'Kategori wajib diisi.',
            'foto.required'     => 'Foto wajib diunggah.',
            'foto.image'        => 'File harus berupa gambar.',
            'foto.mimes'        => 'Format gambar harus jpg, jpeg, png, atau webp.',
            'foto.max'          => 'Ukuran foto maksimal 3 MB.',
        ]);

        $path = $request->file('foto')->store('portfolios', 'public');
        $validated['foto'] = Storage::url($path);

        Portfolio::create($validated);

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified portfolio.
     */
    public function edit(Portfolio $portfolio)
    {
        $kategoris = Portfolio::distinct()->orderBy('kategori')->pluck('kategori');
        return view('admin.portfolios.edit', compact('portfolio', 'kategoris'));
    }

    /**
     * Update the specified portfolio in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'kategori'  => 'required|string|max:100',
            'deskripsi' => 'nullable|string|max:1000',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
        ], [
            'judul.required'    => 'Judul wajib diisi.',
            'kategori.required' => 'Kategori wajib diisi.',
            'foto.image'        => 'File harus berupa gambar.',
            'foto.mimes'        => 'Format gambar harus jpg, jpeg, png, atau webp.',
            'foto.max'          => 'Ukuran foto maksimal 3 MB.',
        ]);

        if ($request->hasFile('foto')) {
            // Delete old file from storage if it's a local file
            $oldPath = str_replace('/storage/', '', parse_url($portfolio->foto, PHP_URL_PATH));
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('foto')->store('portfolios', 'public');
            $validated['foto'] = Storage::url($path);
        } else {
            unset($validated['foto']);
        }

        $portfolio->update($validated);

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio berhasil diperbarui.');
    }

    /**
     * Remove the specified portfolio from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        // Delete local file if exists
        $oldPath = str_replace('/storage/', '', parse_url($portfolio->foto, PHP_URL_PATH));
        if (Storage::disk('public')->exists($oldPath)) {
            Storage::disk('public')->delete($oldPath);
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio berhasil dihapus.');
    }
}
