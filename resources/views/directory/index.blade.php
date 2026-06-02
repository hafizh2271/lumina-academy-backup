<x-app-layout>
    <div class="py-12 bg-[#0b1120] min-h-screen text-white relative overflow-hidden">
        <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-cyan-500/10 blur-[120px] rounded-full"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
                <div>
                    <h2 class="text-4xl font-black tracking-tighter uppercase italic">Neural <span class="text-cyan-400">Directory</span></h2>
                    <p class="text-gray-500 text-[10px] font-bold tracking-[0.3em] uppercase mt-2">Mengakses database personil Lumina Academy...</p>
                </div>
                
                <form action="{{ route('directory.index') }}" method="GET" class="relative group">
                    <input type="text" name="search" placeholder="CARI AGENT (NAMA/NISN)..." value="{{ request('search') }}"
                           class="bg-white/5 border border-white/10 rounded-2xl py-3 px-6 w-full md:w-80 text-xs font-mono focus:border-cyan-500 focus:ring-0 transition-all">
                    <button type="submit" class="absolute right-4 top-3 opacity-50 group-hover:opacity-100">🔍</button>
                </form>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($users as $user)
                <div class="glass group p-6 rounded-[2rem] border border-white/5 hover:border-cyan-500/50 transition-all duration-500 transform hover:-translate-y-2">
                    <div class="relative mb-6">
                        <div class="w-20 h-20 mx-auto rounded-2xl overflow-hidden border-2 border-white/10 group-hover:border-cyan-500/50 transition-all p-1">
                            @if($user->avatar)
                                <img src="{{ asset('storage/' . $user->avatar) }}" class="w-full h-full object-cover rounded-xl">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-gray-800 to-black flex items-center justify-center text-xl font-black text-white/20">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                        <div class="absolute -bottom-2 left-1/2 -translate-x-1/2 bg-cyan-500 text-black text-[8px] font-black px-3 py-1 rounded-full uppercase tracking-tighter shadow-[0_0_15px_rgba(34,211,238,0.5)]">
                            {{ $user->role }}
                        </div>
                    </div>

                    <div class="text-center">
                        <h3 class="font-bold text-sm truncate uppercase tracking-tight group-hover:text-cyan-400 transition-colors">{{ $user->name }}</h3>
                        <p class="text-[9px] font-mono text-gray-500 mt-1 uppercase tracking-widest">
                            ID: {{ $user->nisn ?? $user->nip ?? 'N/A' }}
                        </p>
                    </div>

                    <div class="mt-6 pt-4 border-t border-white/5">
                        <button class="w-full py-2 bg-white/5 hover:bg-white/10 rounded-xl text-[9px] font-black uppercase tracking-[0.2em] transition-all">
                            View Dossier
                        </button>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-12">
                {{ $users->links() }}
            </div>
        </div>
    </div>

    <style>
        .glass { background: rgba(255, 255, 255, 0.02); backdrop-filter: blur(15px); }
        /* Custom Pagination Style */
        .pagination { @apply flex justify-center gap-2; }
    </style>
</x-app-layout>