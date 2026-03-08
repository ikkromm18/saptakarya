@props(['portfolio'])

<div class="card-hover group relative rounded-2xl overflow-hidden shadow-sm cursor-pointer">
    <img src="{{ $portfolio->foto }}" alt="{{ $portfolio->judul }}"
        class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110" loading="lazy">
    {{-- Overlay --}}
    <div
        class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
        <span class="badge-kategori mb-1.5">{{ $portfolio->kategori }}</span>
        <h3 class="text-white font-semibold text-sm leading-snug">{{ $portfolio->judul }}</h3>
    </div>
    {{-- Badge always visible --}}
    <div class="absolute top-3 left-3">
        <span class="badge-kategori">{{ $portfolio->kategori }}</span>
    </div>
</div>
