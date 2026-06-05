@php
    $tab = request()->query('tab', 'profile');
@endphp
<x-layout.app>


    <!-- Main Content Area -->
    <div class="space-y-8 w-full">
        
        @if($tab == 'profile')
        <!-- Profile Settings -->
        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="px-8 py-6 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                <h3 class="text-xl font-bold text-slate-900 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-tosca-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Informasi Profil
                </h3>
            </div>
            
            <div class="p-8">
                <div class="flex items-center mb-8 pb-8 border-b border-slate-100">
                    <div class="relative group">
                        <img class="h-24 w-24 rounded-2xl object-cover shadow-sm border border-slate-200" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'User') }}&background=14b8a6&color=fff" alt="User">
                        <button type="button" class="absolute inset-0 bg-black/40 hidden group-hover:flex items-center justify-center rounded-2xl transition-all">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path></svg>
                        </button>
                    </div>
                    <div class="ml-6">
                        <h4 class="text-base font-bold text-slate-900 mb-1">Foto Profil</h4>
                        <p class="text-sm text-slate-500 mb-3">Format JPG, GIF atau PNG. Ukuran maksimal 2MB.</p>
                        <div class="flex gap-2">
                            <button type="button" class="px-4 py-2 bg-white border border-slate-200 text-slate-700 font-bold text-sm rounded-xl hover:bg-slate-50 transition-colors">Ubah Foto</button>
                            <button type="button" class="px-4 py-2 bg-red-50 text-red-600 font-bold text-sm rounded-xl hover:bg-red-100 transition-colors">Hapus</button>
                        </div>
                    </div>
                </div>

                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap</label>
                            <input type="text" class="w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm focus:ring-2 focus:ring-tosca-500 focus:border-transparent font-medium" value="{{ Auth::user()->name }}">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Alamat Email</label>
                            <input type="email" class="w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm bg-slate-50 text-slate-500 font-medium" value="{{ Auth::user()->email }}" disabled>
                            <p class="text-[11px] font-bold text-slate-400 mt-1.5">*Email digunakan untuk login dan tidak dapat diubah.</p>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Nomor Telepon</label>
                            <input type="text" class="w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm focus:ring-2 focus:ring-tosca-500 focus:border-transparent font-medium" value="{{ Auth::user()->phone ?? '+62 812-3456-7890' }}">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Peran / Jabatan</label>
                            <input type="text" class="w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm bg-slate-50 text-slate-700 font-bold" value="{{ ucfirst(Auth::user()->role) }}" disabled>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Nama Toko Utama</label>
                            <input type="text" class="w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm focus:ring-2 focus:ring-tosca-500 focus:border-transparent font-medium" value="{{ Auth::user()->store_name ?? 'ShopSync Store' }}">
                        </div>
                    </div>

                    <h4 class="text-base font-bold text-slate-900 pt-4 border-t border-slate-100 mb-4 mt-6">Preferensi Regional</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Zona Waktu</label>
                            <select class="w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm focus:ring-2 focus:ring-tosca-500 focus:border-transparent font-medium text-slate-700">
                                <option value="Asia/Jakarta">(GMT+07:00) Waktu Indonesia Barat</option>
                                <option value="Asia/Makassar">(GMT+08:00) Waktu Indonesia Tengah</option>
                                <option value="Asia/Jayapura">(GMT+09:00) Waktu Indonesia Timur</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Bahasa Sistem</label>
                            <select class="w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm focus:ring-2 focus:ring-tosca-500 focus:border-transparent font-medium text-slate-700">
                                <option value="id">Bahasa Indonesia</option>
                                <option value="en">English (US)</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="pt-6 flex justify-end">
                        <button type="button" class="px-6 py-3 bg-tosca-500 text-white font-extrabold rounded-xl shadow-sm hover:bg-tosca-600 transition-all hover:-translate-y-0.5">
                            Simpan Perubahan Profil
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Danger Zone -->
        <div class="bg-red-50/50 rounded-3xl p-8 border border-red-100 mt-8">
            <div class="flex items-start justify-between">
                <div>
                    <h3 class="text-lg font-bold text-red-600 mb-2">Hapus Akun ShopSync</h3>
                    <p class="text-sm font-medium text-slate-600 max-w-xl">Sekali Anda menghapus akun, semua integrasi toko, data pesanan, inventaris, dan riwayat pelanggan akan terhapus secara permanen. Tindakan ini tidak dapat dibatalkan.</p>
                </div>
                <button type="button" class="px-6 py-2.5 bg-white border border-red-200 text-red-600 font-bold rounded-xl shadow-sm hover:bg-red-600 hover:text-white hover:border-red-600 transition-all duration-300 whitespace-nowrap">
                    Hapus Akun Permanen
                </button>
            </div>
        </div>
        @endif

        @if($tab == 'notifications')
        <!-- Notifikasi -->
        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="px-8 py-6 border-b border-slate-100 bg-slate-50/50">
                <h3 class="text-xl font-bold text-slate-900 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-tosca-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    Pengaturan Notifikasi
                </h3>
            </div>
            
            <div class="divide-y divide-slate-100">
                <!-- Kategori 1 -->
                <div class="p-8">
                    <h4 class="text-sm font-extrabold text-slate-900 uppercase tracking-wider mb-4">Pesanan & Inventaris</h4>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-bold text-slate-900">Pesanan Baru Masuk</p>
                                <p class="text-sm text-slate-500">Terima notifikasi email instan saat ada pesanan masuk dari marketplace manapun.</p>
                            </div>
                            <div x-data="{ enabled: true }">
                                <button @click="enabled = !enabled" :class="enabled ? 'bg-tosca-500' : 'bg-slate-200'" class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors focus:outline-none">
                                    <span :class="enabled ? 'translate-x-6' : 'translate-x-1'" class="inline-block h-4 w-4 transform rounded-full bg-white transition shadow-sm"></span>
                                </button>
                            </div>
                        </div>
                        <div class="flex items-center justify-between pt-4 border-t border-slate-50">
                            <div>
                                <p class="font-bold text-slate-900">Peringatan Stok Menipis</p>
                                <p class="text-sm text-slate-500">Beri tahu saya jika ada produk yang stoknya tersisa di bawah batas aman (< 5 item).</p>
                            </div>
                            <div x-data="{ enabled: true }">
                                <button @click="enabled = !enabled" :class="enabled ? 'bg-tosca-500' : 'bg-slate-200'" class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors focus:outline-none">
                                    <span :class="enabled ? 'translate-x-6' : 'translate-x-1'" class="inline-block h-4 w-4 transform rounded-full bg-white transition shadow-sm"></span>
                                </button>
                            </div>
                        </div>
                        <div class="flex items-center justify-between pt-4 border-t border-slate-50">
                            <div>
                                <p class="font-bold text-slate-900">Retur & Pembatalan</p>
                                <p class="text-sm text-slate-500">Dapatkan peringatan segera ketika pelanggan membatalkan pesanan atau mengajukan retur.</p>
                            </div>
                            <div x-data="{ enabled: true }">
                                <button @click="enabled = !enabled" :class="enabled ? 'bg-tosca-500' : 'bg-slate-200'" class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors focus:outline-none">
                                    <span :class="enabled ? 'translate-x-6' : 'translate-x-1'" class="inline-block h-4 w-4 transform rounded-full bg-white transition shadow-sm"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kategori 2 -->
                <div class="p-8">
                    <h4 class="text-sm font-extrabold text-slate-900 uppercase tracking-wider mb-4">Sistem & Laporan</h4>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-bold text-slate-900">Kendala Sinkronisasi Toko</p>
                                <p class="text-sm text-slate-500">Peringatan darurat jika integrasi Shopee, Tokopedia, atau TikTok Shop terputus (API error).</p>
                            </div>
                            <div x-data="{ enabled: true }">
                                <button @click="enabled = !enabled" :class="enabled ? 'bg-tosca-500' : 'bg-slate-200'" class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors focus:outline-none">
                                    <span :class="enabled ? 'translate-x-6' : 'translate-x-1'" class="inline-block h-4 w-4 transform rounded-full bg-white transition shadow-sm"></span>
                                </button>
                            </div>
                        </div>
                        <div class="flex items-center justify-between pt-4 border-t border-slate-50">
                            <div>
                                <p class="font-bold text-slate-900">Ringkasan Laporan Harian</p>
                                <p class="text-sm text-slate-500">Kirim rekapitulasi omzet dan profit harian setiap pukul 20:00 WIB.</p>
                            </div>
                            <div x-data="{ enabled: false }">
                                <button @click="enabled = !enabled" :class="enabled ? 'bg-tosca-500' : 'bg-slate-200'" class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors focus:outline-none">
                                    <span :class="enabled ? 'translate-x-6' : 'translate-x-1'" class="inline-block h-4 w-4 transform rounded-full bg-white transition shadow-sm"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-6 bg-slate-50 flex justify-end border-t border-slate-100">
                <button type="button" class="px-6 py-2.5 bg-tosca-500 text-white font-bold rounded-xl shadow-sm hover:bg-tosca-600 transition-all hover:-translate-y-0.5">
                    Simpan Preferensi
                </button>
            </div>
        </div>
        @endif

        @if($tab == 'security')
        <!-- Keamanan -->
        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="px-8 py-6 border-b border-slate-100 bg-slate-50/50">
                <h3 class="text-xl font-bold text-slate-900 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-tosca-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    Keamanan Akun
                </h3>
            </div>
            
            <div class="p-8 border-b border-slate-100">
                <h4 class="text-base font-extrabold text-slate-900 mb-4">Ubah Kata Sandi</h4>
                <form class="space-y-5">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Password Saat Ini</label>
                        <input type="password" class="w-full md:w-2/3 px-4 py-3 border border-slate-200 rounded-xl shadow-sm focus:ring-2 focus:ring-tosca-500 focus:border-transparent font-medium" placeholder="Masukkan password Anda saat ini">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:w-2/3">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Password Baru</label>
                            <input type="password" class="w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm focus:ring-2 focus:ring-tosca-500 focus:border-transparent font-medium" placeholder="Min. 8 karakter">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Konfirmasi Password Baru</label>
                            <input type="password" class="w-full px-4 py-3 border border-slate-200 rounded-xl shadow-sm focus:ring-2 focus:ring-tosca-500 focus:border-transparent font-medium" placeholder="Ulangi password baru">
                        </div>
                    </div>
                    <div class="pt-2">
                        <button type="button" class="px-6 py-2.5 bg-slate-900 text-white font-bold rounded-xl shadow-sm hover:bg-slate-800 transition-colors">Perbarui Password</button>
                    </div>
                </form>
            </div>

            <!-- 2FA Setup -->
            <div class="p-8 border-b border-slate-100">
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <div class="max-w-xl">
                        <h4 class="text-base font-extrabold text-slate-900 mb-1 flex items-center">
                            Autentikasi Dua Langkah (2FA)
                            <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded text-[10px] font-extrabold bg-slate-100 text-slate-600 border border-slate-200 uppercase">Belum Aktif</span>
                        </h4>
                        <p class="text-sm text-slate-500">Tingkatkan keamanan akun Anda dengan mewajibkan kode verifikasi dari aplikasi authenticator (Google Authenticator / Authy) setiap kali login.</p>
                    </div>
                    <button class="px-5 py-2.5 bg-tosca-50 hover:bg-tosca-100 text-tosca-700 border border-tosca-200 font-bold rounded-xl transition-colors whitespace-nowrap">
                        Aktifkan 2FA
                    </button>
                </div>
            </div>

            <!-- Device History -->
            <div class="p-8">
                <div class="flex items-center justify-between mb-6">
                    <h4 class="text-base font-extrabold text-slate-900">Perangkat Aktif (Sesi)</h4>
                    <button class="text-sm font-bold text-red-600 hover:text-red-700 transition-colors">Keluarkan semua perangkat</button>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center p-4 border border-tosca-100 bg-tosca-50/30 rounded-2xl">
                        <div class="p-3 bg-white rounded-xl shadow-sm border border-slate-100 text-tosca-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div class="ml-4 flex-1">
                            <p class="font-bold text-slate-900">MacBook Pro - Safari <span class="ml-2 text-[10px] font-extrabold text-tosca-600 bg-tosca-100 px-2 py-0.5 rounded-full">PERANGKAT INI</span></p>
                            <p class="text-xs text-slate-500 mt-0.5">Jakarta, Indonesia • IP: 114.125.10.22</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs font-bold text-slate-400">Aktif sekarang</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center p-4 border border-slate-100 rounded-2xl">
                        <div class="p-3 bg-slate-50 rounded-xl border border-slate-100 text-slate-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        </div>
                        <div class="ml-4 flex-1">
                            <p class="font-bold text-slate-900">iPhone 14 Pro - Chrome</p>
                            <p class="text-xs text-slate-500 mt-0.5">Surabaya, Indonesia • IP: 182.253.30.15</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs font-medium text-slate-400 mb-1">Terakhir aktif: Kemarin</p>
                            <button class="text-xs font-bold text-slate-600 hover:text-red-600 transition-colors">Log out</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($tab == 'billing')
        <!-- Berlangganan & Tagihan -->
        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="px-8 py-6 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center">
                <h3 class="text-xl font-bold text-slate-900 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-tosca-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                    Berlangganan & Tagihan
                </h3>
            </div>
            
            <div class="p-8 border-b border-slate-100">
                <div class="flex flex-col lg:flex-row gap-6">
                    <!-- Current Plan -->
                    <div class="flex-1 bg-gradient-to-br from-slate-900 to-slate-800 rounded-2xl p-6 text-white relative overflow-hidden">
                        <div class="absolute top-0 right-0 p-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-extrabold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 uppercase tracking-wide">Status: Aktif</span>
                        </div>
                        <p class="text-sm font-medium text-slate-400 mb-1">Paket Berlangganan Saat Ini</p>
                        <h4 class="text-3xl font-extrabold text-white mb-6">ShopSync {{ $user['plan'] ?? 'Premium' }}</h4>
                        
                        <div class="space-y-3 mb-8">
                            <div class="flex items-center text-sm text-slate-300">
                                <svg class="w-5 h-5 mr-3 text-tosca-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Unlimited integrasi toko (Shopee, Tokopedia, dll)
                            </div>
                            <div class="flex items-center text-sm text-slate-300">
                                <svg class="w-5 h-5 mr-3 text-tosca-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Sinkronisasi stok & harga real-time
                            </div>
                            <div class="flex items-center text-sm text-slate-300">
                                <svg class="w-5 h-5 mr-3 text-tosca-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Laporan analitik mendalam 3 tahun terakhir
                            </div>
                        </div>
                        
                        <button class="w-full py-3 bg-white text-slate-900 font-extrabold rounded-xl hover:bg-slate-50 transition-colors shadow-sm">
                            Tingkatkan Paket (Enterprise)
                        </button>
                    </div>

                    <!-- Next Billing Info -->
                    <div class="lg:w-1/3 flex flex-col gap-6">
                        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 flex-1">
                            <p class="text-sm font-medium text-slate-500 mb-1">Tagihan Berikutnya</p>
                            <p class="text-2xl font-extrabold text-slate-900 mb-1">12 Juni 2026</p>
                            <p class="text-sm font-bold text-slate-700 mb-4">Rp 299.000 <span class="text-slate-500 font-medium font-normal">/ bulan</span></p>
                            
                            <hr class="border-slate-200 mb-4">
                            
                            <p class="text-sm font-bold text-slate-900 mb-2">Metode Pembayaran</p>
                            <div class="flex items-center gap-3 bg-white p-3 rounded-xl border border-slate-200">
                                <div class="w-10 h-6 bg-slate-200 rounded flex items-center justify-center text-[10px] font-bold text-slate-600">BCA</div>
                                <div>
                                    <p class="text-xs font-bold text-slate-900">Bank Transfer (BCA)</p>
                                    <p class="text-[10px] text-slate-500">Auto-debit aktif</p>
                                </div>
                            </div>
                        </div>
                        <button class="w-full py-3 bg-tosca-50 text-tosca-700 font-extrabold border border-tosca-200 rounded-xl hover:bg-tosca-100 transition-colors text-sm">
                            Kelola Metode Pembayaran
                        </button>
                    </div>
                </div>
            </div>

            <!-- Billing History -->
            <div class="p-8">
                <h4 class="text-base font-extrabold text-slate-900 mb-4">Riwayat Tagihan (Invoice)</h4>
                <div class="overflow-hidden border border-slate-100 rounded-2xl">
                    <table class="min-w-full divide-y divide-slate-100">
                        <thead class="bg-slate-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Tanggal</th>
                                <th scope="col" class="px-6 py-3 text-left text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Deskripsi</th>
                                <th scope="col" class="px-6 py-3 text-left text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Jumlah</th>
                                <th scope="col" class="px-6 py-3 text-left text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-right text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-100">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-slate-900">12 Mei 2026</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 font-medium">ShopSync Premium - Bulanan</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-extrabold text-slate-900">Rp 299.000</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[11px] font-extrabold bg-emerald-100 text-emerald-700">LUNAS</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-bold">
                                    <a href="#" class="text-tosca-600 hover:text-tosca-700">Unduh PDF</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-slate-900">12 Apr 2026</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 font-medium">ShopSync Premium - Bulanan</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-extrabold text-slate-900">Rp 299.000</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[11px] font-extrabold bg-emerald-100 text-emerald-700">LUNAS</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-bold">
                                    <a href="#" class="text-tosca-600 hover:text-tosca-700">Unduh PDF</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-slate-900">12 Mar 2026</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 font-medium">ShopSync Premium - Bulanan</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-extrabold text-slate-900">Rp 299.000</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[11px] font-extrabold bg-emerald-100 text-emerald-700">LUNAS</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-bold">
                                    <a href="#" class="text-tosca-600 hover:text-tosca-700">Unduh PDF</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
        
    </div>
</x-layout.app>
