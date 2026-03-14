 <aside id="top-bar-sidebar"
     class="fixed top-0 left-0 z-40 w-64 h-full pt-16 transition-transform -translate-x-full sm:translate-x-0"
     aria-label="Sidebar">
     <div class="h-full px-3 py-4 overflow-y-auto bg-white border-r border-gray-200 shadow-sm">
         <ul class="space-y-2 font-medium">
             <li>
                 <a href="{{ route('dashboard') }}"
                     class="flex items-center px-3 py-2 text-gray-900 rounded-lg hover:bg-gray-100 group transition-colors {{ request()->routeIs('dashboard') ? 'bg-gray-100 shadow-sm' : '' }}">
                     <svg class="w-5 h-5 transition duration-75 text-gray-500 group-hover:text-gray-900 {{ request()->routeIs('dashboard') ? 'text-gray-900' : '' }}"
                         aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         fill="none" viewBox="0 0 24 24">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M10 6.025A7.5 7.5 0 1 0 17.975 14H10V6.025Z" />
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M13.5 3c-.169 0-.334.014-.5.025V11h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 13.5 3Z" />
                     </svg>
                     <span class="ms-3">Dashboard</span>
                 </a>
             <li>
                 <a href="{{ route('admin.orders.index') }}"
                     class="flex items-center px-3 py-2 text-gray-900 rounded-lg hover:bg-gray-100 group transition-colors {{ request()->routeIs('admin.orders.*') ? 'bg-gray-100 shadow-sm' : '' }}">
                     <svg class="w-5 h-5 transition duration-75 text-gray-500 group-hover:text-gray-900 {{ request()->routeIs('admin.orders.*') ? 'text-gray-900' : '' }}"
                         aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         fill="none" viewBox="0 0 24 24">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 7.336a2 2 0 0 1-1.987 2.247H6.07a2 2 0 0 1-1.987-2.247L5 8h14Z" />
                     </svg>
                     <span class="ms-3">Kelola Pesanan</span>
                 </a>
             </li>

             <li>
                 <a href="{{ route('admin.portfolios.index') }}"
                     class="flex items-center px-3 py-2 text-gray-900 rounded-lg hover:bg-gray-100 group transition-colors {{ request()->routeIs('admin.portfolios.*') ? 'bg-gray-100 shadow-sm' : '' }}">
                     <svg class="w-5 h-5 transition duration-75 text-gray-500 group-hover:text-gray-900 {{ request()->routeIs('admin.portfolios.*') ? 'text-gray-900' : '' }}"
                         aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         fill="none" viewBox="0 0 24 24">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                     </svg>
                     <span class="ms-3">Kelola Portofolio</span>
                 </a>
             </li>

             <li>
                 <a href="{{ route('admin.produks.index') }}"
                     class="flex items-center px-3 py-2 text-gray-900 rounded-lg hover:bg-gray-100 group transition-colors {{ request()->routeIs('admin.produks.*') ? 'bg-gray-100 shadow-sm' : '' }}">
                     <svg class="w-5 h-5 transition duration-75 text-gray-500 group-hover:text-gray-900 {{ request()->routeIs('admin.produks.*') ? 'text-gray-900' : '' }}"
                         aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         fill="none" viewBox="0 0 24 24">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                     </svg>
                     <span class="ms-3">Kelola Produk</span>
                 </a>
             </li>

             <li>
                 <a href="{{ route('admin.users.index') }}"
                     class="flex items-center px-3 py-2 text-gray-900 rounded-lg hover:bg-gray-100 group transition-colors {{ request()->routeIs('admin.users.*') ? 'bg-gray-100 shadow-sm' : '' }}">
                     <svg class="w-5 h-5 transition duration-75 text-gray-500 group-hover:text-gray-900 {{ request()->routeIs('admin.users.*') ? 'text-gray-900' : '' }}"
                         aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         fill="none" viewBox="0 0 24 24">
                         <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                             d="M4.37 7.657c2.063.528 2.396 2.806 3.202 3.87 1.07 1.413 2.075 1.228 3.192 2.644 1.805 2.289 1.312 5.705 1.312 6.705M20 15h-1a4 4 0 0 0-4 4v1M8.587 3.992c0 .822.112 1.886 1.515 2.58 1.402.693 2.998-.901 3.654 2.32 .522 2.572-1.255 5.707-1.538 6.66-.538 1.8-1.08 1.41-3.214 3.046-1.611 1.23-2.133 3.411-2.133 3.411" />
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M12 21a9 9 0 1 1 0-18 9 9 0 0 1 0 18Z" />
                     </svg>
                     <span class="ms-3">Kelola User</span>
                 </a>
             </li>

             <!-- Spacer before back to site link -->
             <li class="pt-4 mt-4 border-t border-gray-200">
                 <a href="{{ route('beranda') }}"
                     class="flex items-center px-3 py-2 rounded-lg group transition-colors"
                     style="color: #1e3a5f; background-color: #f3f4f6;">
                     <svg class="shrink-0 w-5 h-5 transition duration-75" style="color: #1e3a5f;" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                         viewBox="0 0 24 24">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="m15 19-7-7 7-7" />
                     </svg>
                     <span class="flex-1 ms-3 whitespace-nowrap font-semibold">Kembali ke Website</span>
                 </a>
             </li>
         </ul>
     </div>
 </aside>
