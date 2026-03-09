@extends('layouts.app', ['title' => 'Edit Profil'])

@section('content')
    <section class="bg-gray-50 min-h-screen py-24">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-8">Kelola Akun</h1>

            @if (session('status') === 'profile-updated')
                <div class="mb-6 p-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                    <span class="font-medium">Berhasil!</span> Data profil telah diperbarui.
                </div>
            @endif

            @if (session('status') === 'password-updated')
                <div class="mb-6 p-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                    <span class="font-medium">Berhasil!</span> Password telah diperbarui.
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 text-sm text-red-600 bg-red-100 p-4 rounded-lg">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Update Profile Form -->
                <div class="md:col-span-2 bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold mb-4 text-gray-900">Informasi Pribadi</h2>
                    <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-50 border px-3 py-2">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-50 border px-3 py-2">
                        </div>

                        <div>
                            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                            <textarea name="alamat" id="alamat" rows="2" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-50 border px-3 py-2">{{ old('alamat', $user->alamat) }}</textarea>
                        </div>

                        <div>
                            <label for="no_hp" class="block text-sm font-medium text-gray-700">No. WhatsApp / HP</label>
                            <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp', $user->no_hp) }}"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-50 border px-3 py-2">
                        </div>

                        <div class="flex justify-end pt-2">
                            <button type="submit"
                                class="btn-primary py-2 px-6 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition-colors">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Update Password Form -->
                <div class="md:col-span-1 bg-white rounded-lg shadow p-6 h-fit">
                    <h2 class="text-xl font-semibold mb-4 text-gray-900">Ubah Password</h2>
                    <form action="{{ route('profile.password') }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="current_password" class="block text-sm font-medium text-gray-700">Password Saat
                                Ini</label>
                            <input type="password" name="current_password" id="current_password" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-50 border px-3 py-2">
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                            <input type="password" name="password" id="password" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-50 border px-3 py-2">
                        </div>
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi
                                Password Baru</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-50 border px-3 py-2">
                        </div>

                        <div class="flex justify-end pt-4">
                            <button type="submit"
                                class="w-full btn-primary bg-gray-900 hover:bg-gray-800 text-white font-medium py-2 px-4 rounded-md transition-colors">
                                Ubah Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
