<x-layout.app>
    <!-- Greeting Card -->
    <div class="mb-8 bg-tosca-500 text-white relative overflow-hidden rounded-3xl p-6 sm:p-8 shadow-[0_10px_30px_-5px_rgba(20,184,166,0.15)] border-0 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
        <!-- Abstract premium circular shapes in background -->
        <!-- Elegant solid yellow oval in the top right corner (leaves bottom-right tosca, matches Joevanz exactly) -->
        <div class="absolute -right-16 -top-28 w-[320px] h-[200px] rounded-full bg-yellow-200 pointer-events-none z-0"></div>
        <div class="absolute right-1/3 bottom-0 w-96 h-96 bg-white/5 rounded-full -mb-40 blur-3xl pointer-events-none z-0"></div>
        <div class="absolute left-10 -bottom-10 w-44 h-44 bg-white/5 rounded-full blur-xl pointer-events-none z-0"></div>
        
        <div class="flex items-center gap-4 relative z-10 flex-1">
            <svg class="w-16 h-16 sm:w-[76px] sm:h-[76px] text-yellow-200 hidden sm:block flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
            </svg>
            <div>
                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Halo, <span class="text-yellow-200">{{ Auth::user()->first_name ?? Auth::user()->name ?? 'Pengguna' }}</span></h1>
                <p class="text-white/80 text-base sm:text-lg font-medium mt-2">Berikut adalah ringkasan performa toko Anda hari ini.</p>
            </div>
        </div>
        <div class="flex items-center gap-3 w-full sm:w-auto justify-end relative z-10">
            <button class="bg-white hover:bg-slate-50 text-tosca-600 px-7 py-3 rounded-xl text-sm font-extrabold shadow-[0_8px_20px_-6px_rgba(0,0,0,0.12)] hover:shadow-[0_12px_24px_-8px_rgba(0,0,0,0.18)] hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center cursor-pointer w-full sm:w-auto border border-tosca-600">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                Unduh Laporan
            </button>
        </div>
    </div>

    <!-- KPI Cards - Spaced out -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Penjualan -->
        <div class="bg-gradient-to-br from-white to-slate-50 text-slate-900 rounded-3xl p-6 shadow-sm border-4 border-blue-500 hover:shadow-md transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <p class="text-sm font-semibold text-slate-500">Total Penjualan</p>
                <div class="p-2.5 rounded-xl bg-blue-50 text-blue-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            <h3 class="text-3xl font-extrabold text-slate-900 mb-2">{{ $kpis['monthly_sales'] }}</h3>
            <div class="flex items-center text-sm font-semibold text-blue-600 bg-blue-50 px-2.5 py-1 rounded-lg w-max">
                <svg class="w-4 h-4 mr-1 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                +12.5% vs bulan lalu
            </div>
        </div>

        <!-- Total Pesanan -->
        <div class="bg-gradient-to-br from-white to-slate-50 text-slate-900 rounded-3xl p-6 shadow-sm border-4 border-emerald-500 hover:shadow-md transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <p class="text-sm font-semibold text-slate-500">Total Pesanan</p>
                <div class="p-2.5 rounded-xl bg-emerald-50 text-emerald-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                </div>
            </div>
            <h3 class="text-3xl font-extrabold text-slate-900 mb-2">{{ $kpis['total_orders'] }}</h3>
            <div class="flex items-center text-sm font-semibold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-lg w-max">
                <svg class="w-4 h-4 mr-1 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                +8.2% vs bulan lalu
            </div>
        </div>

        <!-- Konversi -->
        <div class="bg-gradient-to-br from-white to-slate-50 text-slate-900 rounded-3xl p-6 shadow-sm border-4 border-amber-400 hover:shadow-md transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <p class="text-sm font-semibold text-slate-500">Konversi (Avg)</p>
                <div class="p-2.5 rounded-xl bg-amber-50 text-amber-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </div>
            </div>
            <h3 class="text-3xl font-extrabold text-slate-900 mb-2">{{ $kpis['conversion_rate'] }}</h3>
            <div class="flex items-center text-sm font-semibold text-amber-600 bg-amber-50 px-2.5 py-1 rounded-lg w-max">
                <svg class="w-4 h-4 mr-1 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path></svg>
                -1.1% vs bulan lalu
            </div>
        </div>

        <!-- Perlu Dikirim (Urgent) -->
        <div class="bg-gradient-to-br from-white to-slate-50 text-slate-900 rounded-3xl p-6 shadow-sm border-4 border-red-500 hover:shadow-md transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <p class="text-sm font-semibold text-slate-500">Perlu Dikirim</p>
                <div class="p-2.5 rounded-xl bg-red-50 text-red-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            <h3 class="text-3xl font-extrabold text-slate-900 mb-2">{{ $kpis['urgent_orders'] }} <span class="text-lg font-medium text-slate-500">Pesanan</span></h3>
            <div class="text-sm font-semibold text-red-600">Segera proses hari ini</div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
        
        <!-- Left Area: Chart and Table -->
        <div class="xl:col-span-2 space-y-8">
            
            <!-- Performa Toko Keseluruhan (Live) -->
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 via-tosca-500 to-emerald-500"></div>
                <div class="flex justify-between items-center mb-6">
                    <div class="flex items-center">
                        <div class="w-3 h-3 rounded-full bg-red-500 animate-pulse mr-3"></div>
                        <h2 class="text-xl font-bold text-slate-900">Performa Toko (Live Hari Ini)</h2>
                    </div>
                    <select class="bg-slate-50 border border-slate-200 text-slate-700 text-sm font-medium rounded-xl focus:ring-tosca-500 focus:border-tosca-500 block p-2.5 outline-none cursor-pointer">
                        <option>Semua Toko</option>
                        <option>Shopee (ShopSync Official)</option>
                        <option>Tokopedia (ShopSync Jkt)</option>
                        <option>TikTok Shop (ShopSync.id)</option>
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Live Sales -->
                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100">
                        <p class="text-sm font-semibold text-slate-500 mb-1">Total Penjualan</p>
                        <h3 class="text-2xl font-extrabold text-slate-900">{{ $livePerformance['sales'] }}</h3>
                    </div>
                    <!-- Live Orders -->
                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100">
                        <p class="text-sm font-semibold text-slate-500 mb-1">Total Pesanan</p>
                        <h3 class="text-2xl font-extrabold text-slate-900">{{ $livePerformance['orders'] }}</h3>
                    </div>
                    <!-- Live Visitors -->
                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100">
                        <p class="text-sm font-semibold text-slate-500 mb-1">Total Pengunjung</p>
                        <h3 class="text-2xl font-extrabold text-slate-900">{{ $livePerformance['visitors'] }}</h3>
                    </div>
                </div>
                
                <div class="w-full h-[200px]">
                    <canvas id="liveOrdersChart"></canvas>
                </div>
            </div>

            <!-- Real Chart Visualization -->
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">Statistik Penjualan</h2>
                        <p class="text-sm text-slate-500 mt-1">Performa 7 Hari Terakhir</p>
                    </div>
                    <select class="bg-slate-50 border border-slate-200 text-slate-700 text-sm font-medium rounded-xl focus:ring-blue-500 focus:border-blue-500 block p-2.5 outline-none cursor-pointer">
                        <option>7 Hari Terakhir</option>
                        <option>30 Hari Terakhir</option>
                        <option>Bulan Ini</option>
                    </select>
                </div>
                
                <div class="w-full h-[300px]">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>

            <!-- Recent Orders Table -->
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">Pesanan Masuk Terbaru</h2>
                        <p class="text-sm text-slate-500 mt-1">Status dan detail pesanan terkini.</p>
                    </div>
                    <a href="{{ route('orders.index') }}" class="text-sm font-bold text-tosca-600 hover:text-tosca-700 transition-colors bg-tosca-50 px-4 py-2 rounded-xl">Lihat Semua</a>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b-2 border-slate-100 text-slate-400 text-sm tracking-wide">
                                <th class="pb-4 font-semibold px-2 uppercase text-xs">ID Pesanan</th>
                                <th class="pb-4 font-semibold px-2 uppercase text-xs">Platform</th>
                                <th class="pb-4 font-semibold px-2 uppercase text-xs">Pelanggan</th>
                                <th class="pb-4 font-semibold px-2 uppercase text-xs">Total</th>
                                <th class="pb-4 font-semibold px-2 uppercase text-xs">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @forelse($recentOrders as $order)
                                <tr class="border-b border-slate-50 hover:bg-slate-50/80 transition-colors group">
                                    <td class="py-4 px-2 font-bold text-slate-900">{{ $order['id'] }}</td>
                                    <td class="py-4 px-2">
                                        <div class="flex items-center">
                                            @if($order['platform'] == 'Shopee')
                                                <img src="{{ asset('logo/kotakshopee.png') }}" alt="Shopee" class="w-6 h-6 object-contain mr-2">
                                            @elseif($order['platform'] == 'Tokopedia')
                                                <img src="{{ asset('logo/kotaktokped.png') }}" alt="Tokopedia" class="w-6 h-6 object-contain mr-2">
                                            @elseif($order['platform'] == 'TikTok Shop')
                                                <img src="{{ asset('logo/kotaktiktokshop.png') }}" alt="TikTok Shop" class="w-6 h-6 object-contain mr-2">
                                            @else
                                                <div class="w-6 h-6 rounded bg-blue-600 text-white flex items-center justify-center text-[10px] font-bold mr-2">{{ substr($order['platform'], 0, 1) }}</div>
                                            @endif
                                            <span class="font-medium text-slate-700">{{ $order['platform'] }}</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-2 text-slate-700 font-medium">{{ $order['customer'] }}</td>
                                    <td class="py-4 px-2 font-bold text-slate-900">{{ $order['amount'] }}</td>
                                    <td class="py-4 px-2">
                                        <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-bold
                                            @if($order['status'] == 'Perlu Dikirim') bg-orange-100 text-orange-700 border border-orange-200
                                            @elseif($order['status'] == 'Dikirim' || $order['status'] == 'Selesai') bg-emerald-100 text-emerald-700 border border-emerald-200
                                            @else bg-red-100 text-red-700 border border-red-200 @endif
                                        ">
                                            {{ $order['status'] }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-12 text-center text-slate-500 font-medium">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-12 h-12 text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                            <p>Belum ada pesanan masuk.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- Right Area: Status and Products -->
        <div class="space-y-8">
            
            <!-- Tasks / To-Do -->
            <div class="bg-[#fffcfc] rounded-3xl p-8 shadow-sm border-2 border-red-200 shadow-[0_10px_30px_-10px_rgba(239,68,68,0.08)]">
                <h2 class="text-xl font-bold text-slate-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    Perhatian Segera
                </h2>
                <div class="space-y-4">
                    @forelse($tasks as $task)
                        <div class="p-4 rounded-2xl border {{ $task['type'] == 'error' ? 'bg-red-50/50 border-red-100' : ($task['type'] == 'urgent' ? 'bg-orange-50/50 border-orange-100' : 'bg-amber-50/50 border-amber-100') }} flex items-start">
                            <div class="mt-0.5 mr-3">
                                @if($task['type'] == 'error')
                                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                @elseif($task['type'] == 'urgent')
                                    <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                @else
                                    <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                @endif
                            </div>
                            <p class="text-sm font-semibold {{ $task['type'] == 'error' ? 'text-red-800' : ($task['type'] == 'urgent' ? 'text-orange-800' : 'text-amber-800') }}">{{ $task['title'] }}</p>
                        </div>
                    @empty
                        <div class="text-center py-6 text-slate-500 font-medium text-sm">
                            Tidak ada pemberitahuan mendesak.
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Platform Connections -->
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-slate-900">Status Toko</h2>
                    <a href="{{ route('stores.index') }}" class="text-sm font-bold text-tosca-600 hover:text-tosca-700 transition-colors">Kelola</a>
                </div>
                <div class="space-y-5">
                    @forelse($platforms as $platform)
                        <div class="flex items-center justify-between group">
                            <div class="flex items-center">
                                @if($platform['name'] == 'Shopee')
                                    <img src="{{ asset('logo/kotakshopee.png') }}" alt="Shopee" class="w-12 h-12 object-contain rounded-xl shadow-sm">
                                @elseif($platform['name'] == 'Tokopedia')
                                    <img src="{{ asset('logo/kotaktokped.png') }}" alt="Tokopedia" class="w-12 h-12 object-contain rounded-xl shadow-sm">
                                @elseif($platform['name'] == 'TikTok Shop')
                                    <img src="{{ asset('logo/kotaktiktokshop.png') }}" alt="TikTok Shop" class="w-12 h-12 object-contain rounded-xl shadow-sm">
                                @else
                                    <div class="w-12 h-12 rounded-xl flex items-center justify-center font-bold text-sm text-white shadow-sm bg-[#0f146d]">
                                        {{ substr($platform['name'], 0, 1) }}
                                    </div>
                                @endif
                                <div class="ml-4">
                                    <p class="text-sm font-bold text-slate-900">{{ $platform['store_name'] }}</p>
                                    <p class="text-xs font-medium text-slate-500">{{ $platform['name'] }}</p>
                                </div>
                            </div>
                            <div class="text-right flex flex-col items-end">
                                @if($platform['status'] == 'connected')
                                    <span class="inline-flex items-center text-xs font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full mb-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5 animate-pulse"></span> Aktif
                                    </span>
                                @elseif($platform['status'] == 'warning')
                                    <span class="inline-flex items-center text-xs font-bold text-amber-600 bg-amber-50 px-2.5 py-1 rounded-full mb-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-1.5"></span> Delay
                                    </span>
                                @else
                                    <span class="inline-flex items-center text-xs font-bold text-red-600 bg-red-50 px-2.5 py-1 rounded-full mb-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-500 mr-1.5"></span> Terputus
                                    </span>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-6">
                            <div class="w-12 h-12 mx-auto rounded-full bg-slate-50 flex items-center justify-center mb-3">
                                <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                            </div>
                            <p class="text-sm font-medium text-slate-500 mb-2">Belum ada toko yang terhubung</p>
                            <a href="{{ route('stores.index') }}" class="text-xs font-bold text-tosca-600 hover:text-tosca-700">Hubungkan Toko Sekarang</a>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Top Products -->
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-slate-900">Produk Terlaris Tahun Ini</h2>
                </div>
                <div class="space-y-5">
                    @forelse($topProducts as $index => $product)
                        <div class="flex items-center relative group">
                            <div class="absolute -left-2 -top-2 w-7 h-7 rounded-full bg-slate-900 text-white text-xs font-bold flex items-center justify-center border-2 border-white z-10 shadow-sm">
                                {{ $index + 1 }}
                            </div>
                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-16 h-16 rounded-2xl object-cover shadow-sm group-hover:scale-105 transition-transform">
                            <div class="ml-4 flex-1 min-w-0">
                                <p class="text-sm font-bold text-slate-900 truncate">{{ $product['name'] }}</p>
                                <div class="flex items-center mt-1">
                                    <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded mr-2">{{ $product['sold'] }} terjual</span>
                                    <span class="text-xs font-bold text-slate-900">{{ $product['revenue'] }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-6 text-slate-500 font-medium text-sm">
                            Belum ada data penjualan produk.
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

    <!-- Chart.js Initialization -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('salesChart').getContext('2d');
            
            // Gradient fill
            let gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(20, 184, 166, 0.5)'); // Tosca
            gradient.addColorStop(1, 'rgba(20, 184, 166, 0)');

            const data = {
                labels: {!! json_encode($chartData['labels']) !!},
                datasets: [{
                    label: 'Pendapatan (Rp)',
                    data: {!! json_encode($chartData['sales']) !!},
                    borderColor: '#14b8a6', // Tosca 500
                    backgroundColor: gradient,
                    borderWidth: 3,
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#14b8a6',
                    pointBorderWidth: 3,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    fill: true,
                    tension: 0.4
                }]
            };

            const config = {
                type: 'line',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#0f172a',
                            titleFont: { size: 13, family: "'Plus Jakarta Sans', sans-serif" },
                            bodyFont: { size: 14, weight: 'bold', family: "'Plus Jakarta Sans', sans-serif" },
                            padding: 12,
                            displayColors: false,
                            callbacks: {
                                label: function(context) {
                                    let value = context.parsed.y;
                                    return 'Rp ' + value.toLocaleString('id-ID');
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: '#f1f5f9',
                                drawBorder: false,
                            },
                            ticks: {
                                font: { family: "'Plus Jakarta Sans', sans-serif" },
                                color: '#64748b',
                                callback: function(value) {
                                    if(value === 0) return '0';
                                    return (value / 1000000) + 'jt';
                                }
                            }
                        },
                        x: {
                            grid: { display: false, drawBorder: false },
                            ticks: {
                                font: { family: "'Plus Jakarta Sans', sans-serif" },
                                color: '#64748b'
                            }
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                }
            };

            new Chart(ctx, config);

            // Live Orders Chart
            const liveCtx = document.getElementById('liveOrdersChart').getContext('2d');
            const liveData = {
                labels: {!! json_encode($livePerformance['chart_data']['labels']) !!},
                datasets: [{
                    label: 'Pesanan Masuk',
                    data: {!! json_encode($livePerformance['chart_data']['data']) !!},
                    backgroundColor: '#14b8a6',
                    borderRadius: 6,
                    barThickness: 20
                }]
            };

            new Chart(liveCtx, {
                type: 'bar',
                data: liveData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: '#f1f5f9',
                                drawBorder: false,
                            },
                            ticks: {
                                font: { family: "'Plus Jakarta Sans', sans-serif" },
                                color: '#64748b'
                            }
                        },
                        x: {
                            grid: { display: false, drawBorder: false },
                            ticks: {
                                font: { family: "'Plus Jakarta Sans', sans-serif" },
                                color: '#64748b'
                            }
                        }
                    }
                }
            });
        });
    </script>
</x-layout.app>
