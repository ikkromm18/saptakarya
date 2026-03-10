@extends('layouts.app', ['title' => 'Register'])

@section('content')
    <section class="bg-gray-50 flex items-center justify-center min-h-screen pt-20 pb-12">
        <div class="w-full max-w-lg bg-white rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Daftar Akun Baru</h2>

            @if ($errors->any())
                <div class="mb-4 text-sm text-red-600 bg-red-100 p-3 rounded-md">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-50 border px-3 py-2"
                        placeholder="Nama Anda">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-50 border px-3 py-2"
                        placeholder="nama@email.com">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" id="password" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-50 border px-3 py-2"
                            placeholder="Minimal 8 karakter">
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi
                            Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-50 border px-3 py-2"
                            placeholder="••••••••">
                    </div>
                </div>

                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                    <textarea name="alamat" id="alamat" rows="2" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-50 border px-3 py-2"
                        placeholder="Jl. Contoh No. 123, Kota">{{ old('alamat') }}</textarea>
                </div>

                <div>
                    <label for="no_hp" class="block text-sm font-medium text-gray-700">No. WhatsApp / HP</label>
                    <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-50 border px-3 py-2"
                        placeholder="081234567890">
                </div>

                <button type="submit"
                    class="w-full text-center btn-primary bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md mt-4 transition-colors">
                    Daftar
                </button>
            </form>

            <p class="mt-6 text-sm text-center text-gray-600">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-medium">Login ke
                    akun Anda</a>
            </p>
        </div>
    </section>
@endsection
