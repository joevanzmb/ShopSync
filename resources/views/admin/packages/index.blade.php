<x-layout.admin>
    <div class="mb-8 flex justify-between items-end">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Paket & Langganan</h1>
            <p class="text-sm text-slate-500 mt-1 font-medium">Atur paket langganan dan durasi yang tersedia untuk member.</p>
        </div>
        <button class="flex items-center px-4 py-2 bg-admin-600 text-white font-bold rounded-xl shadow-sm hover:bg-admin-700 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Buat Paket Baru
        </button>
    </div>

    <!-- Empty State for Packages (Since we just created the table) -->
    <div class="bg-white border border-slate-200 rounded-3xl shadow-sm p-12 text-center">
        <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-admin-50 text-admin-600 mb-6">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
        </div>
        <h3 class="text-xl font-extrabold text-slate-900 mb-2">Belum ada paket langganan</h3>
        <p class="text-slate-500 font-medium max-w-md mx-auto mb-8">
            Sistem saat ini belum memiliki paket berlangganan. Buat paket pertama Anda agar member dapat memilih opsi berlangganan.
        </p>
        <button class="inline-flex items-center px-6 py-3 bg-admin-600 text-white font-bold rounded-xl shadow-sm hover:bg-admin-700 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Buat Paket Perdana
        </button>
    </div>
</x-layout.admin>
