@extends('layouts.app')

@section('content')
    <div class="pt-32 pb-16 px-4 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto">

            {{-- Breadcrumb & Title --}}
            <div class="mb-8">
                <nav class="flex text-sm text-gray-500 mb-3" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('orders.index') }}"
                                class="inline-flex items-center hover:text-gray-900 transition-colors">Riwayat Transaksi</a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="ml-1 text-gray-400 md:ml-2">#{{ $order->kode_pesanan }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <h1 class="text-2xl font-bold text-gray-900" style="font-family: 'Playfair Display', serif;">Pesanan
                        #{{ $order->kode_pesanan }}</h1>
                    <span class="px-3 py-1.5 text-xs font-medium rounded-full w-fit {{ $order->status_badge }}">
                        {{ $order->status_label }}
                    </span>
                </div>
            </div>

            @if (session('success'))
                <div class="p-4 mb-6 text-sm text-green-800 rounded-lg bg-green-50 flex items-start gap-3" role="alert">
                    <svg class="w-5 h-5 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <span class="font-medium">Success!</span> {{ session('success') }}
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Left Column: Order Details --}}
                <div class="md:col-span-2 space-y-6">

                    {{-- Product Info Card --}}
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <h3 class="text-lg font-bold text-gray-900 mb-4 border-b border-gray-100 pb-4">Detail Produk</h3>
                        <div class="flex flex-col sm:flex-row gap-5">
                            <div class="w-full sm:w-32 h-32 rounded-lg overflow-hidden shrink-0 bg-gray-100">
                                <img src="{{ $order->produk->foto }}" alt="{{ $order->produk->nama }}"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-gray-900 text-lg mb-1">{{ $order->produk->nama }}</h4>
                                <p class="text-sm font-medium" style="color: #c9a84c;">Rp
                                    {{ number_format($order->produk->harga_min, 0, ',', '.') }} - Rp
                                    {{ number_format($order->produk->harga_max, 0, ',', '.') }} / pcs</p>

                                <div class="mt-4 grid grid-cols-2 gap-y-3 text-sm">
                                    <div>
                                        <p class="text-gray-500 mb-0.5">Jumlah</p>
                                        <p class="font-medium text-gray-900">{{ $order->jumlah }} pcs</p>
                                    </div>
                                    @if ($order->ukuran)
                                        <div>
                                            <p class="text-gray-500 mb-0.5">Ukuran</p>
                                            <p class="font-medium text-gray-900">{{ $order->ukuran }}</p>
                                        </div>
                                    @endif
                                    @if ($order->bahan)
                                        <div>
                                            <p class="text-gray-500 mb-0.5">Bahan</p>
                                            <p class="font-medium text-gray-900">{{ $order->bahan }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @if ($order->catatan)
                            <div class="mt-5 pt-5 border-t border-gray-100">
                                <p class="text-sm text-gray-500 mb-1">Catatan Pesanan:</p>
                                <p class="text-sm text-gray-900 bg-gray-50 p-3 rounded-lg">{{ $order->catatan }}</p>
                            </div>
                        @endif

                        @if ($order->file_desain)
                            <div class="mt-5 pt-5 border-t border-gray-100">
                                <p class="text-sm text-gray-500 mb-2">File Desain Terlampir:</p>
                                <a href="{{ Storage::url($order->file_desain) }}" target="_blank"
                                    class="inline-flex items-center gap-2 text-sm text-blue-600 hover:text-blue-800 hover:underline bg-blue-50 px-3 py-2 rounded-lg transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>
                                    Download / Lihat Desain
                                </a>
                            </div>
                        @endif
                    </div>

                </div>

                {{-- Right Column: Payment & Summary --}}
                <div class="space-y-6">

                    {{-- Order Summary --}}
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-4">Ringkasan Pembayaran</h3>

                        <div class="space-y-3 text-sm mb-4">
                            <div class="flex justify-between text-gray-600">
                                <span>Subtotal Produk</span>
                                <span>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Biaya Pengiriman</span>
                                <span>Menunggu Konfirmasi</span>
                            </div>
                        </div>

                        <div class="border-t border-gray-100 pt-4 flex justify-between items-center">
                            <span class="font-bold text-gray-900">Total Tagihan</span>
                            <span class="font-bold text-lg" style="color: #1e3a5f;">Rp
                                {{ number_format($order->total_harga, 0, ',', '.') }}</span>
                        </div>
                        <p class="text-xs text-center mt-3 text-gray-500 shrink-0">*Total di atas belum termasuk ongkos
                            kirim. Kami akan menginfokan biaya kirim via WhatsApp.</p>
                    </div>

                    {{-- Payment Action --}}
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                        @if ($order->status === 'pending' || $order->status === 'awaiting_payment')
                            <h3 class="font-bold text-gray-900 mb-2">Instruksi Pembayaran</h3>
                            <p class="text-sm text-gray-600 mb-4 leading-relaxed">Silakan transfer sejumlah <span
                                    class="font-bold">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</span> ke
                                rekening berikut:</p>

                            <div class="bg-gray-50 p-4 rounded-xl border border-gray-100 mb-5 relative group">
                                <p class="text-xs text-gray-500 mb-1 uppercase tracking-wider font-semibold">Bank BCA</p>
                                <p class="text-xl font-bold text-gray-900 mb-1 tracking-wider" id="rekening">123 4567 890
                                </p>
                                <p class="text-sm text-gray-600">a.n Saptakarya Printing</p>

                                <button
                                    onclick="navigator.clipboard.writeText('1234567890'); alert('Nomor rekening disalin!');"
                                    class="absolute top-4 right-4 text-gray-400 hover:text-blue-600 transition-colors"
                                    title="Salin nomor rekening">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </button>
                            </div>

                            @if (!$order->bukti_bayar)
                                <form action="{{ route('orders.payment', $order) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <label class="block mb-2 text-sm font-medium text-gray-900" for="bukti_bayar">Upload
                                        Bukti Transfer</label>
                                    <input
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none mb-4"
                                        aria-describedby="bukti_bayar_help" id="bukti_bayar" name="bukti_bayar"
                                        type="file" accept="image/*" required>

                                    <button type="submit"
                                        class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-3 text-center transition-colors shadow-sm">
                                        Konfirmasi Pembayaran
                                    </button>
                                </form>
                            @else
                                <div
                                    class="bg-blue-50 border border-blue-100 text-blue-800 text-sm p-4 rounded-xl text-center">
                                    <svg class="w-8 h-8 mx-auto mb-2 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <p class="font-medium mb-1">Bukti Pembayaran Terunggah</p>
                                    <p class="text-xs text-blue-600 opacity-80 mb-3">Pesanan Anda sedang dalam antrean
                                        proses.</p>
                                    <a href="{{ Storage::url($order->bukti_bayar) }}" target="_blank"
                                        class="inline-block px-3 py-1.5 bg-blue-100 hover:bg-blue-200 text-blue-700 rounded-lg text-xs font-medium transition-colors">Lihat
                                        Bukti</a>
                                </div>
                            @endif
                        @elseif ($order->status === 'processing' || $order->status === 'shipping')
                            <div class="text-center py-4">
                                <div
                                    class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        @if ($order->status === 'processing')
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                                            </path>
                                        @else
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                            </path>
                                        @endif
                                    </svg>
                                </div>
                                <h3 class="font-bold text-gray-900 mb-1">{{ $order->status_label }}</h3>
                                <p class="text-sm text-gray-500 mb-4">Pesanan Anda sedang dikerjakan oleh tim Saptakarya.
                                    Kami akan update segera.</p>

                                @if ($order->bukti_bayar)
                                    <a href="{{ Storage::url($order->bukti_bayar) }}" target="_blank"
                                        class="text-xs text-blue-600 hover:underline">Lihat Bukti Transfer</a>
                                @endif
                            </div>
                        @elseif ($order->status === 'completed')
                            <div class="text-center py-4">
                                <div
                                    class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="font-bold text-gray-900 mb-1">Pesanan Selesai</h3>
                                <p class="text-sm text-gray-500">Terima kasih telah mempercayakan cetakan Anda pada
                                    Saptakarya.</p>
                            </div>
                        @elseif ($order->status === 'cancelled')
                            <div class="text-center py-4">
                                <div
                                    class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="font-bold text-gray-900 mb-1">Pesanan Dibatalkan</h3>
                                <p class="text-sm text-gray-500">Silakan hubungi admin jika terdapat kesalahan.</p>
                            </div>
                        @endif

                        <div class="mt-6 text-center">
                            <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Saptakarya%2C%20saya%20ingin%20bertanya%20tentang%20pesanan%20saya%20dengan%20nomor%20{{ $order->kode_pesanan }}"
                                target="_blank"
                                class="inline-flex items-center gap-2 text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z" />
                                </svg>
                                Hubungi Admin
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
