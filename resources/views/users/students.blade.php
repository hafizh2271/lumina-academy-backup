<x-app-layout>
    <div class="py-12 bg-[#0b1120] min-h-screen text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-12 flex justify-between items-center">
                <div>
                    <h2 class="text-4xl font-black tracking-tighter uppercase italic">
                        Lumina <span class="text-cyan-400">Database</span>
                    </h2>
                    <div class="flex gap-4 mt-2">
                        <a href="{{ route('users.students') }}" class="text-[10px] font-black tracking-[0.2em] {{ request()->routeIs('users.students') ? 'text-cyan-400 border-b-2 border-cyan-400' : 'text-gray-500' }} pb-1 uppercase">Siswa</a>
                        <a href="{{ route('users.teachers') }}" class="text-[10px] font-black tracking-[0.2em] {{ request()->routeIs('users.teachers') ? 'text-purple-400' : 'text-gray-500' }} pb-1 uppercase">Guru</a>
                        <a href="{{ route('users.alumni') }}" class="text-[10px] font-black tracking-[0.2em] {{ request()->routeIs('users.alumni') ? 'text-yellow-500' : 'text-gray-500' }} pb-1 uppercase">Alumni</a>
                    </div>
                </div>
                
                <div class="relative">
                    <input type="text" placeholder="Cari Identitas..." class="bg-white/5 border border-white/10 rounded-full px-6 py-2 text-xs focus:border-cyan-500 focus:ring-0 w-64 transition-all">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($users as $user)
                <div class="group relative bg-white/5 border border-white/10 rounded-[2rem] p-6 hover:bg-cyan-500/5 transition-all duration-500 hover:border-cyan-500/50 hover:-translate-y-2">
                    <div class="absolute inset-0 bg-cyan-500/5 opacity-0 group-hover:opacity-100 blur-3xl transition-opacity rounded-[2rem]"></div>
                    
                    <div class="relative z-10 flex items-center gap-5">
                        <div class="relative">
                            @if($user->avatar)
                                <img src="{{ asset('storage/' . $user->avatar) }}" class="w-20 h-20 rounded-2xl object-cover border-2 border-white/10 group-hover:border-cyan-500 transition-colors">
                            @else
                                <div class="w-20 h-20 bg-gradient-to-tr from-gray-700 to-gray-800 rounded-2xl flex items-center justify-center text-2xl font-black border-2 border-white/10 group-hover:border-cyan-500 transition-all">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                            @endif
                            <div class="absolute -bottom-2 -right-2 bg-cyan-500 text-slate-900 text-[8px] font-black px-2 py-1 rounded-md uppercase tracking-tighter">
                                Active
                            </div>
                        </div>

                        <div class="flex-1">
                            <h3 class="text-lg font-black tracking-tight group-hover:text-cyan-400 transition-colors">{{ $user->name }}</h3>
                            <p class="text-[10px] font-bold text-gray-500 uppercase tracking-widest mt-1">NISN: {{ $user->nisn ?? 'N/A' }}</p>
                            <div class="flex gap-2 mt-3">
                                <span class="text-[9px] bg-white/5 px-2 py-1 rounded-lg font-bold border border-white/5 uppercase italic">Kelas XII-Sains 1</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 pt-4 border-t border-white/5 flex justify-between items-center relative z-10">
                        <div class="flex -space-x-2">
                            <div class="w-6 h-6 rounded-full bg-cyan-500/20 border border-cyan-500/50 flex items-center justify-center text-[8px]">★</div>
                        </div>
                        <a href="#" class="text-[9px] font-black uppercase tracking-widest text-cyan-400 opacity-0 group-hover:opacity-100 transition-opacity">
                            Lihat Profil →
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>