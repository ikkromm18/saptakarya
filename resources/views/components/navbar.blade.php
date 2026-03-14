<nav class="navbar-custom fixed w-full z-30 top-0 left-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            {{-- Logo --}}
            <a href="{{ route('beranda') }}" class="flex items-center gap-2 shrink-0">
                <div class="w-9 h-9 rounded-lg flex items-center justify-center" style="background-color: #1e3a5f;">
                    <span class="text-white font-bold text-lg leading-none">S</span>
                </div>
                <span class="text-xl font-bold" style="color: #1e3a5f;">Sapta<span
                        style="color: #c9a84c;">karya</span></span>
            </a>

            {{-- Desktop Nav --}}
            <div class="hidden md:flex items-center gap-1">
                @php
                    $navLinks = [
                        ['route' => 'beranda', 'label' => 'Beranda'],
                        ['route' => 'tentang', 'label' => 'Tentang'],
                        ['route' => 'produk', 'label' => 'Produk'],
                        ['route' => 'portofolio', 'label' => 'Portofolio'],
                        ['route' => 'kontak', 'label' => 'Kontak'],
                    ];
                @endphp

                @foreach ($navLinks as $link)
                    <a href="{{ route($link['route']) }}"
                        class="px-4 py-2 rounded-md text-sm font-medium transition-colors duration-200
                        {{ request()->routeIs($link['route']) ? 'text-white' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100' }}"
                        @if (request()->routeIs($link['route'])) style="background-color: #1e3a5f;" @endif>
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>

            {{-- Auth Section --}}
            <div class="hidden md:flex items-center">
                @auth
                    <!-- User Dropdown Menu -->
                    <div class="relative">
                        <button type="button"
                            class="flex items-center gap-2 text-sm font-medium text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md hover:bg-gray-100 transition-colors"
                            id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                            data-dropdown-placement="bottom">
                            <span class="sr-only">Open user menu</span>
                            <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-white"
                                style="background-color: #1e3a5f;">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>

                        <!-- Dropdown panel -->
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow-lg w-48"
                            id="user-dropdown">
                            <div class="px-4 py-3">
                                <span class="block text-sm text-gray-900 font-medium">{{ Auth::user()->name }}</span>
                                <span class="block text-sm text-gray-500 truncate">{{ Auth::user()->email }}</span>
                            </div>
                            <ul class="py-1" aria-labelledby="user-menu-button">
                                @if (Auth::user()->role === 'admin')
                                    <li>
                                        <a href="{{ route('dashboard') }}"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 font-semibold"
                                            style="color: #c9a84c;">Dashboard Admin</a>
                                    </li>
                                @endif
                                <li>
                                    <a href="{{ route('profile.edit') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil Saya</a>
                                </li>
                                <li>
                                    <a href="{{ route('orders.index') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 border-b border-gray-100">Riwayat
                                        Transaksi</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                                        @csrf
                                        <button type="submit"
                                            class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn-primary text-sm py-2 px-6">
                        Login
                    </a>
                @endauth
            </div>

            {{-- Mobile Burger --}}
            <button id="mobile-menu-btn" type="button"
                class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 transition-colors"
                aria-label="Toggle menu">
                <svg id="icon-open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg id="icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="hidden md:hidden border-t border-gray-200 bg-white shadow-lg">
        <div class="px-4 py-3 space-y-1">
            @foreach ($navLinks as $link)
                <a href="{{ route($link['route']) }}"
                    class="block px-4 py-2.5 rounded-lg text-sm font-medium transition-colors
                    {{ request()->routeIs($link['route']) ? 'text-white' : 'text-gray-700 hover:bg-gray-100' }}"
                    @if (request()->routeIs($link['route'])) style="background-color: #1e3a5f;" @endif>
                    {{ $link['label'] }}
                </a>
            @endforeach
            @auth
                <div class="py-2 border-t border-gray-200 mt-2">
                    <div class="px-4 py-2">
                        <span class="block text-sm font-medium text-gray-900">{{ Auth::user()->name }}</span>
                        <span class="block text-xs text-gray-500">{{ Auth::user()->email }}</span>
                    </div>
                    @if (Auth::user()->role === 'admin')
                        <a href="{{ route('dashboard') }}"
                            class="block px-4 py-2.5 text-sm font-semibold hover:bg-gray-100"
                            style="color: #c9a84c;">Dashboard Admin</a>
                    @endif
                    <a href="{{ route('profile.edit') }}"
                        class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-100">Profil Saya</a>
                    <a href="{{ route('orders.index') }}"
                        class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-100 border-b border-gray-200 shadow-sm">Riwayat
                        Transaksi</a>
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit"
                            class="block w-full text-left px-4 py-2.5 text-sm text-red-600 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            @else
                <div class="pt-2 pb-1">
                    <a href="{{ route('login') }}" class="btn-primary w-full justify-center text-sm">
                        Login
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav>

<script>
    const menuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const iconOpen = document.getElementById('icon-open');
    const iconClose = document.getElementById('icon-close');

    menuBtn.addEventListener('click', () => {
        const isOpen = !mobileMenu.classList.contains('hidden');
        mobileMenu.classList.toggle('hidden', isOpen);
        iconOpen.classList.toggle('hidden', !isOpen);
        iconClose.classList.toggle('hidden', isOpen);
    });
</script>
