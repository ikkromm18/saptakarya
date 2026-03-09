@extends('layouts.admin', ['title' => 'Dashboard'])

@section('admin-content')
    <div class="grid grid-cols-1 mb-8">
        <div class="w-full bg-white rounded-xl shadow-sm border border-gray-100 p-8 pt-10 overflow-hidden relative">

            <!-- Deco circle -->
            <div class="absolute -top-16 -right-16 w-48 h-48 rounded-full opacity-10 pointer-events-none"
                style="background-color: #1e3a5f;"></div>

            <h1 class="text-3xl font-bold mb-2" style="color: #1e3a5f;">
                Selamat Datang, <span style="color: #c9a84c;">{{ Auth::user()->name }}</span>
            </h1>
            <p class="text-gray-600 max-w-2xl mb-6">
                Ini adalah halaman dashboard admin Saptakarya. Di sini Anda dapat mengelola beragam konten website dan
                memantau performa situs Anda dengan mudah dan cepat.
            </p>

            <a href="{{ route('beranda') }}"
                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg text-white font-medium transition-colors hover:bg-opacity-90 shadow-sm"
                style="background-color: #1e3a5f;">
                Lihat Kinerja Situs
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3">
                    </path>
                </svg>
            </a>
        </div>
    </div>
@endsection
