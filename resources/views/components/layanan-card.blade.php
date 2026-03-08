@props(['produk'])

<div class="card-hover bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm">
    {{-- Image --}}
    <div class="relative overflow-hidden h-44">
        <img src="{{ $produk->foto }}" alt="{{ $produk->nama }}"
            class="w-full h-full object-cover transition-transform duration-500 hover:scale-105" loading="lazy">
        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
    </div>

    {{-- Content --}}
    <div class="p-5">
        <h3 class="font-bold text-gray-900 text-base mb-1">{{ $produk->nama }}</h3>
        <p class="text-gray-500 text-sm leading-relaxed line-clamp-2 mb-4">{{ $produk->deskripsi }}</p>

        {{-- Harga --}}
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs text-gray-400 mb-0.5">Mulai dari</p>
                <p class="font-bold text-base" style="color: #c9a84c;">
                    Rp {{ number_format($produk->harga_min, 0, ',', '.') }}
                </p>
            </div>
            <a href="{{ route('produk') }}" class="text-xs font-semibold px-3 py-1.5 rounded-lg transition-colors"
                style="background-color: #1e3a5f; color: white;">
                Lihat Detail
            </a>
        </div>
    </div>
</div>
