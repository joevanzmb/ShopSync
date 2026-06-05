<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otorisasi {{ ucfirst($platform == 'tiktok' ? 'TikTok Shop' : $platform) }} - ShopSync</title>
    <!-- Fonts & Tailwind -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] },
                    colors: { tosca: { 50: '#f0fdfa', 100: '#ccfbf1', 200: '#99f6e4', 300: '#5eead4', 400: '#2dd4bf', 500: '#14b8a6', 600: '#0d9488', 700: '#0f766e' } }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen flex flex-col text-slate-800 antialiased selection:bg-tosca-500 selection:text-white">

@php
    $platformName = match($platform) {
        'shopee' => 'Shopee',
        'tokopedia' => 'Tokopedia',
        'tiktok' => 'TikTok Shop',
        default => ucfirst($platform)
    };
    
    $logoPath = match($platform) {
        'shopee' => '/logo/shopee.png',
        'tokopedia' => '/logo/tokopedia.png',
        'tiktok' => '/logo/tiktokshop.png',
        default => '/logo/shopee.png'
    };
@endphp

    <!-- Back Link (Absolute Top Left) -->
    <div class="absolute top-6 left-6 sm:top-8 sm:left-10 z-10">
        <a href="{{ route('stores.connect') }}" class="inline-flex items-center text-sm font-bold text-slate-500 hover:text-tosca-600 transition-colors">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
            Kembali
        </a>
    </div>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col items-center justify-center py-12 px-4 sm:px-6 mt-10 sm:mt-0">
        
        <!-- Main Card -->
        <div class="w-full max-w-3xl bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden mb-8">
            
            <!-- Hero Section -->
            <div class="p-8 sm:p-10 border-b border-slate-100 text-center">
                <div class="flex items-center justify-center gap-8 sm:gap-12">
                    <!-- Platform Logo Block (Left) -->
                    <div class="flex items-center justify-center h-10 sm:h-12">
                        <img src="{{ $logoPath }}" class="h-full w-auto object-contain" alt="{{ $platformName }}">
                    </div>
                    
                    <!-- Animation Arrows -->
                    <div class="flex flex-col items-center">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10 text-tosca-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7h12m0 0l-4-4m4 4l-4 4M16 17H4m0 0l4 4m-4-4l4-4" /></svg>
                    </div>
                    
                    <!-- ShopSync Logo Block (Right) -->
                    <div class="flex items-center justify-center">
                        <span class="text-3xl sm:text-4xl font-extrabold tracking-tight text-slate-900">Shop<span class="text-tosca-500">Sync</span></span>
                    </div>
                </div>
            </div>
            
            <div class="p-6 sm:p-8 border-b border-slate-100">
                <h3 class="text-lg font-bold text-slate-900 mb-6 flex items-center">
                    <svg class="w-5 h-5 text-tosca-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Informasi Integrasi
                </h3>
                
                <div class="space-y-6">
                    <!-- Negara -->
                    <div class="flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4">
                        <span class="text-slate-500 font-medium whitespace-nowrap pt-1 w-48">Cakupan Wilayah</span>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 rounded-lg text-sm font-semibold text-tosca-700 bg-tosca-50 border border-tosca-100">Indonesia</span>
                            <span class="px-3 py-1.5 rounded-lg text-sm font-medium text-slate-600 bg-slate-50 border border-slate-200">Philippines</span>
                            <span class="px-3 py-1.5 rounded-lg text-sm font-medium text-slate-600 bg-slate-50 border border-slate-200">Thailand</span>
                            <span class="px-3 py-1.5 rounded-lg text-sm font-medium text-slate-600 bg-slate-50 border border-slate-200">Vietnam</span>
                            <span class="px-3 py-1.5 rounded-lg text-sm font-medium text-slate-600 bg-slate-50 border border-slate-200">Malaysia</span>
                            <span class="px-3 py-1.5 rounded-lg text-sm font-medium text-slate-600 bg-slate-50 border border-slate-200">Singapore</span>
                        </div>
                    </div>

                    <!-- Fitur -->
                    <div class="flex flex-col sm:flex-row sm:items-start gap-3 sm:gap-4">
                        <span class="text-slate-500 font-medium whitespace-nowrap pt-1 w-48">Akses yang Diberikan</span>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-y-3 gap-x-6">
                            <div class="flex items-center text-sm font-medium text-slate-700">
                                <svg class="w-4 h-4 text-emerald-500 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                Manajemen Produk
                            </div>
                            <div class="flex items-center text-sm font-medium text-slate-700">
                                <svg class="w-4 h-4 text-emerald-500 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                Sinkronisasi Stok
                            </div>
                            <div class="flex items-center text-sm font-medium text-slate-700">
                                <svg class="w-4 h-4 text-emerald-500 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                Proses Pesanan
                            </div>
                            <div class="flex items-center text-sm font-medium text-slate-700">
                                <svg class="w-4 h-4 text-emerald-500 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                Ekspedisi & Label
                            </div>
                            <div class="flex items-center text-sm font-medium text-slate-700">
                                <svg class="w-4 h-4 text-emerald-500 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                Manajemen Promosi
                            </div>
                            <div class="flex items-center text-sm font-medium text-slate-700">
                                <svg class="w-4 h-4 text-emerald-500 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                Balas Chat (CRM)
                            </div>
                            <div class="flex items-center text-sm font-medium text-slate-700">
                                <svg class="w-4 h-4 text-emerald-500 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                Laporan Keuangan
                            </div>
                            <div class="flex items-center text-sm font-medium text-slate-700">
                                <svg class="w-4 h-4 text-emerald-500 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                Manajemen Retur
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Instructions -->
            <div class="p-6 sm:p-8 bg-slate-50/50">
                <div class="bg-tosca-50/50 rounded-2xl p-5 sm:p-6 border border-tosca-100 relative overflow-hidden">
                    <div class="absolute -right-4 -bottom-4 p-4 opacity-10">
                        <svg class="w-32 h-32 text-tosca-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L1 21h22L12 2zm0 3.83L19.17 19H4.83L12 5.83zM11 16h2v2h-2v-2zm0-7h2v5h-2V9z"/></svg>
                    </div>
                    
                    <h4 class="font-bold text-tosca-800 mb-4 flex items-center relative z-10">
                        <svg class="w-5 h-5 mr-2 text-tosca-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                        Langkah Selanjutnya
                    </h4>
                    <ul class="space-y-3.5 text-slate-700 text-[14.5px] relative z-10 font-medium">
                        <li class="flex items-start">
                            <span class="flex-shrink-0 w-6 h-6 rounded-full bg-tosca-100 text-tosca-600 flex items-center justify-center text-xs font-bold mt-0 mr-3">1</span>
                            <span>Klik tombol <strong class="text-tosca-700">Otorisasi Sekarang</strong> di bawah untuk diarahkan ke halaman otorisasi {{ $platformName }}.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="flex-shrink-0 w-6 h-6 rounded-full bg-tosca-100 text-tosca-600 flex items-center justify-center text-xs font-bold mt-0 mr-3">2</span>
                            <span>Pilih <strong class="text-tosca-700">Akun Utama</strong> jika Anda memiliki hierarki toko (sub-account), atau gunakan akun reguler untuk toko tunggal.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="flex-shrink-0 w-6 h-6 rounded-full bg-tosca-100 text-tosca-600 flex items-center justify-center text-xs font-bold mt-0 mr-3">3</span>
                            <span>Berikan izin sinkronisasi. Sistem akan otomatis menarik data katalog dan stok ke dalam dashboard ShopSync Anda.</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="p-6 bg-white border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-sm text-slate-500 font-medium flex items-center">
                    <svg class="w-4 h-4 mr-1.5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    Data toko Anda dienkripsi secara aman.
                </p>
                <a href="{{ $platform == 'shopee' ? route('stores.shopee.authorize') : route('stores.index') }}" class="w-full sm:w-auto bg-tosca-500 hover:bg-tosca-600 text-white px-8 py-3.5 rounded-xl text-sm font-extrabold shadow-[0_6px_18px_-4px_rgba(20,184,166,0.4)] hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center">
                    Otorisasi Sekarang
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </div>
        
    </main>

</body>
</html>
