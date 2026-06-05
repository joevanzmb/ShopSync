<!-- Miniature Dashboard Mockup -->
<div {{ $attributes->merge(['class' => 'relative z-20 w-[760px] h-[480px] bg-slate-50 rounded-xl shadow-[0_20px_50px_rgba(0,0,0,0.4)] overflow-hidden flex flex-col border border-slate-200']) }}>
                    
                    <!-- Mac Title Bar -->
                    <div class="h-8 bg-slate-100 flex items-center px-4 shrink-0 border-b border-slate-200">
                        <div class="flex items-center gap-1.5">
                            <div class="w-2.5 h-2.5 rounded-full bg-[#ff5f56]"></div>
                            <div class="w-2.5 h-2.5 rounded-full bg-[#ffbd2e]"></div>
                            <div class="w-2.5 h-2.5 rounded-full bg-[#27c93f]"></div>
                        </div>
                    </div>
                    
                    <!-- Topbar -->
                    <div class="h-14 bg-white border-b border-slate-200 flex items-center justify-between px-5 shrink-0">
                        <div class="text-2xl font-extrabold text-slate-800 tracking-tight">Shop<span class="text-brand-500">Sync</span></div>
                        <div class="flex items-center gap-3">
                            <div class="bg-amber-50 text-amber-600 px-3 py-1.5 rounded-full text-xs font-bold flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Sisa 14 Hari
                            </div>
                            <div class="flex items-center gap-2 border border-slate-200 rounded-full px-3 py-1 bg-slate-50">
                                <div class="flex -space-x-1.5">
                                    <div class="w-5 h-5 rounded-full bg-orange-500 border-2 border-slate-50"></div>
                                    <div class="w-5 h-5 rounded-full bg-orange-400 border-2 border-slate-50"></div>
                                    <div class="w-5 h-5 rounded-full bg-green-500 border-2 border-slate-50"></div>
                                    <div class="w-5 h-5 rounded-full bg-slate-800 border-2 border-slate-50"></div>
                                </div>
                                <span class="text-xs font-bold text-slate-700 ml-1">4 Toko</span>
                                <svg class="w-3 h-3 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div class="flex items-center gap-2 pl-2 border-l border-slate-200">
                                <div class="w-8 h-8 rounded-full bg-brand-500 text-white flex items-center justify-center font-bold text-sm">JO</div>
                                <div class="flex flex-col">
                                    <span class="text-xs font-bold text-slate-800 leading-none">Joevanz</span>
                                    <span class="text-[9px] text-brand-500 font-bold uppercase tracking-wide">Premium</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Main Layout -->
                    <div class="flex flex-1 overflow-hidden">
                        <!-- Sidebar -->
                        <div class="w-40 bg-white border-r border-slate-200 p-3 flex flex-col gap-1.5 shrink-0">
                            <div class="text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-2 mt-1 px-2">Menu Utama</div>
                            <div class="flex items-center gap-2.5 px-3 py-2 bg-brand-50 text-brand-600 rounded-lg font-bold text-xs">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                                Dashboard
                            </div>
                            <div class="flex items-center justify-between px-3 py-2 text-slate-500 font-semibold text-xs">
                                <div class="flex items-center gap-2.5">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    Pesanan
                                </div>
                                <span class="bg-brand-100 text-brand-600 text-[9px] font-bold px-1.5 py-0.5 rounded-full">45</span>
                            </div>
                            <div class="flex items-center justify-between px-3 py-2 text-slate-500 font-semibold text-xs">
                                <div class="flex items-center gap-2.5">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                    Produk
                                </div>
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div class="flex items-center justify-between px-3 py-2 text-slate-500 font-semibold text-xs">
                                <div class="flex items-center gap-2.5">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Keuangan
                                </div>
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            
                            <div class="text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-2 mt-4 px-2">Pengaturan Akun</div>
                            <div class="flex items-center gap-2.5 px-3 py-2 text-slate-500 font-semibold text-xs">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                Profil
                            </div>
                        </div>
                        
                        <!-- Content Area -->
                        <div class="flex-1 p-5 flex flex-col gap-4 overflow-hidden bg-slate-50">
                            
                            <!-- Stat Cards -->
                            <div class="grid grid-cols-3 gap-4 shrink-0">
                                <div class="bg-white p-3.5 rounded-xl border border-slate-200 shadow-sm relative overflow-hidden">
                                    <div class="flex justify-between items-start mb-2">
                                        <div class="text-xs text-slate-500 font-bold">Total Penjualan</div>
                                        <div class="w-7 h-7 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center"><svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                                    </div>
                                    <div class="text-2xl font-extrabold text-slate-800 mb-1">Rp 85.45<span class="text-base">JT</span></div>
                                    <div class="text-[9px] text-blue-500 font-bold flex items-center gap-1">
                                        <svg class="w-2.5 h-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                        +12.5% hari ini
                                    </div>
                                </div>
                                <div class="bg-white p-3.5 rounded-xl border border-slate-200 shadow-sm relative overflow-hidden">
                                    <div class="flex justify-between items-start mb-2">
                                        <div class="text-xs text-slate-500 font-bold">Total Pesanan</div>
                                        <div class="w-7 h-7 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center"><svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg></div>
                                    </div>
                                    <div class="text-2xl font-extrabold text-slate-800 mb-1">458</div>
                                    <div class="text-[9px] text-emerald-500 font-bold flex items-center gap-1">
                                        <svg class="w-2.5 h-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                        +8.2% hari ini
                                    </div>
                                </div>
                                <!-- Perhatian / Antrian -->
                                <div class="bg-white p-3.5 rounded-xl border border-slate-200 shadow-sm relative overflow-hidden">
                                    <div class="flex justify-between items-start mb-2">
                                        <div class="text-xs text-slate-500 font-bold">Perlu Dikirim</div>
                                        <div class="w-7 h-7 rounded-full bg-red-50 text-red-600 flex items-center justify-center"><svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                                    </div>
                                    <div class="text-2xl font-extrabold text-slate-800 mb-1">12 <span class="text-[10px] font-bold text-slate-500">Antrian</span></div>
                                    <div class="text-[9px] text-red-500 font-bold">Segera proses</div>
                                </div>
                            </div>
                            
                            <!-- Bottom Section (Stores & Chart) -->
                            <div class="flex gap-4 flex-1 overflow-hidden">
                                <!-- Status Toko -->
                                <div class="w-[55%] bg-white border border-slate-200 rounded-xl p-3.5 flex flex-col shadow-sm">
                                    <div class="flex justify-between items-center mb-1.5">
                                        <div class="text-xs font-bold text-slate-800 flex items-center gap-2">
                                            <div class="w-2 h-2 rounded-full bg-brand-500 animate-ping"></div>
                                            Toko Terhubung
                                        </div>
                                        <div class="text-[10px] font-bold text-brand-600">4 Aktif</div>
                                    </div>
                                    <div class="flex flex-col gap-1 overflow-hidden justify-center flex-1">
                                        <!-- Shopee Toko A -->
                                        <div class="flex items-center gap-2.5 bg-slate-50 p-1 rounded-lg border border-slate-100 hover:bg-slate-100 transition-colors cursor-pointer">
                                            <img src="{{ asset('logo/kotakshopee.png') }}" class="w-6 h-6 rounded object-contain shadow-sm border border-slate-200" alt="Shopee">
                                            <div class="flex-1">
                                                <div class="text-[11px] font-bold text-slate-800 leading-tight">Toko A</div>
                                                <div class="text-[9px] text-slate-500 font-medium leading-none">Shopee</div>
                                            </div>
                                            <div class="flex flex-col items-end">
                                                <div class="text-[9px] font-extrabold text-slate-800 leading-tight">180 psn</div>
                                                <div class="flex items-center gap-1 text-[8px] font-bold text-emerald-500">
                                                    <div class="w-1 h-1 rounded-full bg-emerald-500"></div> Sync
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Shopee Toko B -->
                                        <div class="flex items-center gap-2.5 bg-slate-50 p-1 rounded-lg border border-slate-100 hover:bg-slate-100 transition-colors cursor-pointer">
                                            <img src="{{ asset('logo/kotakshopee.png') }}" class="w-6 h-6 rounded object-contain shadow-sm border border-slate-200" alt="Shopee">
                                            <div class="flex-1">
                                                <div class="text-[11px] font-bold text-slate-800 leading-tight">Toko B</div>
                                                <div class="text-[9px] text-slate-500 font-medium leading-none">Shopee</div>
                                            </div>
                                            <div class="flex flex-col items-end">
                                                <div class="text-[9px] font-extrabold text-slate-800 leading-tight">110 psn</div>
                                                <div class="flex items-center gap-1 text-[8px] font-bold text-emerald-500">
                                                    <div class="w-1 h-1 rounded-full bg-emerald-500"></div> Sync
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Tokopedia Toko C -->
                                        <div class="flex items-center gap-2.5 bg-slate-50 p-1 rounded-lg border border-slate-100 hover:bg-slate-100 transition-colors cursor-pointer">
                                            <img src="{{ asset('logo/kotaktokped.png') }}" class="w-6 h-6 rounded object-contain shadow-sm border border-slate-200" alt="Tokopedia">
                                            <div class="flex-1">
                                                <div class="text-[11px] font-bold text-slate-800 leading-tight">Toko C</div>
                                                <div class="text-[9px] text-slate-500 font-medium leading-none">Tokopedia</div>
                                            </div>
                                            <div class="flex flex-col items-end">
                                                <div class="text-[9px] font-extrabold text-slate-800 leading-tight">210 psn</div>
                                                <div class="flex items-center gap-1 text-[8px] font-bold text-emerald-500">
                                                    <div class="w-1 h-1 rounded-full bg-emerald-500"></div> Sync
                                                </div>
                                            </div>
                                        </div>
                                        <!-- TikTok Shop Toko D -->
                                        <div class="flex items-center gap-2.5 bg-slate-50 p-1 rounded-lg border border-slate-100 hover:bg-slate-100 transition-colors cursor-pointer">
                                            <img src="{{ asset('logo/kotaktiktokshop.png') }}" class="w-6 h-6 rounded object-contain shadow-sm border border-slate-200" alt="TikTok">
                                            <div class="flex-1">
                                                <div class="text-[11px] font-bold text-slate-800 leading-tight">Toko D</div>
                                                <div class="text-[9px] text-slate-500 font-medium leading-none">TikTok Shop</div>
                                            </div>
                                            <div class="flex flex-col items-end">
                                                <div class="text-[9px] font-extrabold text-slate-800 leading-tight">68 psn</div>
                                                <div class="flex items-center gap-1 text-[8px] font-bold text-emerald-500">
                                                    <div class="w-1 h-1 rounded-full bg-emerald-500"></div> Sync
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Simple Chart -->
                                <div class="flex-1 bg-white border border-slate-200 rounded-xl p-3.5 flex flex-col shadow-sm">
                                    <div class="text-xs font-bold text-slate-800 mb-2">Grafik Penjualan</div>
                                    <div class="flex-1 flex items-end gap-2 px-1 pt-2 border-b border-slate-100 pb-2">
                                        <div class="w-full bg-brand-200 hover:bg-brand-500 transition-colors rounded-t h-[30%]"></div>
                                        <div class="w-full bg-brand-200 hover:bg-brand-500 transition-colors rounded-t h-[50%]"></div>
                                        <div class="w-full bg-brand-200 hover:bg-brand-500 transition-colors rounded-t h-[40%]"></div>
                                        <div class="w-full bg-brand-400 hover:bg-brand-500 transition-colors rounded-t h-[70%]"></div>
                                        <div class="w-full bg-brand-400 hover:bg-brand-500 transition-colors rounded-t h-[90%]"></div>
                                        <div class="w-full bg-brand-500 rounded-t h-[100%] shadow-[0_0_10px_rgba(20,184,166,0.5)]"></div>
                                    </div>
                                    <div class="flex justify-between mt-1 text-[8px] font-bold text-slate-400">
                                        <span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Ini</span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
