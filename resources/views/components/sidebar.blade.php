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
             </li>

             <!-- Spacer before back to site link -->
             <li class="pt-4 mt-4 border-t border-gray-200">
                 <a href="{{ route('beranda') }}" class="flex items-center px-3 py-2 rounded-lg group transition-colors"
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
