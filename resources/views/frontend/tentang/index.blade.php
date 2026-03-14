@extends('layouts.app')

@section('content')
    {{-- Page Header --}}
    <div class="pt-32 pb-16 px-4" style="background: linear-gradient(135deg, #1e3a5f 0%, #0f2545 100%);">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-sm font-semibold uppercase tracking-widest mb-3" style="color: #c9a84c;">Kenali Kami</p>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4" style="font-family: 'Playfair Display', serif;">Tentang
                Saptakarya</h1>
            <div class="w-16 h-1 rounded-full mx-auto" style="background-color: #c9a84c;"></div>
        </div>
    </div>

    {{-- Profil Usaha --}}
    <section class="section-padding bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                {{-- Image --}}
                <div class="relative">
                    <div class="rounded-2xl overflow-hidden shadow-2xl">
                        <img src="https://picsum.photos/seed/workshop/700/500" alt="Workshop Saptakarya"
                            class="w-full h-80 lg:h-96 object-cover">
                    </div>
                    {{-- Badge overlay --}}
                    <div
                        class="absolute -bottom-6 -right-6 bg-white rounded-2xl shadow-xl p-5 text-center border border-gray-100">
                        <p class="text-4xl font-bold" style="color: #1e3a5f;">9+</p>
                        <p class="text-gray-500 text-xs mt-0.5">Tahun Pengalaman</p>
                    </div>
                </div>

                {{-- Text --}}
                <div>
                    <p class="text-sm font-semibold uppercase tracking-widest mb-3" style="color: #c9a84c;">Profil Usaha</p>
                    <h2 class="section-title text-left mb-6">Siapa Kami?</h2>

                    <div class="space-y-4 text-gray-600 leading-relaxed">
                        <p>
                            <strong class="text-gray-900">Saptakarya</strong> adalah usaha percetakan dan sablon yang
                            berdiri sejak tahun 2015 di Bandung. Kami hadir dengan tekad untuk memberikan solusi cetak
                            berkualitas tinggi dengan harga yang terjangkau bagi berbagai kalangan, mulai dari individu,
                            pelaku UMKM, hingga perusahaan besar.
                        </p>
                        <p>
                            Dengan pengalaman lebih dari 9 tahun, kami telah melayani lebih dari 500 klien yang tersebar di
                            seluruh Indonesia. Setiap produk yang kami hasilkan merupakan cerminan komitmen kami terhadap
                            kualitas, ketepatan waktu, dan kepuasan pelanggan.
                        </p>
                        <p>
                            Kami menggunakan mesin cetak modern dan bahan-bahan pilihan untuk memastikan setiap pesanan
                            menghasilkan output terbaik. Tim desainer kami juga siap membantu Anda dari tahap konsep hingga
                            produk jadi.
                        </p>
                    </div>

                    {{-- Stats --}}
                    <div class="grid grid-cols-3 gap-4 mt-8 pt-8 border-t border-gray-100">
                        <div class="text-center">
                            <p class="text-2xl font-bold" style="color: #1e3a5f;">500+</p>
                            <p class="text-xs text-gray-500 mt-0.5">Klien Puas</p>
                        </div>
                        <div class="text-center border-x border-gray-100">
                            <p class="text-2xl font-bold" style="color: #1e3a5f;">5K+</p>
                            <p class="text-xs text-gray-500 mt-0.5">Pesanan</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-bold" style="color: #1e3a5f;">5</p>
                            <p class="text-xs text-gray-500 mt-0.5">Layanan Utama</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- Visi & Misi --}}
    <section class="section-padding" style="background-color: #f9fafb;">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <p class="text-sm font-semibold uppercase tracking-widest mb-2" style="color: #c9a84c;">Arah Tujuan Kami</p>
                <h2 class="section-title">Visi & Misi</h2>
                <div class="gold-divider"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                {{-- Visi --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center shrink-0"
                            style="background-color: #1e3a5f;">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider" style="color: #c9a84c;">Visi</p>
                            <h3 class="text-lg font-bold text-gray-900">Tujuan Jangka Panjang</h3>
                        </div>
                    </div>
                    <blockquote class="text-gray-600 leading-relaxed italic border-l-4 pl-5" style="border-color: #c9a84c;">
                        "Menjadi mitra percetakan terbesar dan paling tepercaya di Indonesia yang mengutamakan kualitas,
                        inovasi, dan kepuasan pelanggan dalam setiap karya yang kami hasilkan."
                    </blockquote>
                </div>

                {{-- Misi --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center shrink-0"
                            style="background-color: #c9a84c;">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider" style="color: #c9a84c;">Misi</p>
                            <h3 class="text-lg font-bold text-gray-900">Langkah yang Kami Ambil</h3>
                        </div>
                    </div>
                    <ul class="space-y-3">
                        @php $misiBullets = ['Menyediakan layanan cetak & sablon berkualitas premium dengan harga yang kompetitif dan terjangkau.', 'Menggunakan teknologi dan peralatan modern untuk menghasilkan produk cetak terbaik.', 'Memberikan pelayanan yang ramah, cepat, dan transparan kepada setiap pelanggan.', 'Terus berinovasi dalam desain dan teknik percetakan mengikuti perkembangan industri.', 'Membangun hubungan jangka panjang dengan pelanggan melalui kepercayaan dan konsistensi.']; @endphp
                        @foreach ($misiBullets as $misi)
                            <li class="flex items-start gap-3 text-gray-600 text-sm">
                                <svg class="w-5 h-5 shrink-0 mt-0.5" style="color: #1e3a5f;" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $misi }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>


    {{-- CTA --}}
    <section class="py-16 px-4" style="background-color: #1e3a5f;">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">Tertarik Bekerjasama dengan Kami?</h2>
            <p class="text-blue-200 mb-8">Kami siap melayani kebutuhan cetak Anda dengan sepenuh hati.</p>
            <a href="{{ route('kontak') }}" class="btn-primary">
                Hubungi Kami
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </section>
@endsection
