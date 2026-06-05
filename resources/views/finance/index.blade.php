<x-layout.app>
    <!-- Header -->
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-tosca-500">Laporan Keuangan</h1>
        </div>
        <div class="flex items-center gap-3">
            <select class="border border-slate-200 bg-white rounded-xl text-sm font-bold text-slate-700 py-2.5 px-4 outline-none focus:ring-2 focus:ring-tosca-500/20 shadow-sm cursor-pointer">
                <option value="all">Semua Bulan</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5" selected>Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <select class="border border-slate-200 bg-white rounded-xl text-sm font-bold text-slate-700 py-2.5 px-4 outline-none focus:ring-2 focus:ring-tosca-500/20 shadow-sm cursor-pointer">
                <option value="2026" selected>2026</option>
                <option value="2025">2025</option>
            </select>
            <button class="flex items-center bg-tosca-500 hover:bg-tosca-600 text-white px-5 py-2.5 rounded-xl text-sm font-extrabold shadow-[0_6px_18px_-4px_rgba(20,184,166,0.4)] hover:-translate-y-0.5 transition-all duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                Ekspor Laporan
            </button>
        </div>
    </div>

    <!-- KPI Summary -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
        <div class="bg-gradient-to-br from-white to-slate-50 text-slate-900 rounded-2xl p-5 shadow-sm border-2 border-tosca-500">
            <p class="text-sm font-semibold text-slate-500 mb-1">Pendapatan Kotor</p>
            <p class="text-2xl font-extrabold">Rp {{ number_format($finance['total_income'], 0, ',', '.') }}</p>
            <p class="text-xs font-bold text-tosca-600 mt-2 flex items-center">Bulan ini</p>
        </div>
        <div class="bg-white rounded-2xl p-5 shadow-sm border-2 border-red-500">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Potongan Marketplace</p>
            <p class="text-2xl font-extrabold text-red-600">Rp 0</p>
            <p class="text-xs font-bold text-slate-500 mt-2">Bulan ini</p>
        </div>
        <div class="bg-white rounded-2xl p-5 shadow-sm border-2 border-emerald-500">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Pendapatan Bersih</p>
            <p class="text-2xl font-extrabold text-slate-900">Rp {{ number_format($finance['net_profit'], 0, ',', '.') }}</p>
            <p class="text-xs font-bold text-emerald-600 mt-2">Setelah potongan</p>
        </div>
        <div class="bg-gradient-to-br from-white to-slate-50 text-slate-900 rounded-2xl p-5 shadow-sm border-2 border-amber-400">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Menunggu Pencairan</p>
            <p class="text-2xl font-extrabold text-amber-900">Rp 0</p>
            <p class="text-xs font-bold text-amber-600 mt-2">Dari seluruh channel</p>
        </div>
    </div>

    <!-- Two Column Layout -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        <!-- Left: Per-Platform Breakdown -->
        <div class="xl:col-span-2 space-y-6">
            
            <!-- Chart Tren Keuangan -->
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h2 class="text-lg font-extrabold text-slate-900">Arus Kas & Potongan</h2>
                        <p class="text-sm text-slate-500 mt-1">Tren pendapatan kotor vs potongan marketplace selama bulan ini.</p>
                    </div>
                </div>
                <div class="w-full h-[280px]">
                    <canvas id="financeChart"></canvas>
                </div>
            </div>

            <!-- Platform Revenue Breakdown -->
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-6 border-b border-slate-100">
                    <h2 class="text-lg font-extrabold text-slate-900">Pendapatan per Marketplace</h2>
                    <p class="text-sm text-slate-500 mt-1">Rincian pendapatan bersih dari setiap channel penjualan bulan ini.</p>
                </div>
                <div class="divide-y divide-slate-100">
                    <div class="p-8 text-center text-slate-500 text-sm font-medium">
                        Belum ada pendapatan yang tercatat.
                    </div>
                </div>
            </div>

            <!-- Transaction History Table -->
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                    <h2 class="text-lg font-extrabold text-slate-900">Riwayat Transaksi</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-200 text-[11px] font-extrabold text-slate-500 uppercase">
                                <th class="py-4 px-6">Tanggal</th>
                                <th class="py-4 px-3">Deskripsi</th>
                                <th class="py-4 px-3">Platform</th>
                                <th class="py-4 px-6 text-right">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-sm">
                            @forelse($finance['transactions'] as $tx)
                            <tr class="hover:bg-slate-50/50">
                                <td class="py-4 px-6 text-slate-500">{{ $tx['date'] }}</td>
                                <td class="py-4 px-3 font-bold text-slate-900">{{ $tx['description'] }}</td>
                                <td class="py-4 px-3">-</td>
                                <td class="py-4 px-6 text-right font-extrabold {{ $tx['type'] == 'income' ? 'text-emerald-600' : 'text-red-600' }}">
                                    {{ $tx['type'] == 'income' ? '+' : '-' }} {{ $tx['amount'] }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="py-8 text-center text-slate-500 text-sm">
                                    Belum ada transaksi bulan ini.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Right: COGS & Profit Margin -->
        <div class="space-y-6">
            <!-- Profit Calculator -->
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-lg font-extrabold text-slate-900 mb-4">Kalkulasi Profit Bersih</h2>
                <div class="space-y-3">
                    <div class="flex justify-between text-sm py-2 border-b border-dashed border-slate-100">
                        <span class="text-slate-500 font-medium">Pendapatan Kotor</span>
                        <span class="font-extrabold text-slate-900">Rp {{ number_format($finance['total_income'], 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between text-sm py-2 border-b border-dashed border-slate-100">
                        <span class="text-slate-500 font-medium">Total HPP / COGS</span>
                        <span class="font-extrabold text-red-600">- Rp 0</span>
                    </div>
                    <div class="flex justify-between text-sm py-2 border-b border-dashed border-slate-100">
                        <span class="text-slate-500 font-medium">Potongan Marketplace</span>
                        <span class="font-extrabold text-red-600">- Rp 0</span>
                    </div>
                    <div class="flex justify-between text-sm py-2 border-b border-dashed border-slate-100">
                        <span class="text-slate-500 font-medium">Biaya Pengiriman</span>
                        <span class="font-extrabold text-red-600">- Rp 0</span>
                    </div>
                    <div class="flex justify-between text-sm py-2 border-b border-dashed border-slate-100">
                        <span class="text-slate-500 font-medium">Biaya Iklan (Ads)</span>
                        <span class="font-extrabold text-red-600">- Rp 0</span>
                    </div>
                    <div class="flex justify-between py-3 bg-tosca-50 rounded-xl px-3 mt-2">
                        <span class="text-sm font-extrabold text-tosca-900">Profit Bersih</span>
                        <span class="font-extrabold text-tosca-700 text-lg">Rp {{ number_format($finance['net_profit'], 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between items-center mt-1">
                        <span class="text-xs font-bold text-slate-500">Margin Profit</span>
                        <span class="text-sm font-extrabold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-lg border border-emerald-100">0%</span>
                    </div>
                </div>
                <a href="{{ route('finance.cogs') }}" class="mt-5 w-full flex items-center justify-center text-sm font-extrabold text-tosca-600 hover:text-tosca-700 bg-tosca-50 hover:bg-tosca-100 py-3 rounded-xl transition-colors border border-tosca-100">
                    Atur Harga Modal (COGS) →
                </a>
            </div>
            <!-- Withdrawal Status -->
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">
                <h2 class="text-lg font-extrabold text-slate-900 mb-4">Status Pencairan</h2>
                <div class="text-center py-6">
                    <p class="text-sm text-slate-500">Belum ada dana yang menunggu pencairan.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js Initialization -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('financeChart').getContext('2d');
            
            // Gradient for Gross Revenue
            let gradientGross = ctx.createLinearGradient(0, 0, 0, 400);
            gradientGross.addColorStop(0, 'rgba(20, 184, 166, 0.2)'); // Tosca 500
            gradientGross.addColorStop(1, 'rgba(20, 184, 166, 0)');

            const data = {
                labels: ['1 Mei', '5 Mei', '10 Mei', '15 Mei', '20 Mei', '25 Mei', '30 Mei'],
                datasets: [
                    {
                        label: 'Pendapatan Kotor',
                        data: [0, 0, 0, 0, 0, 0, 0],
                        borderColor: '#14b8a6', // Tosca 500
                        backgroundColor: gradientGross,
                        borderWidth: 3,
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: '#14b8a6',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        fill: true,
                        tension: 0.4
                    },
                    {
                        label: 'Potongan Marketplace',
                        data: [0, 0, 0, 0, 0, 0, 0],
                        borderColor: '#ef4444', // Red 500
                        backgroundColor: 'transparent',
                        borderWidth: 2,
                        borderDash: [5, 5],
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: '#ef4444',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        fill: false,
                        tension: 0.4
                    }
                ]
            };

            const config = {
                type: 'line',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                usePointStyle: true,
                                boxWidth: 8,
                                font: { family: "'Plus Jakarta Sans', sans-serif", weight: 'bold' }
                            }
                        },
                        tooltip: {
                            backgroundColor: '#0f172a',
                            titleFont: { size: 13, family: "'Plus Jakarta Sans', sans-serif" },
                            bodyFont: { size: 14, weight: 'bold', family: "'Plus Jakarta Sans', sans-serif" },
                            padding: 12,
                            displayColors: true,
                            callbacks: {
                                label: function(context) {
                                    let value = context.parsed.y;
                                    return context.dataset.label + ': Rp ' + (value / 1000000).toFixed(1) + ' Juta';
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
        });
    </script>
</x-layout.app>
