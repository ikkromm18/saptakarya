@extends('layouts.app')

@section('content')

    {{-- Page Header --}}
    <div class="pt-32 pb-16 px-4" style="background: linear-gradient(135deg, #1e3a5f 0%, #0f2545 100%);">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-sm font-semibold uppercase tracking-widest mb-3" style="color: #c9a84c;">Karya Terbaik Kami</p>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4" style="font-family: 'Playfair Display', serif;">Galeri
                Portofolio</h1>
            <div class="w-16 h-1 rounded-full mx-auto mb-4" style="background-color: #c9a84c;"></div>
            <p class="text-blue-200 text-sm max-w-md mx-auto">Kumpulan hasil cetak terbaik yang telah kami selesaikan untuk
                para pelanggan.</p>
        </div>
    </div>

    {{-- Filter Tabs --}}
    <section class="py-6 px-4 bg-white border-b border-gray-100 sticky top-16 z-20">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center gap-2 overflow-x-auto pb-1 scrollbar-hide" id="filter-tabs">
                @php
                    $categories = ['Semua', ...$portfolios->pluck('kategori')->unique()->toArray()];
                @endphp
                @foreach ($categories as $cat)
                    <button type="button"
                        class="filter-btn flex-shrink-0 px-4 py-2 rounded-full text-sm font-medium transition-all duration-200 border {{ $loop->first ? 'text-white border-transparent' : 'text-gray-600 border-gray-200 hover:border-gray-400 bg-white' }}"
                        style="{{ $loop->first ? 'background-color: #1e3a5f;' : '' }}" data-category="{{ $cat }}">
                        {{ $cat }}
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Gallery Grid --}}
    <section class="section-padding" style="background-color: #f9fafb;">
        <div class="max-w-7xl mx-auto">
            @if ($portfolios->isEmpty())
                <div class="text-center py-20 text-gray-400">
                    <svg class="w-16 h-16 mx-auto mb-4 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <p>Belum ada portofolio.</p>
                </div>
            @else
                <div id="gallery-grid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
                    @foreach ($portfolios as $portfolio)
                        <div class="gallery-item" data-category="{{ $portfolio->kategori }}">
                            <x-portfolio-card :portfolio="$portfolio" />
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- Filter + Show/Hide Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const items = document.querySelectorAll('.gallery-item');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    const cat = btn.dataset.category;

                    // Update button styles
                    filterBtns.forEach(b => {
                        b.style.backgroundColor = '';
                        b.style.color = '';
                        b.style.borderColor = '#e5e7eb';
                        b.classList.remove('text-white');
                        b.classList.add('text-gray-600');
                    });
                    btn.style.backgroundColor = '#1e3a5f';
                    btn.style.color = '#fff';
                    btn.style.borderColor = 'transparent';
                    btn.classList.remove('text-gray-600');
                    btn.classList.add('text-white');

                    // Filter items
                    items.forEach(item => {
                        if (cat === 'Semua' || item.dataset.category === cat) {
                            item.style.display = '';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
@endsection
