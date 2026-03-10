@extends('layouts.app', ['title' => 'Login'])

@section('content')
    <section class="bg-gray-50 flex items-center justify-center min-h-screen pt-20 pb-12">
        <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Login ke Akun Anda</h2>

            @if ($errors->any())
                <div class="mb-4 text-sm text-red-600 bg-red-100 p-3 rounded-md">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-50 border px-3 py-2"
                        placeholder="nama@email.com">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-50 border px-3 py-2"
                        placeholder="••••••••">
                </div>


                <button type="submit"
                    class="w-full text-center btn-primary bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md mt-4 transition-colors">
                    Login
                </button>
            </form>

            <p class="mt-6 text-sm text-center text-gray-600">
                Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-medium">Daftar
                    sekarang</a>
            </p>
        </div>
    </section>
@endsection
