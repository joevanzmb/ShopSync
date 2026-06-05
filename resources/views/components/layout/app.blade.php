<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopSync by Sitezet</title>
    <link rel="icon" type="image/png" href="/shopsync.png">
    <!-- Plus Jakarta Sans Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        tosca: {
                            50: '#f0fdfa',
                            100: '#ccfbf1',
                            200: '#99f6e4',
                            300: '#5eead4',
                            400: '#2dd4bf',
                            500: '#14b8a6', // Main Tosca
                            600: '#0d9488',
                            700: '#0f766e',
                            800: '#115e59',
                            900: '#134e4a',
                        }
                    },
                    boxShadow: {
                        'soft': '0 4px 20px -2px rgba(0, 0, 0, 0.04)',
                        'hover-soft': '0 10px 30px -5px rgba(0, 0, 0, 0.08)',
                        'glow': '0 0 20px rgba(20, 184, 166, 0.2)',
                    }
                }
            }
        }
    </script>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        [x-cloak] { display: none !important; }
        
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>
<body class="h-full overflow-hidden flex flex-col text-slate-800 antialiased selection:bg-tosca-500 selection:text-white" x-data="{ 
    mobileMenuOpen: false, 
    sidebarCollapsed: localStorage.getItem('sidebarCollapsed') === 'true',
    orderMenuOpen: {{ request()->routeIs('orders.*') ? 'true' : 'false' }},
    productMenuOpen: {{ request()->routeIs('products.*') ? 'true' : 'false' }},
    financeMenuOpen: {{ request()->routeIs('finance.*') ? 'true' : 'false' }},
    analyticsMenuOpen: {{ request()->routeIs('analytics.*') ? 'true' : 'false' }},
    integrationMenuOpen: {{ request()->routeIs('stores.*') ? 'true' : 'false' }}
}" x-init="$watch('sidebarCollapsed', val => localStorage.setItem('sidebarCollapsed', val))">

    <!-- Topbar (Full Width) -->
    @php
        $connectedStores = \App\Models\ConnectedStore::where('user_id', Auth::id())->get();
        $urgentOrders = \App\Models\Order::whereIn('connected_store_id', $connectedStores->pluck('id'))->where('status', 'Perlu Dikirim')->count();
        $subscription = \App\Models\Subscription::where('user_id', Auth::id())->where('status', 'active')->first();
        $daysLeft = $subscription && $subscription->end_date ? round(now()->diffInDays(\Carbon\Carbon::parse($subscription->end_date), false)) : 0;
    @endphp
    <header class="h-20 bg-white shadow-[0_4px_24px_rgba(0,0,0,0.02)] flex items-center px-6 lg:px-10 z-50 sticky top-0 border-b border-slate-100 flex-shrink-0 w-full justify-between">
        
        <!-- Logo Area & Mobile Toggle -->
        <div class="flex items-center flex-shrink-0 bg-white">
            <!-- Mobile Menu Toggle Button -->
            <button @click="mobileMenuOpen = true" class="lg:hidden p-2 mr-3 -ml-2 text-slate-500 hover:bg-slate-50 rounded-xl transition-colors">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
            <div class="flex items-center gap-2">
                <span class="text-3xl font-extrabold tracking-tight text-slate-900">Shop<span class="text-tosca-500">Sync</span></span>
            </div>
        </div>

        <!-- Spacer -->
        <div class="flex-1"></div>

        <!-- Right Side Icons -->
        <div class="flex items-center space-x-3 md:space-x-4">
            
            <!-- Package Expiry Indicator -->
            <div class="hidden sm:flex items-center px-3 py-1.5 {{ $daysLeft > 0 ? 'bg-amber-50 border-amber-100' : 'bg-slate-50 border-slate-200' }} border rounded-xl">
                @if($daysLeft > 0)
                    <svg class="w-4 h-4 text-amber-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="text-xs font-bold text-amber-700">Sisa <span class="text-amber-600">{{ $daysLeft }} Hari</span></span>
                @else
                    <svg class="w-4 h-4 text-slate-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="text-xs font-bold text-slate-600">Paket <span class="text-slate-500">Free</span></span>
                @endif
            </div>

            <!-- Stores Connected Status with Dropdown -->
            <div class="relative" x-data="{ storesOpen: false }" @click.away="storesOpen = false">
                <button @click="storesOpen = !storesOpen" class="hidden lg:flex items-center h-11 space-x-2 px-3.5 bg-white border border-slate-200 hover:border-tosca-500 hover:text-tosca-500 shadow-sm rounded-xl transition-all duration-200 focus:outline-none cursor-pointer">
                    <div class="flex -space-x-1.5">
                        @forelse($connectedStores->take(3) as $store)
                            @if(strtolower($store->platform) == 'shopee')
                                <div class="w-5 h-5 rounded-full bg-[#EE4D2D] border border-white flex items-center justify-center text-[8px] font-bold text-white z-20">S</div>
                            @elseif(strtolower($store->platform) == 'tokopedia')
                                <div class="w-5 h-5 rounded-full bg-[#03AC0E] border border-white flex items-center justify-center text-[8px] font-bold text-white z-10">T</div>
                            @elseif(strtolower($store->platform) == 'tiktok shop')
                                <div class="w-5 h-5 rounded-full bg-black border border-white flex items-center justify-center text-[8px] font-bold text-white z-0">TK</div>
                            @else
                                <div class="w-5 h-5 rounded-full bg-blue-600 border border-white flex items-center justify-center text-[8px] font-bold text-white z-0">{{ substr($store->platform, 0, 1) }}</div>
                            @endif
                        @empty
                            <div class="w-5 h-5 rounded-full bg-slate-200 border border-white flex items-center justify-center text-[8px] font-bold text-slate-400 z-0">-</div>
                        @endforelse
                    </div>
                    <span class="text-xs font-bold text-slate-600">{{ $connectedStores->count() }} Toko</span>
                    <svg class="w-3.5 h-3.5 text-slate-400 transition-transform duration-200" :class="{'rotate-180': storesOpen}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>

                <!-- Stores Connected Dropdown -->
                <div x-show="storesOpen" x-transition.opacity x-cloak class="absolute right-0 mt-2 w-72 bg-white rounded-2xl shadow-hover-soft border border-slate-100 p-4 z-50 origin-top-right">
                    <p class="text-xs font-extrabold text-slate-400 uppercase tracking-wider mb-3">Toko Terhubung</p>
                    <div class="space-y-3">
                        @forelse($connectedStores as $store)
                            <div class="flex items-center justify-between pb-2.5 {{ !$loop->last ? 'border-b border-slate-50' : '' }}">
                                <div class="flex items-center gap-2.5">
                                    @if(strtolower($store->platform) == 'shopee')
                                        <div class="w-7 h-7 rounded-lg bg-[#EE4D2D] text-white flex items-center justify-center text-xs font-bold">S</div>
                                    @elseif(strtolower($store->platform) == 'tokopedia')
                                        <div class="w-7 h-7 rounded-lg bg-[#03AC0E] text-white flex items-center justify-center text-xs font-bold">T</div>
                                    @elseif(strtolower($store->platform) == 'tiktok shop')
                                        <div class="w-7 h-7 rounded-lg bg-black text-white flex items-center justify-center text-xs font-bold">TK</div>
                                    @else
                                        <div class="w-7 h-7 rounded-lg bg-blue-600 text-white flex items-center justify-center text-xs font-bold">{{ substr($store->platform, 0, 1) }}</div>
                                    @endif
                                    <div class="text-left">
                                        <p class="text-xs font-bold text-slate-900 leading-none">{{ $store->store_name }}</p>
                                        <p class="text-[10px] text-slate-400 mt-1">{{ $store->platform }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    @if($store->status == 'connected' || $store->status == 'active')
                                        <span class="inline-flex items-center text-[10px] font-extrabold text-emerald-600 bg-emerald-50 px-1.5 py-0.5 rounded-full leading-none mb-1">
                                            <span class="w-1 h-1 rounded-full bg-emerald-500 mr-1 animate-pulse"></span> Terhubung
                                        </span>
                                    @else
                                        <span class="inline-flex items-center text-[10px] font-extrabold text-red-600 bg-red-50 px-1.5 py-0.5 rounded-full leading-none mb-1">
                                            <span class="w-1 h-1 rounded-full bg-red-500 mr-1"></span> Terputus
                                        </span>
                                    @endif
                                    <p class="text-[9px] text-slate-400">Sinkron: Baru saja</p>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-2">
                                <p class="text-xs text-slate-500">Belum ada toko terhubung.</p>
                                <a href="{{ route('stores.index') }}" class="text-xs text-tosca-600 font-bold hover:underline mt-1 inline-block">Hubungkan Sekarang</a>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Sync Button with Alpine JS for spinning effect -->
            <button x-data="{ syncing: false }" @click="syncing = true; setTimeout(() => syncing = false, 2000)" class="flex items-center h-11 px-3 md:px-4 rounded-xl border border-slate-200 text-slate-600 hover:text-tosca-600 hover:bg-tosca-50 hover:border-tosca-200 transition-all duration-200 shadow-sm group bg-white focus:outline-none cursor-pointer">
                <svg :class="syncing ? 'animate-spin text-tosca-500' : 'text-slate-400 group-hover:text-tosca-500'" class="h-5 w-5 md:mr-2 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                <div class="hidden md:flex flex-col text-left">
                    <span class="text-xs font-bold leading-tight" x-text="syncing ? 'Menyinkronkan...' : 'Sinkronisasi'"></span>
                    <span class="text-[9px] font-medium text-slate-400 leading-none mt-0.5" x-show="!syncing">Terakhir: {{ now()->format('H:i') }}</span>
                </div>
            </button>

            <!-- CS Chat Button -->
            <button class="h-11 w-11 flex items-center justify-center rounded-xl text-slate-400 hover:text-white hover:bg-tosca-500 shadow-sm border border-slate-200 bg-white hover:border-tosca-500 transition-all duration-200 relative group focus:outline-none cursor-pointer" title="Chat Customer Service">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M3 18v-6a9 9 0 0118 0v6M21 19a2 2 0 01-2 2h-1a2 2 0 01-2-2v-3a2 2 0 012-2h3zM3 19a2 2 0 002 2h1a2 2 0 002-2v-3a2 2 0 00-2-2H3z"></path></svg>
                <span class="absolute top-1.5 right-1.5 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white group-hover:ring-tosca-500"></span>
            </button>

            <!-- Vertical Divider -->
            <div class="w-px h-6 bg-slate-200 mx-1.5 md:mx-2"></div>

            <!-- User Profile Dropdown -->
            <div class="relative" x-data="{ profileOpen: false }" @click.away="profileOpen = false">
                <button @click="profileOpen = !profileOpen" class="flex items-center h-11 gap-2 pl-1.5 pr-3 rounded-xl hover:bg-white hover:shadow-sm border border-transparent hover:border-slate-200 transition-all duration-200 focus:outline-none cursor-pointer">
                    <img class="h-8 w-8 rounded-lg object-cover shadow-sm" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->first_name ?? Auth::user()->name ?? 'User') }}&background=14b8a6&color=fff&rounded=true" alt="User">
                    <div class="hidden md:block text-left">
                        <p class="text-xs font-bold text-slate-900 leading-tight">{{ Auth::user()->first_name ?? Auth::user()->name ?? 'User' }}</p>
                        <p class="text-[9px] text-tosca-500 font-extrabold uppercase tracking-widest mt-0.5 leading-none">{{ Str::limit(Auth::user()->store_name ?? 'Premium', 12) }}</p>
                    </div>
                    <svg :class="{'rotate-180': profileOpen}" class="hidden md:block w-3.5 h-3.5 text-slate-400 transition-transform duration-200 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                
                <div x-show="profileOpen" x-transition.opacity x-transition:enter.duration.200ms x-transition:leave.duration.150ms class="absolute right-0 mt-2 w-48 bg-white rounded-2xl shadow-hover-soft border border-slate-100 py-2 z-50 origin-top-right" x-cloak>
                    <a href="{{ route('settings.index') }}" class="flex items-center px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 hover:text-tosca-600 transition-colors">
                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Edit Profil
                    </a>
                    <div class="border-t border-slate-100 my-1"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50 transition-colors text-left">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Bottom Container -->
    <div class="flex-1 flex overflow-hidden relative">
        <!-- Mobile Sidebar Backdrop -->
        <div x-show="mobileMenuOpen" class="fixed inset-0 z-40 bg-slate-900/50 backdrop-blur-sm lg:hidden" x-transition.opacity @click="mobileMenuOpen = false" x-cloak></div>

        <!-- Sidebar -->
        <aside :class="[
            mobileMenuOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0',
            sidebarCollapsed ? 'lg:w-[88px]' : 'lg:w-72'
        ]" class="fixed inset-y-0 left-0 w-72 bg-white flex flex-col z-50 lg:z-40 border-r border-slate-100 shadow-[4px_0_24px_rgba(0,0,0,0.02)] transition-all duration-300 ease-in-out lg:relative lg:flex">
            
            <!-- Toggle Button for Desktop Sidebar Collapse (Floating on right border) -->
            <button @click="sidebarCollapsed = !sidebarCollapsed" 
                    class="hidden lg:flex absolute top-6 -right-[18px] w-9 h-9 rounded-full bg-white border border-slate-200 hover:border-tosca-500 hover:text-tosca-500 text-slate-500 items-center justify-center shadow-md z-50 focus:outline-none transition-all duration-200 cursor-pointer hover:scale-105">
                <svg x-show="!sidebarCollapsed" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                <svg x-show="sidebarCollapsed" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-cloak><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
            </button>

            <!-- Close mobile menu button -->
            <div class="lg:hidden flex justify-end p-4">
                <button @click="mobileMenuOpen = false" class="p-2 text-slate-400 hover:text-slate-600 rounded-lg hover:bg-slate-50">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            
            <nav class="flex-1 px-4 py-4 space-y-1.5 overflow-y-auto">
            
            <a href="{{ route('dashboard') }}" 
               :class="sidebarCollapsed ? 'justify-center px-2' : 'px-4'"
               class="group flex items-center py-3 rounded-2xl {{ request()->routeIs('dashboard') ? 'bg-tosca-500-light text-tosca-500 font-bold' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 font-medium' }} transition-all duration-200"
               :title="sidebarCollapsed ? 'Dashboard' : ''">
                <div class="{{ request()->routeIs('dashboard') ? 'bg-white shadow-sm' : 'bg-transparent group-hover:bg-white group-hover:shadow-sm' }} p-2 rounded-xl transition-all duration-200"
                     :class="sidebarCollapsed ? '' : 'mr-3'">
                    <svg class="w-5 h-5 {{ request()->routeIs('dashboard') ? 'text-tosca-500' : 'text-slate-400 group-hover:text-tosca-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                </div>
                <span x-show="!sidebarCollapsed" x-transition.opacity>Dashboard</span>
            </a>

            <!-- SECTION: MENU UTAMA -->
            <p x-show="!sidebarCollapsed" class="px-4 text-[11px] font-extrabold text-slate-400 uppercase tracking-widest mb-3 mt-4">Menu Utama</p>
            <div x-show="sidebarCollapsed" class="border-t border-slate-100 my-4 mx-2" x-cloak></div>
            
            <!-- Pesanan -->
            <a href="{{ route('orders.index') }}" 
               :class="sidebarCollapsed ? 'justify-center px-2' : 'px-4'"
               class="group flex items-center justify-between py-3 rounded-2xl {{ request()->routeIs('orders.*') ? 'bg-tosca-500-light text-tosca-500 font-bold' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 font-medium' }} transition-all duration-200"
               :title="sidebarCollapsed ? 'Pesanan' : ''">
                <div class="flex items-center">
                    <div class="{{ request()->routeIs('orders.*') ? 'bg-white shadow-sm' : 'bg-transparent group-hover:bg-white group-hover:shadow-sm' }} p-2 rounded-xl transition-all duration-200 relative"
                         :class="sidebarCollapsed ? '' : 'mr-3'">
                        <svg class="w-5 h-5 {{ request()->routeIs('orders.*') ? 'text-tosca-500' : 'text-slate-400 group-hover:text-tosca-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <span x-show="sidebarCollapsed" class="absolute top-1 right-1 w-2 h-2 rounded-full bg-tosca-500 ring-2 ring-white"></span>
                    </div>
                    <span x-show="!sidebarCollapsed" x-transition.opacity>Pesanan</span>
                </div>
                @if($urgentOrders > 0)
                <span x-show="!sidebarCollapsed" class="w-5 h-5 bg-tosca-100 text-tosca-600 rounded-full text-[10px] font-bold flex items-center justify-center">{{ $urgentOrders > 99 ? '99+' : $urgentOrders }}</span>
                @endif
            </a>

            <!-- Submenu Produk -->
            <div class="relative">
                <button @click="if(sidebarCollapsed) sidebarCollapsed = false; productMenuOpen = !productMenuOpen" 
                   :class="sidebarCollapsed ? 'justify-center px-2' : 'px-4 justify-between'"
                   class="w-full group flex items-center py-3 rounded-2xl {{ request()->routeIs('products.*') ? 'bg-tosca-500-light text-tosca-500 font-bold' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 font-medium' }} transition-all duration-200"
                   :title="sidebarCollapsed ? 'Produk' : ''">
                    <div class="flex items-center">
                        <div class="{{ request()->routeIs('products.*') ? 'bg-white shadow-sm' : 'bg-transparent group-hover:bg-white group-hover:shadow-sm' }} p-2 rounded-xl transition-all duration-200"
                            :class="sidebarCollapsed ? '' : 'mr-3'">
                            <svg class="w-5 h-5 {{ request()->routeIs('products.*') ? 'text-tosca-500' : 'text-slate-400 group-hover:text-tosca-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        </div>
                        <span x-show="!sidebarCollapsed" x-transition.opacity>Produk</span>
                    </div>
                    <svg x-show="!sidebarCollapsed" :class="productMenuOpen ? 'rotate-180' : ''" class="w-4 h-4 text-slate-400 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="productMenuOpen && !sidebarCollapsed" class="pl-12 pr-4 pt-1 pb-2 space-y-1 transition-all duration-300 origin-top">
                    <a href="{{ route('products.index') }}" class="block py-2 text-sm {{ request()->routeIs('products.index') ? 'text-tosca-600 font-bold' : 'text-slate-500 hover:text-slate-900 font-medium' }} transition-colors">Daftar Produk</a>
                    <a href="{{ route('products.promotion') }}" class="block py-2 text-sm {{ request()->routeIs('products.promotion') ? 'text-tosca-600 font-bold' : 'text-slate-500 hover:text-slate-900 font-medium' }} transition-colors">
                        Promosi & Iklan
                    </a>
                </div>
            </div>
            
            <!-- Submenu Keuangan -->
            <div class="relative">
                <button @click="if(sidebarCollapsed) sidebarCollapsed = false; financeMenuOpen = !financeMenuOpen" 
                   :class="sidebarCollapsed ? 'justify-center px-2' : 'px-4 justify-between'"
                   class="w-full group flex items-center py-3 rounded-2xl {{ request()->routeIs('finance.*') ? 'bg-tosca-500-light text-tosca-500 font-bold' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 font-medium' }} transition-all duration-200"
                   :title="sidebarCollapsed ? 'Keuangan' : ''">
                    <div class="flex items-center">
                        <div class="{{ request()->routeIs('finance.*') ? 'bg-white shadow-sm' : 'bg-transparent group-hover:bg-white group-hover:shadow-sm' }} p-2 rounded-xl transition-all duration-200"
                            :class="sidebarCollapsed ? '' : 'mr-3'">
                            <svg class="w-5 h-5 {{ request()->routeIs('finance.*') ? 'text-tosca-500' : 'text-slate-400 group-hover:text-tosca-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <span x-show="!sidebarCollapsed" x-transition.opacity>Keuangan</span>
                    </div>
                    <svg x-show="!sidebarCollapsed" :class="financeMenuOpen ? 'rotate-180' : ''" class="w-4 h-4 text-slate-400 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="financeMenuOpen && !sidebarCollapsed" class="pl-12 pr-4 pt-1 pb-2 space-y-1 transition-all duration-300 origin-top">
                    <a href="{{ route('finance.index') }}" class="block py-2 text-sm {{ request()->routeIs('finance.index') ? 'text-tosca-600 font-bold' : 'text-slate-500 hover:text-slate-900 font-medium' }} transition-colors">Laporan Keuangan</a>
                    <a href="{{ route('finance.cogs') }}" class="block py-2 text-sm {{ request()->routeIs('finance.cogs') ? 'text-tosca-600 font-bold' : 'text-slate-500 hover:text-slate-900 font-medium' }} transition-colors">Harga Modal (COGS)</a>
                </div>
            </div>

            <!-- Submenu Analitik & Laporan -->
            <div class="relative">
                <button @click="if(sidebarCollapsed) sidebarCollapsed = false; analyticsMenuOpen = !analyticsMenuOpen" 
                   :class="sidebarCollapsed ? 'justify-center px-2' : 'px-4 justify-between'"
                   class="w-full group flex items-center py-3 rounded-2xl {{ request()->routeIs('analytics.*') ? 'bg-tosca-500-light text-tosca-500 font-bold' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 font-medium' }} transition-all duration-200"
                   :title="sidebarCollapsed ? 'Analitik & Laporan' : ''">
                    <div class="flex items-center">
                        <div class="{{ request()->routeIs('analytics.*') ? 'bg-white shadow-sm' : 'bg-transparent group-hover:bg-white group-hover:shadow-sm' }} p-2 rounded-xl transition-all duration-200"
                            :class="sidebarCollapsed ? '' : 'mr-3'">
                            <svg class="w-5 h-5 {{ request()->routeIs('analytics.*') ? 'text-tosca-500' : 'text-slate-400 group-hover:text-tosca-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        </div>
                        <span x-show="!sidebarCollapsed" x-transition.opacity>Analitik</span>
                    </div>
                    <svg x-show="!sidebarCollapsed" :class="analyticsMenuOpen ? 'rotate-180' : ''" class="w-4 h-4 text-slate-400 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="analyticsMenuOpen && !sidebarCollapsed" class="pl-12 pr-4 pt-1 pb-2 space-y-1 transition-all duration-300 origin-top">
                    <a href="{{ route('analytics.sales') }}" class="block py-2 text-sm {{ request()->routeIs('analytics.sales') ? 'text-tosca-600 font-bold' : 'text-slate-500 hover:text-slate-900 font-medium' }} transition-colors">Performa Penjualan</a>
                    <a href="{{ route('analytics.courier') }}" class="block py-2 text-sm {{ request()->routeIs('analytics.courier') ? 'text-tosca-600 font-bold' : 'text-slate-500 hover:text-slate-900 font-medium' }} transition-colors">Performa Kurir</a>
                </div>
            </div>

            <!-- CRM / Pelanggan -->
            <a href="{{ route('crm.index') }}" 
               :class="sidebarCollapsed ? 'justify-center px-2' : 'px-4'"
               class="group flex items-center py-3 rounded-2xl {{ request()->routeIs('crm.*') ? 'bg-tosca-500-light text-tosca-500 font-bold' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 font-medium' }} transition-all duration-200"
               :title="sidebarCollapsed ? 'CRM & Pelanggan' : ''">
                <div class="{{ request()->routeIs('crm.*') ? 'bg-white shadow-sm' : 'bg-transparent group-hover:bg-white group-hover:shadow-sm' }} p-2 rounded-xl transition-all duration-200"
                     :class="sidebarCollapsed ? '' : 'mr-3'">
                    <svg class="w-5 h-5 {{ request()->routeIs('crm.*') ? 'text-tosca-500' : 'text-slate-400 group-hover:text-tosca-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <span x-show="!sidebarCollapsed" x-transition.opacity>Pelanggan (CRM)</span>
            </a>

            <!-- Integrasi Toko -->
            <a href="{{ route('stores.index') }}" 
               :class="sidebarCollapsed ? 'justify-center px-2' : 'px-4'"
               class="group flex items-center py-3 rounded-2xl {{ request()->routeIs('stores.*') ? 'bg-tosca-500-light text-tosca-500 font-bold' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 font-medium' }} transition-all duration-200"
               :title="sidebarCollapsed ? 'Integrasi Toko' : ''">
                <div class="{{ request()->routeIs('stores.*') ? 'bg-white shadow-sm' : 'bg-transparent group-hover:bg-white group-hover:shadow-sm' }} p-2 rounded-xl transition-all duration-200"
                     :class="sidebarCollapsed ? '' : 'mr-3'">
                    <svg class="w-5 h-5 {{ request()->routeIs('stores.*') ? 'text-tosca-500' : 'text-slate-400 group-hover:text-tosca-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                </div>
                <span x-show="!sidebarCollapsed" x-transition.opacity>Integrasi Toko</span>
            </a>

            <!-- SECTION: PENGATURAN -->
            <div :class="sidebarCollapsed ? 'pt-2 pb-1' : 'pt-6 pb-2'">
                <p x-show="!sidebarCollapsed" class="px-4 text-[11px] font-extrabold text-slate-400 uppercase tracking-widest mb-3 mt-2 border-t border-slate-100 pt-6">Pengaturan Akun</p>
                <div x-show="sidebarCollapsed" class="border-t border-slate-100 my-4 mx-2" x-cloak></div>
            </div>

            <!-- Profil -->
            <a href="{{ route('settings.index') }}?tab=profile" 
               :class="sidebarCollapsed ? 'justify-center px-2' : 'px-4'"
               class="group flex items-center py-2.5 rounded-2xl {{ request()->query('tab') == 'profile' || (request()->routeIs('settings.*') && !request()->has('tab')) ? 'bg-tosca-500-light text-tosca-500 font-bold' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 font-medium' }} transition-all duration-200"
               :title="sidebarCollapsed ? 'Profil' : ''">
                <div class="{{ request()->query('tab') == 'profile' || (request()->routeIs('settings.*') && !request()->has('tab')) ? 'bg-white shadow-sm' : 'bg-transparent group-hover:bg-white group-hover:shadow-sm' }} p-2 rounded-xl transition-all duration-200"
                     :class="sidebarCollapsed ? '' : 'mr-3'">
                    <svg class="w-5 h-5 {{ request()->query('tab') == 'profile' || (request()->routeIs('settings.*') && !request()->has('tab')) ? 'text-tosca-500' : 'text-slate-400 group-hover:text-tosca-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <span x-show="!sidebarCollapsed" x-transition.opacity>Profil</span>
            </a>

            <!-- Notifikasi -->
            <a href="{{ route('settings.index') }}?tab=notifications" 
               :class="sidebarCollapsed ? 'justify-center px-2' : 'px-4'"
               class="group flex items-center py-2.5 rounded-2xl {{ request()->query('tab') == 'notifications' ? 'bg-tosca-500-light text-tosca-500 font-bold' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 font-medium' }} transition-all duration-200"
               :title="sidebarCollapsed ? 'Notifikasi' : ''">
                <div class="{{ request()->query('tab') == 'notifications' ? 'bg-white shadow-sm' : 'bg-transparent group-hover:bg-white group-hover:shadow-sm' }} p-2 rounded-xl transition-all duration-200"
                     :class="sidebarCollapsed ? '' : 'mr-3'">
                    <svg class="w-5 h-5 {{ request()->query('tab') == 'notifications' ? 'text-tosca-500' : 'text-slate-400 group-hover:text-tosca-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                </div>
                <span x-show="!sidebarCollapsed" x-transition.opacity>Notifikasi</span>
            </a>

            <!-- Keamanan -->
            <a href="{{ route('settings.index') }}?tab=security" 
               :class="sidebarCollapsed ? 'justify-center px-2' : 'px-4'"
               class="group flex items-center py-2.5 rounded-2xl {{ request()->query('tab') == 'security' ? 'bg-tosca-500-light text-tosca-500 font-bold' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 font-medium' }} transition-all duration-200"
               :title="sidebarCollapsed ? 'Keamanan' : ''">
                <div class="{{ request()->query('tab') == 'security' ? 'bg-white shadow-sm' : 'bg-transparent group-hover:bg-white group-hover:shadow-sm' }} p-2 rounded-xl transition-all duration-200"
                     :class="sidebarCollapsed ? '' : 'mr-3'">
                    <svg class="w-5 h-5 {{ request()->query('tab') == 'security' ? 'text-tosca-500' : 'text-slate-400 group-hover:text-tosca-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                <span x-show="!sidebarCollapsed" x-transition.opacity>Keamanan</span>
            </a>

            <!-- Berlangganan & Tagihan -->
            <a href="{{ route('settings.index') }}?tab=billing" 
               :class="sidebarCollapsed ? 'justify-center px-2' : 'px-4'"
               class="group flex items-center py-2.5 rounded-2xl {{ request()->query('tab') == 'billing' ? 'bg-tosca-500-light text-tosca-500 font-bold' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 font-medium' }} transition-all duration-200"
               :title="sidebarCollapsed ? 'Berlangganan & Tagihan' : ''">
                <div class="{{ request()->query('tab') == 'billing' ? 'bg-white shadow-sm' : 'bg-transparent group-hover:bg-white group-hover:shadow-sm' }} p-2 rounded-xl transition-all duration-200"
                     :class="sidebarCollapsed ? '' : 'mr-3'">
                    <svg class="w-5 h-5 {{ request()->query('tab') == 'billing' ? 'text-tosca-500' : 'text-slate-400 group-hover:text-tosca-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                </div>
                <span x-show="!sidebarCollapsed" x-transition.opacity>Berlangganan & Tagihan</span>
            </a>

        </nav>        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto focus:outline-none bg-[#f8fafc]">
            <div class="w-full px-6 lg:px-10 py-6 pb-12">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>
</html>
