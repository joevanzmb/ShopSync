<x-layout.app>
    <div class="max-w-6xl mx-auto mt-6">
        
        <!-- Back Link -->
        <div class="mb-6">
            <a href="{{ route('stores.index') }}" class="inline-flex items-center text-sm font-bold text-slate-500 hover:text-tosca-600 transition-colors">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                Kembali
            </a>
        </div>

        <!-- Info Banner -->
        <div class="bg-tosca-50 border border-tosca-200 rounded-lg px-4 py-3 mb-8 flex items-start sm:items-center gap-3">
            <svg class="w-5 h-5 min-w-[20px] text-tosca-500 mt-0.5 sm:mt-0" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
            </svg>
            <p class="text-[14px] text-slate-700 leading-snug">
                Mohon pilih toko atau akun channel/marketplace yang ingin diotorisasi. Setelah diotorisasi, Anda dapat mengelola produk, pesanan, gudang, dan stok di ShopSync.
            </p>
        </div>

        <!-- Marketplace Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <!-- Shopee -->
            <a href="{{ route('stores.authorize', 'shopee') }}" class="bg-white rounded-3xl shadow-sm border border-slate-100 p-8 flex flex-col items-center text-center hover:shadow-md hover:border-tosca-300 hover:-translate-y-1 transition-all duration-300 group">
                <img src="/logo/kotakshopee.png" class="w-20 h-20 object-contain mb-5 group-hover:scale-105 transition-transform duration-300" alt="Shopee">
                <h3 class="font-extrabold text-slate-900 text-lg">Shopee</h3>
                <p class="text-xs font-medium text-slate-400 mt-1">Otorisasi Akun Shopee</p>
            </a>

            <!-- Tokopedia -->
            <a href="{{ route('stores.authorize', 'tokopedia') }}" class="bg-white rounded-3xl shadow-sm border border-slate-100 p-8 flex flex-col items-center text-center hover:shadow-md hover:border-tosca-300 hover:-translate-y-1 transition-all duration-300 group">
                <img src="/logo/kotaktokped.png" class="w-20 h-20 object-contain mb-5 group-hover:scale-105 transition-transform duration-300" alt="Tokopedia">
                <h3 class="font-extrabold text-slate-900 text-lg">Tokopedia</h3>
                <p class="text-xs font-medium text-slate-400 mt-1">Otorisasi Akun Tokopedia</p>
            </a>

            <!-- TikTok Shop -->
            <a href="{{ route('stores.authorize', 'tiktok') }}" class="bg-white rounded-3xl shadow-sm border border-slate-100 p-8 flex flex-col items-center text-center hover:shadow-md hover:border-tosca-300 hover:-translate-y-1 transition-all duration-300 group">
                <img src="/logo/kotaktiktokshop.png" class="w-20 h-20 object-contain mb-5 group-hover:scale-105 transition-transform duration-300" alt="TikTok Shop">
                <h3 class="font-extrabold text-slate-900 text-lg">TikTok Shop</h3>
                <p class="text-xs font-medium text-slate-400 mt-1">Otorisasi Akun TikTok Shop</p>
            </a>
        </div>
        
    </div>
</x-layout.app>
