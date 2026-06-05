import re

with open('resources/views/settings/index.blade.php', 'r') as f:
    content = f.read()

# I will replace the entire file content instead of using regex because it's a complete structural change.
new_content = """<x-layout.app>
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Pengaturan Akun</h1>
        <p class="text-slate-500 mt-2 font-medium">Kelola informasi profil dan preferensi sistem Anda.</p>
    </div>

    <!-- Main Content Area -->
    <div class="max-w-5xl mx-auto space-y-8">
        
        <!-- Profile Card -->
        <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
            <h3 class="text-xl font-bold text-slate-900 mb-6 flex items-center">
                <svg class="w-6 h-6 mr-2 text-tosca-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Profil Saya
            </h3>
            
            <div class="flex items-center mb-8">
                <div class="relative">
                    <img class="h-24 w-24 rounded-2xl object-cover shadow-sm border border-slate-200" src="https://ui-avatars.com/api/?name=Juragan+Shopee&background=14b8a6&color=fff" alt="User">
                    <button class="absolute -bottom-2 -right-2 bg-white p-2 rounded-xl shadow-sm border border-slate-200 text-slate-600 hover:text-tosca-500 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </button>
                </div>
                <div class="ml-6">
                    <h2 class="text-xl font-bold text-slate-900">{{ $user['name'] ?? 'Juragan Shopee' }}</h2>
                    <div class="mt-2 flex items-center">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-tosca-50 text-tosca-700 border border-tosca-100">
                            Paket {{ $user['plan'] ?? 'Premium' }}
                        </span>
                        <a href="#" class="ml-3 text-sm font-bold text-slate-500 hover:text-tosca-500 transition-colors">Upgrade Paket</a>
                    </div>
                </div>
            </div>

            <form class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap</label>
                        <input type="text" class="w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm focus:ring-2 focus:ring-tosca-500 focus:border-transparent font-medium" value="{{ $user['name'] ?? 'Juragan Shopee' }}">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Alamat Email</label>
                        <input type="email" class="w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm focus:ring-2 focus:ring-tosca-500 focus:border-transparent font-medium text-slate-500" value="{{ $user['email'] ?? 'admin@juraganshopee.id' }}" disabled>
                        <p class="text-xs text-slate-400 font-medium mt-1">Email digunakan untuk login dan tidak dapat diubah.</p>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nomor Telepon</label>
                        <input type="text" class="w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm focus:ring-2 focus:ring-tosca-500 focus:border-transparent font-medium" value="{{ $user['phone'] ?? '+62 812-3456-7890' }}">
                    </div>
                </div>
                
                <div class="pt-4 flex justify-end">
                    <button type="button" class="px-6 py-3 bg-tosca-500 text-white font-bold rounded-xl shadow-sm hover:bg-tosca-600 transition-all transform hover:-translate-y-0.5">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        <!-- Notifikasi -->
        <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
            <h3 class="text-xl font-bold text-slate-900 mb-6 flex items-center">
                <svg class="w-6 h-6 mr-2 text-tosca-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                Preferensi Notifikasi
            </h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-4 border border-slate-100 rounded-2xl">
                    <div>
                        <p class="font-bold text-slate-900">Notifikasi Pesanan Baru</p>
                        <p class="text-sm text-slate-500">Kirim email setiap ada pesanan baru dari marketplace.</p>
                    </div>
                    <div x-data="{ enabled: true }">
                        <button @click="enabled = !enabled" :class="enabled ? 'bg-tosca-500' : 'bg-slate-200'" class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors focus:outline-none">
                            <span :class="enabled ? 'translate-x-6' : 'translate-x-1'" class="inline-block h-4 w-4 transform rounded-full bg-white transition shadow-sm"></span>
                        </button>
                    </div>
                </div>
                <div class="flex items-center justify-between p-4 border border-slate-100 rounded-2xl">
                    <div>
                        <p class="font-bold text-slate-900">Laporan Mingguan</p>
                        <p class="text-sm text-slate-500">Terima ringkasan performa penjualan setiap hari Senin.</p>
                    </div>
                    <div x-data="{ enabled: false }">
                        <button @click="enabled = !enabled" :class="enabled ? 'bg-tosca-500' : 'bg-slate-200'" class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors focus:outline-none">
                            <span :class="enabled ? 'translate-x-6' : 'translate-x-1'" class="inline-block h-4 w-4 transform rounded-full bg-white transition shadow-sm"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Keamanan -->
        <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
            <h3 class="text-xl font-bold text-slate-900 mb-6 flex items-center">
                <svg class="w-6 h-6 mr-2 text-tosca-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                Keamanan Akun
            </h3>
            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Password Saat Ini</label>
                    <input type="password" class="w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm focus:ring-2 focus:ring-tosca-500 focus:border-transparent" placeholder="••••••••">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Password Baru</label>
                        <input type="password" class="w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm focus:ring-2 focus:ring-tosca-500 focus:border-transparent" placeholder="••••••••">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Konfirmasi Password</label>
                        <input type="password" class="w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm focus:ring-2 focus:ring-tosca-500 focus:border-transparent" placeholder="••••••••">
                    </div>
                </div>
                <div class="pt-2 flex justify-end">
                    <button type="button" class="px-6 py-2.5 bg-slate-900 text-white font-bold rounded-xl shadow-sm hover:bg-slate-800 transition-colors">Perbarui Password</button>
                </div>
            </form>
        </div>

        <!-- Berlangganan & Tagihan -->
        <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-slate-900 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-tosca-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                    Berlangganan & Tagihan
                </h3>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-extrabold bg-tosca-50 text-tosca-700 border border-tosca-200">Aktif</span>
            </div>
            
            <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 mb-6">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm font-medium text-slate-500 mb-1">Paket Saat Ini</p>
                        <p class="text-2xl font-extrabold text-slate-900">{{ $user['plan'] ?? 'Premium' }} <span class="text-sm text-slate-500 font-medium">/ bulan</span></p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-medium text-slate-500 mb-1">Tagihan Berikutnya</p>
                        <p class="font-bold text-slate-900">12 Juni 2026</p>
                    </div>
                </div>
            </div>
            
            <div class="flex flex-col sm:flex-row gap-3">
                <button class="flex-1 py-3 border border-slate-200 text-slate-700 font-bold rounded-xl hover:bg-slate-50 transition-colors">Lihat Riwayat Tagihan</button>
                <button class="flex-1 py-3 bg-tosca-500 text-white font-bold rounded-xl shadow-sm hover:bg-tosca-600 transition-all hover:-translate-y-0.5">Kelola Berlangganan</button>
            </div>
        </div>

        <!-- Danger Zone -->
        <div class="bg-red-50/50 rounded-3xl p-8 border border-red-100">
            <h3 class="text-lg font-bold text-red-600 mb-2">Hapus Akun</h3>
            <p class="text-sm font-medium text-slate-600 mb-6">Sekali Anda menghapus akun, semua data toko, produk, dan laporan keuangan akan hilang secara permanen. Tindakan ini tidak dapat dibatalkan.</p>
            <button class="px-6 py-2.5 bg-white border border-red-200 text-red-600 font-bold rounded-xl shadow-sm hover:bg-red-50 hover:border-red-300 transition-all duration-300">
                Hapus Akun Permanen
            </button>
        </div>

    </div>
</x-layout.app>
"""

with open('resources/views/settings/index.blade.php', 'w') as f:
    f.write(new_content)

print("Done")
