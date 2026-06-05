<x-layout.app>
    <!-- Header -->
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-tosca-500 mb-2">Performa Kurir</h1>
        </div>
        <div class="flex items-center gap-3">
            <select class="border border-slate-200 bg-white rounded-xl text-sm font-bold text-slate-700 py-2.5 px-4 outline-none focus:ring-2 focus:ring-tosca-500/20 shadow-sm cursor-pointer">
                <option value="all">Semua Ekspedisi</option>
                <option value="jnt">J&T Express</option>
                <option value="jne">JNE</option>
                <option value="spx">Shopee Xpress</option>
            </select>
            <select class="border border-slate-200 bg-white rounded-xl text-sm font-bold text-slate-700 py-2.5 px-4 outline-none focus:ring-2 focus:ring-tosca-500/20 shadow-sm cursor-pointer">
                <option>Hari Ini</option>
                <option>Kemarin</option>
                <option>7 Hari Terakhir</option>
                <option>1 Bulan Terakhir</option>
                <option>3 Bulan Terakhir</option>
                <option>6 Bulan Terakhir</option>
                <option>1 Tahun Terakhir</option>
                <option>2 Tahun Terakhir</option>
                <option>3 Tahun Terakhir</option>
            </select>
            <button class="flex items-center bg-white border border-slate-200 text-slate-700 px-4 py-2.5 rounded-xl text-sm font-bold shadow-sm hover:bg-slate-50 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                Ekspor
            </button>
        </div>
    </div>

    <!-- KPI Summary Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="bg-gradient-to-br from-white to-slate-50 text-slate-900 rounded-2xl p-5 shadow-sm border-2 border-tosca-500">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Total Paket Dikirim</p>
            <p class="text-2xl font-extrabold text-slate-900">{{ number_format($stats['total_packages']) }}</p>
            <p class="text-xs font-bold text-tosca-600 mt-2">Bulan ini</p>
        </div>
        <div class="bg-white rounded-2xl p-5 shadow-sm border-2 border-amber-400">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Rata-Rata Waktu Kirim</p>
            <p class="text-2xl font-extrabold text-slate-900">{{ $stats['avg_time'] }} Hari</p>
            <p class="text-xs font-bold text-amber-600 mt-2">Bulan ini</p>
        </div>
        <div class="bg-white rounded-2xl p-5 shadow-sm border-2 border-red-400">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Tingkat Paket Retur</p>
            <p class="text-2xl font-extrabold text-slate-900">{{ $stats['problematic'] }}%</p>
            <p class="text-xs font-bold text-red-500 mt-2">Bulan ini</p>
        </div>
        <div class="bg-white rounded-2xl p-5 shadow-sm border-2 border-blue-500">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Paket Hilang / Klaim</p>
            <p class="text-2xl font-extrabold text-slate-900">0</p>
            <p class="text-xs font-bold text-blue-500 mt-2">Bulan ini</p>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <!-- Left: Chart area -->
        <div class="xl:col-span-2 space-y-6">
            <!-- Delivery Chart -->
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-6 gap-4">
                    <div>
                        <h2 class="text-lg font-extrabold text-slate-900">Tren Pengiriman & Retur Harian</h2>
                        <p class="text-sm text-slate-500 mt-0.5">Pantau kelancaran logistik harian Anda.</p>
                    </div>
                    <div class="flex bg-slate-100 p-1.5 rounded-xl">
                        <button id="btn-chart-del" class="px-5 py-2 text-xs font-bold bg-white text-tosca-600 rounded-lg shadow-sm transition-all" onclick="updateChart('delivered')">Dikirim</button>
                        <button id="btn-chart-ret" class="px-5 py-2 text-xs font-bold text-slate-500 hover:text-slate-800 rounded-lg transition-all" onclick="updateChart('returned')">Retur</button>
                    </div>
                </div>
                <div class="w-full h-[280px]">
                    <canvas id="courierChart"></canvas>
                </div>
            </div>
            
            <!-- Best Performing Couriers Table -->
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-6 border-b border-slate-100">
                    <h2 class="text-lg font-extrabold text-slate-900">Performa Detail Kurir</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200">
                                <th class="py-4 px-6 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Ekspedisi</th>
                                <th class="py-4 px-3 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Total Paket</th>
                                <th class="py-4 px-3 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Tepat Waktu</th>
                                <th class="py-4 px-3 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Retur</th>
                                <th class="py-4 px-6 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider text-right">Skor Kinerja</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-sm">
                            <tr>
                                <td colspan="5" class="py-8 text-center text-slate-500 text-sm font-medium">
                                    Belum ada data pengiriman.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Right: Breakdown Charts -->
        <div class="space-y-6">
            <!-- Market Share Courier -->
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-base font-extrabold text-slate-900 mb-4">Volume Ekspedisi</h2>
                <div class="space-y-4">
                    <div class="text-center py-4 text-slate-500 text-sm font-medium">
                        Belum ada data pengiriman.
                    </div>
                </div>
            </div>

            <!-- Return Reasons -->
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-base font-extrabold text-slate-900 mb-4">Alasan Retur Terbanyak</h2>
                <div class="space-y-3">
                    <div class="text-center py-4 text-slate-500 text-sm font-medium">
                        Belum ada data retur.
                    </div>
                </div>
            </div>
            
            <!-- Insight / Advice -->
            <div class="bg-indigo-50 border border-indigo-100 rounded-3xl p-6">
                <div class="flex items-start gap-3">
                    <div class="p-2 bg-indigo-100 text-indigo-600 rounded-xl">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-indigo-900">Wawasan Logistik</h3>
                        <p class="text-sm text-indigo-700 mt-1 font-medium">Sistem akan menganalisis data logistik Anda setelah pesanan masuk dan dikirim.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('courierChart').getContext('2d');
        const labels = Array.from({length: 30}, (_, i) => {
            const d = new Date(2026, 4, i + 1);
            return d.getDate() + ' Mei';
        });
        const delData = labels.map(() => 0);
        const retData = labels.map(() => 0);

        let delGradient = ctx.createLinearGradient(0, 0, 0, 280);
        delGradient.addColorStop(0, 'rgba(20, 184, 166, 0.4)');
        delGradient.addColorStop(1, 'rgba(20, 184, 166, 0)');

        let retGradient = ctx.createLinearGradient(0, 0, 0, 280);
        retGradient.addColorStop(0, 'rgba(239, 68, 68, 0.4)');
        retGradient.addColorStop(1, 'rgba(239, 68, 68, 0)');

        let currentChart;

        window.updateChart = function(type) {
            const btnDel = document.getElementById('btn-chart-del');
            const btnRet = document.getElementById('btn-chart-ret');

            if (type === 'delivered') {
                btnDel.className = 'px-5 py-2 text-xs font-bold bg-white text-tosca-600 rounded-lg shadow-sm transition-all';
                btnRet.className = 'px-5 py-2 text-xs font-bold text-slate-500 hover:text-slate-800 rounded-lg transition-all';
            } else {
                btnRet.className = 'px-5 py-2 text-xs font-bold bg-white text-red-500 rounded-lg shadow-sm transition-all';
                btnDel.className = 'px-5 py-2 text-xs font-bold text-slate-500 hover:text-slate-800 rounded-lg transition-all';
            }

            if (currentChart) {
                currentChart.destroy();
            }

            const data = type === 'delivered' ? delData : retData;
            const label = type === 'delivered' ? 'Paket Dikirim' : 'Paket Retur';
            const color = type === 'delivered' ? '#14b8a6' : '#ef4444';
            const bgColor = type === 'delivered' ? delGradient : retGradient;
            
            currentChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels,
                    datasets: [{
                        label: label, 
                        data: data, 
                        borderColor: color, 
                        backgroundColor: bgColor, 
                        fill: true, 
                        tension: 0.4, 
                        pointRadius: 3, 
                        pointHoverRadius: 6, 
                        pointBackgroundColor: '#fff',
                        borderWidth: 3 
                    }]
                },
                options: {
                    responsive: true, maintainAspectRatio: false,
                    plugins: { legend: { display: false }, tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.parsed.y;
                            }
                        }
                    } },
                    scales: {
                        y: { position: 'left', grid: { color: '#f1f5f9', drawBorder: false }, ticks: { color: '#64748b', font: { size: 11 }, padding: 10 } },
                        x: { grid: { display: false, drawBorder: false }, ticks: { maxTicksLimit: 8, color: '#94a3b8', font: { size: 10 }, padding: 10 } }
                    }
                }
            });
        };

        updateChart('delivered');
    });
    </script>
</x-layout.app>
