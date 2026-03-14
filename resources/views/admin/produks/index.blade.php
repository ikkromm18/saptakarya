@extends('layouts.admin', ['title' => 'Kelola Produk'])

@section('admin-content')
    <div class="max-w-7xl mx-auto">
        {{-- Header --}}
        <div class="flex flex-col md:flex-row items-center justify-between mb-6 gap-4">
            <h1 class="text-2xl font-bold text-gray-900">Kelola Produk</h1>

            <div class="flex flex-col md:flex-row items-center gap-3 w-full md:w-auto">
                {{-- Search --}}
                <form action="{{ route('admin.produks.index') }}" method="GET"
                    class="flex items-center gap-2 w-full md:w-auto">
                    <div class="relative w-full md:w-60">
                        <div class="absolute inset-y-0 insert-s-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" name="search" value="{{ request('search') }}"
                            class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Cari nama produk...">
                    </div>
                    <button type="submit" class="text-white font-medium rounded-lg text-sm px-4 py-2 whitespace-nowrap"
                        style="background-color:#1e3a5f;">Cari</button>
                    @if (request('search'))
                        <a href="{{ route('admin.produks.index') }}"
                            class="text-gray-500 hover:text-gray-700 text-sm underline">Reset</a>
                    @endif
                </form>

                {{-- Tambah --}}
                <a href="{{ route('admin.produks.create') }}"
                    class="flex items-center gap-1.5 text-white font-medium rounded-lg text-sm px-4 py-2 whitespace-nowrap"
                    style="background-color:#c9a84c;">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Produk
                </a>
            </div>
        </div>

        {{-- Flash --}}
        @if (session('success'))
            <div id="alert-success" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50" role="alert">
                <svg class="shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="ms-3 text-sm font-medium">{{ session('success') }}</div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8"
                    data-dismiss-target="#alert-success" aria-label="Close">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif

        {{-- Table --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-xl mb-6 border border-gray-100">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-4">No</th>
                        <th scope="col" class="px-4 py-4 w-20">Foto</th>
                        <th scope="col" class="px-6 py-4">Nama Produk</th>
                        <th scope="col" class="px-6 py-4">Kisaran Harga</th>
                        <th scope="col" class="px-6 py-4">Ukuran</th>
                        <th scope="col" class="px-6 py-4">Bahan</th>
                        <th scope="col" class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($produks as $produk)
                        <tr class="bg-white hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-4 py-3">
                                <img src="{{ filter_var($produk->foto, FILTER_VALIDATE_URL) ? $produk->foto : asset($produk->foto) }}"
                                    alt="{{ $produk->nama }}"
                                    class="w-16 h-12 object-cover rounded-lg border border-gray-200">
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-semibold text-gray-900">{{ $produk->nama }}</div>
                                <div class="text-xs text-gray-400 mt-0.5">{{ Str::limit($produk->deskripsi, 60) }}
                                </div>
                            </td>
                            <td class="px-6 py-4 font-medium" style="color:#c9a84c;">
                                Rp {{ number_format($produk->harga_min, 0, ',', '.') }}
                                –
                                Rp {{ number_format($produk->harga_max, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($produk->ukuran)
                                    <div class="flex flex-wrap gap-1">
                                        @foreach (array_slice($produk->ukuran, 0, 3) as $uk)
                                            <span
                                                class="text-xs px-1.5 py-0.5 rounded border border-gray-200 text-gray-600 bg-gray-50">{{ $uk }}</span>
                                        @endforeach
                                        @if (count($produk->ukuran) > 3)
                                            <span
                                                class="text-xs px-1.5 py-0.5 rounded bg-gray-100 text-gray-500">+{{ count($produk->ukuran) - 3 }}</span>
                                        @endif
                                    </div>
                                @else
                                    <span class="text-gray-400">—</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if ($produk->bahan)
                                    <div class="flex flex-wrap gap-1">
                                        @foreach (array_slice($produk->bahan, 0, 2) as $bhn)
                                            <span
                                                class="text-xs px-1.5 py-0.5 rounded bg-blue-50 text-blue-700">{{ $bhn }}</span>
                                        @endforeach
                                        @if (count($produk->bahan) > 2)
                                            <span
                                                class="text-xs px-1.5 py-0.5 rounded bg-gray-100 text-gray-500">+{{ count($produk->bahan) - 2 }}</span>
                                        @endif
                                    </div>
                                @else
                                    <span class="text-gray-400">—</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.produks.edit', $produk) }}"
                                        class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-amber-700 bg-amber-50 rounded-lg hover:bg-amber-100 transition-colors">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.produks.destroy', $produk) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-red-700 bg-red-50 rounded-lg hover:bg-red-100 transition-colors">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white">
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 text-gray-200 mb-4" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                        </path>
                                    </svg>
                                    @if (request('search'))
                                        <p class="font-medium">Produk tidak ditemukan.</p>
                                    @else
                                        <p class="font-medium">Belum ada data produk.</p>
                                        <a href="{{ route('admin.produks.create') }}"
                                            class="mt-3 text-sm text-blue-600 hover:underline">Tambah produk
                                            pertama</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="flex justify-center sm:justify-end">
            {{ $produks->links() }}
        </div>
    </div>
@endsection
