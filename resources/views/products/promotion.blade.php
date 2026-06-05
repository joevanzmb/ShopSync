<x-layout.app>
    <!-- Fitur Promosi Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <!-- Card 1: Topup Saldo -->
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md hover:border-blue-200 transition-all group cursor-pointer">
            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h3 class="text-lg font-extrabold text-slate-900 mb-1">Topup Saldo Iklan</h3>
            <p class="text-sm text-slate-500 font-medium">Isi ulang saldo TopAds, Shopee Ads secara instan.</p>
        </div>
        <!-- Card 2: Manajemen Iklan -->
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md hover:border-emerald-200 transition-all group cursor-pointer">
            <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>
            </div>
            <h3 class="text-lg font-extrabold text-slate-900 mb-1">Manajemen Iklan</h3>
            <p class="text-sm text-slate-500 font-medium">Atur bid, kata kunci, dan pantau performa ROAS.</p>
        </div>
        <!-- Card 3: Manajemen Diskon -->
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md hover:border-purple-200 transition-all group cursor-pointer">
            <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
            </div>
            <h3 class="text-lg font-extrabold text-slate-900 mb-1">Manajemen Diskon</h3>
            <p class="text-sm text-slate-500 font-medium">Buat harga coret, flash sale toko, dan voucher.</p>
        </div>
    </div>

    <!-- Auto Naikkan Produk Module -->
    <div class="bg-white rounded-3xl shadow-sm border border-orange-200 overflow-hidden mb-8 relative">
        <div class="absolute top-0 right-0 w-48 h-48 bg-orange-50 rounded-bl-full -z-0 opacity-50 pointer-events-none"></div>

        <div class="p-6 sm:p-8 flex flex-col md:flex-row md:items-center justify-between gap-6 relative z-10">
            <div class="w-full">
                <div class="mb-4">
                    <img src="/logo/shopee.png" alt="Shopee" class="h-8 object-contain" onerror="this.src='https://ui-avatars.com/api/?name=S&background=EE4D2D&color=fff&rounded=true&size=32'">
                </div>
                <h2 class="text-xl sm:text-2xl font-extrabold text-[#EE4D2D] mb-2">Auto Naikkan 5 Produk</h2>
                <p class="text-slate-500 font-medium text-sm max-w-xl mb-4">
                    Sistem akan otomatis melakukan "Naikkan Produk" setiap 4 jam.
                </p>
                <div class="flex flex-wrap items-center gap-3">
                    @forelse($promotions as $item)
                        <div class="flex items-center gap-2 bg-white border border-slate-200 shadow-sm px-3 py-2 rounded-xl text-xs font-bold text-slate-700">
                            <img src="{{ $item->image_url }}" class="w-6 h-6 rounded object-cover" alt=""> 
                            <span class="max-w-[100px] truncate">{{ $item->name }}</span>
                        </div>
                    @empty
                        <div class="bg-slate-50 border border-slate-200 text-slate-500 px-4 py-2 rounded-xl text-xs font-medium">
                            Belum ada produk yang dipilih untuk Auto Naikkan.
                        </div>
                    @endforelse
                </div>
            </div>
            
            <div class="flex flex-col md:items-end gap-3 min-w-[220px]">
                <!-- Toggle Switch -->
                <div class="flex items-center justify-end w-full mb-1 gap-3">
                    <span class="text-[11px] font-extrabold text-slate-500 uppercase tracking-wide">Status</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" id="toggle-auto-boost" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-500"></div>
                    </label>
                </div>
                
                <!-- Timer Container -->
                <div id="timer-container" class="bg-orange-50 border border-orange-200 rounded-2xl px-5 py-4 flex items-center justify-center w-full relative overflow-hidden transition-colors duration-300">
                    <p class="text-3xl font-extrabold text-orange-700 font-mono tracking-tight transition-colors duration-300" id="auto-boost-timer">03:59:42</p>
                </div>
                
                <div class="flex items-center w-full mt-1">
                    <button class="w-full bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 px-4 py-3 rounded-xl text-sm font-extrabold transition-colors flex justify-center items-center shadow-sm">
                        Pilih Ulang
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simple countdown script for visual demo
        document.addEventListener('DOMContentLoaded', () => {
            const timerElement = document.getElementById('auto-boost-timer');
            
            if(!timerElement) return;
            
            let timeInSeconds = 4 * 3600 - 18; // Started 18s ago
            
            function updateTime() {
                timeInSeconds--;
                if(timeInSeconds < 0) {
                    timeInSeconds = 4 * 3600; // Reset to 4 hours
                    // Implementasi riil: cek apakah toggle sedang aktif. Jika aktif, trigger API naikkan produk.
                }
                const h = Math.floor(timeInSeconds / 3600).toString().padStart(2, '0');
                const m = Math.floor((timeInSeconds % 3600) / 60).toString().padStart(2, '0');
                const s = (timeInSeconds % 60).toString().padStart(2, '0');
                timerElement.innerText = `${h}:${m}:${s}`;
            }

            setInterval(updateTime, 1000);
        });
    </script>
</x-layout.app>
