<nav class="fixed top-0 z-50 w-full" style="background-color: #1e3a5f;">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="top-bar-sidebar" data-drawer-toggle="top-bar-sidebar"
                    aria-controls="top-bar-sidebar" type="button"
                    class="sm:hidden text-white bg-transparent box-border hover:bg-opacity-20 hover:bg-white focus:ring-4 focus:ring-white/50 font-medium leading-5 rounded-md text-sm p-2 focus:outline-none transition-colors">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="M5 7h14M5 12h14M5 17h10" />
                    </svg>
                </button>
                <a href="{{ route('dashboard') }}" class="flex ms-2 md:me-24 items-center gap-2">
                    <div class="w-8 h-8 rounded shrink-0 flex items-center justify-center bg-white shadow-sm">
                        <span class="font-bold text-lg leading-none" style="color: #1e3a5f;">S</span>
                    </div>
                    <span class="self-center text-xl font-bold whitespace-nowrap text-white">Sapta<span
                            style="color: #c9a84c;">karya</span></span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    <div>
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 items-center justify-center w-8 h-8 font-bold text-white transition-opacity hover:opacity-90"
                            style="background-color: #c9a84c;" aria-expanded="false"
                            data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <span>{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                        </button>
                    </div>
                    <div class="z-50 hidden bg-white border border-gray-100 rounded-md shadow-lg w-48"
                        id="dropdown-user">
                        <div class="px-4 py-3 border-b border-gray-100" role="none">
                            <p class="text-sm font-medium text-gray-900" role="none">
                                {{ Auth::user()->name }}
                            </p>
                            <p class="text-sm text-gray-500 truncate" role="none">
                                {{ Auth::user()->email }}
                            </p>
                        </div>
                        <ul class="py-1 text-sm text-gray-700" role="none">
                            <li>
                                <a href="{{ route('dashboard') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 transition-colors"
                                    role="menuitem">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{ route('profile.edit') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 transition-colors" role="menuitem">Profil
                                    Saya</a>
                            </li>
                            <li class="border-t border-gray-100 mt-1 pt-1">
                                <form method="POST" action="{{ route('logout') }}" class="w-full">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full text-left px-4 py-2 hover:bg-gray-100 text-red-600 transition-colors"
                                        role="menuitem">Sign out</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
