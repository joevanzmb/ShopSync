<x-layout.admin>
    <div class="mb-8 flex justify-between items-end">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Kelola Pengguna</h1>
            <p class="text-sm text-slate-500 mt-1 font-medium">Daftar pengguna (member) yang terdaftar di sistem ShopSync.</p>
        </div>
        <button class="flex items-center px-4 py-2 bg-admin-600 text-white font-bold rounded-xl shadow-sm hover:bg-admin-700 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Pengguna Manual
        </button>
    </div>

    <div class="bg-white border border-slate-200 rounded-3xl shadow-sm overflow-hidden">
        <div class="p-4 border-b border-slate-100 bg-slate-50 flex items-center justify-between">
            <div class="relative w-72">
                <input type="text" placeholder="Cari pengguna..." class="w-full pl-10 pr-4 py-2 rounded-xl border border-slate-200 focus:outline-none focus:border-admin-500 text-sm font-medium">
                <svg class="w-5 h-5 text-slate-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100 text-xs font-extrabold text-slate-500 uppercase tracking-wider">
                        <th class="px-6 py-4">Nama Pengguna</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Terdaftar Pada</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($users as $user)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <div class="h-10 w-10 rounded-full bg-admin-100 text-admin-600 flex items-center justify-center font-bold text-lg">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-bold text-slate-900">{{ $user->name }}</div>
                                    <div class="text-xs text-slate-500">ID: {{ $user->id }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-slate-900">{{ $user->email }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($user->status === 'active')
                                <span class="px-3 py-1 inline-flex text-[11px] leading-5 font-extrabold rounded-full bg-emerald-100 text-emerald-800">
                                    Aktif
                                </span>
                            @else
                                <span class="px-3 py-1 inline-flex text-[11px] leading-5 font-extrabold rounded-full bg-red-100 text-red-800">
                                    Diblokir
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 font-medium">
                            {{ $user->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button class="text-admin-600 hover:text-admin-900 font-bold bg-admin-50 px-3 py-1.5 rounded-lg mr-2 transition-colors">Edit</button>
                            @if($user->status === 'active')
                                <button class="text-red-600 hover:text-red-900 font-bold bg-red-50 px-3 py-1.5 rounded-lg transition-colors">Blokir</button>
                            @else
                                <button class="text-emerald-600 hover:text-emerald-900 font-bold bg-emerald-50 px-3 py-1.5 rounded-lg transition-colors">Aktifkan</button>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center text-slate-400">
                                <svg class="w-16 h-16 mb-4 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                <p class="text-lg font-bold text-slate-600">Belum ada pengguna</p>
                                <p class="text-sm font-medium mt-1">Sistem saat ini belum memiliki member yang mendaftar.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout.admin>
