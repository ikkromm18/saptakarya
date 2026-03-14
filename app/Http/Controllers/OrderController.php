<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'jumlah' => 'required|integer|min:1',
            'file_desain' => 'nullable|file|mimes:jpg,jpeg,png,pdf,zip,rar|max:10240',
            'catatan' => 'nullable|string',
        ]);

        $produk = Produk::findOrFail($request->produk_id);

        if ($produk->ukuran && count($produk->ukuran) > 0) {
            $request->validate(['ukuran' => 'required|string']);
        }

        if ($produk->bahan && count($produk->bahan) > 0) {
            $request->validate(['bahan' => 'required|string']);
        }

        $total_harga = $produk->harga_max * $request->jumlah;

        $file_desain_path = null;
        if ($request->hasFile('file_desain')) {
            $file_desain_path = $request->file('file_desain')->store('designs', 'public');
        }

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'produk_id' => $produk->id,
            'kode_pesanan' => 'INV-' . date('Ymd') . '-' . strtoupper(Str::random(6)),
            'ukuran' => $request->ukuran,
            'bahan' => $request->bahan,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
            'file_desain' => $file_desain_path,
            'status' => 'pending',
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibuat. Silakan lakukan pembayaran.');
    }

    /**
     * Display a listing of the user's orders.
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)
            ->latest()
            ->paginate(10);

        return view('frontend.orders.index', compact('orders'));
    }

    /**
     * Display the specified user order.
     */
    public function show(Order $order)
    {
        // Pastikan order milik user yang login
        if ($order->user_id !== Auth::user()->id) {
            abort(403);
        }

        return view('frontend.orders.show', compact('order'));
    }

    /**
     * Upload payment proof.
     */
    public function uploadPayment(Request $request, Order $order)
    {
        // Pastikan order milik user yang login
        if ($order->user_id !== Auth::user()->id) {
            abort(403);
        }

        $request->validate([
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        if ($request->hasFile('bukti_bayar')) {
            // Delete old payment proof if exists
            if ($order->bukti_bayar) {
                Storage::disk('public')->delete($order->bukti_bayar);
            }

            $path = $request->file('bukti_bayar')->store('payments', 'public');

            $order->update([
                'bukti_bayar' => $path,
                'status' => 'processing', // Bisa diubah ke 'awaiting_verification' jika status itu ditambahkan
            ]);
        }

        return back()->with('success', 'Bukti pembayaran berhasil diunggah. Pesanan Anda sedang diproses.');
    }
}
