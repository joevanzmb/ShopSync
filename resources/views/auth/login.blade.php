<!DOCTYPE html>
<html lang="id" class="h-full bg-white antialiased">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="view-transition" content="same-origin">
    <title>Masuk - ShopSync by Sitezet</title>
    <link rel="icon" type="image/png" href="/shopsync.png">
    <!-- Outfit Font for a modern, tech-forward look -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['"Outfit"', 'sans-serif'] },
                    colors: { 
                        brand: {
                            50: '#f0fdfa',
                            100: '#ccfbf1',
                            200: '#99f6e4',
                            300: '#5eead4',
                            400: '#2dd4bf',
                            500: '#14b8a6',
                            600: '#0d9488',
                            700: '#0f766e',
                            800: '#115e59',
                            900: '#134e4a',
                        },
                        dark: {
                            900: '#0a0a0a',
                            800: '#171717',
                        }
                    },
                    animation: {
                        'float-slow': 'float 8s ease-in-out infinite',
                        'float-medium': 'float 6s ease-in-out infinite',
                        'float-fast': 'float 4s ease-in-out infinite',
                        'pulse-glow': 'pulseGlow 3s ease-in-out infinite',
                        'slide-up': 'slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                        'slide-right': 'slideRight 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                        'blob': 'blob 7s infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        pulseGlow: {
                            '0%, 100%': { opacity: 0.6, transform: 'scale(1)' },
                            '50%': { opacity: 1, transform: 'scale(1.05)' },
                        },
                        slideUp: {
                            '0%': { opacity: 0, transform: 'translateY(20px)' },
                            '100%': { opacity: 1, transform: 'translateY(0)' },
                        },
                        slideRight: {
                            '0%': { opacity: 0, transform: 'translateX(-20px)' },
                            '100%': { opacity: 1, transform: 'translateX(0)' },
                        },
                        blob: {
                            '0%': { transform: 'translate(0px, 0px) scale(1)' },
                            '33%': { transform: 'translate(30px, -50px) scale(1.1)' },
                            '66%': { transform: 'translate(-20px, 20px) scale(0.9)' },
                            '100%': { transform: 'translate(0px, 0px) scale(1)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
        .glass-panel {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        .input-group { position: relative; }
        .input-group input {
            padding: 1.25rem 1rem 0.5rem;
            background: #f8fafc;
        }
        .input-group label {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
            color: #94a3b8;
            transition: all 0.2s ease;
            pointer-events: none;
            font-size: 0.95rem;
        }
        .input-group input:focus + label,
        .input-group input:not(:placeholder-shown) + label {
            top: 0.5rem;
            transform: translateY(0);
            font-size: 0.75rem;
            color: #0d9488;
            font-weight: 600;
        }
        .input-group input:focus {
            background: #ffffff;
            border-color: #0d9488;
            box-shadow: 0 0 0 4px rgba(13, 148, 136, 0.1);
        }
        .bg-grid {
            background-size: 40px 40px;
            background-image: linear-gradient(to right, rgba(255, 255, 255, 0.05) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
            mask-image: radial-gradient(circle at center, black, transparent 80%);
            -webkit-mask-image: radial-gradient(circle at center, black, transparent 80%);
        }
        
        .animated-border {
            position: relative;
        }
        .animated-border::before {
            content: '';
            position: absolute;
            top: -2px; left: -2px; right: -2px; bottom: -2px;
            background: linear-gradient(45deg, #14b8a6, #3b82f6, #8b5cf6, #14b8a6);
            z-index: -1;
            border-radius: 1rem;
            background-size: 400%;
            animation: borderGlow 6s linear infinite;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .animated-border:hover::before {
            opacity: 1;
        }
        @keyframes borderGlow {
            0% { background-position: 0 0; }
            50% { background-position: 400% 0; }
            100% { background-position: 0 0; }
        }
        
        .panel-white { view-transition-name: panel-white; }
        .panel-dark { view-transition-name: panel-dark; }
    </style>
</head>
<body class="min-h-screen lg:h-screen font-sans text-slate-800 flex flex-col lg:flex-row bg-dark-900 lg:overflow-hidden">

    <!-- Left Side: Immersive Brand Experience -->
    <div class="panel-dark hidden lg:flex lg:w-1/2 relative bg-dark-900 lg:overflow-hidden flex-col z-0 lg:h-full justify-between">
        <!-- Abstract Background Effects -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-brand-600/30 rounded-full mix-blend-screen filter blur-[100px] animate-blob"></div>
            <div class="absolute top-[20%] right-[-10%] w-[50%] h-[50%] bg-blue-600/20 rounded-full mix-blend-screen filter blur-[120px] animate-blob" style="animation-delay: 2s;"></div>
            <div class="absolute bottom-[-20%] left-[20%] w-[60%] h-[60%] bg-brand-400/20 rounded-full mix-blend-screen filter blur-[100px] animate-blob" style="animation-delay: 4s;"></div>
            <div class="absolute inset-0 bg-grid"></div>
        </div>

        <div class="relative z-10 p-12 flex-1 flex flex-col">
            <!-- Brand -->
            <a href="{{ route('landing') }}" class="flex items-center w-max opacity-0 animate-slide-right" style="animation-delay: 0.1s;">
                <span class="text-3xl font-extrabold tracking-tight text-white">Shop<span class="text-brand-500">Sync</span></span>
            </a>

            <!-- Centerpiece Abstract UI -->
            <div class="flex-1 flex items-center justify-center relative my-8 w-full">
                
                <!-- Glow effect behind the dashboard -->
                <div class="absolute inset-0 bg-brand-500 rounded-full blur-[80px] opacity-20 animate-pulse-glow max-w-[400px] aspect-square left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2"></div>
                
                <!-- Miniature Dashboard Mockup -->
                <x-dashboard-mockup class="transform scale-[0.55] sm:scale-[0.65] lg:scale-[0.8] xl:scale-[0.9] origin-center transition-transform hover:scale-[0.57] sm:hover:scale-[0.67] lg:hover:scale-[0.82] xl:hover:scale-[0.92] duration-500" />
            </div>

            <!-- Bottom Content -->
            <div class="opacity-0 animate-slide-up pb-8" style="animation-delay: 0.3s;">
                <h1 class="text-3xl lg:text-4xl xl:text-5xl font-extrabold text-white mb-4 leading-tight tracking-tight">
                    Kontrol Penuh <br/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-300 to-brand-500">Semua Toko Anda.</span>
                </h1>
                <p class="text-slate-400 text-lg lg:text-xl max-w-xl font-light leading-relaxed pr-8">
                    Sistem cerdas untuk mengelola inventaris, pesanan, dan analitik dari seluruh marketplace dalam satu dashboard.
                </p>
            </div>
        </div>
    </div>

    <!-- Right Side: Clean Form Area -->
    <div class="panel-white w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 xl:p-24 relative z-20 bg-white lg:rounded-l-[3rem] lg:shadow-[-20px_0_50px_rgba(0,0,0,0.3)] lg:overflow-y-auto lg:h-full">
        
        <!-- Mobile Background Pattern -->
        <div class="absolute inset-0 bg-slate-50 opacity-50 lg:hidden">
             <div class="absolute inset-0 bg-grid" style="mask-image: linear-gradient(to bottom, black, transparent);"></div>
        </div>

        <div class="w-full max-w-[440px] relative z-20 opacity-0 animate-slide-up" style="animation-delay: 0.2s;" x-data="{ showPassword: false }">
            
            <!-- Mobile Header -->
            <div class="lg:hidden mb-10 flex flex-col items-center text-center">
                <a href="{{ route('landing') }}" class="flex items-center mb-6">
                    <span class="text-3xl font-extrabold tracking-tight text-slate-700">Shop<span class="text-brand-500">Sync</span></span>
                </a>
                <h2 class="text-2xl font-bold text-slate-700">Selamat Datang Kembali</h2>
                <p class="text-slate-500 mt-2 text-sm">Masuk untuk melanjutkan ke dasbor Anda</p>
            </div>

            <!-- Desktop Header -->
            <div class="hidden lg:block mb-10">
                <h2 class="text-3xl font-extrabold text-slate-700 tracking-tight">Masuk Akun</h2>
                <p class="text-slate-500 mt-2 text-base font-medium">Akses dasbor cerdas Anda sekarang.</p>
            </div>

            <!-- Creative SSO Button -->
            <button type="button" class="animated-border w-full bg-white rounded-xl mb-8 relative group cursor-pointer border border-slate-200 hover:border-transparent transition-all">
                <div class="w-full flex items-center justify-center gap-3 py-3.5 px-4 rounded-xl shadow-sm text-[15px] font-bold text-slate-600 group-hover:bg-slate-50 transition-colors z-10 relative bg-white m-[1px] w-[calc(100%-2px)]">
                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-300" viewBox="0 0 24 24">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.16v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.16C1.43 8.55 1 10.22 1 12s.43 3.45 1.16 4.93l2.85-2.22.83-.62z" fill="#FBBC05"/>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.16 7.07l3.68 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                    </svg>
                    Lanjutkan dengan Google
                </div>
            </button>

            <div class="relative mb-8 flex items-center">
                <div class="flex-grow border-t border-slate-200"></div>
                <span class="flex-shrink-0 mx-4 text-slate-400 text-xs font-bold uppercase tracking-wider">Atau gunakan email</span>
                <div class="flex-grow border-t border-slate-200"></div>
            </div>

            <!-- Advanced Form -->
            <form action="{{ route('authenticate') ?? '#' }}" method="POST" class="space-y-6">
                @csrf
                
                @if($errors->any())
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="input-group">
                    <input id="email" name="email" type="email" autocomplete="email" required placeholder=" " value="{{ old('email') }}"
                        class="block w-full border border-slate-200 rounded-xl focus:outline-none transition-all text-slate-700 font-medium">
                    <label for="email">Alamat Email</label>
                </div>

                <div>
                    <div class="input-group">
                        <input id="password" name="password" x-bind:type="showPassword ? 'text' : 'password'" autocomplete="current-password" required placeholder=" "
                            class="block w-full pr-12 border border-slate-200 rounded-xl focus:outline-none transition-all text-slate-700 font-medium">
                        <label for="password">Kata Sandi</label>
                        
                        <!-- Eye Icon Toggle -->
                        <button type="button" @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-brand-600 transition-colors focus:outline-none z-10">
                            <svg x-show="!showPassword" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            <svg x-show="showPassword" x-cloak class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                        </button>
                    </div>
                    <div class="flex justify-end mt-2">
                        <a href="#" class="text-[13px] font-bold text-brand-600 hover:text-brand-700 transition-colors hover:underline decoration-2 underline-offset-2">Lupa kata sandi?</a>
                    </div>
                </div>

                <div class="flex items-center mb-8">
                    <div class="relative flex items-center justify-center w-5 h-5 mr-3">
                        <input id="remember" name="remember" type="checkbox" class="peer appearance-none w-5 h-5 border-2 border-slate-300 rounded cursor-pointer checked:bg-brand-500 checked:border-brand-500 transition-all">
                        <svg class="absolute w-3 h-3 text-white opacity-0 peer-checked:opacity-100 pointer-events-none transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <label for="remember" class="text-[14px] text-slate-600 font-medium cursor-pointer select-none">Ingat saya di perangkat ini</label>
                </div>

                <button type="submit" class="w-full relative group overflow-hidden rounded-xl bg-brand-500 text-white font-bold text-[15px] py-4 shadow-lg shadow-brand-500/20 hover:shadow-xl hover:shadow-brand-500/40 transition-all focus:outline-none focus:ring-4 focus:ring-brand-500/30 transform hover:-translate-y-1">
                    <span class="relative z-10 flex items-center justify-center gap-2">
                        Masuk ke Dasbor
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </span>
                    <!-- Hover Effect Background -->
                    <div class="absolute inset-0 h-full w-0 bg-brand-600 transition-all duration-300 ease-out group-hover:w-full z-0"></div>
                </button>
            </form>

            <div class="mt-10 text-center text-[14px] text-slate-500 font-medium">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="font-bold text-brand-600 hover:text-brand-700 ml-1 transition-colors relative after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-brand-600 after:scale-x-0 hover:after:scale-x-100 after:transition-transform after:origin-left">Buat akun sekarang</a>
            </div>
        </div>
    </div>
</body>
</html>
