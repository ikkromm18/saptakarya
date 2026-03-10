@extends('layouts.admin')

@section('admin-content')
    <div class="max-w-2xl mx-auto">
        <div class="mb-6 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-900">Edit Data User</h1>
            <a href="{{ route('admin.users.index') }}" class="text-sm font-medium text-blue-600 hover:underline">Kembali</a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('name') border-red-500 @enderror"
                        placeholder="John Doe" required>
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email Utama</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('email') border-red-500 @enderror"
                        placeholder="name@example.com" required>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900">Nomor HP / WhatsApp</label>
                    <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('no_hp') border-red-500 @enderror"
                        placeholder="08123456789">
                    @error('no_hp')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900">Alamat Lengkap</label>
                    <textarea id="alamat" name="alamat" rows="3"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 @error('alamat') border-red-500 @enderror"
                        placeholder="Alamat pengiriman / domisili...">{{ old('alamat', $user->alamat) }}</textarea>
                    @error('alamat')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-8 p-4 bg-blue-50 rounded-lg border border-blue-100">
                    <h3 class="text-sm font-semibold text-blue-800 mb-2">Ubah Password</h3>
                    <p class="text-xs text-blue-600 mb-4">Kosongkan jika tidak ingin mengubah password.</p>

                    <div class="mb-5">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password Baru</label>
                        <input type="password" id="password" name="password"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('password') border-red-500 @enderror">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-0">
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Konfirmasi
                            Password Baru</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                </div>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center transition-colors">Perbarui
                    Data</button>
            </form>
        </div>
    </div>
@endsection
