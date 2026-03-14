@extends('layouts.admin', ['title' => 'Kelola Testimoni'])

@section('admin-content')
    <div class="max-w-7xl mx-auto">
        {{-- Header --}}
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-6 gap-3">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Kelola Testimoni</h1>
                <p class="text-sm text-gray-500 mt-0.5">Tampilkan, sembunyikan, atau hapus testimoni pelanggan.</p>
            </div>
            {{-- Search --}}
            <form action="{{ route('admin.testimonis.index') }}" method="GET"
                class="flex items-center gap-2 w-full md:w-auto">
                <input type="hidden" name="status" value="{{ request('status') }}">
                <div class="relative w-full md:w-60">
                    <div class="absolute inset-y-0 inset-s-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" name="search" value="{{ request('search') }}"
                        class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Cari nama / komentar...">
                </div>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white rounded-lg"
                    style="background-color:#1e3a5f;">Cari</button>
                @if (request('search'))
                    <a href="{{ route('admin.testimonis.index', ['status' => request('status')]) }}"
                        class="text-sm text-gray-500 hover:underline">Reset</a>
                @endif
            </form>
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
                    class="ms-auto text-green-500 hover:bg-green-200 rounded-lg p-1.5 inline-flex h-8 w-8 items-center justify-center"
                    data-dismiss-target="#alert-success">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif

        {{-- Status Filter Tabs --}}
        <div class="flex gap-2 mb-5 flex-wrap">
            @php
                $tabs = [
                    '' => ['label' => 'Semua', 'count' => $counts['all'], 'color' => 'gray'],
                    'pending' => ['label' => 'Pending', 'count' => $counts['pending'], 'color' => 'yellow'],
                    'displayed' => ['label' => 'Ditampilkan', 'count' => $counts['displayed'], 'color' => 'green'],
                    'hidden' => ['label' => 'Disembunyikan', 'count' => $counts['hidden'], 'color' => 'red'],
                ];
            @endphp
            @foreach ($tabs as $val => $tab)
                @php
                    $active = request('status') === $val || (request('status') === null && $val === '');
                    $colorClass = $active
                        ? 'text-white'
                        : 'text-gray-600 bg-white border border-gray-200 hover:bg-gray-50';
                    $style = $active ? 'background-color:#1e3a5f;' : '';
                @endphp
                <a href="{{ route('admin.testimonis.index', array_filter(['status' => $val ?: null, 'search' => request('search')])) }}"
                    class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full text-sm font-medium transition-colors {{ $colorClass }}"
                    style="{{ $style }}">
                    {{ $tab['label'] }}
                    <span
                        class="inline-flex items-center justify-center w-5 h-5 text-xs font-bold rounded-full
                        {{ $active ? 'bg-white/20 text-white' : 'bg-gray-100 text-gray-600' }}">
                        {{ $tab['count'] }}
                    </span>
                </a>
            @endforeach
        </div>

        {{-- Cards Grid --}}
        @forelse ($testimonis as $testimoni)
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5 mb-4">
                <div class="flex flex-col md:flex-row gap-4">
                    {{-- Avatar + Info --}}
                    <div class="flex items-start gap-3 flex-1">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold text-sm shrink-0"
                            style="background-color:#1e3a5f;">
                            {{ strtoupper(substr($testimoni->nama, 0, 1)) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 flex-wrap">
                                <span class="text-xs text-gray-400 font-mono">#{{ $loop->iteration }}</span>
                                <p class="font-semibold text-gray-900 text-sm">{{ $testimoni->nama }}</p>
                                @if ($testimoni->instansi)
                                    <span class="text-xs text-gray-400">• {{ $testimoni->instansi }}</span>
                                @endif
                                {{-- Status Badge --}}
                                @php
                                    $badge = match ($testimoni->status) {
                                        'pending' => 'bg-yellow-100 text-yellow-800',
                                        'displayed' => 'bg-green-100 text-green-800',
                                        'hidden' => 'bg-red-100 text-red-800',
                                    };
                                    $badgeLabel = match ($testimoni->status) {
                                        'pending' => 'Pending',
                                        'displayed' => 'Ditampilkan',
                                        'hidden' => 'Disembunyikan',
                                    };
                                @endphp
                                <span
                                    class="text-xs px-2 py-0.5 rounded-full font-medium {{ $badge }}">{{ $badgeLabel }}</span>
                            </div>
                            {{-- Stars --}}
                            <div class="flex gap-0.5 my-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg class="w-3.5 h-3.5 {{ $i <= $testimoni->rating ? 'text-amber-400' : 'text-gray-200' }}"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                            <p class="text-sm text-gray-600 leading-relaxed">"{{ $testimoni->komentar }}"</p>
                            <p class="text-xs text-gray-400 mt-1.5">{{ $testimoni->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center gap-2 shrink-0 flex-wrap md:flex-col md:items-end">

                        {{-- Tampilkan --}}
                        @if ($testimoni->status !== 'displayed')
                            <form action="{{ route('admin.testimonis.status', $testimoni) }}" method="POST">
                                @csrf @method('PATCH')
                                <input type="hidden" name="status" value="displayed">
                                <button type="submit"
                                    class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-medium text-green-700 bg-green-50 rounded-lg hover:bg-green-100 transition-colors">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Tampilkan
                                </button>
                            </form>
                        @endif

                        {{-- Sembunyikan --}}
                        @if ($testimoni->status !== 'hidden')
                            <form action="{{ route('admin.testimonis.status', $testimoni) }}" method="POST">
                                @csrf @method('PATCH')
                                <input type="hidden" name="status" value="hidden">
                                <button type="submit"
                                    class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-medium text-orange-700 bg-orange-50 rounded-lg hover:bg-orange-100 transition-colors">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                    </svg>
                                    Sembunyikan
                                </button>
                            </form>
                        @endif

                        {{-- Hapus --}}
                        <form action="{{ route('admin.testimonis.destroy', $testimoni) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus testimoni ini secara permanen?')">
                            @csrf @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-medium text-red-700 bg-red-50 rounded-lg hover:bg-red-100 transition-colors">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-xl border border-gray-100 p-12 text-center">
                <svg class="w-12 h-12 mx-auto text-gray-200 mb-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <p class="text-gray-500 font-medium">Belum ada testimoni
                    @if (request('status'))
                        dengan status "{{ request('status') }}"
                    @endif.
                </p>
            </div>
        @endforelse

        {{-- Pagination --}}
        <div class="mt-4 flex justify-end">
            {{ $testimonis->links() }}
        </div>
    </div>
@endsection
