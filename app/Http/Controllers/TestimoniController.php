<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimoniController extends Controller
{
    /**
     * Store a new testimonial (from registered user).
     * Saved with status 'pending' — needs admin approval to display.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'instansi' => 'nullable|string|max:100',
            'komentar' => 'required|string|min:10|max:500',
            'rating'   => 'required|integer|min:1|max:5',
        ], [
            'komentar.required' => 'Komentar wajib diisi.',
            'komentar.min'      => 'Komentar minimal 10 karakter.',
            'komentar.max'      => 'Komentar maksimal 500 karakter.',
            'rating.required'   => 'Rating wajib dipilih.',
        ]);

        Testimoni::create([
            'user_id'  => Auth::id(),
            'nama'     => Auth::user()->name,
            'instansi' => $validated['instansi'] ?? null,
            'komentar' => $validated['komentar'],
            'rating'   => $validated['rating'],
            'status'   => 'pending',
        ]);

        return back()->with('testimoni_success', 'Terima kasih! Testimoni Anda sedang menunggu persetujuan admin.');
    }
}
