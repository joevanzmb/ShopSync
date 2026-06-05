<x-layout.app>
    <div class="bg-white rounded-3xl p-10 shadow-sm border border-slate-100 flex flex-col items-center justify-center min-h-[65vh] text-center">
        <div class="w-24 h-24 bg-tosca-50 rounded-full flex items-center justify-center text-tosca-500 mb-6 shadow-sm border border-tosca-100/50">
            @if(isset($icon))
                {!! $icon !!}
            @else
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            @endif
        </div>
        <h2 class="text-3xl font-extrabold text-slate-900 mb-4">{{ $title }}</h2>
        <p class="text-lg text-slate-500 max-w-xl mb-8 leading-relaxed">{{ $description ?? 'Halaman ini sedang dalam tahap pengembangan. Antarmuka pengelolaan data akan segera tersedia dengan fitur premium untuk platform Anda.' }}</p>
        
        <a href="{{ route('dashboard') }}" class="bg-tosca-500 hover:bg-tosca-600 text-white px-7 py-3.5 rounded-xl font-bold shadow-[0_8px_20px_-6px_rgba(20,184,166,0.3)] hover:-translate-y-0.5 transition-all duration-200 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Dashboard
        </a>
    </div>
</x-layout.app>
