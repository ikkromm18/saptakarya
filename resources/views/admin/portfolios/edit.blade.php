@extends('layouts.admin', ['title' => 'Edit Portfolio'])

@section('admin-content')
    <div class="max-w-2xl mx-auto">
        {{-- Header --}}
        <div class="flex items-center gap-3 mb-6">
            <a href="{{ route('admin.portfolios.index') }}"
                class="p-2 rounded-lg hover:bg-gray-100 transition-colors text-gray-500 hover:text-gray-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Edit Portfolio</h1>
                <p class="text-sm text-gray-500 mt-0.5">Perbarui data item portofolio.</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
            <form action="{{ route('admin.portfolios.update', $portfolio) }}" method="POST" enctype="multipart/form-data"
                class="space-y-5">
                @csrf
                @method('PUT')

                {{-- Judul --}}
                <div>
                    <label for="judul" class="block text-sm font-medium text-gray-700 mb-1.5">Judul
                        <span class="text-red-500">*</span></label>
                    <input type="text" id="judul" name="judul" value="{{ old('judul', $portfolio->judul) }}"
                        class="w-full px-3.5 py-2.5 text-sm border rounded-lg focus:ring-2 focus:outline-none transition {{ $errors->has('judul') ? 'border-red-400 focus:ring-red-200' : 'border-gray-300 focus:ring-blue-200 focus:border-blue-400' }}"
                        placeholder="Judul portfolio">
                    @error('judul')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kategori --}}
                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1.5">Kategori
                        <span class="text-red-500">*</span></label>
                    <input type="text" id="kategori" name="kategori" value="{{ old('kategori', $portfolio->kategori) }}"
                        list="kategori-list"
                        class="w-full px-3.5 py-2.5 text-sm border rounded-lg focus:ring-2 focus:outline-none transition {{ $errors->has('kategori') ? 'border-red-400 focus:ring-red-200' : 'border-gray-300 focus:ring-blue-200 focus:border-blue-400' }}"
                        placeholder="Contoh: Banner, Sablon Kaos, Undangan, ...">
                    <datalist id="kategori-list">
                        @foreach ($kategoris as $kat)
                            <option value="{{ $kat }}">
                        @endforeach
                    </datalist>
                    <p class="mt-1 text-xs text-gray-400">Pilih dari daftar atau ketik kategori baru.</p>
                    @error('kategori')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1.5">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="3"
                        class="w-full px-3.5 py-2.5 text-sm border rounded-lg focus:ring-2 focus:outline-none transition {{ $errors->has('deskripsi') ? 'border-red-400 focus:ring-red-200' : 'border-gray-300 focus:ring-blue-200 focus:border-blue-400' }}"
                        placeholder="Deskripsi singkat tentang proyek ini...">{{ old('deskripsi', $portfolio->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Foto --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Foto</label>

                    {{-- Current Photo --}}
                    <div class="mb-3 p-3 bg-gray-50 rounded-lg border border-gray-200 flex items-center gap-3">
                        <img src="{{ $portfolio->foto_url }}" alt="{{ $portfolio->judul }}"
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
                    <a href="{{ route('admin.portfolios.index') }}"
                        class="px-4 py-2.5 text-sm font-medium text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-5 py-2.5 text-sm font-medium text-white rounded-lg transition-colors hover:opacity-90"
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
            const placeholder = document.getElementById('upload-placeholder');
            const preview = document.getElementById('image-preview');
            const img = document.getElementById('preview-img');
            const name = document.getElementById('preview-name');

            const reader = new FileReader();
            reader.onload = (e) => {
                img.src = e.target.result;
                name.textContent = file.name;
                placeholder.classList.add('hidden');
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    </script>
@endsection
