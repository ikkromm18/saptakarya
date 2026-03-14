@extends('layouts.app')

@section('content')

    {{-- Page Header --}}
    <div class="pt-32 pb-16 px-4" style="background: linear-gradient(135deg, #1e3a5f 0%, #0f2545 100%);">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-sm font-semibold uppercase tracking-widest mb-3" style="color: #c9a84c;">Apa Yang Kami Tawarkan</p>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4" style="font-family: 'Playfair Display', serif;">Produk
                & Layanan</h1>
            <div class="w-16 h-1 rounded-full mx-auto mb-4" style="background-color: #c9a84c;"></div>
            <p class="text-blue-200 text-sm max-w-lg mx-auto">Berbagai layanan percetakan untuk semua kebutuhan Anda.</p>
        </div>
    </div>

    {{-- Products Grid --}}
    <section class="section-padding" style="background-color: #f9fafb;">
        <div class="max-w-7xl mx-auto">

            @if ($produks->isEmpty())
                <div class="text-center py-20 text-gray-400">
                    <svg class="w-16 h-16 mx-auto mb-4 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <p>Produk belum tersedia.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($produks as $produk)
                        <x-produk-card :produk="$produk" />
                    @endforeach
                </div>
            @endif

        </div>
    </section>

    {{-- Info Banner --}}
    <section class="py-12 px-4 bg-white">
        <div
            class="max-w-4xl mx-auto bg-linear-to-r from-blue-50 to-amber-50 rounded-2xl p-8 border border-gray-100 text-center">
            <h3 class="text-xl font-bold text-gray-900 mb-2">Tidak menemukan yang Anda cari?</h3>
            <p class="text-gray-500 text-sm mb-6">Hubungi kami untuk diskusi kebutuhan cetak custom Anda. Kami terima semua
                jenis pesanan cetak.</p>
            <a href="https://wa.me/6281234567890?text=Halo%20Saptakarya%2C%20saya%20ingin%20tanya%20tentang%20cetak%20custom..."
                target="_blank" class="btn-primary text-sm">
                Konsultasi Gratis via WhatsApp
            </a>
        </div>
    </section>

@endsection
