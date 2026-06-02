<x-app-layout>
    <div class="py-12 bg-[#0b1120] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h2 class="text-4xl font-black text-white tracking-tighter uppercase italic">
                        Expert <span class="text-purple-500">Mentors</span>
                    </h2>
                    <p class="text-gray-500 text-[10px] font-black tracking-[0.4em] uppercase mt-2">Lumina Academy Faculty Members</p>
                </div>
                
                <div class="glass px-6 py-3 rounded-2xl border border-purple-500/20">
                    <span class="text-gray-400 text-[10px] font-bold uppercase tracking-widest">Total Instructors:</span>
                    <span class="ml-2 text-purple-400 font-black text-xl">{{ $users->count() }}</span>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($users as $user)
                    <div class="glass group relative overflow-hidden rounded-[2.5rem] border border-white/5 hover:border-purple-500/50 transition-all duration-500">
                        <div class="absolute -right-16 -top-16 w-40 h-40 bg-purple-500/10 blur-[50px] group-hover:bg-purple-500/20 transition-all"></div>
                        
                        <div class="p-8 relative z-10">
                            <div class="flex items-center gap-5 mb-6">
                                <div class="w-16 h-16 rounded-2xl bg-purple-500/20 border border-purple-500/30 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                                    👨‍🏫
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-white group-hover:text-purple-400 transition-colors">{{ $user->name }}</h3>
                                    <p class="text-[10px] font-black text-gray-500 uppercase tracking-widest">Verified Instructor</p>
                                </div>
                            </div>

                            <div class="space-y-3 border-t border-white/5 pt-5">
                                <div class="flex justify-between items-center text-xs">
                                    <span class="text-gray-500 uppercase font-bold tracking-tighter">Status</span>
                                    <span class="px-3 py-1 bg-green-500/10 text-green-400 rounded-full text-[10px] font-black uppercase">Active</span>
                                </div>
                                <div class="flex justify-between items-center text-xs">
                                    <span class="text-gray-500 uppercase font-bold tracking-tighter">Email</span>
                                    <span class="text-gray-300 italic">{{ $user->email }}</span>
                                </div>
                            </div>

                            <button class="w-full mt-6 py-3 bg-white/5 border border-white/10 rounded-xl text-[10px] font-black uppercase tracking-[0.2em] hover:bg-purple-500 hover:text-white transition-all">
                                View Profile
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full glass p-20 rounded-[3rem] text-center border border-dashed border-white/10">
                        <div class="text-4xl mb-4">🔍</div>
                        <p class="text-gray-500 font-black uppercase tracking-widest text-xs">No teachers found in the database.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <style>
        .glass {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(20px);
        }
    </style>
</x-app-layout>