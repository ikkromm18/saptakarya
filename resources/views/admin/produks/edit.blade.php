@extends('layouts.admin', ['title' => 'Edit Produk'])

@section('admin-content')
    <div class="max-w-2xl mx-auto">
        {{-- Header --}}
        <div class="flex items-center gap-3 mb-6">
            <a href="{{ route('admin.produks.index') }}"
                class="p-2 rounded-lg hover:bg-gray-100 transition-colors text-gray-500 hover:text-gray-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Edit Produk</h1>
                <p class="text-sm text-gray-500 mt-0.5">Perbarui data produk <span
                        class="font-medium text-gray-700">{{ $produk->nama }}</span>.</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
            <form action="{{ route('admin.produks.update', $produk) }}" method="POST" enctype="multipart/form-data"
                class="space-y-5">
                @csrf
                @method('PUT')

                {{-- Nama --}}
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1.5">Nama Produk
                        <span class="text-red-500">*</span></label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama', $produk->nama) }}"
                        class="w-full px-3.5 py-2.5 text-sm border rounded-lg focus:ring-2 focus:outline-none transition {{ $errors->has('nama') ? 'border-red-400 focus:ring-red-200' : 'border-gray-300 focus:ring-blue-200 focus:border-blue-400' }}"
                        placeholder="Nama produk">
                    @error('nama')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi
                        <span class="text-red-500">*</span></label>
                    <textarea id="deskripsi" name="deskripsi" rows="4"
                        class="w-full px-3.5 py-2.5 text-sm border rounded-lg focus:ring-2 focus:outline-none transition {{ $errors->has('deskripsi') ? 'border-red-400 focus:ring-red-200' : 'border-gray-300 focus:ring-blue-200 focus:border-blue-400' }}"
                        placeholder="Deskripsi singkat produk...">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Harga --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="harga_min" class="block text-sm font-medium text-gray-700 mb-1.5">Harga Min (Rp)
                            <span class="text-red-500">*</span></label>
                        <input type="number" id="harga_min" name="harga_min"
                            value="{{ old('harga_min', $produk->harga_min) }}" min="0"
                            class="w-full px-3.5 py-2.5 text-sm border rounded-lg focus:ring-2 focus:outline-none transition {{ $errors->has('harga_min') ? 'border-red-400 focus:ring-red-200' : 'border-gray-300 focus:ring-blue-200 focus:border-blue-400' }}">
                        @error('harga_min')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="harga_max" class="block text-sm font-medium text-gray-700 mb-1.5">Harga Max (Rp)
                            <span class="text-red-500">*</span></label>
                        <input type="number" id="harga_max" name="harga_max"
                            value="{{ old('harga_max', $produk->harga_max) }}" min="0"
                            class="w-full px-3.5 py-2.5 text-sm border rounded-lg focus:ring-2 focus:outline-none transition {{ $errors->has('harga_max') ? 'border-red-400 focus:ring-red-200' : 'border-gray-300 focus:ring-blue-200 focus:border-blue-400' }}">
                        @error('harga_max')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Ukuran --}}
                <div>
                    <label for="ukuran" class="block text-sm font-medium text-gray-700 mb-1.5">Pilihan Ukuran</label>
                    <textarea id="ukuran" name="ukuran" rows="4"
                        class="w-full px-3.5 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-400 focus:outline-none transition font-mono"
                        placeholder="60x160 cm&#10;80x200 cm&#10;Custom">{{ old('ukuran', $produk->ukuran ? implode("\n", $produk->ukuran) : '') }}</textarea>
                    <p class="mt-1 text-xs text-gray-400">Satu ukuran per baris.</p>
                    @error('ukuran')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Bahan --}}
                <div>
                    <label for="bahan" class="block text-sm font-medium text-gray-700 mb-1.5">Pilihan Bahan</label>
                    <textarea id="bahan" name="bahan" rows="4"
                        class="w-full px-3.5 py-2.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-400 focus:outline-none transition font-mono"
                        placeholder="Flexi Korea 340gr&#10;Vinyl Outdoor">{{ old('bahan', $produk->bahan ? implode("\n", $produk->bahan) : '') }}</textarea>
                    <p class="mt-1 text-xs text-gray-400">Satu bahan per baris.</p>
                    @error('bahan')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Foto --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Foto Produk</label>

                    {{-- Current Photo --}}
                    <div class="mb-3 p-3 bg-gray-50 rounded-lg border border-gray-200 flex items-center gap-3">
                        <img src="{{ filter_var($produk->foto, FILTER_VALIDATE_URL) ? $produk->foto : asset($produk->foto) }}"
                            alt="{{ $produk->nama }}"
                            class="w-20 h-16 object-cover rounded-lg border border-gray-200 shrink-0">
                        <div>
                            <p class="text-xs font-medium text-gray-700">Foto saat ini</p>
                            <p class="text-xs text-gray-400 mt-0.5">Kosongkan input di bawah jika tidak ingin mengganti
                                foto.</p>
                        </div>
                    </div>

                    <div id="drop-zone"
                        class="relative border-2 border-dashed rounded-xl p-5 text-center cursor-pointer transition-colors {{ $errors->has('foto') ? 'border-red-400 bg-red-50' : 'border-gray-300 hover:border-blue-400 hover:bg-blue-50/30' }}">
                        <input type="file" id="foto" name="foto" accept="image/*"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" onchange="previewImage(event)">
                        <div id="upload-placeholder">
                            <svg class="w-8 h-8 mx-auto text-gray-300 mb-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>
                            <p class="text-sm text-gray-500">Klik untuk unggah foto baru <span
                                    class="text-gray-400">(opsional)</span></p>
                            <p class="text-xs text-gray-400 mt-1">JPG, PNG, WEBP — maks. 3 MB</p>
                        </div>
                        <div id="image-preview" class="hidden">
                            <img id="preview-img" src="" alt="Preview"
                                class="max-h-36 mx-auto rounded-lg object-contain">
                            <p id="preview-name" class="text-xs text-gray-500 mt-2"></p>
                        </div>
                    </div>
                    @error('foto')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Actions --}}
                <div class="flex items-center justify-end gap-3 pt-2">
                    <a href="{{ route('admin.produks.index') }}"
                        class="px-4 py-2.5 text-sm font-medium text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-5 py-2.5 text-sm font-medium text-white rounded-lg hover:opacity-90 transition-colors"
                        style="background-color:#1e3a5f;">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = (e) => {
                document.getElementById('preview-img').src = e.target.result;
                document.getElementById('preview-name').textContent = file.name;
                document.getElementById('upload-placeholder').classList.add('hidden');
                document.getElementById('image-preview').classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    </script>
@endsection
