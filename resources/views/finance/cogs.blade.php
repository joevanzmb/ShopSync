<x-layout.app>
    <!-- COGS Table -->
    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <h2 class="text-lg font-extrabold text-slate-900">Daftar Harga Pokok Penjualan (HPP) per SKU</h2>
            <button class="bg-tosca-500 hover:bg-tosca-600 text-white px-5 py-2.5 rounded-xl text-sm font-extrabold shadow-sm transition-all flex items-center">
                Simpan Perubahan
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th class="py-4 px-6 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">SKU</th>
                        <th class="py-4 px-3 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Nama Produk</th>
                        <th class="py-4 px-3 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Harga Jual</th>
                        <th class="py-4 px-3 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider">Harga Modal (COGS)</th>
                        <th class="py-4 px-6 text-[11px] font-extrabold text-slate-500 uppercase tracking-wider text-right">Margin Kasar</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($variants as $variant)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="py-3 px-6 pl-10 text-slate-500 font-medium text-xs flex items-center">
                            <svg class="w-4 h-4 mr-2 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg> 
                            {{ $variant->sku }}
                        </td>
                        <td class="py-3 px-3">
                            <div class="flex items-center gap-3">
                                <img src="{{ $variant->image_url ?? ($variant->product->image_url ?? 'https://via.placeholder.com/100') }}" alt="Product" class="w-8 h-8 rounded-lg object-cover border border-slate-100 shadow-sm">
                                <span class="text-slate-600 text-sm">{{ $variant->product->name }} - {{ $variant->name }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-3 font-semibold text-slate-900">Rp {{ number_format($variant->price, 0, ',', '.') }}</td>
                        <td class="py-3 px-3">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-slate-500 text-xs font-bold">Rp</span>
                                </div>
                                <input type="text" value="{{ number_format($variant->cogs, 0, '', '') }}" class="w-32 pl-8 pr-3 py-1.5 border border-slate-200 rounded-lg text-sm bg-slate-50 focus:bg-white focus:ring-2 focus:ring-tosca-500/20 focus:outline-none">
                            </div>
                        </td>
                        <td class="py-3 px-6 text-right font-extrabold text-emerald-600">
                            {{ $variant->price > 0 ? round((($variant->price - $variant->cogs) / $variant->price) * 100, 1) : 0 }}%
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-16 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <h3 class="text-lg font-extrabold text-slate-900 mb-1">Belum Ada Data Produk</h3>
                                <p class="text-sm text-slate-500 max-w-sm mx-auto mb-6">Database produk dan variasi kosong. Tarik data dari marketplace Anda untuk mulai mengatur Harga Modal (COGS).</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout.app>
