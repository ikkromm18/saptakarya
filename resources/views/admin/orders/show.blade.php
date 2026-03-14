@extends('layouts.admin')

@section('admin-content')
    <div class="max-w-5xl mx-auto">
        {{-- Breadcrumb & Title --}}
        <div class="mb-8">
            <nav class="flex text-sm text-gray-500 mb-3" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('admin.orders.index') }}"
                            class="inline-flex items-center hover:text-gray-900 transition-colors">Kelola Pesanan</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ml-1 text-gray-400 md:ml-2">#{{ $order->kode_pesanan }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <h1 class="text-2xl font-bold text-gray-900">Detail Pesanan #{{ $order->kode_pesanan }}</h1>
                <span class="px-3 py-1.5 text-xs font-bold uppercase rounded-full w-fit {{ $order->status_badge }}">
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
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Left Column: Order & User Details --}}
            <div class="md:col-span-2 space-y-6">

                {{-- Product Info Card --}}
                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 border-b border-gray-100 pb-4">Info Produk & Pesanan
                    </h3>
                    <div class="flex flex-col sm:flex-row gap-5">
                        <div class="w-full sm:w-32 h-32 rounded-lg overflow-hidden shrink-0 bg-gray-100">
                            <img src="{{ $order->produk->foto }}" alt="{{ $order->produk->nama }}"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1">
                            <h4 class="font-bold text-gray-900 text-lg mb-1">{{ $order->produk->nama }}</h4>
                            <p class="text-sm font-medium text-blue-600">
                                Rp {{ number_format($order->produk->harga_min, 0, ',', '.') }} - Rp
                                {{ number_format($order->produk->harga_max, 0, ',', '.') }} / pcs
                            </p>

                            <div class="mt-4 grid grid-cols-2 gap-y-3 text-sm">
                                <div>
                                    <p class="text-gray-500 mb-0.5 uppercase text-[10px] font-bold tracking-wider">Jumlah
                                    </p>
                                    <p class="font-medium text-gray-900">{{ $order->jumlah }} pcs</p>
                                </div>
                                @if ($order->ukuran)
                                    <div>
                                        <p class="text-gray-500 mb-0.5 uppercase text-[10px] font-bold tracking-wider">
                                            Ukuran</p>
                                        <p class="font-medium text-gray-900">{{ $order->ukuran }}</p>
                                    </div>
                                @endif
                                @if ($order->bahan)
                                    <div>
                                        <p class="text-gray-500 mb-0.5 uppercase text-[10px] font-bold tracking-wider">Bahan
                                        </p>
                                        <p class="font-medium text-gray-900">{{ $order->bahan }}</p>
                                    </div>
                                @endif
                                <div>
                                    <p class="text-gray-500 mb-0.5 uppercase text-[10px] font-bold tracking-wider">Total
                                        Harga</p>
                                    <p class="font-bold text-gray-900">Rp
                                        {{ number_format($order->total_harga, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($order->catatan)
                        <div class="mt-6 p-4 bg-yellow-50 rounded-lg border border-yellow-100">
                            <p class="text-[10px] font-bold text-yellow-800 uppercase tracking-wider mb-1">Catatan dari
                                User:</p>
                            <p class="text-sm text-gray-700 leading-relaxed">{{ $order->catatan }}</p>
                        </div>
                    @endif
                </div>

                {{-- User Info Card --}}
                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 border-b border-gray-100 pb-4">Informasi Customer</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <p class="text-gray-500 mb-0.5 uppercase text-[10px] font-bold tracking-wider">Nama Lengkap</p>
                            <p class="font-medium text-gray-900">{{ $order->user->name }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500 mb-0.5 uppercase text-[10px] font-bold tracking-wider">Email</p>
                            <p class="font-medium text-gray-900">{{ $order->user->email }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500 mb-0.5 uppercase text-[10px] font-bold tracking-wider">No. HP / WhatsApp
                            </p>
                            <p class="font-medium text-gray-900">{{ $order->user->no_hp ?? '-' }}</p>
                            @if ($order->user->no_hp)
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $order->user->no_hp) }}"
                                    target="_blank"
                                    class="text-xs text-green-600 hover:underline inline-flex items-center gap-1 mt-1 font-medium">
                                    Chat via WhatsApp
                                </a>
                            @endif
                        </div>
                        <div>
                            <p class="text-gray-500 mb-0.5 uppercase text-[10px] font-bold tracking-wider">Member Sejak</p>
                            <p class="font-medium text-gray-900">{{ $order->user->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>

                {{-- Files Card --}}
                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 border-b border-gray-100 pb-4">Berkas Pendukung</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                        {{-- Design File --}}
                        <div>
                            <p class="text-[10px] font-bold text-gray-500 uppercase tracking-wider mb-3">File Desain</p>
                            @if ($order->file_desain)
                                <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div
                                            class="w-10 h-10 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="overflow-hidden">
                                            <p class="text-sm font-medium text-gray-900 truncate">File Desain User</p>
                                            <p class="text-[10px] text-gray-500">Klik untuk download</p>
                                        </div>
                                    </div>
                                    <a href="{{ Storage::url($order->file_desain) }}" target="_blank"
                                        class="block w-full text-center py-2 text-xs font-bold text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                                        Download Desain
                                    </a>
                                </div>
                            @else
                                <div class="bg-gray-50 p-6 rounded-xl border border-gray-100 border-dashed text-center">
                                    <p class="text-xs text-gray-400">Tidak ada file desain</p>
                                </div>
                            @endif
                        </div>

                        {{-- Payment Proof --}}
                        <div>
                            <p class="text-[10px] font-bold text-gray-500 uppercase tracking-wider mb-3">Bukti Pembayaran
                            </p>
                            @if ($order->bukti_bayar)
                                <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
                                    <div class="relative h-24 overflow-hidden rounded-lg mb-3 shadow-inner bg-white">
                                        <img src="{{ Storage::url($order->bukti_bayar) }}" alt="Bukti Pembayaran"
                                            class="w-full h-full object-contain">
                                    </div>
                                    <a href="{{ Storage::url($order->bukti_bayar) }}" target="_blank"
                                        class="block w-full text-center py-2 text-xs font-bold text-white bg-green-600 rounded-lg hover:bg-green-700 transition-colors">
                                        Lihat Bukti Full
                                    </a>
                                </div>
                            @else
                                <div class="bg-gray-50 p-6 rounded-xl border border-gray-100 border-dashed text-center">
                                    <p class="text-xs text-gray-400">Belum upload bukti bayar</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

            {{-- Right Column: Status Update --}}
            <div class="space-y-6">
                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 sticky top-24">
                    <h3 class="text-lg font-bold text-gray-900 mb-5 pb-4 border-b border-gray-100">Update Status</h3>

                    <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="status"
                                class="block mb-2 text-xs font-bold text-gray-500 uppercase tracking-wider">Status
                                Pesanan</label>
                            <select name="status" id="status"
                                class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="awaiting_payment"
                                    {{ $order->status === 'awaiting_payment' ? 'selected' : '' }}>Menunggu Pembayaran
                                </option>
                                <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>
                                    Diproses (Produksi)</option>
                                <option value="shipping" {{ $order->status === 'shipping' ? 'selected' : '' }}>Dikirim
                                </option>
                                <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Selesai
                                </option>
                                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>
                                    Dibatalkan</option>
                            </select>
                        </div>

                        <div class="pt-2">
                            <button type="submit"
                                class="w-full py-3 px-4 bg-[#1e3a5f] hover:bg-[#152842] text-white font-bold rounded-lg transition-colors shadow-sm focus:ring-4 focus:ring-[#1e3a5f]/30">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>

                    <div class="mt-6 border-t border-gray-100 pt-6">
                        <p class="text-[10px] text-gray-400 text-center uppercase font-bold tracking-widest">Alur Status
                        </p>
                        <div class="mt-4 space-y-3">
                            <div class="flex items-center gap-3">
                                <div class="w-2 h-2 rounded-full bg-yellow-400"></div>
                                <p class="text-[11px] text-gray-500 font-medium">Pending: Baru Dibuat</p>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-2 h-2 rounded-full bg-orange-400"></div>
                                <p class="text-[11px] text-gray-500 font-medium">Awaiting: Tunggu Bukti Bayar</p>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-2 h-2 rounded-full bg-blue-500"></div>
                                <p class="text-[11px] text-gray-500 font-medium">Processing: Masuk Produksi</p>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-2 h-2 rounded-full bg-green-500"></div>
                                <p class="text-[11px] text-gray-500 font-medium">Completed: Pesanan Selesai</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
