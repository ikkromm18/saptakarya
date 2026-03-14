@extends('layouts.app')

@section('content')
    {{-- ============================
     HERO SECTION
============================= --}}
    <section class="relative min-h-screen flex items-center overflow-hidden"
        style="background: linear-gradient(135deg, #0f2545 0%, #1e3a5f 50%, #2d5282 100%);">
        {{-- Background Decorations --}}
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full opacity-10" style="background-color: #c9a84c;">
            </div>
            <div class="absolute -bottom-32 -left-16 w-80 h-80 rounded-full opacity-10" style="background-color: #c9a84c;">
            </div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] rounded-full opacity-5 border-2"
                style="border-color: #c9a84c;"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 text-center">
            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-xs font-semibold uppercase tracking-widest mb-6"
                style="background-color: rgba(201,168,76,0.15); border: 1px solid rgba(201,168,76,0.4); color: #c9a84c;">
                <span class="w-1.5 h-1.5 rounded-full bg-current animate-pulse"></span>
                Percetakan & Sablon Terpercaya
            </div>

            {{-- Heading --}}
            <h1 class="text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-bold text-white leading-tight mb-6"
                style="font-family: 'Playfair Display', serif;">
                Sapta<span style="color: #c9a84c;">karya</span>
            </h1>
            <p class="text-lg sm:text-xl text-blue-200 max-w-2xl mx-auto leading-relaxed mb-10">
                Solusi Cetak & Sablon Berkualitas dengan Harga Terjangkau.<br class="hidden sm:block">
                Wujudkan ide Anda bersama kami.
            </p>

            {{-- CTAs --}}
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="https://wa.me/{{ $adminPhone }}?text=Halo%20Saptakarya%2C%20saya%20ingin%20memesan..."
                    target="_blank" class="btn-primary text-base px-8 py-3.5">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                    </svg>
                    Pesan Sekarang
                </a>
                <a href="{{ route('produk') }}" class="btn-outline text-base px-8 py-3.5">
                    Lihat Produk
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            {{-- Stats --}}
            <div class="mt-16 grid grid-cols-3 gap-6 max-w-xl mx-auto">
                <div class="text-center">
                    <p class="text-3xl font-bold text-white">500<span style="color: #c9a84c;">+</span></p>
                    <p class="text-blue-300 text-xs mt-1">Klien Puas</p>
                </div>
                <div class="text-center border-x border-white/10">
                    <p class="text-3xl font-bold text-white">9<span style="color: #c9a84c;">+</span></p>
                    <p class="text-blue-300 text-xs mt-1">Tahun Berpengalaman</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl font-bold text-white">5K<span style="color: #c9a84c;">+</span></p>
                    <p class="text-blue-300 text-xs mt-1">Pesanan Selesai</p>
                </div>
            </div>
        </div>

        {{-- Scroll Indicator --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-white/50 text-xs">
            <span>Scroll ke bawah</span>
            <div class="w-px h-8 bg-white/20 animate-bounce-y"></div>
        </div>
    </section>


    {{-- ============================
     KEUNGGULAN SECTION
============================= --}}
    <section class="section-padding" style="background-color: #f9fafb;">
        <div class="max-w-7xl mx-auto">
            {{-- Header --}}
            <div class="text-center mb-12">
                <p class="text-sm font-semibold uppercase tracking-widest mb-2" style="color: #c9a84c;">Mengapa Kami?</p>
                <h2 class="section-title">Keunggulan Kami</h2>
                <div class="gold-divider"></div>
                <p class="section-subtitle">Kami berkomitmen memberikan hasil terbaik untuk setiap pesanan Anda.</p>
            </div>

            {{-- Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5">
                <x-keunggulan-card title="Harga Terjangkau"
                    description="Harga kompetitif tanpa mengorbankan kualitas, cocok untuk semua skala usaha.">
                    <x-slot:icon>
                        <svg class="w-7 h-7" style="color: #1e3a5f;" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </x-slot:icon>
                </x-keunggulan-card>

                <x-keunggulan-card title="Custom Desain"
                    description="Tim desainer kami siap membantu mewujudkan konsep dan ide kreatif Anda.">
                    <x-slot:icon>
                        <svg class="w-7 h-7" style="color: #1e3a5f;" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </x-slot:icon>
                </x-keunggulan-card>

                <x-keunggulan-card title="Pengerjaan Cepat"
                    description="Proses produksi cepat dengan estimasi waktu yang jelas dan transparan.">
                    <x-slot:icon>
                        <svg class="w-7 h-7" style="color: #1e3a5f;" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </x-slot:icon>
                </x-keunggulan-card>

                <x-keunggulan-card title="Bahan Berkualitas"
                    description="Menggunakan bahan pilihan terbaik untuk hasil cetak yang tahan lama dan presisi.">
                    <x-slot:icon>
                        <svg class="w-7 h-7" style="color: #1e3a5f;" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                    </x-slot:icon>
                </x-keunggulan-card>

                <x-keunggulan-card title="Pelayanan Ramah"
                    description="Tim kami siap melayani dengan sepenuh hati dan memberikan solusi terbaik.">
                    <x-slot:icon>
                        <svg class="w-7 h-7" style="color: #1e3a5f;" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </x-slot:icon>
                </x-keunggulan-card>
            </div>
        </div>
    </section>


    {{-- ============================
     LAYANAN UTAMA SECTION
============================= --}}
    <section class="section-padding bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <p class="text-sm font-semibold uppercase tracking-widest mb-2" style="color: #c9a84c;">Yang Kami Tawarkan
                </p>
                <h2 class="section-title">Layanan Utama</h2>
                <div class="gold-divider"></div>
                <p class="section-subtitle">Berbagai layanan cetak & sablon berkualitas untuk kebutuhan bisnis dan personal
                    Anda.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-5">
                @foreach ($produks as $produk)
                    <x-layanan-card :produk="$produk" />
                @endforeach
            </div>

            <div class="text-center mt-10">
                <a href="{{ route('produk') }}" class="btn-primary">
                    Lihat Semua Produk
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </section>


    {{-- ============================
     PREVIEW PORTFOLIO SECTION
============================= --}}
    <section class="section-padding" style="background-color: #f9fafb;">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-10 gap-4">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-widest mb-2" style="color: #c9a84c;">Hasil Kerja
                        Kami</p>
                    <h2 class="section-title text-left">Portofolio</h2>
                    <div class="gold-divider mx-0 mt-3"></div>
                </div>
                <a href="{{ route('portofolio') }}"
                    class="text-sm font-semibold flex items-center gap-1.5 transition-colors" style="color: #1e3a5f;">
                    Lihat Semua
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($portfolios as $portfolio)
                    <x-portfolio-card :portfolio="$portfolio" />
                @endforeach
            </div>
        </div>
    </section>


    {{-- ============================
     TESTIMONI SECTION
============================= --}}
    <section class="section-padding bg-white" id="testimoni">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <p class="text-sm font-semibold uppercase tracking-widest mb-2" style="color: #c9a84c;">Kata Mereka</p>
                <h2 class="section-title">Testimoni Pelanggan</h2>
                <div class="gold-divider"></div>
                <p class="section-subtitle">Kepuasan pelanggan adalah prioritas utama kami.</p>

                {{-- Success flash --}}
                @if (session('testimoni_success'))
                    <div
                        class="mt-4 inline-flex items-center gap-2 px-4 py-2.5 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm font-medium">
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ session('testimoni_success') }}
                    </div>
                @endif

                {{-- Tombol Tulis Testimoni --}}
                <div class="mt-6">
                    @auth
                        <button type="button" data-modal-target="testimoni-modal" data-modal-toggle="testimoni-modal"
                            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-white shadow-md transition-all hover:shadow-lg hover:opacity-90"
                            style="background-color:#1e3a5f;">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Tulis Testimoni
                        </button>
                    @else
                        <a href="{{ route('login') }}"
                            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-white shadow-md transition-all hover:opacity-90"
                            style="background-color:#1e3a5f;">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Login untuk Menulis Testimoni
                        </a>
                    @endauth
                </div>
            </div>

            {{-- Carousel --}}
            @if ($testimonis->count() > 0)
                <div id="testimoni-carousel" class="relative w-full overflow-hidden">
                    <div id="testimoni-track" class="flex gap-5 transition-transform duration-500 ease-in-out">
                        @foreach ($testimonis as $testimoni)
                            <div class="shrink-0 w-full sm:w-[calc(50%-10px)] lg:w-[calc(33.333%-14px)]">
                                <x-testimoni-card :testimoni="$testimoni" />
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Navigation --}}
                <div class="flex items-center justify-center gap-4 mt-8">
                    <button id="prev-btn"
                        class="w-10 h-10 rounded-full border-2 border-gray-200 flex items-center justify-center text-gray-500 hover:border-blue-900 hover:text-blue-900 transition-colors disabled:opacity-30"
                        aria-label="Previous">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>

                    <div id="testimoni-dots" class="flex gap-2">
                        @foreach ($testimonis as $i => $testimoni)
                            <button
                                class="w-2 h-2 rounded-full transition-all duration-300 {{ $i === 0 ? 'w-6' : 'bg-gray-300' }}"
                                style="{{ $i === 0 ? 'background-color: #1e3a5f;' : '' }}"
                                data-index="{{ $i }}" aria-label="Slide {{ $i + 1 }}"></button>
                        @endforeach
                    </div>

                    <button id="next-btn"
                        class="w-10 h-10 rounded-full border-2 border-gray-200 flex items-center justify-center text-gray-500 hover:border-blue-900 hover:text-blue-900 transition-colors"
                        aria-label="Next">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            @else
                <p class="text-center text-gray-400 text-sm py-10">Belum ada testimoni. Jadilah yang pertama!</p>
            @endif
        </div>
    </section>

    {{-- ============================
     TESTIMONI MODAL (auth only)
============================= --}}
    @auth
        <div id="testimoni-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-lg max-h-full">
                <div class="relative bg-white rounded-2xl shadow-xl">
                    {{-- Modal header --}}
                    <div class="flex items-center justify-between p-5 border-b border-gray-100">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Tulis Testimoni</h3>
                            <p class="text-xs text-gray-500 mt-0.5">Testimoni akan ditampilkan setelah disetujui admin.</p>
                        </div>
                        <button type="button" data-modal-hide="testimoni-modal"
                            class="text-gray-400 bg-transparent hover:bg-gray-100 hover:text-gray-900 rounded-lg p-2">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>

                    {{-- Modal body --}}
                    <form action="{{ route('testimoni.store') }}" method="POST" class="p-5 space-y-5">
                        @csrf

                        {{-- Nama (read-only dari auth user) --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama</label>
                            <input type="text" value="{{ Auth::user()->name }}" disabled
                                class="w-full px-3.5 py-2.5 text-sm border border-gray-200 rounded-lg bg-gray-50 text-gray-500 cursor-not-allowed">
                        </div>

                        {{-- Instansi (opsional) --}}
                        <div>
                            <label for="instansi" class="block text-sm font-medium text-gray-700 mb-1.5">
                                Instansi / Perusahaan <span class="text-gray-400 font-normal">(opsional)</span>
                            </label>
                            <input type="text" id="instansi" name="instansi" value="{{ old('instansi') }}"
                                class="w-full px-3.5 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-400 focus:outline-none transition"
                                placeholder="Contoh: Toko ABC, Komunitas XYZ">
                        </div>

                        {{-- Rating bintang --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Rating <span
                                    class="text-red-500">*</span></label>
                            <div class="flex items-center gap-1" id="star-rating">
                                @for ($s = 1; $s <= 5; $s++)
                                    <button type="button" data-value="{{ $s }}"
                                        class="star-btn w-8 h-8 text-gray-300 hover:text-amber-400 transition-colors focus:outline-none">
                                        <svg fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </button>
                                @endfor
                            </div>
                            <input type="hidden" name="rating" id="rating-input" value="{{ old('rating', 5) }}">
                            <p id="rating-label" class="text-xs text-amber-600 mt-1 font-medium">⭐⭐⭐⭐⭐ Sangat Puas</p>
                        </div>

                        {{-- Komentar --}}
                        <div>
                            <label for="komentar" class="block text-sm font-medium text-gray-700 mb-1.5">
                                Komentar <span class="text-red-500">*</span>
                            </label>
                            <textarea id="komentar" name="komentar" rows="4" maxlength="500"
                                class="w-full px-3.5 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-400 focus:outline-none transition resize-none"
                                placeholder="Ceritakan pengalaman Anda menggunakan layanan Saptakarya...">{{ old('komentar') }}</textarea>
                            <div class="flex justify-between mt-1">
                                <span class="text-xs text-gray-400">Minimal 10 karakter</span>
                                <span id="char-count" class="text-xs text-gray-400">0/500</span>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full py-2.5 text-sm font-semibold text-white rounded-xl hover:opacity-90 transition-opacity shadow-md"
                            style="background-color:#1e3a5f;">
                            Kirim Testimoni
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <script>
            // ── Star Rating ───────────────────────────────────────────────
            const stars = document.querySelectorAll('.star-btn');
            const ratingInput = document.getElementById('rating-input');
            const ratingLabel = document.getElementById('rating-label');
            const labels = ['', '😞 Tidak Puas', '😐 Kurang Puas', '😊 Cukup Puas', '😄 Puas', '⭐⭐⭐⭐⭐ Sangat Puas'];

            function setRating(val) {
                ratingInput.value = val;
                stars.forEach(s => {
                    s.classList.toggle('text-amber-400', parseInt(s.dataset.value) <= val);
                    s.classList.toggle('text-gray-300', parseInt(s.dataset.value) > val);
                });
                ratingLabel.textContent = labels[val] || '';
            }

            stars.forEach(s => {
                s.addEventListener('click', () => setRating(parseInt(s.dataset.value)));
                s.addEventListener('mouseenter', () => {
                    stars.forEach(x => {
                        x.classList.toggle('text-amber-300', parseInt(x.dataset.value) <= parseInt(s
                            .dataset.value));
                    });
                });
                s.addEventListener('mouseleave', () => setRating(parseInt(ratingInput.value)));
            });

            setRating(parseInt(ratingInput.value) || 5);

            // ── Char Counter ──────────────────────────────────────────────
            const komentarTA = document.getElementById('komentar');
            const charCount = document.getElementById('char-count');
            komentarTA.addEventListener('input', () => {
                charCount.textContent = komentarTA.value.length + '/500';
            });
            charCount.textContent = komentarTA.value.length + '/500';
        </script>
    @endauth



    {{-- ============================
     CTA SECTION
============================= --}}
    <section class="py-20 px-4" style="background: linear-gradient(135deg, #1e3a5f 0%, #0f2545 100%);">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4" style="font-family: 'Playfair Display', serif;">
                Siap untuk Memesan?
            </h2>
            <p class="text-blue-200 text-base leading-relaxed mb-8">
                Hubungi kami sekarang dan dapatkan konsultasi gratis. Tim kami siap membantu mewujudkan kebutuhan cetak
                Anda.
            </p>
            <a href="https://wa.me/{{ $adminPhone }}?text=Halo%20Saptakarya%2C%20saya%20ingin%20memesan..."
                target="_blank" class="btn-primary text-base px-8 py-3.5">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                </svg>
                Chat via WhatsApp
            </a>
        </div>
    </section>

    {{-- Carousel Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const track = document.getElementById('testimoni-track');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            const dots = document.querySelectorAll('#testimoni-dots button');
            const items = track.querySelectorAll(':scope > div');
            const total = items.length;

            let current = 0;
            let itemsVisible = 1;

            function getVisible() {
                const w = window.innerWidth;
                if (w >= 1024) return 3;
                if (w >= 640) return 2;
                return 1;
            }

            function getGap() {
                return 20; // px, matches gap-5
            }

            function updateCarousel() {
                itemsVisible = getVisible();
                const maxCurrent = Math.max(0, total - itemsVisible);
                if (current > maxCurrent) current = maxCurrent;

                const trackWidth = track.parentElement.offsetWidth;
                const itemWidth = (trackWidth - getGap() * (itemsVisible - 1)) / itemsVisible;
                const offset = current * (itemWidth + getGap());

                items.forEach(item => {
                    item.style.width = itemWidth + 'px';
                    item.style.minWidth = itemWidth + 'px';
                });

                track.style.transform = `translateX(-${offset}px)`;

                prevBtn.disabled = current === 0;
                nextBtn.disabled = current >= maxCurrent;

                dots.forEach((dot, i) => {
                    const active = i === current;
                    dot.style.backgroundColor = active ? '#1e3a5f' : '#d1d5db';
                    dot.style.width = active ? '1.5rem' : '0.5rem';
                });
            }

            prevBtn.addEventListener('click', () => {
                if (current > 0) {
                    current--;
                    updateCarousel();
                }
            });
            nextBtn.addEventListener('click', () => {
                const max = Math.max(0, total - getVisible());
                if (current < max) {
                    current++;
                    updateCarousel();
                }
            });
            dots.forEach((dot, i) => {
                dot.addEventListener('click', () => {
                    current = i;
                    updateCarousel();
                });
            });

            window.addEventListener('resize', updateCarousel);

            // Auto-play
            setInterval(() => {
                const max = Math.max(0, total - getVisible());
                current = current < max ? current + 1 : 0;
                updateCarousel();
            }, 5000);

            updateCarousel();
        });
    </script>
@endsection
