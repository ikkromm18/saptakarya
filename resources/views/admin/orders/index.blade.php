@extends('layouts.admin')

@section('admin-content')
    <div class="max-w-7xl mx-auto">
        <!-- Header & Search -->
        <div class="flex flex-col md:flex-row items-center justify-between mb-6 gap-4">
            <h1 class="text-2xl font-bold text-gray-900">Kelola Pesanan</h1>

            <div class="flex flex-col md:flex-row items-center gap-4 w-full md:w-auto">
                <form action="{{ route('admin.orders.index') }}" method="GET"
                    class="flex flex-col md:flex-row items-center gap-2 w-full">
                    <div class="relative w-full md:w-64">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" name="search" value="{{ request('search') }}"
                            class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Cari kode, nama user...">
                    </div>

                    <select name="status" onchange="this.form.submit()"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="awaiting_payment" {{ request('status') == 'awaiting_payment' ? 'selected' : '' }}>
                            Menunggu Pembayaran</option>
                        <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>Diproses
                        </option>
                        <option value="shipping" {{ request('status') == 'shipping' ? 'selected' : '' }}>Dikirim</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Selesai</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Dibatalkan
                        </option>
                    </select>

                    <button type="submit"
                        class="text-white bg-[#1e3a5f] hover:bg-[#152842] focus:ring-4 focus:outline-none focus:ring-[#1e3a5f]/50 font-medium rounded-lg text-sm px-4 py-2 w-full md:w-auto">Search</button>

                    @if (request('search') || request('status'))
                        <a href="{{ route('admin.orders.index') }}"
                            class="text-gray-500 hover:text-gray-700 text-sm underline">Reset</a>
                    @endif
                </form>
            </div>
        </div>

        @if (session('success'))
            <div id="alert-success" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="ms-3 text-sm font-medium">
                    {{ session('success') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8"
                    data-dismiss-target="#alert-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif

        <!-- Table -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-xl mb-6 border border-gray-100">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-4">Status</th>
                        <th scope="col" class="px-6 py-4">Kode Pesanan</th>
                        <th scope="col" class="px-6 py-4">User</th>
                        <th scope="col" class="px-6 py-4">Produk</th>
                        <th scope="col" class="px-6 py-4">Total</th>
                        <th scope="col" class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($orders as $order)
                        <tr class="bg-white hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <span
                                    class="px-2.5 py-1 text-[10px] font-bold uppercase rounded-full {{ $order->status_badge }}">
                                    {{ $order->status_label }}
                                </span>
                            </td>
                            <td class="px-6 py-4 font-bold text-gray-900">
                                {{ $order->kode_pesanan }}
                                <span
                                    class="block text-[10px] text-gray-400 font-normal mt-0.5">{{ $order->created_at->format('d M Y, H:i') }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-gray-900">{{ $order->user->name }}</div>
                                <div class="text-xs text-gray-500">{{ $order->user->email }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-gray-900">{{ $order->produk->nama }}</div>
                                <div class="text-xs text-gray-500">{{ $order->jumlah }} pcs
                                    {{ $order->ukuran ? '• ' . $order->ukuran : '' }}</div>
                            </td>
                            <td class="px-6 py-4 font-bold text-gray-900">
                                Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.orders.show', $order) }}"
                                    class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 text-gray-200 mb-4" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                    </svg>
                                    @if (request('search') || request('status'))
                                        <p class="font-medium">Pesanan tidak ditemukan.</p>
                                        <p class="text-xs mt-1">Coba sesuaikan pencarian atau filter Anda.</p>
                                    @else
                                        <p class="font-medium">Belum ada data pesanan.</p>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center sm:justify-end">
            {{ $orders->links() }}
        </div>
    </div>
@endsection
