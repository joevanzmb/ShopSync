<x-layout.app>
    <!-- Header -->
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-tosca-500">Produk Saya</h1>
        </div>
        <div class="flex items-center gap-3">
            <button class="flex items-center bg-orange-50 border border-orange-200 text-orange-600 px-4 py-2.5 rounded-xl text-sm font-bold shadow-sm hover:bg-orange-100 transition-colors" title="Naikkan otomatis 5 produk di Shopee (4 jam sekali)">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                Auto Naikkan (Shopee)
            </button>
            <button class="flex items-center bg-tosca-500 hover:bg-tosca-600 text-white px-5 py-2.5 rounded-xl text-sm font-extrabold shadow-[0_6px_18px_-4px_rgba(20,184,166,0.4)] hover:-translate-y-0.5 transition-all duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
                Tambah Produk
            </button>
        </div>
    </div>

    <!-- Stats Bar -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Total SKU</p>
            <p class="text-2xl font-extrabold text-slate-900">{{ $stats['total_sku'] }}</p>
            <p class="text-xs font-semibold text-tosca-600 mt-1">Status saat ini</p>
        </div>
        <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Stok Menipis</p>
            <p class="text-2xl font-extrabold text-amber-600">{{ $stats['low_stock'] }}</p>
            <p class="text-xs font-semibold text-amber-500 mt-1">Stok &lt; 10 unit</p>
        </div>
        <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Stok Habis</p>
            <p class="text-2xl font-extrabold text-red-600">{{ $stats['out_of_stock'] }}</p>
            <p class="text-xs font-semibold text-red-500 mt-1">Perlu restock segera</p>
        </div>
        <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Belum Sinkron</p>
            <p class="text-2xl font-extrabold text-slate-900">{{ $stats['unsynced'] }}</p>
            <p class="text-xs font-semibold text-slate-500 mt-1">Perlu perhatian</p>
        </div>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
        <!-- Toolbar -->
        <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <button class="px-4 py-2 rounded-xl text-sm font-bold bg-slate-900 text-white">Semua Produk</button>
                <button class="px-4 py-2 rounded-xl text-sm font-bold bg-slate-50 text-slate-600 hover:bg-slate-100 transition-colors">Aktif</button>
                <button class="px-4 py-2 rounded-xl text-sm font-bold bg-slate-50 text-slate-600 hover:bg-slate-100 transition-colors flex items-center gap-1.5">
                    Stok Menipis @if($stats['low_stock'] > 0)<span class="bg-amber-100 text-amber-700 text-[10px] font-extrabold px-1.5 py-0.5 rounded">{{ $stats['low_stock'] }}</span>@endif
                </button>
                <button class="px-4 py-2 rounded-xl text-sm font-bold bg-slate-50 text-red-600 hover:bg-red-50 transition-colors flex items-center gap-1.5">
                    Habis @if($stats['out_of_stock'] > 0)<span class="bg-red-100 text-red-600 text-[10px] font-extrabold px-1.5 py-0.5 rounded">{{ $stats['out_of_stock'] }}</span>@endif
                </button>
            </div>
            <div class="flex items-center gap-3">
                <select class="border border-slate-200 bg-slate-50 rounded-xl text-sm font-medium text-slate-700 py-2.5 px-3 outline-none focus:ring-2 focus:ring-tosca-500/20 focus:border-tosca-500">
                    <option>Semua Marketplace</option>
                    <option>Shopee</option>
                    <option>Tokopedia</option>
                    <option>TikTok Shop</option>
                </select>
                <div class="relative">
                    <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none"><svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></div>
                    <input type="text" placeholder="Cari nama produk, SKU..." class="pl-10 pr-4 py-2.5 border border-slate-200 rounded-xl text-sm bg-slate-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-tosca-500/20 focus:border-tosca-500 w-64 transition-colors">
                </div>
            </div>
        </div>

        <!-- Product Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th class="py-4 px-6 w-12"><input type="checkbox" class="w-4 h-4 rounded text-tosca-500 border-slate-300 focus:ring-tosca-500 cursor-pointer"></th>
                        <th class="py-4 px-3 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Produk & Varian</th>
                        <th class="py-4 px-3 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="py-4 px-3 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Stok Total</th>
                        <th class="py-4 px-6 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($products as $product)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="py-4 px-6"><input type="checkbox" class="w-4 h-4 rounded text-tosca-500 border-slate-300 cursor-pointer"></td>
                        <td class="py-4 px-3 max-w-[250px]">
                            <div class="flex items-center gap-3">
                                <img src="{{ $product->image_url ?? 'https://via.placeholder.com/100' }}" alt="Product" class="w-10 h-10 rounded-lg object-cover border border-slate-200 flex-shrink-0">
                                <div class="truncate">
                                    <p class="font-bold text-slate-900 truncate">{{ $product->name }}</p>
                                    <p class="text-xs text-slate-500 mt-0.5">{{ $product->variants->count() }} Varian</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-3">
                            @if($product->status)
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-emerald-100 text-emerald-700">Aktif</span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-slate-100 text-slate-700">Nonaktif</span>
                            @endif
                        </td>
                        <td class="py-4 px-3">
                            <div class="flex items-center gap-1">
                                <span class="text-sm font-extrabold text-slate-900">{{ $product->variants->sum('stock') }}</span>
                                <span class="text-xs text-slate-500">unit</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <button class="px-3 py-1.5 rounded-lg text-xs font-bold border border-slate-200 hover:bg-slate-50 transition-colors text-slate-700">Edit</button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-16 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                </div>
                                <h3 class="text-lg font-extrabold text-slate-900 mb-1">Belum Ada Produk</h3>
                                <p class="text-sm text-slate-500 max-w-sm mx-auto mb-6">Database Anda masih kosong. Silakan tambahkan produk secara manual atau lakukan sinkronisasi dari Shopee untuk menarik produk Anda.</p>
                                <button class="bg-tosca-500 hover:bg-tosca-600 text-white px-5 py-2.5 rounded-xl text-sm font-extrabold shadow-sm transition-all flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                    Tarik Data dari Shopee
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="p-6 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <span class="text-sm text-slate-500 font-medium">Menampilkan <span class="font-extrabold text-slate-900">{{ count($products) }}</span> dari total <span class="font-extrabold text-slate-900">{{ $stats['total_sku'] }}</span> produk</span>
            <div class="flex items-center gap-1">
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 bg-tosca-500 text-white font-extrabold text-sm shadow-sm">1</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 font-bold text-sm">2</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 font-bold text-sm">3</button>
                <span class="text-slate-400 px-1">...</span>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></button>
            </div>
        </div>
    </div>
</x-layout.app>
