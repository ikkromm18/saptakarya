<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniAdminController extends Controller
{
    /**
     * Display all testimonials with filter by status.
     */
    public function index(Request $request)
    {
        $query = Testimoni::latest();

        if ($request->status && in_array($request->status, ['pending', 'displayed', 'hidden'])) {
            $query->where('status', $request->status);
        }

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                    ->orWhere('komentar', 'like', '%' . $request->search . '%');
            });
        }

        $testimonis = $query->paginate(15)->withQueryString();

        $counts = [
            'all'       => Testimoni::count(),
            'pending'   => Testimoni::where('status', 'pending')->count(),
            'displayed' => Testimoni::where('status', 'displayed')->count(),
            'hidden'    => Testimoni::where('status', 'hidden')->count(),
        ];

        return view('admin.testimonis.index', compact('testimonis', 'counts'));
    }

    /**
     * Update status of a testimonial (displayed / hidden / pending).
     */
    public function updateStatus(Request $request, Testimoni $testimoni)
    {
        $request->validate([
            'status' => 'required|in:pending,displayed,hidden',
        ]);

        $testimoni->update(['status' => $request->status]);

        $label = match ($request->status) {
            'displayed' => 'ditampilkan di beranda',
            'hidden'    => 'disembunyikan',
            'pending'   => 'dikembalikan ke pending',
        };

        return back()->with('success', "Testimoni berhasil {$label}.");
    }

    /**
     * Remove a testimonial permanently.
     */
    public function destroy(Testimoni $testimoni)
    {
        $testimoni->delete();
        return back()->with('success', 'Testimoni berhasil dihapus.');
    }
}
