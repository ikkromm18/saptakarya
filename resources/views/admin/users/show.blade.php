@extends('layouts.admin')

@section('admin-content')
    <div class="max-w-3xl mx-auto">
        <div class="mb-6 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-900">Detail User</h1>
            <a href="{{ route('admin.users.index') }}" class="text-sm font-medium text-blue-600 hover:underline">Kembali</a>
        </div>

        <div class="bg-white p-6 py-8 rounded-lg shadow-sm border border-gray-200">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Nama Lengkap</h3>
                    <p class="mt-1 text-lg text-gray-900">{{ $user->name }}</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Email Utama</h3>
                    <p class="mt-1 text-lg text-gray-900">{{ $user->email }}</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Nomor HP / WhatsApp</h3>
                    <p class="mt-1 text-lg text-gray-900">{{ $user->no_hp ?? '-' }}</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Peran (Role)</h3>
                    <p class="mt-1 text-lg text-gray-900 capitalize">{{ $user->role }}</p>
                </div>
                <div class="md:col-span-2">
                    <h3 class="text-sm font-medium text-gray-500">Alamat Lengkap</h3>
                    <p class="mt-1 text-lg text-gray-900">{{ $user->alamat ?? '-' }}</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Tanggal Terdaftar</h3>
                    <p class="mt-1 text-lg text-gray-900">{{ $user->created_at->format('d M Y H:i:s') }}</p>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Pembaruan Terakhir</h3>
                    <p class="mt-1 text-lg text-gray-900">{{ $user->updated_at->format('d M Y H:i:s') }}</p>
                </div>
            </div>

            <div class="mt-10 flex gap-3">
                <a href="{{ route('admin.users.edit', $user) }}"
                    class="text-white bg-[#1e3a5f] hover:bg-[#152842] focus:ring-4 focus:outline-none focus:ring-[#1e3a5f]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-colors">Edit
                    User</a>
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-colors">Hapus
                        User</button>
                </form>
            </div>
        </div>
    </div>
@endsection
