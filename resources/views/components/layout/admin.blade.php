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
                        admin: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6', // Main Admin Blue
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    },
                    boxShadow: {
                        'soft': '0 4px 20px -2px rgba(0, 0, 0, 0.04)',
                        'hover-soft': '0 10px 30px -5px rgba(0, 0, 0, 0.08)',
                    }
                }
            }
        }
    </script>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
<body class="h-full overflow-hidden flex flex-col text-slate-800 antialiased selection:bg-admin-500 selection:text-white" x-data="{ 
    mobileMenuOpen: false, 
    sidebarCollapsed: localStorage.getItem('adminSidebarCollapsed') === 'true'
}" x-init="$watch('sidebarCollapsed', val => localStorage.setItem('adminSidebarCollapsed', val))">

    <!-- Topbar (Full Width) -->
    <header class="h-20 bg-white shadow-[0_4px_24px_rgba(0,0,0,0.02)] flex items-center px-6 lg:px-10 z-50 sticky top-0 border-b border-slate-100 flex-shrink-0 w-full justify-between">
        
        <!-- Logo Area & Mobile Toggle -->
        <div class="flex items-center flex-shrink-0 bg-white">
            <button @click="mobileMenuOpen = true" class="lg:hidden p-2 mr-3 -ml-2 text-slate-500 hover:bg-slate-50 rounded-xl transition-colors">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
            <div class="flex items-center gap-2">
                <span class="text-3xl font-extrabold tracking-tight text-slate-900">ShopSync <span class="text-admin-600 text-lg align-top ml-1 border-2 border-admin-200 bg-admin-50 px-2 py-0.5 rounded-lg">Admin</span></span>
            </div>
        </div>

        <div class="flex-1"></div>

        <!-- Right Side Icons -->
        <div class="flex items-center space-x-3 md:space-x-4">
            <!-- User Profile Dropdown -->
            <div class="relative" x-data="{ profileOpen: false }" @click.away="profileOpen = false">
                <button @click="profileOpen = !profileOpen" class="flex items-center h-11 gap-2 pl-1.5 pr-3 rounded-xl hover:bg-white hover:shadow-sm border border-transparent hover:border-slate-200 transition-all duration-200 focus:outline-none cursor-pointer">
                    <div class="h-8 w-8 rounded-lg bg-admin-600 text-white flex items-center justify-center font-bold text-sm shadow-sm">
                        AD
                    </div>
                    <div class="hidden md:block text-left">
                        <p class="text-xs font-bold text-slate-900 leading-tight">{{ Auth::user()->name ?? 'Administrator' }}</p>
                        <p class="text-[9px] text-admin-600 font-extrabold uppercase tracking-widest mt-0.5 leading-none">Super Admin</p>
                    </div>
                    <svg :class="{'rotate-180': profileOpen}" class="hidden md:block w-3.5 h-3.5 text-slate-400 transition-transform duration-200 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                
                <div x-show="profileOpen" x-transition.opacity x-transition:enter.duration.200ms x-transition:leave.duration.150ms class="absolute right-0 mt-2 w-48 bg-white rounded-2xl shadow-hover-soft border border-slate-100 py-2 z-50 origin-top-right" x-cloak>
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
            
            <!-- Toggle Button for Desktop Sidebar Collapse -->
            <button @click="sidebarCollapsed = !sidebarCollapsed" 
                    class="hidden lg:flex absolute top-6 -right-[18px] w-9 h-9 rounded-full bg-white border border-slate-200 hover:border-admin-500 hover:text-admin-500 text-slate-500 items-center justify-center shadow-md z-50 focus:outline-none transition-all duration-200 cursor-pointer hover:scale-105">
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
            
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}" 
               :class="sidebarCollapsed ? 'justify-center px-2' : 'px-4'"
               class="group flex items-center py-3 rounded-2xl {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-admin-600 font-bold' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 font-medium' }} transition-all duration-200"
               :title="sidebarCollapsed ? 'Dashboard' : ''">
                <div class="{{ request()->routeIs('admin.dashboard') ? 'bg-white shadow-sm' : 'bg-transparent group-hover:bg-white group-hover:shadow-sm' }} p-2 rounded-xl transition-all duration-200"
                     :class="sidebarCollapsed ? '' : 'mr-3'">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.dashboard') ? 'text-admin-600' : 'text-slate-400 group-hover:text-admin-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                </div>
                <span x-show="!sidebarCollapsed" x-transition.opacity>Dashboard</span>
            </a>

            <!-- SECTION: MANAJEMEN SISTEM -->
            <p x-show="!sidebarCollapsed" class="px-4 text-[11px] font-extrabold text-slate-400 uppercase tracking-widest mb-3 mt-4 border-t border-slate-100 pt-6">Manajemen Sistem</p>
            <div x-show="sidebarCollapsed" class="border-t border-slate-100 my-4 mx-2" x-cloak></div>
            
            <!-- Pengguna -->
            <a href="{{ route('admin.users.index') }}" 
               :class="sidebarCollapsed ? 'justify-center px-2' : 'px-4'"
               class="group flex items-center py-3 rounded-2xl {{ request()->routeIs('admin.users.*') ? 'bg-blue-50 text-admin-600 font-bold' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 font-medium' }} transition-all duration-200"
               :title="sidebarCollapsed ? 'Pengguna' : ''">
                <div class="{{ request()->routeIs('admin.users.*') ? 'bg-white shadow-sm' : 'bg-transparent group-hover:bg-white group-hover:shadow-sm' }} p-2 rounded-xl transition-all duration-200"
                     :class="sidebarCollapsed ? '' : 'mr-3'">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.users.*') ? 'text-admin-600' : 'text-slate-400 group-hover:text-admin-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <span x-show="!sidebarCollapsed" x-transition.opacity>Kelola Pengguna</span>
            </a>

            <!-- Paket & Langganan -->
            <a href="{{ route('admin.packages.index') }}" 
               :class="sidebarCollapsed ? 'justify-center px-2' : 'px-4'"
               class="group flex items-center py-3 rounded-2xl {{ request()->routeIs('admin.packages.*') ? 'bg-blue-50 text-admin-600 font-bold' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900 font-medium' }} transition-all duration-200"
               :title="sidebarCollapsed ? 'Paket & Langganan' : ''">
                <div class="{{ request()->routeIs('admin.packages.*') ? 'bg-white shadow-sm' : 'bg-transparent group-hover:bg-white group-hover:shadow-sm' }} p-2 rounded-xl transition-all duration-200"
                     :class="sidebarCollapsed ? '' : 'mr-3'">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.packages.*') ? 'text-admin-600' : 'text-slate-400 group-hover:text-admin-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <span x-show="!sidebarCollapsed" x-transition.opacity>Paket & Langganan</span>
            </a>

            </nav>        
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto focus:outline-none bg-[#f8fafc]">
            <div class="w-full px-6 lg:px-10 py-6 pb-12">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>
</html>
