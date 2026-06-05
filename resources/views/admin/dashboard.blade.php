<x-layout.admin>
    <div class="mb-8">
        <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Dashboard Admin</h1>
        <p class="text-sm text-slate-500 mt-1 font-medium">Ringkasan performa sistem ShopSync hari ini.</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        
        <!-- Total Pengguna -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 relative overflow-hidden group hover:shadow-md transition-shadow">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-admin-50 rounded-full group-hover:scale-110 transition-transform duration-500"></div>
            <div class="relative z-10 flex items-start justify-between">
                <div>
                    <p class="text-sm font-bold text-slate-500 mb-1">Total Pengguna (Member)</p>
                    <h3 class="text-3xl font-extrabold text-slate-900">{{ number_format($totalUsers ?? 0) }}</h3>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-admin-100 text-admin-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
            </div>
            <div class="relative z-10 mt-4 flex items-center text-sm font-medium text-emerald-600">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                +12% minggu ini
            </div>
        </div>

        <!-- Pengguna Aktif -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 relative overflow-hidden group hover:shadow-md transition-shadow">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-emerald-50 rounded-full group-hover:scale-110 transition-transform duration-500"></div>
            <div class="relative z-10 flex items-start justify-between">
                <div>
                    <p class="text-sm font-bold text-slate-500 mb-1">Pengguna Aktif</p>
                    <h3 class="text-3xl font-extrabold text-slate-900">{{ number_format($activeUsers ?? 0) }}</h3>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            <div class="relative z-10 mt-4 flex items-center text-sm font-medium text-emerald-600">
                <span class="px-2 py-0.5 bg-emerald-50 text-emerald-600 rounded-lg text-xs mr-2 border border-emerald-100">Normal</span>
                Sistem berjalan lancar
            </div>
        </div>

        <!-- Total Paket Langganan -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 relative overflow-hidden group hover:shadow-md transition-shadow">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-amber-50 rounded-full group-hover:scale-110 transition-transform duration-500"></div>
            <div class="relative z-10 flex items-start justify-between">
                <div>
                    <p class="text-sm font-bold text-slate-500 mb-1">Langganan Aktif</p>
                    <h3 class="text-3xl font-extrabold text-slate-900">0</h3>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
            </div>
            <div class="relative z-10 mt-4 flex items-center text-sm font-medium text-slate-400">
                Data belum tersedia
            </div>
        </div>

    </div>

    <!-- Papan Pengumuman / Info -->
    <div class="bg-gradient-to-r from-admin-600 to-admin-800 rounded-3xl p-8 text-white shadow-lg relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-admin-400 opacity-20 rounded-full blur-2xl translate-y-1/2 -translate-x-1/4 pointer-events-none"></div>
        
        <div class="relative z-10 max-w-2xl">
            <h2 class="text-2xl font-extrabold mb-3">Selamat datang di Panel Admin!</h2>
            <p class="text-admin-100 text-lg leading-relaxed mb-6 font-medium text-balance">
                Ini adalah pusat kendali sistem ShopSync. Anda dapat mengelola akun pengguna, mengatur paket berlangganan, serta memantau kesehatan sistem secara keseluruhan dari sini.
            </p>
            <div class="flex gap-3">
                <a href="{{ route('admin.users.index') }}" class="inline-flex items-center justify-center px-5 py-2.5 bg-white text-admin-700 font-bold rounded-xl hover:bg-admin-50 transition-colors shadow-sm">
                    Kelola Pengguna
                </a>
                <a href="{{ route('admin.packages.index') }}" class="inline-flex items-center justify-center px-5 py-2.5 bg-admin-700 text-white font-bold rounded-xl hover:bg-admin-800 transition-colors border border-admin-500">
                    Atur Paket
                </a>
            </div>
        </div>
    </div>
</x-layout.admin>
