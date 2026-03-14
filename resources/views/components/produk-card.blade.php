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

            @auth
                <button type="button" data-modal-target="order-modal-{{ $produk->id }}"
                    data-modal-toggle="order-modal-{{ $produk->id }}" class="btn-primary text-xs py-2 px-3">
                    Pesan
                </button>
            @else
                <a href="{{ route('login') }}" class="btn-primary text-xs py-2 px-3">
                    Login
                </a>
            @endauth
        </div>
    </div>
</div>

{{-- Order Modal --}}
@auth
    <div id="order-modal-{{ $produk->id }}" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Pesan {{ $produk->nama }}
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="order-modal-{{ $produk->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Tutup modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="{{ route('orders.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="produk_id" value="{{ $produk->id }}">

                        @if ($produk->ukuran && count($produk->ukuran) > 0)
                            <div>
                                <label for="ukuran-{{ $produk->id }}"
                                    class="block mb-2 text-sm font-medium text-gray-900">Ukuran</label>
                                <select name="ukuran" id="ukuran-{{ $produk->id }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                                    <option value="">Pilih Ukuran</option>
                                    @foreach ($produk->ukuran as $uk)
                                        <option value="{{ $uk }}">{{ $uk }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        @if ($produk->bahan && count($produk->bahan) > 0)
                            <div>
                                <label for="bahan-{{ $produk->id }}"
                                    class="block mb-2 text-sm font-medium text-gray-900">Bahan</label>
                                <select name="bahan" id="bahan-{{ $produk->id }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                                    <option value="">Pilih Bahan</option>
                                    @foreach ($produk->bahan as $bhn)
                                        <option value="{{ $bhn }}">{{ $bhn }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        <div>
                            <label for="jumlah-{{ $produk->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900">Jumlah Pesanan</label>
                            <input type="number" name="jumlah" id="jumlah-{{ $produk->id }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="1" value="1" min="1" required>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900"
                                for="file_desain-{{ $produk->id }}">Upload File Desain (Opsional)</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                aria-describedby="file_desain_help" id="file_desain-{{ $produk->id }}" name="file_desain"
                                type="file" accept=".jpg,.jpeg,.png,.pdf,.zip,.rar">
                            <p class="mt-1 text-xs text-gray-500" id="file_desain_help">PDF, JPG, PNG, ZIP (Max 10MB).</p>
                        </div>

                        <div>
                            <label for="catatan-{{ $produk->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900">Catatan Tambahan (Opsional)</label>
                            <textarea name="catatan" id="catatan-{{ $produk->id }}" rows="3"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Instruksi khusus, dll..."></textarea>
                        </div>

                        <button type="submit"
                            class="w-full text-white bg-[#1e3a5f] hover:bg-[#152842] focus:ring-4 focus:outline-none focus:ring-[#1e3a5f]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Buat Pesanan
                        </button>
                        <p class="text-xs text-center text-gray-500 mt-2">Harga total adalah <span
                                class="font-semibold text-gray-900">Harga Max × Jumlah</span>. Harga sebenarnya mungkin
                            lebih murah atau disesuaikan.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endauth
