<x-app-layout>
    <div class="py-12 bg-[#0b1120] min-h-screen text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-10 flex justify-between items-end">
                <div>
                    <h2 class="text-4xl font-black tracking-tighter uppercase italic">
                        Specialized <span class="text-cyan-400">Courses</span>
                    </h2>
                    <p class="text-gray-500 text-[10px] font-bold tracking-[0.3em] mt-1">EXCLUSIVELY FOR GRADE XII - SEMESTER 2</p>
                </div>
                <a href="{{ route('dashboard') }}" class="text-[10px] font-black tracking-widest text-gray-400 hover:text-cyan-400 transition-all uppercase border-b border-white/10 pb-1">
                    [ Return to Base ]
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($courses as $course)
                <div class="glass p-8 rounded-[2.5rem] border border-white/10 relative overflow-hidden group hover:border-cyan-500/50 transition-all duration-500">
                    <div class="absolute -right-5 -top-5 w-24 h-24 bg-cyan-500/5 blur-2xl rounded-full group-hover:bg-cyan-500/20 transition-all"></div>
                    
                    <div class="relative z-10">
                        <div class="text-4xl mb-6">{{ $course['icon'] }}</div>
                        <h3 class="text-xl font-bold mb-2 group-hover:text-cyan-400 transition">{{ $course['name'] }}</h3>
                        <p class="text-[10px] text-gray-500 font-black uppercase tracking-widest mb-8">MENTOR: {{ $course['mentor'] }}</p>
                        
                        <div class="space-y-2">
                            <div class="flex justify-between text-[9px] font-black tracking-tighter uppercase">
                                <span class="text-gray-400">Learning Progress</span>
                                <span class="text-cyan-400">{{ $course['progress'] }}%</span>
                            </div>
                            <div class="w-full bg-white/5 h-1.5 rounded-full overflow-hidden">
                                <div class="bg-gradient-to-r from-cyan-500 to-blue-600 h-full shadow-[0_0_10px_rgba(34,211,238,0.5)]" style="width: {{ $course['progress'] }}%"></div>
                            </div>
                        </div>

                        <button class="w-full mt-8 py-3 rounded-2xl bg-white/5 border border-white/10 text-[10px] font-black uppercase tracking-[0.2em] hover:bg-cyan-500 hover:text-slate-900 transition-all">
                            Continue Mission
                        </button>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>

    <style>
        .glass { background: rgba(255, 255, 255, 0.02); backdrop-filter: blur(20px); }
    </style>
</x-app-layout>