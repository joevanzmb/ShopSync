<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopSync by Sitezet</title>
    <link rel="icon" type="image/png" href="/shopsync.png">
    <meta name="description"
        content="Tingkatkan efisiensi bisnis online Anda dengan ShopSync. Kelola ribuan produk, pesanan, dan stok dari berbagai marketplace (Shopee, Tokopedia, TikTok Shop) dalam satu dasbor terpadu.">
    <meta name="keywords"
        content="omnichannel indonesia, kelola toko online, integrasi marketplace, aplikasi manajemen stok, shopee, tokopedia, tiktok shop">
    <meta name="author" content="ShopSync">
    <meta property="og:title" content="ShopSync - Kelola Banyak Toko Online dalam Satu Dasbor">
    <meta property="og:description"
        content="Platform Omnichannel terintegrasi untuk mengotomatisasi sinkronisasi stok, proses pesanan massal, dan laporan keuangan komprehensif.">
    <meta property="og:image" content="{{ asset('images/shopsync-logo.png') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="canonical" href="{{ url('/') }}">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "SoftwareApplication",
      "name": "ShopSync",
      "operatingSystem": "Web",
      "applicationCategory": "BusinessApplication",
      "offers": {
        "@@type": "Offer",
        "price": "79000",
        "priceCurrency": "IDR"
      },
      "description": "Platform Omnichannel terintegrasi untuk mengotomatisasi sinkronisasi stok, proses pesanan massal, dan laporan keuangan komprehensif dari berbagai marketplace."
    }
    </script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] },
                    colors: {
                        brand: {
                            50: '#f0fdfa',
                            100: '#ccfbf1',
                            400: '#2dd4bf',
                            500: '#14b8a6', // Main Brand Color
                            600: '#0d9488',
                            900: '#134e4a',
                        }
                    },
                    boxShadow: {
                        'soft': '0 4px 20px -2px rgba(0, 0, 0, 0.05)',
                        'glow': '0 0 20px rgba(20, 184, 166, 0.4)',
                    }
                }
            }
        }
    </script>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] {
            display: none !important;
        }

        .gradient-text {
            background: linear-gradient(135deg, #0d9488, #2dd4bf);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body
    class="font-sans text-slate-800 antialiased bg-slate-50 selection:bg-brand-500 selection:text-white flex flex-col min-h-screen">

    <!-- Navigation -->
    <header
        class="fixed w-full top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-200/50 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="{{ url('/') }}" class="flex items-center gap-2">
                    <span class="text-2xl font-black tracking-tight text-slate-900">Shop<span
                            class="text-brand-500">Sync</span></span>
                </a>

                <!-- Desktop Menu -->
                <nav class="hidden md:flex items-center gap-8">
                    <a href="#fitur"
                        class="text-sm font-semibold text-slate-600 hover:text-brand-600 transition-colors">Fitur
                        Unggulan</a>
                    <a href="#manfaat"
                        class="text-sm font-semibold text-slate-600 hover:text-brand-600 transition-colors">Manfaat</a>
                    <a href="#harga"
                        class="text-sm font-semibold text-slate-600 hover:text-brand-600 transition-colors">Paket &
                        Harga</a>
                    <a href="#faq"
                        class="text-sm font-semibold text-slate-600 hover:text-brand-600 transition-colors">FAQ</a>
                </nav>

                <div class="hidden md:flex items-center gap-4">
                    <a href="{{ route('login') }}"
                        class="text-sm font-bold text-slate-600 hover:text-brand-600 transition-colors">Masuk</a>
                    <a href="#harga"
                        class="px-6 py-2.5 bg-brand-500 hover:bg-brand-600 text-white text-sm font-bold rounded-xl shadow-md hover:shadow-glow transition-all transform hover:-translate-y-0.5">
                        Coba Sekarang
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button class="text-slate-600 hover:text-brand-600 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-grow">
        <!-- Hero Section -->
        <section class="relative pt-32 pb-24 lg:pt-44 lg:pb-36 bg-slate-50 overflow-hidden text-slate-800">
            <!-- Light Background Grid & Glows -->
            <div class="absolute inset-0 z-0">
                <div
                    class="absolute top-0 right-0 w-[600px] h-[600px] bg-brand-500/5 rounded-full filter blur-[120px] opacity-70">
                </div>
                <div
                    class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-emerald-500/5 rounded-full filter blur-[120px] opacity-50">
                </div>
                <div
                    class="absolute inset-0 bg-[linear-gradient(to_right,#e2e8f0_1px,transparent_1px),linear-gradient(to_bottom,#e2e8f0_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)] opacity-50">
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid lg:grid-cols-12 gap-12 lg:gap-8 items-center">

                    <!-- Left Column: Copy & CTAs -->
                    <div class="lg:col-span-6 text-left space-y-8">
                        <!-- Product update tag -->
                        <div
                            class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-brand-50 border border-brand-100 text-xs text-brand-700 font-medium">
                            <span
                                class="px-2 py-0.5 rounded-full bg-brand-500 text-white font-bold text-[10px]">NEW</span>
                            <span>Engine v2.0: Sinkronisasi stok kini <span class="text-brand-600 font-bold">3x lebih
                                    cepat</span></span>
                        </div>

                        <h1
                            class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight leading-[1.08] text-slate-900">
                            Kuasai Semua Toko <br>
                            <span
                                class="bg-gradient-to-r from-brand-600 via-teal-600 to-emerald-600 bg-clip-text text-transparent">Dalam
                                Satu Dasbor.</span>
                        </h1>

                        <p class="text-lg text-slate-600 max-w-2xl leading-relaxed">
                            Hubungkan Shopee, Tokopedia, dan TikTok Shop secara instan. Otomatisasi sinkronisasi stok,
                            proses cetak resi massal sekali klik, dan pantau laba-rugi tanpa resiko overselling.
                        </p>

                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
                            <a href="#harga"
                                class="px-8 py-4 bg-brand-500 hover:bg-brand-600 text-white text-base font-bold rounded-xl shadow-lg hover:shadow-glow transition-all transform hover:-translate-y-0.5 text-center flex items-center justify-center gap-2">
                                Coba Gratis 14 Hari
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                            <a href="#demo"
                                class="px-8 py-4 bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-base font-bold rounded-xl transition-all text-center flex items-center justify-center gap-2">
                                <svg class="w-5 h-5 text-brand-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Lihat Demo Cepat
                            </a>
                        </div>

                        <!-- Mini Social Proof -->
                        <div x-data="{ sellerCount: 0, trxCount: 0 }" x-init="
                                 setTimeout(() => {
                                     let sellerTarget = 2400;
                                     let trxTarget = 14;
                                     let sInterval = setInterval(() => {
                                         if(sellerCount < sellerTarget) {
                                             sellerCount += Math.ceil((sellerTarget - sellerCount) / 15) || 1;
                                         } else {
                                             sellerCount = sellerTarget;
                                             clearInterval(sInterval);
                                         }
                                     }, 25);
                                     let tInterval = setInterval(() => {
                                         if(trxCount < trxTarget) {
                                             trxCount += 1;
                                         } else {
                                             trxCount = trxTarget;
                                             clearInterval(tInterval);
                                         }
                                     }, 80);
                                 }, 500);
                             " class="pt-6 border-t border-slate-200 flex items-center gap-6">
                            <div class="flex -space-x-2">
                                <img class="w-9 h-9 rounded-full border-2 border-white object-cover"
                                    src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=80&q=80"
                                    alt="User">
                                <img class="w-9 h-9 rounded-full border-2 border-white object-cover"
                                    src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=80&q=80"
                                    alt="User">
                                <img class="w-9 h-9 rounded-full border-2 border-white object-cover"
                                    src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?w=80&q=80"
                                    alt="User">
                            </div>
                            <div>
                                <div class="text-sm font-bold text-slate-800">Dipercaya <span
                                        class="font-extrabold text-brand-600 transition-all duration-300"
                                        x-text="sellerCount.toLocaleString()">0</span>+ Seller Indonesia</div>
                                <div class="text-xs text-slate-500 font-medium">Memproses total transaksi senilai <span
                                        class="font-bold text-slate-800" x-text="trxCount">0</span> Miliar+ Rupiah</div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Omni-Dashboard -->
                    <div
                        class="lg:col-span-6 relative w-full flex justify-center lg:justify-end xl:justify-center mt-12 lg:mt-0">
                        <!-- Main Widget (Omni-Dashboard) -->
                        <div x-data="{ 
                            totalRevenue: 24500000,
                            totalOrders: 142,
                            shopeeRev: 12000000,
                            tokopediaRev: 8500000,
                            tiktokRev: 4000000,
                            syncing: false,
                            lastSync: 'Baru saja',
                            triggerSync() {
                                if(this.syncing) return;
                                this.syncing = true;
                                this.lastSync = 'Menyinkronkan...';
                                setTimeout(() => {
                                    let orders = Math.floor(Math.random() * 3) + 1;
                                    this.totalOrders += orders;
                                    this.shopeeRev += (orders * 150000);
                                    this.tiktokRev += (orders * 50000);
                                    this.totalRevenue = this.shopeeRev + this.tokopediaRev + this.tiktokRev;
                                    this.syncing = false;
                                    this.lastSync = 'Baru saja';
                                }, 1500);
                            }
                        }" x-init="setInterval(() => { if(!syncing) triggerSync() }, 6000)"
                            class="relative w-full max-w-[460px] bg-white/95 backdrop-blur-xl border border-slate-200/80 rounded-[2rem] shadow-[0_20px_50px_-12px_rgba(0,0,0,0.1)] flex flex-col overflow-hidden text-left transition-all duration-500 hover:shadow-[0_30px_60px_-15px_rgba(0,0,0,0.15)] z-20">

                            <!-- macOS Window Dots -->
                            <div class="px-6 pt-4 pb-1.5 flex items-center gap-1.5 bg-slate-50/50">
                                <span class="w-3 h-3 rounded-full bg-[#FF5F56] border border-[#E0443E]"></span>
                                <span class="w-3 h-3 rounded-full bg-[#FFBD2E] border border-[#DEA123]"></span>
                                <span class="w-3 h-3 rounded-full bg-[#27C93F] border border-[#1AAB29]"></span>
                            </div>

                            <!-- Dashboard Header -->
                            <div
                                class="px-6 pt-3 pb-5 border-b border-slate-100 bg-slate-50/50 flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-gradient-to-br from-brand-500 to-teal-600 flex items-center justify-center text-white shadow-md">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-bold text-slate-800">Omni-Dashboard</h4>
                                        <p class="text-[11px] text-slate-500 font-medium flex items-center gap-1.5">
                                            <span class="relative flex h-2 w-2">
                                                <span
                                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-brand-400 opacity-75"
                                                    x-show="syncing"></span>
                                                <span class="relative inline-flex rounded-full h-2 w-2"
                                                    :class="syncing ? 'bg-brand-500' : 'bg-emerald-500'"></span>
                                            </span>
                                            <span x-text="lastSync"></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="flex -space-x-2">
                                    <div class="w-8 h-8 rounded-full bg-[#EE4D2D] border-2 border-white flex items-center justify-center text-white text-[10px] font-bold shadow-sm z-30"
                                        title="Shopee Connected">S</div>
                                    <div class="w-8 h-8 rounded-full bg-[#03AC0E] border-2 border-white flex items-center justify-center text-white text-[10px] font-bold shadow-sm z-20"
                                        title="Tokopedia Connected">T</div>
                                    <div class="w-8 h-8 rounded-full bg-black border-2 border-white flex items-center justify-center text-white text-[10px] font-bold shadow-sm z-10"
                                        title="TikTok Shop Connected">tik</div>
                                </div>
                            </div>

                            <!-- Main Stats -->
                            <div class="p-6">
                                <div class="grid grid-cols-2 gap-4 mb-6">
                                    <!-- Total Revenue Widget -->
                                    <div
                                        class="bg-gradient-to-br from-slate-900 to-slate-800 rounded-2xl p-4 text-white relative overflow-hidden group">
                                        <div
                                            class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LCAyNTUsIDI1NSLCAwLjA1KSIvPjwvc3ZnPg==')] opacity-50">
                                        </div>
                                        <div class="relative z-10">
                                            <span
                                                class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block mb-1">Total
                                                Pendapatan</span>
                                            <div class="flex items-end gap-1">
                                                <span class="text-sm font-semibold text-slate-300">Rp</span>
                                                <span
                                                    class="text-xl font-black tabular-nums transition-all duration-500"
                                                    x-text="(totalRevenue/1000000).toFixed(1) + ' Jt'">24.5 Jt</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Total Orders Widget -->
                                    <div class="bg-brand-50 border border-brand-100 rounded-2xl p-4 text-brand-900">
                                        <span
                                            class="text-[10px] font-bold text-brand-600/80 uppercase tracking-wider block mb-1">Total
                                            Pesanan</span>
                                        <div class="flex items-baseline gap-1.5">
                                            <span class="text-2xl font-black tabular-nums"
                                                x-text="totalOrders">142</span>
                                            <span
                                                class="text-[10px] font-bold text-brand-700 bg-brand-200 px-1.5 py-0.5 rounded flex items-center gap-0.5">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="3" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                                </svg>
                                                12%
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Source Breakdown -->
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between mb-1">
                                        <span
                                            class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Sumber
                                            Penjualan Terhubung</span>
                                    </div>

                                    <!-- Shopee Bar -->
                                    <div class="space-y-1.5">
                                        <div class="flex justify-between text-xs font-bold">
                                            <span class="flex items-center gap-1.5 text-slate-700">
                                                <span class="w-2 h-2 rounded-full bg-[#EE4D2D]"></span> Shopee
                                            </span>
                                            <span class="text-slate-800 tabular-nums"
                                                x-text="'Rp ' + (shopeeRev/1000000).toFixed(1) + ' Jt'">Rp 12.0
                                                Jt</span>
                                        </div>
                                        <div class="w-full bg-slate-100 rounded-full h-1.5 overflow-hidden">
                                            <div class="bg-[#EE4D2D] h-1.5 rounded-full transition-all duration-1000"
                                                :style="`width: ${(shopeeRev/totalRevenue)*100}%`"></div>
                                        </div>
                                    </div>

                                    <!-- Tokopedia Bar -->
                                    <div class="space-y-1.5">
                                        <div class="flex justify-between text-xs font-bold">
                                            <span class="flex items-center gap-1.5 text-slate-700">
                                                <span class="w-2 h-2 rounded-full bg-[#03AC0E]"></span> Tokopedia
                                            </span>
                                            <span class="text-slate-800 tabular-nums"
                                                x-text="'Rp ' + (tokopediaRev/1000000).toFixed(1) + ' Jt'">Rp 8.5
                                                Jt</span>
                                        </div>
                                        <div class="w-full bg-slate-100 rounded-full h-1.5 overflow-hidden">
                                            <div class="bg-[#03AC0E] h-1.5 rounded-full transition-all duration-1000"
                                                :style="`width: ${(tokopediaRev/totalRevenue)*100}%`"></div>
                                        </div>
                                    </div>

                                    <!-- TikTok Bar -->
                                    <div class="space-y-1.5">
                                        <div class="flex justify-between text-xs font-bold">
                                            <span class="flex items-center gap-1.5 text-slate-700">
                                                <span class="w-2 h-2 rounded-full bg-black"></span> TikTok Shop
                                            </span>
                                            <span class="text-slate-800 tabular-nums"
                                                x-text="'Rp ' + (tiktokRev/1000000).toFixed(1) + ' Jt'">Rp 4.0 Jt</span>
                                        </div>
                                        <div class="w-full bg-slate-100 rounded-full h-1.5 overflow-hidden">
                                            <div class="bg-black h-1.5 rounded-full transition-all duration-1000"
                                                :style="`width: ${(tiktokRev/totalRevenue)*100}%`"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Trusted By / Integrations -->
                <div class="mt-20 pt-10 border-t border-slate-200/60 max-w-4xl mx-auto">
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-6 text-center">
                        Terintegrasi Secara Resmi Dengan Marketplace Terbesar:</p>
                    <div class="flex flex-wrap justify-center items-center gap-6 md:gap-8 lg:gap-10">

                        <!-- Shopee Badge -->
                        <div
                            class="flex items-center justify-center w-44 h-20 bg-white border border-slate-200/80 rounded-2xl shadow-sm hover:shadow-md hover:border-[#EE4D2D]/40 transition-all duration-300 group cursor-pointer">
                            <img src="{{ asset('logo/shopee.png') }}" alt="Shopee Logo"
                                class="h-10 w-auto object-contain transform group-hover:scale-110 transition-transform duration-300">
                        </div>

                        <!-- Tokopedia Badge -->
                        <div
                            class="flex items-center justify-center w-44 h-20 bg-white border border-slate-200/80 rounded-2xl shadow-sm hover:shadow-md hover:border-[#03AC0E]/40 transition-all duration-300 group cursor-pointer">
                            <img src="{{ asset('logo/tokopedia.png') }}" alt="Tokopedia Logo"
                                class="h-10 w-auto object-contain transform group-hover:scale-110 transition-transform duration-300">
                        </div>

                        <!-- TikTok Shop Badge -->
                        <div
                            class="flex items-center justify-center w-44 h-20 bg-white border border-slate-200/80 rounded-2xl shadow-sm hover:shadow-md hover:border-black/40 transition-all duration-300 group cursor-pointer">
                            <img src="{{ asset('logo/tiktokshop.png') }}" alt="TikTok Shop Logo"
                                class="h-16 w-auto object-contain transform group-hover:scale-110 transition-transform duration-300">
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- Pain Points / Manfaat Section -->
        <section id="manfaat"
            class="relative z-10 -mt-12 md:-mt-20 rounded-t-[2.5rem] md:rounded-t-[4rem] py-20 bg-white shadow-[0_-15px_30px_-15px_rgba(0,0,0,0.05)]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Masih Mengelola Toko Secara Manual?
                    </h2>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Problem 1 -->
                    <div class="bg-red-50/50 rounded-2xl p-8 border border-red-100 relative overflow-hidden">
                        <div class="w-12 h-12 bg-red-100 text-red-500 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Overselling & Kehabisan Stok</h3>
                        <p class="text-slate-600 mb-6">Stok di Shopee habis, tapi di Tokopedia masih ada yang beli?
                            Reputasi toko turun karena sering menolak pesanan.</p>
                        <div class="border-t border-red-100 pt-4 mt-auto">
                            <p class="text-sm font-bold text-brand-600 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                ShopSync: Auto-sync stok real-time
                            </p>
                        </div>
                    </div>

                    <!-- Problem 2 -->
                    <div class="bg-orange-50/50 rounded-2xl p-8 border border-orange-100">
                        <div
                            class="w-12 h-12 bg-orange-100 text-orange-500 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Waktu Habis Proses Resi</h3>
                        <p class="text-slate-600 mb-6">Membuka tiap tab marketplace satu per satu hanya untuk cetak resi
                            dan atur pengiriman sangat tidak efisien.</p>
                        <div class="border-t border-orange-100 pt-4 mt-auto">
                            <p class="text-sm font-bold text-brand-600 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                ShopSync: Cetak massal 1-klik
                            </p>
                        </div>
                    </div>

                    <!-- Problem 3 -->
                    <div class="bg-blue-50/50 rounded-2xl p-8 border border-blue-100">
                        <div
                            class="w-12 h-12 bg-blue-100 text-blue-500 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">Laporan Keuangan Berantakan</h3>
                        <p class="text-slate-600 mb-6">Bingung menghitung margin keuntungan karena biaya admin tiap
                            marketplace berbeda-beda? Uang masuk jadi tidak jelas.</p>
                        <div class="border-t border-blue-100 pt-4 mt-auto">
                            <p class="text-sm font-bold text-brand-600 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                ShopSync: Analitik laba bersih akurat
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="fitur"
            class="relative z-20 -mt-12 md:-mt-20 rounded-t-[2.5rem] md:rounded-t-[4rem] py-24 bg-slate-50 shadow-[0_-15px_30px_-15px_rgba(0,0,0,0.05)]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-12">
                    <span class="text-brand-600 font-bold uppercase tracking-wider text-sm">Fitur Unggulan</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mt-3 mb-6">Sistem Otomasi yang Mengubah
                        Cara Anda Berbisnis</h2>
                    <p class="text-lg text-slate-600">ShopSync didesain spesifik untuk memecahkan masalah operasional
                        yang sering dialami oleh seller online di Indonesia.</p>
                </div>

                <!-- Dashboard Mockup Showcase -->
                <div class="relative flex justify-center items-center w-full mb-32 mt-12 overflow-visible">
                    <div
                        class="absolute inset-0 bg-brand-500 rounded-full blur-[100px] opacity-15 max-w-[600px] aspect-square left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2 z-0">
                    </div>
                    <div
                        class="transform scale-[0.7] sm:scale-[0.85] md:scale-100 lg:scale-[1.1] xl:scale-[1.2] origin-top transition-all duration-700 relative z-10 w-full flex justify-center h-[350px] sm:h-[420px] md:h-[480px] lg:h-[530px] xl:h-[580px]">
                        <x-dashboard-mockup class="origin-top hover:scale-[1.02] transition-transform duration-500" />
                    </div>
                </div>

                <div class="space-y-24">
                    <!-- Feature 1: Inventory -->
                    <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
                        <div class="w-full lg:w-1/2">
                            <div
                                class="relative rounded-3xl overflow-hidden shadow-2xl border border-slate-200 bg-white p-2">
                                <div
                                    class="bg-slate-100 rounded-2xl aspect-[4/3] flex items-center justify-center border border-slate-200/60 relative overflow-hidden group">
                                    <!-- Mockup representation -->
                                    <div
                                        class="absolute inset-4 bg-white rounded-xl shadow-lg border border-slate-200 flex flex-col overflow-hidden">
                                        <div
                                            class="px-5 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50">
                                            <div class="font-bold text-slate-800 flex items-center gap-2">
                                                <svg class="w-5 h-5 text-brand-500" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                                                    </path>
                                                </svg>
                                                Sync Stok Master
                                            </div>
                                            <div
                                                class="px-2 py-1 bg-green-100 text-green-700 text-xs font-bold rounded flex items-center gap-1">
                                                <span
                                                    class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                                                Online
                                            </div>
                                        </div>
                                        <div class="p-5 space-y-4 bg-white flex-grow">
                                            <!-- Item 1 -->
                                            <div
                                                class="flex items-center justify-between p-4 border border-slate-100 rounded-xl hover:border-brand-300 transition-colors shadow-sm relative overflow-hidden group">
                                                <div class="absolute left-0 top-0 bottom-0 w-1 bg-brand-500"></div>
                                                <div class="flex gap-4 items-center">
                                                    <div
                                                        class="w-12 h-12 bg-slate-100 rounded-lg flex items-center justify-center border border-slate-200 overflow-hidden">
                                                        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=100&q=80"
                                                            class="w-full h-full object-cover">
                                                    </div>
                                                    <div>
                                                        <h4 class="text-sm font-bold text-slate-800">Sepatu Sneakers
                                                            Pria</h4>
                                                        <div class="flex gap-2 mt-1.5">
                                                            <span
                                                                class="px-1.5 py-0.5 bg-[#EE4D2D]/10 text-[#EE4D2D] text-[10px] font-bold rounded">Shopee</span>
                                                            <span
                                                                class="px-1.5 py-0.5 bg-[#03AC0E]/10 text-[#03AC0E] text-[10px] font-bold rounded">Tokopedia</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <div
                                                        class="text-2xl font-black text-brand-600 group-hover:scale-110 transition-transform origin-right">
                                                        145</div>
                                                    <div class="text-xs text-slate-500 font-medium">Stok Tersedia</div>
                                                </div>
                                            </div>

                                            <!-- Item 2 -->
                                            <div
                                                class="flex items-center justify-between p-4 border border-slate-100 rounded-xl hover:border-brand-300 transition-colors shadow-sm relative overflow-hidden group">
                                                <div
                                                    class="absolute left-0 top-0 bottom-0 w-1 bg-slate-300 group-hover:bg-brand-400 transition-colors">
                                                </div>
                                                <div class="flex gap-4 items-center">
                                                    <div
                                                        class="w-12 h-12 bg-slate-100 rounded-lg flex items-center justify-center border border-slate-200 overflow-hidden">
                                                        <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=100&q=80"
                                                            class="w-full h-full object-cover">
                                                    </div>
                                                    <div>
                                                        <h4 class="text-sm font-bold text-slate-800">Headphone Wireless
                                                        </h4>
                                                        <div class="flex gap-2 mt-1.5">
                                                            <span
                                                                class="px-1.5 py-0.5 bg-black/10 text-black text-[10px] font-bold rounded">TikTok</span>
                                                            <span
                                                                class="px-1.5 py-0.5 bg-[#03AC0E]/10 text-[#03AC0E] text-[10px] font-bold rounded">Tokopedia</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <div
                                                        class="text-2xl font-black text-slate-700 group-hover:scale-110 group-hover:text-brand-600 transition-all origin-right">
                                                        12</div>
                                                    <div class="text-xs text-red-500 font-medium">Stok Menipis!</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/2">
                            <div
                                class="inline-flex items-center justify-center p-2 bg-brand-50 rounded-xl text-brand-600 mb-6">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-3xl font-bold text-slate-900 mb-4">Manajemen Stok Terpusat (Real-Time)</h3>
                            <p class="text-lg text-slate-600 mb-6">Saat barang terjual di Shopee, stok di Tokopedia dan
                                TikTok akan otomatis berkurang dalam hitungan detik. Cegah komplain pelanggan karena
                                overselling.</p>
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-brand-500 mr-3 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-slate-700"><strong>Update Multi-Channel:</strong> Ubah jumlah stok
                                        satu kali, terupdate di semua platform.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-brand-500 mr-3 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-slate-700"><strong>Peringatan Stok Menipis:</strong> Notifikasi
                                        otomatis saat stok mendekati batas minimum.</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Feature 2: Orders -->
                    <div class="flex flex-col lg:flex-row-reverse items-center gap-12 lg:gap-20">
                        <div class="w-full lg:w-1/2">
                            <div
                                class="relative rounded-3xl overflow-hidden shadow-2xl border border-slate-200 bg-white p-2">
                                <div
                                    class="bg-slate-100 rounded-2xl aspect-[4/3] flex items-center justify-center border border-slate-200/60 relative overflow-hidden group">
                                    <!-- Mockup representation -->
                                    <div
                                        class="absolute inset-4 bg-white rounded-xl shadow-lg border border-slate-200 flex flex-col overflow-hidden">
                                        <div
                                            class="px-5 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50">
                                            <div class="font-bold text-slate-800 flex items-center gap-2">
                                                <svg class="w-5 h-5 text-brand-500" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z">
                                                    </path>
                                                </svg>
                                                Pesanan Baru
                                            </div>
                                            <button
                                                class="px-3 py-1.5 bg-brand-500 text-white text-xs font-bold rounded-lg shadow hover:bg-brand-600 transition-colors transform hover:-translate-y-0.5">
                                                Cetak Resi (12)
                                            </button>
                                        </div>
                                        <div class="p-0 bg-white flex-grow">
                                            <table class="w-full text-left text-sm text-slate-600">
                                                <thead
                                                    class="bg-slate-50 text-[10px] uppercase text-slate-500 border-b border-slate-100 font-bold tracking-wider">
                                                    <tr>
                                                        <th class="px-4 py-3 w-10"><input type="checkbox" checked
                                                                class="rounded border-slate-300 text-brand-600 focus:ring-brand-500">
                                                        </th>
                                                        <th class="px-4 py-3">ID Pesanan</th>
                                                        <th class="px-4 py-3">Marketplace</th>
                                                        <th class="px-4 py-3 text-right">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr
                                                        class="border-b border-slate-50 hover:bg-slate-50 transition-colors group">
                                                        <td class="px-4 py-3"><input type="checkbox" checked
                                                                class="rounded border-slate-300 text-brand-600 focus:ring-brand-500">
                                                        </td>
                                                        <td
                                                            class="px-4 py-3 font-bold text-slate-800 group-hover:text-brand-600 transition-colors">
                                                            INV/2026/05/...</td>
                                                        <td class="px-4 py-3"><span
                                                                class="px-2 py-1 bg-[#03AC0E]/10 text-[#03AC0E] text-[10px] font-bold rounded">Tokopedia</span>
                                                        </td>
                                                        <td class="px-4 py-3 text-right"><span
                                                                class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-[10px] font-bold whitespace-nowrap">Siap
                                                                Dikirim</span></td>
                                                    </tr>
                                                    <tr
                                                        class="border-b border-slate-50 hover:bg-slate-50 transition-colors group">
                                                        <td class="px-4 py-3"><input type="checkbox" checked
                                                                class="rounded border-slate-300 text-brand-600 focus:ring-brand-500">
                                                        </td>
                                                        <td
                                                            class="px-4 py-3 font-bold text-slate-800 group-hover:text-brand-600 transition-colors">
                                                            260524QWER...</td>
                                                        <td class="px-4 py-3"><span
                                                                class="px-2 py-1 bg-[#EE4D2D]/10 text-[#EE4D2D] text-[10px] font-bold rounded">Shopee</span>
                                                        </td>
                                                        <td class="px-4 py-3 text-right"><span
                                                                class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-[10px] font-bold whitespace-nowrap">Siap
                                                                Dikirim</span></td>
                                                    </tr>
                                                    <tr class="hover:bg-slate-50 transition-colors group">
                                                        <td class="px-4 py-3"><input type="checkbox" checked
                                                                class="rounded border-slate-300 text-brand-600 focus:ring-brand-500">
                                                        </td>
                                                        <td
                                                            class="px-4 py-3 font-bold text-slate-800 group-hover:text-brand-600 transition-colors">
                                                            TK20260524...</td>
                                                        <td class="px-4 py-3"><span
                                                                class="px-2 py-1 bg-black/10 text-black text-[10px] font-bold rounded">TikTok</span>
                                                        </td>
                                                        <td class="px-4 py-3 text-right"><span
                                                                class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-[10px] font-bold whitespace-nowrap">Siap
                                                                Dikirim</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/2">
                            <div
                                class="inline-flex items-center justify-center p-2 bg-brand-50 rounded-xl text-brand-600 mb-6">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                            </div>
                            <h3 class="text-3xl font-bold text-slate-900 mb-4">Proses Pesanan Lintas Platform</h3>
                            <p class="text-lg text-slate-600 mb-6">Tarik semua pesanan masuk dari berbagai toko ke dalam
                                satu layar. Proses pengiriman, terima pesanan, dan lacak status logistik tanpa harus
                                pindah-pindah tab browser.</p>
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-brand-500 mr-3 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-slate-700"><strong>Cetak Resi Massal:</strong> Print puluhan resi
                                        dari Shopee dan Tokopedia sekaligus.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-brand-500 mr-3 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-slate-700"><strong>Pickup Otomatis:</strong> Request kurir
                                        penjemputan (pickup) massal langsung dari dasbor.</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Feature 3: Analytics & Finance -->
                    <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
                        <div class="w-full lg:w-1/2">
                            <div
                                class="relative rounded-3xl overflow-hidden shadow-2xl border border-slate-200 bg-white p-2">
                                <div
                                    class="bg-slate-100 rounded-2xl aspect-[4/3] flex items-center justify-center border border-slate-200/60 relative overflow-hidden group">
                                    <div
                                        class="absolute inset-4 bg-white rounded-xl shadow-lg border border-slate-200 flex flex-col overflow-hidden p-5">
                                        <div class="flex justify-between items-end mb-6">
                                            <div>
                                                <h4
                                                    class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-1">
                                                    Laba Bersih Bulan Ini</h4>
                                                <div class="text-3xl font-black text-emerald-600">Rp 42.5<span
                                                        class="text-xl"> Jt</span></div>
                                            </div>
                                            <div
                                                class="px-2.5 py-1 bg-emerald-100 text-emerald-700 text-[11px] font-bold rounded-lg flex items-center gap-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="3" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                                                </svg>
                                                +18.5%
                                            </div>
                                        </div>
                                        <!-- Chart Mockup -->
                                        <div class="flex-grow flex items-end justify-between gap-2 pb-2">
                                            <div
                                                class="w-1/6 bg-emerald-100 hover:bg-emerald-200 rounded-t-sm transition-all h-[40%] relative group cursor-pointer">
                                                <div
                                                    class="absolute -top-7 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-[10px] px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity">
                                                    Rp12Jt</div>
                                            </div>
                                            <div
                                                class="w-1/6 bg-emerald-200 hover:bg-emerald-300 rounded-t-sm transition-all h-[55%] relative group cursor-pointer">
                                                <div
                                                    class="absolute -top-7 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-[10px] px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity">
                                                    Rp18Jt</div>
                                            </div>
                                            <div
                                                class="w-1/6 bg-emerald-300 hover:bg-emerald-400 rounded-t-sm transition-all h-[45%] relative group cursor-pointer">
                                                <div
                                                    class="absolute -top-7 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-[10px] px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity">
                                                    Rp15Jt</div>
                                            </div>
                                            <div
                                                class="w-1/6 bg-emerald-400 hover:bg-emerald-500 rounded-t-sm transition-all h-[70%] relative group cursor-pointer">
                                                <div
                                                    class="absolute -top-7 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-[10px] px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity">
                                                    Rp25Jt</div>
                                            </div>
                                            <div
                                                class="w-1/6 bg-emerald-500 hover:bg-emerald-600 rounded-t-sm transition-all h-[85%] relative group cursor-pointer shadow-[0_0_15px_rgba(16,185,129,0.4)]">
                                                <div
                                                    class="absolute -top-7 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-[10px] px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity z-10">
                                                    Rp35Jt</div>
                                            </div>
                                            <div
                                                class="w-1/6 bg-emerald-600 rounded-t-sm transition-all h-[100%] relative group cursor-pointer shadow-[0_0_20px_rgba(5,150,105,0.5)]">
                                                <div
                                                    class="absolute -top-7 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-[10px] px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity z-10">
                                                    Rp42Jt</div>
                                            </div>
                                        </div>
                                        <div class="flex justify-between mt-2 pt-2 border-t border-slate-100">
                                            <div class="text-[10px] text-slate-400 font-bold uppercase">Omset vs Biaya
                                                Iklan</div>
                                            <div
                                                class="text-[10px] text-brand-600 font-bold uppercase hover:underline cursor-pointer">
                                                Lihat Detail</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/2">
                            <div
                                class="inline-flex items-center justify-center p-2 bg-emerald-50 rounded-xl text-emerald-600 mb-6">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-3xl font-bold text-slate-900 mb-4">Laporan Laba Bersih & Analitik (Tanpa
                                Rekap Excel)</h3>
                            <p class="text-lg text-slate-600 mb-6">Tinggalkan cara lama merekap ROI iklan dan fee
                                marketplace secara manual. ShopSync <span class="font-bold text-slate-800">mengumpulkan
                                    dan menghitung otomatis</span> laba bersih Anda setelah dipotong biaya admin,
                                ongkir, dan pajak toko.</p>
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-emerald-500 mr-3 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-slate-700"><strong>Deteksi Fee Transparan:</strong> Tahu persis
                                        potongan per transaksi dari setiap marketplace.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-emerald-500 mr-3 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-slate-700"><strong>Dashboard Performa Terpusat:</strong> Pantau
                                        produk terlaris lintas channel dalam satu grafik mudah.</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Social Proof / Testimonials -->
        <section
            class="relative z-30 -mt-12 md:-mt-20 rounded-t-[2.5rem] md:rounded-t-[4rem] py-20 bg-brand-900 text-white overflow-hidden shadow-[0_-15px_30px_-15px_rgba(0,0,0,0.15)]">
            <div
                class="absolute inset-0 opacity-10 bg-[url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]">
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Dipercaya Ratusan Pebisnis Online</h2>
                    <p class="text-brand-100 text-lg">Bergabunglah dengan mereka yang telah mengotomatisasi bisnisnya.
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Testi 1 -->
                    <div class="bg-white/10 backdrop-blur-sm border border-white/20 p-8 rounded-2xl">
                        <div class="flex items-center mb-6">
                            <div class="flex text-yellow-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-brand-50 mb-6 italic">"Semenjak pakai ShopSync, admin saya nggak pernah salah
                            packing dan update stok lagi. Laporan keuangannya juga ngebantu banget buat hitung ROI
                            iklan."</p>
                        <div>
                            <p class="font-bold">Budi Santoso</p>
                            <p class="text-brand-300 text-sm">Owner Gudang Elektronik, 10k+ order/bln</p>
                        </div>
                    </div>

                    <!-- Testi 2 -->
                    <div class="bg-white/10 backdrop-blur-sm border border-white/20 p-8 rounded-2xl">
                        <div class="flex items-center mb-6">
                            <div class="flex text-yellow-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-brand-50 mb-6 italic">"Integrasi TikTok Shop-nya sangat mulus. Dulu capek
                            mindahin data manual, sekarang semuanya otomatis. Sangat efisien dan hemat waktu."</p>
                        <div>
                            <p class="font-bold">Siti Aisyah</p>
                            <p class="text-brand-300 text-sm">Founder HijabDaily</p>
                        </div>
                    </div>

                    <!-- Testi 3 -->
                    <div class="bg-white/10 backdrop-blur-sm border border-white/20 p-8 rounded-2xl">
                        <div class="flex items-center mb-6">
                            <div class="flex text-yellow-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <p class="text-brand-50 mb-6 italic">"Harga sangat affordable dibandingkan fitur yang didapat.
                            Customer service-nya juga cepat tanggap kalau ada kendala setting."</p>
                        <div>
                            <p class="font-bold">Rizal K.</p>
                            <p class="text-brand-300 text-sm">Manager Operasional Retail</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pricing Section -->
        <section id="harga"
            class="relative z-40 -mt-12 md:-mt-20 rounded-t-[2.5rem] md:rounded-t-[4rem] py-24 bg-white shadow-[0_-15px_30px_-15px_rgba(0,0,0,0.05)]"
            x-data="{ term: '1' }">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-brand-600 font-bold uppercase tracking-wider text-sm">Investasi Terbaik</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mt-3 mb-4">Pilih Paket Transparan Tanpa
                        Biaya Tersembunyi</h2>
                    <p class="text-lg text-slate-600">Skalakan bisnis Anda dengan harga yang terjangkau. Hemat hingga
                        30% dengan pembayaran tahunan.</p>

                    <!-- Toggle Durasi -->
                    <div
                        class="mt-10 inline-flex bg-slate-100 p-1.5 rounded-full shadow-inner overflow-x-auto max-w-full">
                        <button @click="term = '1'"
                            :class="term === '1' ? 'bg-white shadow-sm text-brand-600 font-bold' : 'text-slate-500 font-medium hover:text-slate-700'"
                            class="px-6 py-2.5 rounded-full text-sm transition-all whitespace-nowrap">
                            Bulanan
                        </button>
                        <button @click="term = '3'"
                            :class="term === '3' ? 'bg-white shadow-sm text-brand-600 font-bold' : 'text-slate-500 font-medium hover:text-slate-700'"
                            class="px-6 py-2.5 rounded-full text-sm transition-all relative whitespace-nowrap">
                            3 Bulan
                            <span
                                class="absolute -top-1 -right-1 bg-yellow-400 text-yellow-900 text-[10px] font-bold px-1.5 py-0.5 rounded-full shadow-sm">Hemat
                                20%</span>
                        </button>
                        <button @click="term = '6'"
                            :class="term === '6' ? 'bg-white shadow-sm text-brand-600 font-bold' : 'text-slate-500 font-medium hover:text-slate-700'"
                            class="px-6 py-2.5 rounded-full text-sm transition-all relative whitespace-nowrap">
                            6 Bulan
                            <span
                                class="absolute -top-1 -right-1 bg-yellow-400 text-yellow-900 text-[10px] font-bold px-1.5 py-0.5 rounded-full shadow-sm">Hemat
                                30%</span>
                        </button>
                        <button @click="term = '12'"
                            :class="term === '12' ? 'bg-brand-500 shadow-glow text-white font-bold' : 'text-slate-500 font-medium hover:text-slate-700'"
                            class="px-6 py-2.5 rounded-full text-sm transition-all relative whitespace-nowrap">
                            1 Tahun
                            <span
                                class="absolute -top-2 -right-2 bg-red-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm animate-pulse">BEST
                                VALUE</span>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto items-center">

                    <!-- Paket Basic -->
                    <div
                        class="bg-white rounded-3xl p-8 border border-slate-200 shadow-soft hover:shadow-lg transition-shadow">
                        <h3 class="text-2xl font-bold text-slate-900">Basic</h3>
                        <p class="text-slate-500 text-sm mt-2">Sempurna untuk bisnis yang baru mulai merambah berbagai
                            marketplace.</p>

                        <div class="my-8">
                            <!-- Dynamic Pricing Basic -->
                            <div x-show="term === '1'" x-cloak class="flex items-baseline"><span
                                    class="text-4xl font-black text-slate-900">Rp 79.000</span><span
                                    class="text-slate-500 ml-2">/ bulan</span></div>

                            <div x-show="term === '3'" x-cloak>
                                <span class="text-sm text-slate-400 line-through">Rp 237.000</span>
                                <div class="flex items-baseline"><span class="text-4xl font-black text-slate-900">Rp
                                        189.600</span><span class="text-slate-500 ml-2">/ 3 bulan</span></div>
                            </div>

                            <div x-show="term === '6'" x-cloak>
                                <span class="text-sm text-slate-400 line-through">Rp 474.000</span>
                                <div class="flex items-baseline"><span class="text-4xl font-black text-slate-900">Rp
                                        331.800</span><span class="text-slate-500 ml-2">/ 6 bulan</span></div>
                            </div>

                            <div x-show="term === '12'" x-cloak>
                                <span class="text-sm text-slate-400 line-through">Rp 948.000</span>
                                <div class="flex items-baseline"><span class="text-4xl font-black text-slate-900">Rp
                                        690.000</span><span class="text-slate-500 ml-2">/ tahun</span></div>
                            </div>
                        </div>

                        <a href="{{ route('login') }}"
                            class="block w-full py-3 px-4 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-center rounded-xl transition-colors">
                            Pilih Paket Basic
                        </a>

                        <ul class="mt-8 space-y-4">
                            <li class="flex items-start"><svg class="w-5 h-5 text-brand-500 mr-3 shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg><span class="text-sm text-slate-700">Integrasi hingga <strong>3
                                        Toko</strong></span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 text-brand-500 mr-3 shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg><span class="text-sm text-slate-700">Maksimal <strong>500 SKU</strong>
                                    Aktif</span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 text-brand-500 mr-3 shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg><span class="text-sm text-slate-700">Sinkronisasi Stok Otomatis</span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 text-brand-500 mr-3 shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg><span class="text-sm text-slate-700">Cetak Resi Massal</span></li>
                        </ul>
                    </div>

                    <!-- Paket Profesional -->
                    <div
                        class="bg-slate-900 rounded-3xl p-8 border border-slate-800 shadow-2xl relative transform md:-translate-y-4">
                        <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <span
                                class="bg-gradient-to-r from-brand-400 to-brand-600 text-white text-xs font-bold px-4 py-1.5 rounded-full tracking-wide shadow-glow whitespace-nowrap">Rekomendasi
                                Skala Menengah - Besar</span>
                        </div>

                        <h3 class="text-2xl font-bold text-white">Profesional</h3>
                        <p class="text-slate-400 text-sm mt-2">Fitur tanpa batas untuk volume penjualan tinggi.</p>

                        <div class="my-8">
                            <!-- Dynamic Pricing Pro -->
                            <div x-show="term === '1'" x-cloak class="flex items-baseline"><span
                                    class="text-4xl font-black text-white">Rp 99.000</span><span
                                    class="text-slate-400 ml-2">/ bulan</span></div>

                            <div x-show="term === '3'" x-cloak>
                                <span class="text-sm text-slate-500 line-through">Rp 297.000</span>
                                <div class="flex items-baseline"><span class="text-4xl font-black text-white">Rp
                                        237.600</span><span class="text-slate-400 ml-2">/ 3 bulan</span></div>
                            </div>

                            <div x-show="term === '6'" x-cloak>
                                <span class="text-sm text-slate-500 line-through">Rp 594.000</span>
                                <div class="flex items-baseline"><span class="text-4xl font-black text-white">Rp
                                        415.800</span><span class="text-slate-400 ml-2">/ 6 bulan</span></div>
                            </div>

                            <div x-show="term === '12'" x-cloak>
                                <span class="text-sm text-slate-500 line-through">Rp 1.188.000</span>
                                <div class="flex items-baseline"><span class="text-4xl font-black text-white">Rp
                                        890.000</span><span class="text-slate-400 ml-2">/ tahun</span></div>
                            </div>
                        </div>

                        <a href="{{ route('login') }}"
                            class="block w-full py-3.5 px-4 bg-brand-500 hover:bg-brand-400 text-white font-bold text-center rounded-xl transition-colors shadow-glow">
                            Pilih Paket Profesional
                        </a>

                        <ul class="mt-8 space-y-4">
                            <li class="flex items-start"><svg class="w-5 h-5 text-brand-400 mr-3 shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg><span class="text-sm text-slate-200">Integrasi Toko <strong
                                        class="text-brand-300">Tanpa Batas (Unlimited)</strong></span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 text-brand-400 mr-3 shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg><span class="text-sm text-slate-200">Kapasitas SKU <strong
                                        class="text-brand-300">Tanpa Batas</strong></span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 text-brand-400 mr-3 shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg><span class="text-sm text-slate-200">Semua Fitur Basic Termasuk</span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 text-brand-400 mr-3 shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg><span class="text-sm text-slate-200">Laporan Keuangan & Laba Rugi Penuh</span>
                            </li>
                            <li class="flex items-start"><svg class="w-5 h-5 text-brand-400 mr-3 shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg><span class="text-sm text-slate-200">Multi-User dengan Pembagian Akses
                                    (Admin/Staf)</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section id="faq"
            class="relative z-50 -mt-12 md:-mt-20 rounded-t-[2.5rem] md:rounded-t-[4rem] py-20 bg-slate-50 shadow-[0_-15px_30px_-15px_rgba(0,0,0,0.05)]"
            x-data="{ active: null }">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-slate-900 mb-4">Pertanyaan yang Sering Diajukan</h2>
                </div>

                <div class="space-y-4">
                    <!-- FAQ 1 -->
                    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
                        <button @click="active = active === 1 ? null : 1"
                            class="flex justify-between items-center w-full p-5 text-left focus:outline-none hover:bg-slate-50 transition-colors">
                            <span class="font-bold text-slate-800">Apakah ShopSync aman digunakan? Bagaimana dengan data
                                pelanggan saya?</span>
                            <svg class="w-5 h-5 text-slate-400 transform transition-transform"
                                :class="{'rotate-180': active === 1}" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="active === 1" x-collapse x-cloak class="px-5 pb-5 text-slate-600 leading-relaxed">
                            <strong>100% Aman.</strong> ShopSync menggunakan standar keamanan enkripsi SSL tingkat bank.
                            Kami terhubung secara resmi
                            menggunakan <span class="font-semibold text-brand-600">Official Partner API</span> yang
                            disediakan langsung oleh Shopee, Tokopedia, dan TikTok Shop.
                            Kami <strong>tidak pernah</strong> meminta password marketplace Anda, dan data pelanggan
                            dijamin kerahasiaannya sesuai regulasi privasi yang berlaku.
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
                        <button @click="active = active === 2 ? null : 2"
                            class="flex justify-between items-center w-full p-5 text-left focus:outline-none hover:bg-slate-50 transition-colors">
                            <span class="font-bold text-slate-800">Bagaimana jika stok habis saat promo besar (Flash
                                Sale)?</span>
                            <svg class="w-5 h-5 text-slate-400 transform transition-transform"
                                :class="{'rotate-180': active === 2}" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="active === 2" x-collapse x-cloak class="px-5 pb-5 text-slate-600 leading-relaxed">
                            Inilah kekuatan utama ShopSync! Sistem kami melakukan sinkronisasi stok secara
                            <strong>real-time</strong> (kurang dari 10 detik).
                            Jika terjadi lonjakan pesanan massal saat Flash Sale di Shopee, stok produk yang sama di
                            Tokopedia dan TikTok Shop akan langsung terkunci secara otomatis. Anda 100% aman dari risiko
                            <em>overselling</em> dan penalti marketplace.
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
                        <button @click="active = active === 3 ? null : 3"
                            class="flex justify-between items-center w-full p-5 text-left focus:outline-none hover:bg-slate-50 transition-colors">
                            <span class="font-bold text-slate-800">Apakah saya harus upload manual produk satu per satu
                                dari awal?</span>
                            <svg class="w-5 h-5 text-slate-400 transform transition-transform"
                                :class="{'rotate-180': active === 3}" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="active === 3" x-collapse x-cloak class="px-5 pb-5 text-slate-600 leading-relaxed">
                            <strong>Tentu tidak!</strong> ShopSync memiliki fitur "Smart Import". Anda cukup
                            menyambungkan toko Anda, dan ShopSync akan otomatis menarik seluruh katalog produk, stok,
                            varian, foto, dan deskripsi dalam 1 klik. Proses <em>onboarding</em> hanya memakan waktu
                            5-10 menit.
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
                        <button @click="active = active === 4 ? null : 4"
                            class="flex justify-between items-center w-full p-5 text-left focus:outline-none hover:bg-slate-50 transition-colors">
                            <span class="font-bold text-slate-800">Apakah saya bisa menambah jumlah toko (Marketplace)
                                di kemudian hari?</span>
                            <svg class="w-5 h-5 text-slate-400 transform transition-transform"
                                :class="{'rotate-180': active === 4}" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="active === 4" x-collapse x-cloak class="px-5 pb-5 text-slate-600 leading-relaxed">
                            Sangat bisa! Paket Profesional kami bahkan mendukung manajemen puluhan toko dari berbagai
                            marketplace. Anda dapat melakukan ekspansi bisnis atau membuka cabang toko baru kapan saja,
                            dan langsung menghubungkannya ke ekosistem ShopSync tanpa batasan yang menyulitkan.
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section
            class="relative z-50 -mt-12 md:-mt-20 rounded-t-[2.5rem] md:rounded-t-[4rem] py-20 overflow-hidden bg-brand-600 shadow-[0_-15px_30px_-15px_rgba(0,0,0,0.15)]">
            <!-- Background element -->
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-brand-500 rounded-full mix-blend-multiply opacity-50">
            </div>
            <div class="absolute -bottom-24 -left-24 w-72 h-72 bg-brand-700 rounded-full mix-blend-multiply opacity-50">
            </div>

            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
                <h2 class="text-3xl md:text-5xl font-black text-white mb-6 tracking-tight">Siap Skalakan Bisnis Anda ke
                    Level Berikutnya?</h2>
                <p class="text-brand-100 text-lg mb-10 max-w-2xl mx-auto">Jangan biarkan kerumitan operasional
                    menghambat pertumbuhan toko Anda. Otomatisasi sekarang dan fokus pada strategi penjualan.</p>
                <a href="{{ route('login') }}"
                    class="inline-flex items-center justify-center px-8 py-4 text-brand-600 bg-white hover:bg-slate-50 font-bold text-lg rounded-full shadow-xl hover:shadow-2xl transition-all transform hover:-translate-y-1">
                    Mulai Gunakan ShopSync
                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer
        class="relative z-50 -mt-12 md:-mt-20 rounded-t-[2.5rem] md:rounded-t-[4rem] bg-slate-900 pt-20 pb-8 shadow-[0_-15px_30px_-15px_rgba(0,0,0,0.3)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center gap-2 mb-6">
                        <span class="text-2xl font-black tracking-tight text-white">Shop<span
                                class="text-brand-400">Sync</span></span>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed max-w-sm mb-6">
                        Platform Manajemen Omnichannel e-commerce terbaik di Indonesia. Memberikan solusi efisiensi
                        operasional untuk pengusaha mikro hingga perusahaan besar.
                    </p>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-4 uppercase text-sm tracking-wider">Produk</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#fitur" class="text-slate-400 hover:text-white transition-colors">Fitur
                                Integrasi</a></li>
                        <li><a href="#harga" class="text-slate-400 hover:text-white transition-colors">Paket & Harga</a>
                        </li>
                        <li><a href="#" class="text-slate-400 hover:text-white transition-colors">Keamanan Data</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-4 uppercase text-sm tracking-wider">Perusahaan</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="text-slate-400 hover:text-white transition-colors">Tentang Kami</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-white transition-colors">Hubungi Kami</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-white transition-colors">Syarat & Ketentuan</a>
                        </li>
                        <li><a href="#" class="text-slate-400 hover:text-white transition-colors">Kebijakan Privasi</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="pt-8 border-t border-slate-800 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-slate-500 text-sm">
                    © 2026 ShopSync Technologies. Hak Cipta Dilindungi.
                </p>
                <div class="flex space-x-4">
                    <!-- Social icons (placeholders) -->
                    <a href="#" class="text-slate-500 hover:text-white"><svg class="w-5 h-5" fill="currentColor"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                clip-rule="evenodd" />
                        </svg></a>
                    <a href="#" class="text-slate-500 hover:text-white"><svg class="w-5 h-5" fill="currentColor"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                clip-rule="evenodd" />
                        </svg></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Live Sync Simulation Toast -->
    <div x-data="{
        show: false,
        eventIndex: 0,
        events: [
            { platform: 'Shopee', store: 'Toko A', product: 'Sepatu Sneakers Pria', qty: 1, action: 'mengurangi stok master & otomatis menyinkronkan data ke Tokopedia & TikTok Shop' },
            { platform: 'Tokopedia', store: 'Toko B', product: 'Headphone Wireless', qty: 2, action: 'mengurangi stok master & otomatis menyinkronkan data ke Shopee & TikTok Shop' },
            { platform: 'TikTok Shop', store: 'Toko C', product: 'Hijab Instant Premium', qty: 5, action: 'mengurangi stok master & otomatis menyinkronkan data ke Shopee & Tokopedia' },
            { platform: 'Shopee', store: 'Toko A', product: 'T-Shirt Oversized Black', qty: 3, action: 'mengurangi stok master & otomatis menyinkronkan data ke Tokopedia & TikTok Shop' }
        ],
        currentEvent: {},
        initSimulation() {
            // First trigger after 6 seconds
            setTimeout(() => {
                this.triggerNext();
            }, 6000);
            
            // Loop trigger every 25 seconds
            setInterval(() => {
                this.triggerNext();
            }, 25000);
        },
        triggerNext() {
            this.currentEvent = this.events[this.eventIndex];
            this.show = true;
            this.eventIndex = (this.eventIndex + 1) % this.events.length;
            
            // Auto hide after 7 seconds
            setTimeout(() => {
                this.show = false;
            }, 7000);
        }
    }" x-init="initSimulation()"
        class="fixed bottom-6 right-6 z-50 max-w-sm w-[90%] sm:w-full bg-white/95 backdrop-blur-md border border-slate-200/80 rounded-2xl shadow-[0_20px_40px_-15px_rgba(0,0,0,0.15)] p-4 overflow-hidden transition-all duration-500 transform"
        x-show="show" x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 translate-y-8 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 scale-95" x-cloak>
        <div class="flex items-start gap-3">
            <!-- Icon -->
            <div
                class="w-9 h-9 rounded-xl bg-gradient-to-br from-brand-500 to-teal-600 flex items-center justify-center text-white shrink-0 shadow-md">
                <svg class="w-5 h-5 animate-spin" style="animation-duration: 3s" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 8H17" />
                </svg>
            </div>

            <!-- Content -->
            <div class="flex-1 text-left">
                <div class="flex items-center justify-between">
                    <span class="text-[9px] font-black text-brand-600 uppercase tracking-widest">Live Sync
                        Simulator</span>
                    <span class="text-[9px] font-bold text-slate-400">Baru saja</span>
                </div>
                <h5 class="text-xs font-black text-slate-800 mt-1">
                    Pesanan Masuk di <span x-text="currentEvent.platform"
                        :class="currentEvent.platform === 'Shopee' ? 'text-[#EE4D2D]' : currentEvent.platform === 'Tokopedia' ? 'text-[#03AC0E]' : 'text-black'"></span>
                </h5>
                <p class="text-[11px] text-slate-600 mt-1 leading-normal">
                    Toko berhasil memproses <strong class="text-slate-800"
                        x-text="currentEvent.qty + 'x ' + currentEvent.product"></strong>. Sistem <span
                        class="text-emerald-600 font-bold" x-text="currentEvent.action"></span>.
                </p>
            </div>

            <!-- Close Button -->
            <button @click="show = false" class="text-slate-400 hover:text-slate-600">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <!-- Progress bar animate -->
        <div class="absolute bottom-0 left-0 right-0 h-1 bg-slate-100">
            <div class="h-1 bg-brand-500 transition-all duration-[7000ms] ease-linear"
                :style="show ? 'width: 100%' : 'width: 0%'"></div>
        </div>
    </div>

</body>

</html>