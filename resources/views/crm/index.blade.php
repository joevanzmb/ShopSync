<x-layout.app>


    <!-- KPI Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Total Pelanggan</p>
            <p class="text-2xl font-extrabold text-slate-900">{{ count($customers) }}</p>
            <p class="text-xs font-semibold text-tosca-600 mt-1">Status saat ini</p>
        </div>
        <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Pembeli Setia</p>
            <p class="text-2xl font-extrabold text-amber-600">0</p>
            <p class="text-xs font-semibold text-amber-500 mt-1">≥ 3x transaksi</p>
        </div>
        <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Avg. Nilai Pesanan</p>
            <p class="text-2xl font-extrabold text-slate-900">Rp 0</p>
            <p class="text-xs font-semibold text-slate-500 mt-1">Per transaksi</p>
        </div>
        <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Tingkat Repeat Order</p>
            <p class="text-2xl font-extrabold text-emerald-600">0%</p>
            <p class="text-xs font-semibold text-emerald-500 mt-1">Bulan ini</p>
        </div>
    </div>

    <!-- Table + Right Panel -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <!-- Customer Table -->
        <div class="xl:col-span-2 bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center gap-2">
                    <button class="px-4 py-2 rounded-xl text-sm font-bold bg-slate-900 text-white">Semua</button>
                    <button class="px-4 py-2 rounded-xl text-sm font-bold bg-slate-50 text-slate-600 hover:bg-slate-100 transition-colors flex items-center gap-1.5">
                        Setia <span class="bg-amber-100 text-amber-700 text-[10px] font-extrabold px-1.5 py-0.5 rounded">612</span>
                    </button>
                    <button class="px-4 py-2 rounded-xl text-sm font-bold bg-slate-50 text-slate-600 hover:bg-slate-100 transition-colors">Baru</button>
                    <button class="px-4 py-2 rounded-xl text-sm font-bold bg-slate-50 text-red-600 hover:bg-red-50 transition-colors">Tidak Aktif</button>
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none"><svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></div>
                    <input type="text" placeholder="Cari nama, nomor HP..." class="pl-10 pr-4 py-2.5 border border-slate-200 rounded-xl text-sm bg-slate-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-tosca-500/20 focus:border-tosca-500 w-56 transition-colors">
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead><tr class="bg-slate-50 border-b border-slate-200">
                        <th class="py-3 px-6 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Pelanggan</th>
                        <th class="py-3 px-3 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Segmen</th>
                        <th class="py-3 px-3 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Total Pembelian</th>
                        <th class="py-3 px-3 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Transaksi</th>
                        <th class="py-3 px-6 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Terakhir Beli</th>
                    </tr></thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        @forelse($customers as $customer)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full bg-slate-200 flex items-center justify-center text-slate-600 font-extrabold text-sm flex-shrink-0">
                                        {{ substr($customer->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-900">{{ $customer->name }}</p>
                                        <p class="text-xs text-slate-400">{{ $customer->city ?? '-' }} • {{ $customer->phone ?? '-' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-3">
                                <span class="inline-flex items-center px-2 py-1 rounded-md text-[11px] font-extrabold bg-blue-50 text-blue-700 border border-blue-100">Baru</span>
                            </td>
                            <td class="py-4 px-3 font-extrabold text-slate-900">Rp 0</td>
                            <td class="py-4 px-3">
                                <span class="font-extrabold text-slate-900">{{ $customer->orders_count }}x</span>
                                <span class="text-xs text-slate-400 ml-1">pembelian</span>
                            </td>
                            <td class="py-4 px-6 text-slate-500 font-medium">-</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-16 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                                        <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                    </div>
                                    <h3 class="text-lg font-extrabold text-slate-900 mb-1">Belum Ada Pelanggan</h3>
                                    <p class="text-sm text-slate-500 max-w-sm mx-auto mb-6">Database pelanggan Anda masih kosong. Pelanggan akan otomatis ditambahkan saat ada pesanan masuk.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-5 border-t border-slate-100">
                <span class="text-sm text-slate-500 font-medium">Menampilkan <span class="font-extrabold text-slate-900">{{ count($customers) }}</span> dari <span class="font-extrabold text-slate-900">{{ count($customers) }}</span> pelanggan</span>
            </div>
        </div>

        <!-- Right: Engagement & Segments -->
        <div class="space-y-6">
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-base font-extrabold text-slate-900 mb-4">Segmentasi Pelanggan</h2>
                <div class="space-y-4">
                    <div class="text-center py-4 text-slate-500 text-sm font-medium">
                        Belum ada data pelanggan untuk dianalisis segmentasinya.
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-br from-tosca-500 to-tosca-600 rounded-3xl p-6 text-white shadow-[0_8px_24px_-6px_rgba(20,184,166,0.3)]">
                <h3 class="font-extrabold text-lg mb-2">Kirim Pesan Reaktivasi</h3>
                <p class="text-white/80 text-sm mb-4">Targetkan 810 pelanggan yang tidak aktif >90 hari dengan penawaran khusus untuk mendorong mereka kembali berbelanja.</p>
                <button class="w-full bg-white text-tosca-700 font-extrabold py-3 rounded-xl hover:bg-tosca-50 transition-colors text-sm">
                    Buat Kampanye Reaktivasi
                </button>
            </div>
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-base font-extrabold text-slate-900 mb-4">Kota Terbanyak</h2>
                <div class="space-y-3">
                    <div class="text-center py-4 text-slate-500 text-sm font-medium">
                        Belum ada data persebaran kota.
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.app>
