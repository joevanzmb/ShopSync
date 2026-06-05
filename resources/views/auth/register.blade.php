<!DOCTYPE html>
<html lang="id" class="h-full bg-white antialiased">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="view-transition" content="same-origin">
    <title>Daftar - ShopSync by Sitezet</title>
    <link rel="icon" type="image/png" href="/shopsync.png">
    <!-- Outfit Font -->
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
                        'slide-up': 'slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                        'slide-left': 'slideLeft 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                        'spin-slow': 'spin 12s linear infinite',
                        'pulse-glow': 'pulseGlow 4s ease-in-out infinite',
                    },
                    keyframes: {
                        slideUp: {
                            '0%': { opacity: 0, transform: 'translateY(20px)' },
                            '100%': { opacity: 1, transform: 'translateY(0)' },
                        },
                        slideLeft: {
                            '0%': { opacity: 0, transform: 'translateX(20px)' },
                            '100%': { opacity: 1, transform: 'translateX(0)' },
                        },
                        pulseGlow: {
                            '0%, 100%': { opacity: 0.8, filter: 'blur(40px)' },
                            '50%': { opacity: 0.4, filter: 'blur(60px)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
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
        
        .bg-pattern {
            background-image: 
                radial-gradient(at 40% 20%, hsla(170,100%,74%,0.15) 0px, transparent 50%),
                radial-gradient(at 80% 0%, hsla(189,100%,56%,0.15) 0px, transparent 50%),
                radial-gradient(at 0% 50%, hsla(170,100%,74%,0.1) 0px, transparent 50%);
            background-color: #0a0a0a;
        }
        
        .feature-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: transform 0.3s ease, background 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.06);
            border-color: rgba(20, 184, 166, 0.3);
        }
        
        .panel-white { view-transition-name: panel-white; }
        .panel-dark { view-transition-name: panel-dark; }
    </style>
</head>
<body class="min-h-screen lg:h-screen font-sans text-slate-800 flex flex-col lg:flex-row-reverse bg-dark-900 lg:overflow-hidden">

    <!-- Right Side (Visual/Brand) - Reversed for Register -->
    <div class="panel-dark hidden lg:flex lg:w-1/2 relative bg-pattern lg:overflow-hidden flex-col items-center justify-center p-12 z-0 lg:h-full">
        <!-- Abstract Rotating Element -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] pointer-events-none">
            <div class="absolute inset-0 rounded-full border border-brand-500/20 animate-spin-slow" style="animation-duration: 20s;"></div>
            <div class="absolute inset-8 rounded-full border border-blue-500/20 animate-spin-slow" style="animation-duration: 15s; animation-direction: reverse;"></div>
            <div class="absolute inset-16 rounded-full border border-emerald-500/20 border-dashed animate-spin-slow" style="animation-duration: 25s;"></div>
            <!-- Glow -->
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-brand-500/30 rounded-full animate-pulse-glow"></div>
        </div>

        <div class="relative z-10 w-full max-w-lg opacity-0 animate-slide-left" style="animation-delay: 0.1s;">
            <div class="mb-12 text-center">
                <a href="{{ route('landing') }}" class="inline-flex items-center mb-6">
                    <span class="text-3xl font-extrabold tracking-tight text-white">Shop<span class="text-brand-500">Sync</span></span>
                </a>
                <h2 class="text-4xl font-extrabold text-white tracking-tight leading-tight md:text-5xl">Mulai Transformasi<br/>Bisnis Anda.</h2>
                <p class="text-slate-400 mt-4 text-lg">Bergabunglah dengan ribuan pebisnis sukses lainnya.</p>
            </div>

            <div class="space-y-4">
                <div class="feature-card p-5 rounded-2xl flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-brand-500/20 text-brand-400 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-white font-bold text-lg">Sinkronisasi Instan</h4>
                        <p class="text-slate-400 text-sm mt-1">Stok dan pesanan terupdate seketika di semua toko online Anda.</p>
                    </div>
                </div>
                <div class="feature-card p-5 rounded-2xl flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-blue-500/20 text-blue-400 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-white font-bold text-lg">Analitik Cerdas</h4>
                        <p class="text-slate-400 text-sm mt-1">Pantau performa penjualan dengan dashboard yang komprehensif.</p>
                    </div>
                </div>
                <div class="feature-card p-5 rounded-2xl flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-purple-500/20 text-purple-400 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-white font-bold text-lg">Keamanan Terjamin</h4>
                        <p class="text-slate-400 text-sm mt-1">Data Anda dilindungi dengan enkripsi level enterprise.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Left Side: Registration Form Area -->
    <div class="panel-white w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 xl:p-24 relative z-20 bg-white lg:rounded-r-[3rem] lg:shadow-[20px_0_50px_rgba(0,0,0,0.3)] lg:overflow-y-auto lg:h-full">
        <div class="w-full max-w-[440px] relative z-20 opacity-0 animate-slide-up py-10" style="animation-delay: 0.2s;" 
             x-data="{ 
                 showPassword: false, 
                 password: '',
                 get strength() { 
                     let score = 0; 
                     if(this.password.length > 7) score += 25; 
                     if(this.password.match(/[A-Z]/)) score += 25; 
                     if(this.password.match(/[0-9]/)) score += 25; 
                     if(this.password.match(/[^A-Za-z0-9]/)) score += 25; 
                     return score; 
                 }, 
                 get strengthLabel() { 
                     if(this.password.length === 0) return '';
                     if(this.strength < 50) return 'Lemah'; 
                     if(this.strength < 100) return 'Sedang'; 
                     return 'Kuat'; 
                 },
                 get strengthColor() {
                     if(this.strength < 50) return 'bg-red-500'; 
                     if(this.strength < 100) return 'bg-yellow-400'; 
                     return 'bg-brand-500'; 
                 }
             }">
            
            <!-- Mobile Header -->
            <div class="lg:hidden mb-10 flex flex-col items-center text-center">
                <a href="{{ route('landing') }}" class="flex items-center mb-6">
                    <span class="text-3xl font-extrabold tracking-tight text-slate-900">Shop<span class="text-brand-500">Sync</span></span>
                </a>
                <h2 class="text-2xl font-bold text-slate-900">Buat Akun Baru</h2>
                <p class="text-slate-500 mt-2 text-sm">Mulai atur bisnis Anda dengan lebih cerdas</p>
            </div>

            <!-- Desktop Header -->
            <div class="hidden lg:block mb-8">
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Buat Akun Baru</h2>
                <p class="text-slate-500 mt-2 text-base font-medium">Lengkapi form di bawah untuk bergabung.</p>
            </div>

            <!-- SSO Button -->
            <button type="button" class="w-full flex items-center justify-center gap-3 py-3.5 px-4 bg-white border-2 border-slate-100 rounded-xl hover:border-slate-200 hover:bg-slate-50 transition-all text-[15px] font-bold text-slate-700 focus:outline-none mb-8 group">
                <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-300" viewBox="0 0 24 24">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.16v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.16C1.43 8.55 1 10.22 1 12s.43 3.45 1.16 4.93l2.85-2.22.83-.62z" fill="#FBBC05"/>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.16 7.07l3.68 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                </svg>
                Daftar dengan Google
            </button>

            <div class="relative mb-8 flex items-center">
                <div class="flex-grow border-t border-slate-200"></div>
                <span class="flex-shrink-0 mx-4 text-slate-400 text-xs font-bold uppercase tracking-wider">Atau daftar manual</span>
                <div class="flex-grow border-t border-slate-200"></div>
            </div>

            <!-- Form -->
            <form action="{{ route('store.register') ?? '#' }}" method="POST" class="space-y-5">
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
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="input-group">
                        <input id="first_name" name="first_name" type="text" value="{{ old('first_name') }}" required placeholder=" "
                            class="block w-full border border-slate-200 rounded-xl focus:outline-none transition-all text-slate-900 font-medium">
                        <label for="first_name">Nama Depan</label>
                    </div>
                    <div class="input-group">
                        <input id="last_name" name="last_name" type="text" value="{{ old('last_name') }}" required placeholder=" "
                            class="block w-full border border-slate-200 rounded-xl focus:outline-none transition-all text-slate-900 font-medium">
                        <label for="last_name">Nama Belakang</label>
                    </div>
                </div>

                <div class="input-group">
                    <input id="store_name" name="store_name" type="text" value="{{ old('store_name') }}" required placeholder=" "
                        class="block w-full border border-slate-200 rounded-xl focus:outline-none transition-all text-slate-900 font-medium">
                    <label for="store_name">Nama Toko Utama</label>
                </div>

                <div class="input-group">
                    <input id="email" name="email" type="email" autocomplete="email" value="{{ old('email') }}" required placeholder=" "
                        class="block w-full border border-slate-200 rounded-xl focus:outline-none transition-all text-slate-900 font-medium">
                    <label for="email">Alamat Email</label>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="input-group">
                        <input id="password" name="password" x-bind:type="showPassword ? 'text' : 'password'" required placeholder=" " x-model="password"
                            class="block w-full pr-12 border border-slate-200 rounded-xl focus:outline-none transition-all text-slate-900 font-medium">
                        <label for="password">Kata Sandi</label>
                        <button type="button" @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-brand-600 transition-colors focus:outline-none z-10">
                            <svg x-show="!showPassword" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            <svg x-show="showPassword" x-cloak class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                        </button>
                    </div>
                    <div class="input-group">
                        <input id="password_confirmation" name="password_confirmation" x-bind:type="showPassword ? 'text' : 'password'" required placeholder=" "
                            class="block w-full border border-slate-200 rounded-xl focus:outline-none transition-all text-slate-900 font-medium">
                        <label for="password_confirmation">Ulangi Sandi</label>
                    </div>
                    
                    <!-- Password Strength Indicator -->
                    <div class="col-span-2" x-show="password.length > 0" x-transition.opacity x-cloak>
                        <div class="flex items-center justify-between mb-1.5">
                            <span class="text-xs font-bold text-slate-500">Kekuatan Sandi:</span>
                            <span class="text-xs font-extrabold" :class="{
                                'text-red-500': strength < 50,
                                'text-yellow-500': strength >= 50 && strength < 100,
                                'text-brand-500': strength === 100
                            }" x-text="strengthLabel"></span>
                        </div>
                        <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden flex gap-1">
                            <div class="h-full rounded-full transition-all duration-300" :class="strengthColor" :style="'width: ' + (strength > 0 ? 33 : 0) + '%'"></div>
                            <div class="h-full rounded-full transition-all duration-300" :class="strength >= 50 ? strengthColor : 'bg-transparent'" :style="'width: ' + (strength >= 50 ? 33 : 0) + '%'"></div>
                            <div class="h-full rounded-full transition-all duration-300" :class="strength === 100 ? strengthColor : 'bg-transparent'" :style="'width: ' + (strength === 100 ? 33 : 0) + '%'"></div>
                        </div>
                        <p class="text-[10px] text-slate-400 mt-2 font-medium leading-tight">Gunakan kombinasi minimal 8 karakter dengan huruf kapital, angka, dan simbol.</p>
                    </div>
                </div>

                <div class="flex items-start mb-6">
                    <div class="relative flex items-center justify-center w-5 h-5 mr-3 mt-0.5">
                        <input id="terms" name="terms" type="checkbox" required class="peer appearance-none w-5 h-5 border-2 border-slate-300 rounded cursor-pointer checked:bg-brand-500 checked:border-brand-500 transition-all">
                        <svg class="absolute w-3 h-3 text-white opacity-0 peer-checked:opacity-100 pointer-events-none transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <label for="terms" class="text-[13px] text-slate-600 font-medium cursor-pointer leading-tight">
                        Saya setuju dengan <a href="#" class="text-brand-600 font-bold hover:underline">Syarat & Ketentuan</a> serta <a href="#" class="text-brand-600 font-bold hover:underline">Kebijakan Privasi</a> dari ShopSync.
                    </label>
                </div>

                <button type="submit" class="w-full relative group overflow-hidden rounded-xl bg-brand-600 text-white font-bold text-[15px] py-4 shadow-lg shadow-brand-600/30 hover:shadow-xl hover:shadow-brand-500/40 transition-all focus:outline-none focus:ring-4 focus:ring-brand-500/30 transform hover:-translate-y-1">
                    <span class="relative z-10 flex items-center justify-center gap-2">
                        Buat Akun Saya
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </span>
                    <div class="absolute inset-0 h-full w-0 bg-dark-900 transition-all duration-300 ease-out group-hover:w-full z-0"></div>
                </button>
            </form>

            <div class="mt-8 text-center text-[14px] text-slate-500 font-medium">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="font-bold text-dark-900 hover:text-brand-600 ml-1 transition-colors relative after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-brand-600 after:scale-x-0 hover:after:scale-x-100 after:transition-transform after:origin-left">Masuk di sini</a>
            </div>
        </div>
    </div>
</body>
</html>
