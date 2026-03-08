@props(['produk'])

<div class="card-hover bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm flex flex-col">
    {{-- Photo --}}
    <div class="relative overflow-hidden h-48">
        <img src="{{ $produk->foto }}" alt="{{ $produk->nama }}"
            class="w-full h-full object-cover transition-transform duration-500 hover:scale-105" loading="lazy">
    </div>

    {{-- Content --}}
    <div class="p-5 flex flex-col flex-1">
        <h3 class="font-bold text-gray-900 text-base mb-2">{{ $produk->nama }}</h3>
        <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ $produk->deskripsi }}</p>

        {{-- Ukuran --}}
        @if ($produk->ukuran)
            <div class="mb-3">
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1.5">Pilihan Ukuran</p>
                <div class="flex flex-wrap gap-1.5">
                    @foreach ($produk->ukuran as $ukuran)
                        <span
                            class="text-xs px-2 py-1 rounded-md border border-gray-200 text-gray-600 bg-gray-50">{{ $ukuran }}</span>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Bahan --}}
        @if ($produk->bahan)
            <div class="mb-4">
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1.5">Pilihan Bahan</p>
                <div class="flex flex-wrap gap-1.5">
                    @foreach ($produk->bahan as $bahan)
                        <span class="text-xs px-2 py-1 rounded-md bg-blue-50 text-blue-700">{{ $bahan }}</span>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Harga --}}
        <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
            <div>
                <p class="text-xs text-gray-400">Kisaran Harga</p>
                <p class="font-bold text-sm" style="color: #c9a84c;">
                    Rp {{ number_format($produk->harga_min, 0, ',', '.') }}
                    –
                    Rp {{ number_format($produk->harga_max, 0, ',', '.') }}
                </p>
            </div>
            <a href="https://wa.me/6281234567890?text=Halo%2C+saya+ingin+memesan+{{ urlencode($produk->nama) }}"
                target="_blank" class="btn-primary text-xs py-2 px-3">
                Pesan
            </a>
        </div>
    </div>
</div>
