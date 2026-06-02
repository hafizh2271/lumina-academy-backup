<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#05080a] relative overflow-hidden font-sans">
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-cyan-500/10 blur-[150px] rounded-full animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-blue-600/10 blur-[150px] rounded-full"></div>

        <div class="w-full max-w-md px-10 py-12 glass rounded-[3rem] border border-white/10 relative z-10 shadow-2xl">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-white/[0.01] to-transparent h-40 w-full animate-scan pointer-events-none"></div>

            <div class="text-center mb-12">
                <span class="text-cyan-400 text-[9px] font-black tracking-[0.6em] uppercase italic">System Security Protocol</span>
                <h2 class="text-4xl font-black tracking-tighter text-white mt-2">LUMINA<span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500 underline decoration-cyan-500/30"> AUTH</span></h2>
                <p class="text-gray-500 text-[10px] mt-4 font-light uppercase tracking-[0.2em]">Authorized Personnel Only</p>
            </div>

            <x-auth-session-status class="mb-4 text-center text-xs text-cyan-400" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-7">
                @csrf

                <div class="relative group">
                    <label class="block text-[10px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-4 group-focus-within:text-cyan-400 transition-colors">Identity Access (Email/NISN)</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus 
                        class="w-full bg-black/40 border border-white/5 rounded-2xl px-6 py-4 text-white text-xs placeholder-gray-700 focus:outline-none focus:border-cyan-500/50 focus:ring-1 focus:ring-cyan-500/20 transition-all"
                        placeholder="ENTER NEURAL LINK EMAIL">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-[10px] text-red-500/80 italic ml-4" />
                </div>

                <div class="relative group">
                    <label class="block text-[10px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-4 group-focus-within:text-cyan-400 transition-colors">Security Key</label>
                    <input id="password" type="password" name="password" required 
                        class="w-full bg-black/40 border border-white/5 rounded-2xl px-6 py-4 text-white text-xs placeholder-gray-700 focus:outline-none focus:border-cyan-500/50 focus:ring-1 focus:ring-cyan-500/20 transition-all"
                        placeholder="••••••••••••">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-[10px] text-red-500/80 italic ml-4" />
                </div>

                <div class="flex items-center justify-between px-2">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                        <input id="remember_me" type="checkbox" name="remember" class="rounded-sm bg-black/60 border-white/10 text-cyan-600 shadow-sm focus:ring-0 focus:ring-offset-0 transition-all">
                        <span class="ms-3 text-[10px] text-gray-600 uppercase font-black tracking-tighter group-hover:text-gray-400 transition-colors">Tetap Masuk</span>
                    </label>
                    
                    @if (\Illuminate\Support\Facades\Route::has('password.request'))
                        <a class="text-[10px] font-black uppercase text-gray-600 hover:text-cyan-400 transition-colors tracking-tighter" href="{{ route('password.request') }}">Recover Access?</a>
                    @endif
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-gradient-to-r from-cyan-600 to-blue-700 hover:from-cyan-500 hover:to-blue-600 text-white font-black py-5 rounded-2xl shadow-xl shadow-cyan-900/20 transition-all transform active:scale-[0.98] uppercase tracking-[0.4em] text-[10px]">
                        Initiate Connection
                    </button>
                </div>
            </form>

            <div class="mt-12 pt-8 border-t border-white/5 text-center px-4">
                <p class="text-[9px] text-gray-700 font-bold uppercase tracking-widest leading-relaxed">
                    Security Warning: Segala aktivitas ilegal akan dilacak melalui IP Address dan Neural Link ID.
                </p>
            </div>
        </div>
    </div>

    <style>
        .glass {
            background: rgba(255, 255, 255, 0.01);
            backdrop-filter: blur(40px);
        }
        @keyframes scan {
            from { transform: translateY(-100%); }
            to { transform: translateY(300%); }
        }
        .animate-scan {
            animation: scan 8s linear infinite;
        }
    </style>
</x-guest-layout>