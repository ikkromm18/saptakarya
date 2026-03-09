@extends('layouts.app')

@section('content')
    {{-- Page Header --}}
    <div class="pt-32 pb-16 px-4" style="background: linear-gradient(135deg, #1e3a5f 0%, #0f2545 100%);">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-sm font-semibold uppercase tracking-widest mb-3" style="color: #c9a84c;">Ada yang bisa kami bantu?
            </p>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4" style="font-family: 'Playfair Display', serif;">Hubungi
                Kami</h1>
            <div class="w-16 h-1 rounded-full mx-auto mb-4" style="background-color: #c9a84c;"></div>
            <p class="text-blue-200 text-sm max-w-md mx-auto">Tim kami siap membantu Anda 6 hari dalam seminggu.</p>
        </div>
    </div>

    {{-- Contact Section --}}
    <section class="section-padding bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- Kontak Info Cards --}}
                <div class="lg:col-span-1 space-y-5">

                    {{-- Alamat --}}
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                        <div class="flex items-start gap-4">
                            <div class="w-11 h-11 rounded-xl flex items-center justify-center shrink-0"
                                style="background-color: #e8f0fb;">
                                <svg class="w-5 h-5" style="color: #1e3a5f;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 text-sm mb-1">Alamat</h3>
                                <p class="text-gray-500 text-sm leading-relaxed">
                                    Jl. KH Mansyur Gg 17 No. 21 Pekalongan Barat, Kota Pekalongan, Jawa Tengah
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Telepon & WA --}}
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                        <div class="flex items-start gap-4">
                            <div class="w-11 h-11 rounded-xl flex items-center justify-center shrink-0"
                                style="background-color: #e8f0fb;">
                                <svg class="w-5 h-5" style="color: #1e3a5f;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 text-sm mb-1">Telepon & WhatsApp</h3>
                                <a href="tel:+6281234567890"
                                    class="text-gray-500 text-sm hover:text-gray-900 transition-colors block">+62
                                    812-3456-7890</a>
                                <a href="https://wa.me/6281234567890" target="_blank"
                                    class="text-sm font-medium mt-2 inline-flex items-center gap-1.5"
                                    style="color: #25d366;">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                    </svg>
                                    Chat WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                        <div class="flex items-start gap-4">
                            <div class="w-11 h-11 rounded-xl flex items-center justify-center shrink-0"
                                style="background-color: #e8f0fb;">
                                <svg class="w-5 h-5" style="color: #1e3a5f;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 text-sm mb-1">Email</h3>
                                <a href="mailto:info@saptakarya.id"
                                    class="text-gray-500 text-sm hover:text-gray-900 transition-colors">info@saptakarya.id</a>
                            </div>
                        </div>
                    </div>

                    {{-- Jam Operasional --}}
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                        <div class="flex items-start gap-4">
                            <div class="w-11 h-11 rounded-xl flex items-center justify-center shrink-0"
                                style="background-color: #e8f0fb;">
                                <svg class="w-5 h-5" style="color: #1e3a5f;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h3 class="font-semibold text-gray-900 text-sm mb-3">Jam Operasional</h3>
                                <div class="space-y-2">
                                    @php
                                        $jadwal = [
                                            ['hari' => 'Senin – Jumat', 'jam' => '08.00 – 17.00 WIB', 'buka' => true],
                                            ['hari' => 'Sabtu', 'jam' => '08.00 – 14.00 WIB', 'buka' => true],
                                            ['hari' => 'Minggu', 'jam' => 'Tutup', 'buka' => false],
                                        ];
                                    @endphp
                                    @foreach ($jadwal as $j)
                                        <div class="flex justify-between items-center text-sm">
                                            <span class="text-gray-600">{{ $j['hari'] }}</span>
                                            <span
                                                class="font-medium {{ $j['buka'] ? 'text-gray-900' : 'text-red-500' }}">{{ $j['jam'] }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Google Maps --}}
                <div class="lg:col-span-2">
                    <div class="rounded-2xl overflow-hidden border border-gray-100 shadow-sm h-full min-h-[400px]">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d783.5112093917297!2d109.66679347227732!3d-6.893670834045925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e702429a96ed3bb%3A0xd670d962bbab196d!2sJl.%20KH.%20Mansyur%2C%20Kec.%20Pekalongan%20Bar.%2C%20Kota%20Pekalongan%2C%20Jawa%20Tengah!5e1!3m2!1sid!2sid!4v1773012227879!5m2!1sid!2sid"
                            width="100%" height="100%" style="border:0; min-height: 450px;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Lokasi Saptakarya di Bandung">
                        </iframe>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
