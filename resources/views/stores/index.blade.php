<x-layout.app>

    <!-- Connected Stores Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-4">
        <h2 class="text-base font-extrabold text-slate-700 uppercase tracking-wider">Channel Terhubung</h2>
        <a href="{{ route('stores.connect') }}" class="inline-flex items-center bg-tosca-500 hover:bg-tosca-600 text-white px-4 py-2.5 rounded-xl text-sm font-extrabold shadow-[0_6px_18px_-4px_rgba(20,184,166,0.4)] hover:-translate-y-0.5 transition-all duration-200">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
            Hubungkan Toko Baru
        </a>
    </div>

    @if(session('success'))
    <div class="mb-6 bg-emerald-50 border border-emerald-200 rounded-2xl p-4 flex items-start">
        <div class="flex-shrink-0 mt-0.5">
            <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div class="ml-3">
            <p class="text-sm font-bold text-emerald-800">{{ session('success') }}</p>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="mb-6 bg-red-50 border border-red-200 rounded-2xl p-4 flex items-start">
        <div class="flex-shrink-0 mt-0.5">
            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div class="ml-3">
            <p class="text-sm font-bold text-red-800">{{ session('error') }}</p>
        </div>
    </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5 mb-8">
        @forelse($connectedStores as $store)
        @php
            $platformData = match($store->platform) {
                'shopee' => ['color' => '#EE4D2D', 'logo' => 'kotakshopee.png', 'name' => 'Shopee'],
                'tokopedia' => ['color' => '#00AA5B', 'logo' => 'kotaktokped.png', 'name' => 'Tokopedia'],
                'tiktok' => ['color' => '#0f172a', 'logo' => 'kotaktiktokshop.png', 'name' => 'TikTok Shop'],
                default => ['color' => '#64748b', 'logo' => 'kotakshopee.png', 'name' => ucfirst($store->platform)],
            };
        @endphp
        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-md transition-all duration-200 hover:-translate-y-0.5">
            <div class="h-2" style="background-color: {{ $platformData['color'] }}"></div>
            <div class="p-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <img src="/logo/{{ $platformData['logo'] }}" class="w-12 h-12 object-contain select-none" alt="{{ $platformData['name'] }}">
                        <div>
                            <p class="font-extrabold text-slate-900">{{ $platformData['name'] }}</p>
                            <p class="text-xs font-medium text-slate-500">{{ $store->store_name }}</p>
                        </div>
                    </div>
                    @if($store->status === 'active')
                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-emerald-100 text-emerald-700 border border-emerald-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5 animate-pulse"></span> Aktif
                    </span>
                    @else
                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-amber-100 text-amber-700 border border-amber-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-1.5"></span> {{ ucfirst($store->status) }}
                    </span>
                    @endif
                </div>
                <div class="space-y-2.5 text-sm">
                    <div class="flex justify-between"><span class="text-slate-500 font-medium">Status API</span><span class="font-bold text-emerald-600">Terhubung</span></div>
                    <div class="flex justify-between"><span class="text-slate-500 font-medium">Token Kedaluwarsa</span><span class="font-bold text-slate-900">{{ $store->token_expires_at ? $store->token_expires_at->format('d M Y') : '-' }}</span></div>
                    <div class="flex justify-between"><span class="text-slate-500 font-medium">Sinkronisasi Terakhir</span><span class="font-bold text-slate-900">{{ $store->updated_at && $store->updated_at != $store->created_at ? $store->updated_at->diffForHumans() : '-' }}</span></div>
                    <div class="flex justify-between"><span class="text-slate-500 font-medium">Total Produk Sync</span><span class="font-bold text-slate-900">{{ \App\Models\ProductMarketplace::where('connected_store_id', $store->id)->count() }} SKU</span></div>
                </div>
                <div class="mt-5 flex gap-2">
                    <button class="flex-1 py-2 rounded-xl text-xs font-bold border border-slate-200 hover:bg-slate-50 text-slate-700 transition-colors">Pengaturan</button>
                    <form action="{{ route('stores.sync', $store->id) }}" method="POST" class="flex-1">
                        @csrf
                        <button type="submit" class="w-full py-2 rounded-xl text-xs font-bold bg-tosca-50 hover:bg-tosca-100 text-tosca-700 border border-tosca-100 transition-colors flex items-center justify-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                            Sync Sekarang
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full bg-slate-50 border-2 border-dashed border-slate-200 rounded-3xl p-12 text-center">
            <div class="flex justify-center mb-4">
                <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-sm border border-slate-100">
                    <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
            </div>
            <h3 class="text-lg font-extrabold text-slate-900 mb-1">Belum Ada Toko Terhubung</h3>
            <p class="text-sm text-slate-500 max-w-sm mx-auto mb-6">Hubungkan akun marketplace Anda (Shopee, Tokopedia, TikTok Shop) untuk mulai mensinkronkan produk dan pesanan secara otomatis.</p>
            <a href="{{ route('stores.connect') }}" class="inline-flex items-center bg-tosca-500 hover:bg-tosca-600 text-white px-6 py-3 rounded-xl text-sm font-extrabold shadow-sm transition-all">
                Hubungkan Sekarang
            </a>
        </div>
        @endforelse
    </div>

    <!-- Sync Settings -->
    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-6 border-b border-slate-100">
            <h2 class="text-lg font-extrabold text-slate-900">Pengaturan Sinkronisasi Otomatis</h2>
            <p class="text-sm text-slate-500 mt-1">Atur interval dan jenis data yang akan diperbarui secara otomatis dari setiap marketplace.</p>
        </div>
        <div class="divide-y divide-slate-100">
            <!-- Setting: Interval -->
            <div class="p-6 flex items-center justify-between flex-wrap gap-4">
                <div>
                    <p class="font-bold text-slate-900">Interval Sinkronisasi Pesanan</p>
                    <p class="text-sm text-slate-500 mt-0.5">Seberapa sering sistem mengambil pesanan baru dari marketplace.</p>
                </div>
                <select class="border border-slate-200 bg-slate-50 rounded-xl text-sm font-bold text-slate-700 py-2.5 px-4 outline-none focus:ring-2 focus:ring-tosca-500/20 focus:border-tosca-500 cursor-pointer">
                    <option>Setiap 5 menit</option>
                    <option>Setiap 10 menit</option>
                    <option>Setiap 15 menit</option>
                    <option>Setiap 30 menit</option>
                </select>
            </div>
            <!-- Setting: Stock Sync -->
            <div class="p-6 flex items-center justify-between flex-wrap gap-4">
                <div>
                    <p class="font-bold text-slate-900">Sinkronisasi Stok Real-time</p>
                    <p class="text-sm text-slate-500 mt-0.5">Otomatis memperbarui stok di semua marketplace saat ada pesanan masuk.</p>
                </div>
                <div x-data="{ enabled: true }">
                    <button @click="enabled = !enabled" :class="enabled ? 'bg-tosca-500' : 'bg-slate-200'" class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors duration-200 focus:outline-none">
                        <span :class="enabled ? 'translate-x-6' : 'translate-x-1'" class="inline-block h-4 w-4 transform rounded-full bg-white transition duration-200 shadow-sm"></span>
                    </button>
                </div>
            </div>
            <!-- Setting: Price Sync -->
            <div class="p-6 flex items-center justify-between flex-wrap gap-4">
                <div>
                    <p class="font-bold text-slate-900">Sinkronisasi Harga Otomatis</p>
                    <p class="text-sm text-slate-500 mt-0.5">Perbarui harga produk di semua channel secara bersamaan dari satu tempat.</p>
                </div>
                <div x-data="{ enabled: false }">
                    <button @click="enabled = !enabled" :class="enabled ? 'bg-tosca-500' : 'bg-slate-200'" class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors duration-200 focus:outline-none">
                        <span :class="enabled ? 'translate-x-6' : 'translate-x-1'" class="inline-block h-4 w-4 transform rounded-full bg-white transition duration-200 shadow-sm"></span>
                    </button>
                </div>
            </div>
            <!-- Setting: Auto-deactivate OOS -->
            <div class="p-6 flex items-center justify-between flex-wrap gap-4">
                <div>
                    <p class="font-bold text-slate-900">Nonaktifkan Listing Stok Habis</p>
                    <p class="text-sm text-slate-500 mt-0.5">Otomatis menonaktifkan produk di marketplace ketika stok mencapai 0.</p>
                </div>
                <div x-data="{ enabled: true }">
                    <button @click="enabled = !enabled" :class="enabled ? 'bg-tosca-500' : 'bg-slate-200'" class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors duration-200 focus:outline-none">
                        <span :class="enabled ? 'translate-x-6' : 'translate-x-1'" class="inline-block h-4 w-4 transform rounded-full bg-white transition duration-200 shadow-sm"></span>
                    </button>
                </div>
            </div>
        </div>
        <div class="p-6 bg-slate-50 flex justify-end">
            <button class="bg-tosca-500 hover:bg-tosca-600 text-white px-6 py-2.5 rounded-xl text-sm font-extrabold shadow-sm hover:-translate-y-0.5 transition-all duration-200">
                Simpan Pengaturan
            </button>
        </div>
    </div>
</x-layout.app>
