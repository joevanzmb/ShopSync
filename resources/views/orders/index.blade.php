<x-layout.app>
    <div x-data="{ 
        status: '{{ $currentStatus ?? 'all' }}',
        subFilter: 'arrange',
        selectedOrders: [],
        allSelected: false,
        toggleAll() {
            if (this.allSelected) {
                this.selectedOrders = [];
                this.allSelected = false;
            } else {
                // Collect all checkboxes that are rendered
                const checkboxes = document.querySelectorAll('input[type=checkbox][value]');
                this.selectedOrders = Array.from(checkboxes).map(cb => cb.value);
                this.allSelected = true;
            }
        },
        changeStatus(newStatus) {
            window.location.href = '?status=' + newStatus;
        }
    }" class="pb-12">

        <!-- Header Section as a beautiful single card with white inside and border-4 -->
        <div class="mb-8 bg-gradient-to-br from-white to-slate-50 text-slate-900 relative overflow-hidden rounded-3xl p-6 sm:p-8 shadow-sm border-4 border-tosca-500 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
            <!-- Abstract premium circular shapes in background -->
            <div class="absolute -right-16 -top-28 w-[320px] h-[200px] rounded-full bg-tosca-50 pointer-events-none z-0"></div>
            <div class="absolute right-1/3 bottom-0 w-96 h-96 bg-slate-100/50 rounded-full -mb-40 blur-3xl pointer-events-none z-0"></div>
            
            <div class="relative z-10 flex-1">
                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-slate-900" x-text="
                    status === 'all' ? 'Semua Pesanan' : 
                    (status === 'to_process' ? 'Perlu Diproses' : 
                    (status === 'to_ship' ? 'Perlu Dikirim' : 
                    (status === 'shipping' ? 'Sedang Dikirim' : 
                    (status === 'completed' ? 'Pesanan Selesai' : 'Retur & Komplain'))))
                "></h1>
                <p class="text-slate-500 text-sm sm:text-base font-medium mt-2" x-text="
                    status === 'all' ? 'Daftar lengkap seluruh pesanan dari semua marketplace.' : 
                    (status === 'to_process' ? 'Pesanan baru yang perlu segera diatur pengirimannya (belum atur pengiriman).' : 
                    (status === 'to_ship' ? 'Pesanan yang sudah diatur pengiriman & dicetak dokumennya, siap diserahkan ke kurir.' : 
                    (status === 'shipping' ? 'Pesanan yang sedang dalam proses pengiriman oleh pihak ekspedisi.' : 
                    (status === 'completed' ? 'Daftar pesanan yang telah sukses diterima oleh pelanggan.' : 'Pengajuan pengembalian barang atau dana dari pelanggan.'))))
                "></p>
            </div>
            
            <!-- Quick/Mass Action buttons in Header Card depending on status -->
            <div class="flex flex-wrap items-center gap-3 w-full sm:w-auto justify-end relative z-10">
                <template x-if="status === 'to_process'">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl text-sm font-extrabold shadow-[0_6px_20px_-4px_rgba(37,99,235,0.3)] hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center cursor-pointer w-full sm:w-auto border border-blue-700">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Atur & Cetak Pengiriman Massal
                    </button>
                </template>
                <template x-if="status === 'to_ship'">
                    <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl text-sm font-extrabold shadow-[0_6px_20px_-4px_rgba(79,70,229,0.3)] hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center cursor-pointer w-full sm:w-auto border border-indigo-700">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                        Cetak Pengiriman Massal
                    </button>
                </template>
                <template x-if="status !== 'to_process' && status !== 'to_ship'">
                    <button class="bg-tosca-500 hover:bg-tosca-600 text-white px-6 py-3 rounded-xl text-sm font-extrabold shadow-[0_6px_20px_-4px_rgba(20,184,166,0.3)] hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center cursor-pointer w-full sm:w-auto border border-tosca-600">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                        Ekspor Laporan Pesanan
                    </button>
                </template>
            </div>
        </div>

        <!-- Quick Stats / Tab Cards (All have thin borders, clickable, active gets accent indicator line) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8 w-full">
            <!-- Total Pesanan (Emerald) -->
            <div @click="changeStatus('all')" 
                 :class="status === 'all' ? 'border-emerald-500 shadow-md border-2' : 'border border-emerald-500/30 hover:border-emerald-500/60 shadow-sm'"
                 class="bg-white p-5 rounded-2xl cursor-pointer transition-all duration-200 flex flex-col justify-between h-28 relative overflow-hidden w-full">
                <p class="text-sm font-bold text-slate-500">Total Pesanan</p>
                <div class="flex justify-between items-end z-10">
                    <h4 class="text-2xl font-extrabold text-slate-900">{{ $counts['all'] }}</h4>
                    <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-lg">Semua</span>
                </div>
                <!-- Extra Accent Bottom Line when Active -->
                <div x-show="status === 'all'" x-transition.opacity class="absolute bottom-0 left-0 right-0 h-1.5 bg-emerald-500 rounded-b-2xl z-20"></div>
            </div>
            
            <!-- Perlu Diproses (Blue) -->
            <div @click="changeStatus('to_process')" 
                 :class="status === 'to_process' ? 'border-blue-500 shadow-md border-2' : 'border border-blue-500/30 hover:border-blue-500/60 shadow-sm'"
                 class="bg-white p-5 rounded-2xl cursor-pointer transition-all duration-200 flex flex-col justify-between h-28 relative overflow-hidden w-full">
                <p class="text-sm font-bold text-slate-500">Perlu Diproses</p>
                <div class="flex justify-between items-end z-10">
                    <h4 class="text-2xl font-extrabold text-slate-900">{{ $counts['to_process'] }}</h4>
                    <span class="text-xs font-bold text-blue-600 bg-blue-50 px-2.5 py-1 rounded-lg">Belum Atur</span>
                </div>
                <!-- Extra Accent Bottom Line when Active -->
                <div x-show="status === 'to_process'" x-transition.opacity class="absolute bottom-0 left-0 right-0 h-1.5 bg-blue-500 rounded-b-2xl z-20"></div>
            </div>
            
            <!-- Perlu Dikirim (Indigo) -->
            <div @click="changeStatus('to_ship')" 
                 :class="status === 'to_ship' ? 'border-indigo-500 shadow-md border-2' : 'border border-indigo-500/30 hover:border-indigo-500/60 shadow-sm'"
                 class="bg-white p-5 rounded-2xl cursor-pointer transition-all duration-200 flex flex-col justify-between h-28 relative overflow-hidden w-full">
                <p class="text-sm font-bold text-slate-500">Perlu Dikirim</p>
                <div class="flex justify-between items-end z-10">
                    <h4 class="text-2xl font-extrabold text-slate-900">{{ $counts['to_ship'] }}</h4>
                    <span class="text-xs font-bold text-indigo-600 bg-indigo-50 px-2.5 py-1 rounded-lg">Siap Kirim</span>
                </div>
                <!-- Extra Accent Bottom Line when Active -->
                <div x-show="status === 'to_ship'" x-transition.opacity class="absolute bottom-0 left-0 right-0 h-1.5 bg-indigo-500 rounded-b-2xl z-20"></div>
            </div>
            
            <!-- Sedang Dikirim (Amber) -->
            <div @click="changeStatus('shipping')" 
                 :class="status === 'shipping' ? 'border-amber-400 shadow-md border-2' : 'border border-amber-400/40 hover:border-amber-400/70 shadow-sm'"
                 class="bg-white p-5 rounded-2xl cursor-pointer transition-all duration-200 flex flex-col justify-between h-28 relative overflow-hidden w-full">
                <p class="text-sm font-bold text-slate-500">Sedang Dikirim</p>
                <div class="flex justify-between items-end z-10">
                    <h4 class="text-2xl font-extrabold text-slate-900">{{ $counts['shipping'] }}</h4>
                    <span class="text-xs font-bold text-amber-600 bg-amber-50 px-2.5 py-1 rounded-lg">Kurir</span>
                </div>
                <!-- Extra Accent Bottom Line when Active -->
                <div x-show="status === 'shipping'" x-transition.opacity class="absolute bottom-0 left-0 right-0 h-1.5 bg-amber-400 rounded-b-2xl z-20"></div>
            </div>
        </div>

        <!-- Data Table Section -->
        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden relative">
            <!-- Bulk Action Toolbar (Appears when items are selected) -->
            <div x-show="selectedOrders.length > 0" x-transition.opacity style="display: none;" class="absolute top-0 left-0 w-full h-[72px] bg-tosca-50 border-b border-tosca-200 z-20 flex items-center justify-between px-6">
                <div class="flex items-center gap-4">
                    <span class="bg-tosca-500 text-white w-6 h-6 rounded-md flex items-center justify-center font-extrabold text-xs" x-text="selectedOrders.length"></span>
                    <span class="text-sm font-extrabold text-tosca-900">Pesanan Dipilih</span>
                </div>
                <div class="flex items-center gap-3">
                    <button class="bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 px-4 py-2 rounded-xl text-xs font-bold transition-colors shadow-sm">
                        Cetak Picking List
                    </button>
                    
                    <template x-if="status === 'to_process'">
                        <div class="flex items-center gap-2">
                            <button x-show="subFilter === 'print' || subFilter === 'auto'" class="bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 px-4 py-2 rounded-xl text-xs font-bold transition-colors shadow-sm flex items-center">
                                <svg class="w-3.5 h-3.5 mr-1.5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                                Cetak Dokumen Massal
                            </button>
                            <button x-show="subFilter === 'arrange' || subFilter === 'auto'" class="bg-tosca-500 hover:bg-tosca-600 text-white px-4 py-2 rounded-xl text-xs font-extrabold shadow-sm hover:shadow transition-all">
                                Atur Pengiriman Massal
                            </button>
                            <button x-show="subFilter === 'auto'" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-4 py-2 rounded-xl text-xs font-extrabold shadow-sm hover:shadow transition-all flex items-center">
                                <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                Auto Atur & Cetak Massal
                            </button>
                        </div>
                    </template>

                    <template x-if="status === 'to_ship'">
                        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-xl text-xs font-extrabold shadow-sm hover:shadow transition-all">
                            Cetak Pengiriman Massal
                        </button>
                    </template>
                </div>
            </div>

            <!-- Toolbar (Filters & Search with all 6 statuses) -->
            <div class="p-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                <div class="flex items-center gap-2 overflow-x-auto pb-2 lg:pb-0 w-full lg:w-auto">
                    <button @click="changeStatus('all')" :class="status === 'all' ? 'bg-slate-900 text-white' : 'bg-slate-50 text-slate-600 hover:bg-slate-100'" class="px-4 py-2 rounded-xl text-sm font-bold whitespace-nowrap transition-colors">Semua</button>
                    
                    <button @click="changeStatus('to_process')" :class="status === 'to_process' ? 'bg-blue-500 text-white' : 'bg-slate-50 text-slate-600 hover:bg-slate-100'" class="px-4 py-2 rounded-xl text-sm font-bold whitespace-nowrap flex items-center transition-colors">
                        Perlu Diproses <span :class="status === 'to_process' ? 'bg-white text-blue-600' : 'bg-blue-100 text-blue-600'" class="ml-2 px-1.5 py-0.5 rounded text-[10px] font-extrabold">{{ $counts['to_process'] }}</span>
                    </button>
                    
                    <button @click="changeStatus('to_ship')" :class="status === 'to_ship' ? 'bg-indigo-500 text-white' : 'bg-slate-50 text-slate-600 hover:bg-slate-100'" class="px-4 py-2 rounded-xl text-sm font-bold whitespace-nowrap flex items-center transition-colors">
                        Perlu Dikirim <span :class="status === 'to_ship' ? 'bg-white text-indigo-600' : 'bg-indigo-100 text-indigo-600'" class="ml-2 px-1.5 py-0.5 rounded text-[10px] font-extrabold">{{ $counts['to_ship'] }}</span>
                    </button>
                    
                    <button @click="changeStatus('shipping')" :class="status === 'shipping' ? 'bg-amber-500 text-white' : 'bg-slate-50 text-slate-600 hover:bg-slate-100'" class="px-4 py-2 rounded-xl text-sm font-bold whitespace-nowrap flex items-center transition-colors">
                        Sedang Dikirim <span :class="status === 'shipping' ? 'bg-white text-amber-600' : 'bg-amber-100 text-amber-600'" class="ml-2 px-1.5 py-0.5 rounded text-[10px] font-extrabold">{{ $counts['shipping'] }}</span>
                    </button>
                    
                    <button @click="changeStatus('completed')" :class="status === 'completed' ? 'bg-emerald-500 text-white' : 'bg-slate-50 text-slate-600 hover:bg-slate-100'" class="px-4 py-2 rounded-xl text-sm font-bold whitespace-nowrap flex items-center transition-colors">
                        Selesai <span :class="status === 'completed' ? 'bg-white text-emerald-600' : 'bg-emerald-100 text-emerald-600'" class="ml-2 px-1.5 py-0.5 rounded text-[10px] font-extrabold">{{ $counts['completed'] }}</span>
                    </button>
                    
                    <button @click="changeStatus('returns')" :class="status === 'returns' ? 'bg-rose-500 text-white' : 'bg-slate-50 text-slate-600 hover:bg-slate-100'" class="px-4 py-2 rounded-xl text-sm font-bold whitespace-nowrap flex items-center transition-colors">
                        Retur <span :class="status === 'returns' ? 'bg-white text-rose-600' : 'bg-rose-100 text-rose-600'" class="ml-2 px-1.5 py-0.5 rounded text-[10px] font-extrabold">{{ $counts['returns'] }}</span>
                    </button>
                </div>
                
                <div class="flex items-center gap-3 w-full lg:w-auto">
                    <div class="relative w-full lg:w-64">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="text" class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 rounded-xl leading-5 bg-slate-50 placeholder-slate-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-tosca-500/20 focus:border-tosca-500 sm:text-sm transition-colors" placeholder="Cari Resi, No. Pesanan...">
                    </div>
                    <button class="flex items-center justify-center p-2.5 border border-slate-200 rounded-xl hover:bg-slate-50 transition-colors text-slate-600 bg-white shadow-sm" title="Filter Lanjutan">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                    </button>
                </div>
            </div>

            <!-- Sub-filter Perlu Diproses (Placed beautifully directly below the tabs filter in the table container) -->
            <div x-show="status === 'to_process'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="bg-slate-50/80 border-b border-slate-100 p-4 flex flex-wrap items-center gap-2.5">
                <!-- Atur Pengiriman -->
                <button @click="subFilter = 'arrange'; selectedOrders = []" :class="subFilter === 'arrange' ? 'bg-blue-600 text-white shadow-sm' : 'bg-white text-slate-700 hover:bg-slate-50 border border-slate-200'" class="px-3.5 py-2 rounded-xl text-xs font-extrabold transition-all flex items-center">
                    <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                    Atur Pengiriman <span :class="subFilter === 'arrange' ? 'bg-white/20 text-white' : 'bg-blue-50 text-blue-600'" class="ml-1.5 px-1.5 py-0.5 rounded text-[10px] font-extrabold">1</span>
                </button>
                <!-- Cetak Pengiriman -->
                <button @click="subFilter = 'print'; selectedOrders = []" :class="subFilter === 'print' ? 'bg-blue-600 text-white shadow-sm' : 'bg-white text-slate-700 hover:bg-slate-50 border border-slate-200'" class="px-3.5 py-2 rounded-xl text-xs font-extrabold transition-all flex items-center">
                    <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                    Cetak Pengiriman <span :class="subFilter === 'print' ? 'bg-white/20 text-white' : 'bg-blue-50 text-blue-600'" class="ml-1.5 px-1.5 py-0.5 rounded text-[10px] font-extrabold">1</span>
                </button>
                <!-- Atur & Cetak Pengiriman -->
                <button @click="subFilter = 'auto'; selectedOrders = []" :class="subFilter === 'auto' ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-sm' : 'bg-white text-slate-700 hover:bg-slate-50 border border-slate-200'" class="px-3.5 py-2 rounded-xl text-xs font-extrabold transition-all flex items-center">
                    <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    Atur & Cetak Pengiriman <span :class="subFilter === 'auto' ? 'bg-white/20 text-white' : 'bg-indigo-50 text-indigo-600'" class="ml-1.5 px-1.5 py-0.5 rounded text-[10px] font-extrabold">2</span>
                </button>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200">
                            <th class="py-4 px-6 w-12">
                                <input type="checkbox" @click="toggleAll()" :checked="allSelected" class="w-4 h-4 text-tosca-500 bg-white border-slate-300 rounded focus:ring-tosca-500 cursor-pointer">
                            </th>
                            <th class="py-4 px-3 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">ID Pesanan & Kurir</th>
                            <th class="py-4 px-3 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Platform & Pelanggan</th>
                            <th class="py-4 px-3 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Produk & SKU</th>
                            <th class="py-4 px-3 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Total Pembayaran</th>
                            <th class="py-4 px-3 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Status</th>
                            <th class="py-4 px-6 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        @forelse($orders as $order)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="py-4 px-6">
                                <input type="checkbox" value="{{ $order->id }}" x-model="selectedOrders" class="w-4 h-4 text-tosca-500 bg-white border-slate-300 rounded focus:ring-tosca-500 cursor-pointer">
                            </td>
                            <td class="py-4 px-3">
                                <div class="font-bold text-slate-900">{{ $order->order_number }}</div>
                                <div class="text-xs text-slate-500 mt-1">{{ $order->order_date->translatedFormat('d M Y, H:i') }} WIB</div>
                                <div class="text-[11px] font-bold text-slate-700 mt-1">{{ $order->courier_name }}</div>
                            </td>
                            <td class="py-4 px-3">
                                <div class="flex items-center gap-2.5">
                                    <div>
                                        <div class="font-semibold text-slate-800">{{ $order->customer_name }}</div>
                                        <div class="text-[11px] text-slate-500">{{ $order->customer_location }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-3 max-w-[200px]" x-data="{ expanded: false }">
                                @if($order->items->count() > 0)
                                    <div class="font-semibold text-slate-800 truncate" title="{{ $order->items->first()->marketplace_product_name }}">{{ $order->items->first()->marketplace_product_name }}</div>
                                    <div class="text-xs text-slate-400 mt-0.5">SKU: {{ $order->items->first()->sku }} <span class="font-extrabold text-slate-600 ml-1">x{{ $order->items->first()->quantity }}</span></div>
                                    @if($order->items->count() > 1)
                                    <button @click="expanded = !expanded" class="mt-1.5 inline-flex items-center gap-1 px-1.5 py-0.5 rounded bg-slate-50 hover:bg-slate-100 text-slate-550 hover:text-slate-700 text-[10px] font-extrabold border border-slate-200 transition-all cursor-pointer select-none">
                                        <span x-text="expanded ? 'Sembunyikan' : '+ {{ $order->items->count() - 1 }} produk lainnya'"></span>
                                        <svg class="w-2.5 h-2.5 transition-transform duration-200" :class="expanded ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                                    </button>
                                    <div x-show="expanded" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-1" x-transition:enter-end="opacity-100 transform translate-y-0" class="mt-2 pl-2 border-l-2 border-slate-250 space-y-1.5" x-cloak>
                                        @foreach($order->items->skip(1) as $item)
                                        <div class="text-xs">
                                            <div class="font-semibold text-slate-700 truncate" title="{{ $item->marketplace_product_name }}">{{ $item->marketplace_product_name }}</div>
                                            <div class="text-[10px] text-slate-400">SKU: {{ $item->sku }} <span class="font-bold text-slate-600 ml-1">x{{ $item->quantity }}</span></div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                @else
                                    <div class="text-xs text-slate-500">Tidak ada produk</div>
                                @endif
                            </td>
                            <td class="py-4 px-3">
                                <div class="font-extrabold text-slate-900">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</div>
                                <div class="text-[11px] text-slate-500 mt-1 font-medium">{{ $order->items->sum('quantity') }} Item • {{ $order->payment_method }}</div>
                            </td>
                            <td class="py-4 px-3">
                                @if($order->status == 'to_process')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-blue-50 text-blue-750 border border-blue-200">Perlu Diproses</span>
                                @elseif($order->status == 'to_ship')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-indigo-100 text-indigo-700 border border-indigo-200">Perlu Dikirim</span>
                                @elseif($order->status == 'shipping')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-amber-100 text-amber-700 border border-amber-200">Sedang Dikirim</span>
                                @elseif($order->status == 'completed')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-emerald-100 text-emerald-700 border border-emerald-200">Selesai</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-slate-100 text-slate-700 border border-slate-200">{{ $order->status }}</span>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <button class="bg-white border border-slate-200 hover:border-slate-300 hover:bg-slate-50 text-slate-700 px-4 py-2 rounded-xl text-xs font-extrabold shadow-sm transition-all duration-200 whitespace-nowrap">
                                    Detail Pesanan
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="py-16 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                                        <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    </div>
                                    <h3 class="text-lg font-extrabold text-slate-900 mb-1">Belum Ada Pesanan</h3>
                                    <p class="text-sm text-slate-500 max-w-sm mx-auto mb-6">Daftar pesanan Anda masih kosong. Silakan tarik data terbaru dari marketplace Anda.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="p-6 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <span class="text-sm font-medium text-slate-500">
                    Menampilkan <span class="font-extrabold text-slate-900">{{ count($orders) }}</span> pesanan dari total <span class="font-extrabold text-slate-900">{{ $counts['all'] }}</span>
                </span>
                <div class="flex items-center gap-1">
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 text-slate-400 cursor-not-allowed">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-tosca-500 text-white font-extrabold text-sm shadow-sm">1</button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 font-bold text-sm transition-colors">2</button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 font-bold text-sm transition-colors">3</button>
                    <span class="w-8 h-8 flex items-center justify-center text-slate-400 font-bold">...</span>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </div>
            </div>
        </div>

    </div>
</x-layout.app>
