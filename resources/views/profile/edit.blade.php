<x-app-layout>
    <div class="py-12 bg-[#0b1120] min-h-screen text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <div class="mb-6 px-4 sm:px-0">
                <h2 class="text-3xl font-black tracking-tighter uppercase italic">
                    {{ auth()->user()->role === 'guru' ? 'Teacher' : 'Student' }} 
                    <span class="{{ auth()->user()->role === 'guru' ? 'text-purple-400' : 'text-cyan-400' }}">Identity</span>
                </h2>
                <p class="text-gray-500 text-xs font-bold tracking-[0.3em] mt-1 uppercase">
                    Sistem Manajemen Data {{ auth()->user()->role === 'guru' ? 'Pendidik' : 'Siswa' }}
                </p>
            </div>

            <div class="glass p-8 rounded-[2.5rem] border border-white/10 relative overflow-hidden bg-gradient-to-br {{ auth()->user()->role === 'guru' ? 'from-purple-500/20 to-pink-500/20 shadow-purple-500/10' : 'from-cyan-500/20 to-purple-500/20 shadow-cyan-500/10' }} shadow-2xl group">
                <div class="absolute top-10 left-10 w-12 h-10 bg-yellow-500/20 rounded-lg border border-yellow-500/50 flex flex-col gap-1 p-2">
                    <div class="w-full h-px bg-yellow-500/50"></div>
                    <div class="w-full h-px bg-yellow-500/50"></div>
                    <div class="w-full h-px bg-yellow-500/50"></div>
                </div>
                
                <div class="relative z-10 flex flex-col md:flex-row items-center gap-10">
                    <div class="bg-white p-5 rounded-[2rem] shadow-2xl transform group-hover:rotate-3 transition-all duration-500">
                       {!! \QrCode::size(160)
                            ->gradient(
                                auth()->user()->role === 'guru' ? 168 : 34, 
                                auth()->user()->role === 'guru' ? 85 : 211, 
                                auth()->user()->role === 'guru' ? 247 : 238, 
                                168, 85, 247, 'diagonal')
                            ->margin(1)
                            ->generate(auth()->user()->id)!!}
                        <div class="mt-3 text-center">
                            <span class="text-[8px] text-slate-900 font-black tracking-[0.3em] uppercase opacity-50">Lumina ID Scanner</span>
                        </div>
                    </div>

                    <div class="text-center md:text-left flex-1">
                        <div class="mb-4">
                            <span class="text-[9px] font-black {{ auth()->user()->role === 'guru' ? 'bg-purple-500' : 'bg-cyan-500' }} text-slate-900 px-3 py-1 rounded-full uppercase tracking-widest">
                                {{ auth()->user()->role === 'guru' ? 'Authorized Educator' : 'Active Student' }}
                            </span>
                        </div>
                        
                        <h2 class="text-4xl font-black italic tracking-tighter uppercase text-white leading-none mb-2">
                            {{ auth()->user()->name }}
                        </h2>
                        
                        <p class="{{ auth()->user()->role === 'guru' ? 'text-purple-400' : 'text-cyan-400' }} font-mono text-sm tracking-[0.4em] mb-6 uppercase">
                            {{ auth()->user()->role === 'guru' ? 'NIP' : 'ID_REG' }}: 
                            {{ auth()->user()->role === 'guru' ? (auth()->user()->nip ?? '000000000') : str_pad(auth()->user()->id, 6, '0', STR_PAD_LEFT) }}
                        </p>

                        <div class="flex justify-center md:justify-start gap-3">
                            <div class="bg-white/5 backdrop-blur-md px-4 py-2 rounded-xl border border-white/10">
                                <p class="text-[7px] text-gray-500 uppercase font-black">
                                    {{ auth()->user()->role === 'guru' ? 'Position' : 'Grade' }}
                                </p>
                                <p class="text-[10px] font-bold text-white uppercase">
                                    {{ auth()->user()->role === 'guru' ? (auth()->user()->role_type ?? 'STAFF') : 'XII - Science 1' }}
                                </p>
                            </div>
                            <div class="bg-white/5 backdrop-blur-md px-4 py-2 rounded-xl border border-white/10">
                                <p class="text-[7px] text-gray-500 uppercase font-black">Status</p>
                                <p class="text-[10px] font-bold text-green-400 uppercase">Verified</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="absolute -right-5 -bottom-10 text-[8rem] font-black italic text-white/5 select-none uppercase pointer-events-none">
                    {{ auth()->user()->role }}
                </div>
            </div>

            <div class="p-6 sm:p-10 glass rounded-[2.5rem] border border-white/10 shadow-2xl relative overflow-hidden">
                <div class="absolute -right-20 -top-20 w-64 h-64 {{ auth()->user()->role === 'guru' ? 'bg-purple-500/5' : 'bg-cyan-500/5' }} blur-[100px] rounded-full"></div>
                <div class="relative z-10 max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-6 sm:p-10 glass rounded-[2.5rem] border border-white/10 shadow-2xl relative overflow-hidden">
                <div class="absolute -left-20 -bottom-20 w-64 h-64 bg-blue-600/5 blur-[100px] rounded-full"></div>
                <div class="relative z-10 max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-6 sm:p-10 bg-red-500/5 rounded-[2.5rem] border border-red-500/10 shadow-2xl">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
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