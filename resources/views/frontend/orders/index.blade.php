@extends('layouts.app')

@section('content')
    <div class="pt-32 pb-16 px-4 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto">

            <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900" style="font-family: 'Playfair Display', serif;">Riwayat
                        Transaksi</h1>
                    <p class="text-gray-500 text-sm mt-1">Daftar semua pesanan cetak dan sablon Anda.</p>
                </div>
                <a href="{{ route('produk') }}" class="btn-primary text-sm px-6 py-2.5">Belanja Lagi</a>
            </div>

            @if (session('success'))
                <div class="p-4 mb-6 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                    <span class="font-medium">Success!</span> {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-4">No</th>
                                <th scope="col" class="px-6 py-4">Kode Pesanan</th>
                                <th scope="col" class="px-6 py-4">Produk</th>
                                <th scope="col" class="px-6 py-4">Total</th>
                                <th scope="col" class="px-6 py-4">Status</th>
                                <th scope="col" class="px-6 py-4">Tanggal</th>
                                <th scope="col" class="px-6 py-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr class="bg-white border-b border-gray-50 hover:bg-gray-50/50 transition-colors">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $order->kode_pesanan }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-lg overflow-hidden shrink-0 bg-gray-100">
                                                <img src="{{ $order->produk->foto }}" alt="{{ $order->produk->nama }}"
                                                    class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="font-medium text-gray-900">{{ $order->produk->nama }}</p>
                                                <p class="text-xs text-gray-500">{{ $order->jumlah }} pcs
                                                    {{ $order->ukuran ? '• ' . $order->ukuran : '' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900">
                                        Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="px-2.5 py-1 text-xs font-medium rounded-full {{ $order->status_badge }}">
                                            {{ $order->status_label }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $order->created_at->format('d M Y') }}
                                        <span class="block text-xs text-gray-400">{{ $order->created_at->format('H:i') }}
                                            WIB</span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('orders.show', $order) }}"
                                            class="font-medium text-blue-600 hover:text-blue-800 hover:underline">Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center">
                                        <svg class="w-12 h-12 mx-auto text-gray-300 mb-4" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                        </svg>
                                        <p class="text-gray-500 font-medium">Belum ada riwayat transaksi.</p>
                                        <p class="text-sm text-gray-400 mt-1 mb-4">Mulai belanja kebutuhan cetak Anda
                                            sekarang.</p>
                                        <a href="{{ route('produk') }}"
                                            class="inline-block px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors">Lihat
                                            Produk</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($orders->hasPages())
                    <div class="px-6 py-4 border-t border-gray-100">
                        {{ $orders->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>
@endsection
