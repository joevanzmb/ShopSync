<x-layout.app>
    <!-- Header -->
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-tosca-500 mb-2">Performa Penjualan</h1>
        </div>
        <div class="flex items-center gap-3">
            <select class="border border-slate-200 bg-white rounded-xl text-sm font-bold text-slate-700 py-2.5 px-4 outline-none focus:ring-2 focus:ring-tosca-500/20 shadow-sm cursor-pointer">
                <option value="all">Semua Platform</option>
                <option value="shopee">Shopee</option>
                <option value="tokopedia">Tokopedia</option>
                <option value="tiktok">TikTok Shop</option>
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
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Total Pendapatan</p>
            <p class="text-2xl font-extrabold text-slate-900">Rp {{ number_format($stats['revenue'], 0, ',', '.') }}</p>
            <p class="text-xs font-bold text-tosca-600 mt-2">Bulan ini</p>
        </div>
        <div class="bg-white rounded-2xl p-5 shadow-sm border-2 border-amber-400">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Total Pesanan</p>
            <p class="text-2xl font-extrabold text-slate-900">{{ number_format($stats['orders']) }}</p>
            <p class="text-xs font-bold text-amber-600 mt-2">Bulan ini</p>
        </div>
        <div class="bg-white rounded-2xl p-5 shadow-sm border-2 border-blue-400">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Avg. Pesanan/Hari</p>
            <p class="text-2xl font-extrabold text-slate-900">{{ $stats['avg_orders'] }}</p>
            <p class="text-xs font-bold text-slate-400 mt-2">Bulan ini</p>
        </div>
        <div class="bg-white rounded-2xl p-5 shadow-sm border-2 border-red-500">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Tingkat Konversi</p>
            <p class="text-2xl font-extrabold text-slate-900">{{ $stats['conversion'] }}%</p>
            <p class="text-xs font-bold text-red-500 mt-2">Bulan ini</p>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <!-- Left: Chart area -->
        <div class="xl:col-span-2 space-y-6">
            <!-- Sales Chart -->
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-6 gap-4">
                    <div>
                        <h2 class="text-lg font-extrabold text-slate-900">Tren Performa Harian</h2>
                        <p class="text-sm text-slate-500 mt-0.5">Grafik performa selama 30 hari terakhir.</p>
                    </div>
                    <div class="flex bg-slate-100 p-1.5 rounded-xl">
                        <button id="btn-chart-sales" class="px-5 py-2 text-xs font-bold bg-white text-tosca-600 rounded-lg shadow-sm transition-all" onclick="updateChart('sales')">Pendapatan</button>
                        <button id="btn-chart-orders" class="px-5 py-2 text-xs font-bold text-slate-500 hover:text-slate-800 rounded-lg transition-all" onclick="updateChart('orders')">Pesanan</button>
                    </div>
                </div>
                <div class="w-full h-[280px]">
                    <canvas id="analyticsChart"></canvas>
                </div>
            </div>

            <!-- Top Products by Revenue -->
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-6 border-b border-slate-100">
                    <h2 class="text-lg font-extrabold text-slate-900">Produk Terlaris Periode Ini</h2>
                    <p class="text-sm text-slate-500 mt-0.5">Berdasarkan total pendapatan yang dihasilkan.</p>
                </div>
                <div class="divide-y divide-slate-100">
                    @forelse($products as $index => $product)
                    <div class="p-5 flex items-center gap-4 hover:bg-slate-50/50 transition-colors">
                        <span class="text-lg font-extrabold text-slate-300 w-6 text-center flex-shrink-0">{{ $index + 1 }}</span>
                        <div class="flex-1 min-w-0">
                            <p class="font-bold text-slate-900 truncate">{{ $product[0] }}</p>
                            <div class="flex items-center gap-3 mt-1.5">
                                <div class="flex-1 h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                    <div class="h-full bg-tosca-400 rounded-full" style="width:{{ $product[3] }}%"></div>
                                </div>
                                <span class="text-xs font-bold text-slate-500 flex-shrink-0">{{ $product[3] }}%</span>
                            </div>
                        </div>
                        <div class="text-right flex-shrink-0">
                            <p class="font-extrabold text-slate-900">{{ $product[1] }}</p>
                            <p class="text-xs text-slate-400 font-medium mt-0.5">{{ $product[2] }} terjual</p>
                        </div>
                    </div>
                    @empty
                    <div class="p-8 text-center text-slate-500 text-sm font-medium">
                        Belum ada penjualan.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Right: Breakdown Charts -->
        <div class="space-y-6">
            <!-- Per-Platform Share -->
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-base font-extrabold text-slate-900 mb-4">Kontribusi per Platform</h2>
                <div class="space-y-4">
                    <div class="text-center py-4 text-slate-500 text-sm font-medium">
                        Belum ada penjualan.
                    </div>
                </div>
            </div>

            <!-- Hourly Heatmap (simplified) -->
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-base font-extrabold text-slate-900 mb-1">Jam Penjualan Tersibuk</h2>
                <p class="text-xs text-slate-400 mb-4 font-medium">Rata-rata pesanan masuk per jam.</p>
                <div class="space-y-2.5">
                    <div class="text-center py-4 text-slate-500 text-sm font-medium">
                        Belum ada pesanan untuk dianalisis.
                    </div>
                </div>
            </div>

            <!-- Category Performance -->
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-base font-extrabold text-slate-900 mb-4">Kategori Terlaris</h2>
                <div class="space-y-3">
                    <div class="text-center py-4 text-slate-500 text-sm font-medium">
                        Belum ada penjualan.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('analyticsChart').getContext('2d');
        const labels = Array.from({length: 30}, (_, i) => {
            const d = new Date(2026, 4, i + 1);
            return d.getDate() + ' Mei';
        });
        const salesData = labels.map(() => 0);
        const ordersData = labels.map(() => 0);

        let salesGradient = ctx.createLinearGradient(0, 0, 0, 280);
        salesGradient.addColorStop(0, 'rgba(20, 184, 166, 0.4)');
        salesGradient.addColorStop(1, 'rgba(20, 184, 166, 0)');

        let ordersGradient = ctx.createLinearGradient(0, 0, 0, 280);
        ordersGradient.addColorStop(0, 'rgba(245, 158, 11, 0.4)');
        ordersGradient.addColorStop(1, 'rgba(245, 158, 11, 0)');

        let currentChart;

        window.updateChart = function(type) {
            const btnSales = document.getElementById('btn-chart-sales');
            const btnOrders = document.getElementById('btn-chart-orders');

            if (type === 'sales') {
                btnSales.className = 'px-5 py-2 text-xs font-bold bg-white text-tosca-600 rounded-lg shadow-sm transition-all';
                btnOrders.className = 'px-5 py-2 text-xs font-bold text-slate-500 hover:text-slate-800 rounded-lg transition-all';
            } else {
                btnOrders.className = 'px-5 py-2 text-xs font-bold bg-white text-amber-500 rounded-lg shadow-sm transition-all';
                btnSales.className = 'px-5 py-2 text-xs font-bold text-slate-500 hover:text-slate-800 rounded-lg transition-all';
            }

            if (currentChart) {
                currentChart.destroy();
            }

            const data = type === 'sales' ? salesData : ordersData;
            const label = type === 'sales' ? 'Pendapatan' : 'Pesanan';
            const color = type === 'sales' ? '#14b8a6' : '#f59e0b';
            const bgColor = type === 'sales' ? salesGradient : ordersGradient;
            
            const formatCallback = (v) => type === 'sales' ? 'Rp'+(v/1000000).toFixed(1)+'jt' : v;

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
                                let label = context.dataset.label || '';
                                if (label) { label += ': '; }
                                if (context.parsed.y !== null) {
                                    label += type === 'sales' ? 'Rp ' + new Intl.NumberFormat('id-ID').format(context.parsed.y) : context.parsed.y;
                                }
                                return label;
                            }
                        }
                    } },
                    scales: {
                        y: { position: 'left', grid: { color: '#f1f5f9', drawBorder: false }, ticks: { callback: formatCallback, color: '#64748b', font: { size: 11 }, padding: 10 } },
                        x: { grid: { display: false, drawBorder: false }, ticks: { maxTicksLimit: 8, color: '#94a3b8', font: { size: 10 }, padding: 10 } }
                    }
                }
            });
        };

        // Initialize with sales data
        updateChart('sales');
    });
    </script>
</x-layout.app>
