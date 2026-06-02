<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#05080a] relative overflow-hidden font-sans">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-cyan-500/5 blur-[120px] rounded-full"></div>
        
        <div class="w-full max-w-md px-10 py-12 glass rounded-[3rem] border border-white/10 relative z-10 shadow-2xl">
            <div class="text-center mb-10">
                <span class="text-cyan-400 text-[9px] font-black tracking-[0.6em] uppercase italic">Neural Override</span>
                <h2 class="text-3xl font-black tracking-tighter text-white mt-2 uppercase">Ganti <span class="text-cyan-400">Akses</span></h2>
                <p class="text-gray-500 text-[10px] mt-4 font-light uppercase tracking-widest">Konfigurasi Ulang Key Security Anda</p>
            </div>

            <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="relative">
                    <label class="block text-[10px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-4 italic">Identity Secured</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required readonly 
                        class="w-full bg-black/20 border border-white/5 rounded-2xl px-6 py-4 text-gray-400 text-xs focus:outline-none cursor-not-allowed">
                </div>

                <div class="relative group">
                    <label class="block text-[10px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-4 group-focus-within:text-cyan-400 transition-colors">New Security Key</label>
                    <input id="password" type="password" name="password" required autofocus
                        class="w-full bg-black/40 border border-white/5 rounded-2xl px-6 py-4 text-white text-xs focus:outline-none focus:border-cyan-500/50 transition-all"
                        placeholder="••••••••••••">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-[10px] text-red-500 italic ml-4" />
                </div>

                <div class="relative group">
                    <label class="block text-[10px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-4 group-focus-within:text-cyan-400 transition-colors">Confirm Key</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required 
                        class="w-full bg-black/40 border border-white/5 rounded-2xl px-6 py-4 text-white text-xs focus:outline-none focus:border-cyan-500/50 transition-all"
                        placeholder="••••••••••••">
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-cyan-600 to-blue-700 text-white font-black py-5 rounded-2xl shadow-xl shadow-cyan-900/20 transition-all transform active:scale-95 uppercase tracking-[0.3em] text-[10px]">
                    Update Identitas Baru
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>