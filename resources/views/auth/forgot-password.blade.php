<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#05080a] relative overflow-hidden font-sans">
        <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-red-500/5 blur-[120px] rounded-full"></div>
        
        <div class="w-full max-w-md px-10 py-12 glass rounded-[3rem] border border-white/10 relative z-10 shadow-2xl">
            <div class="text-center mb-10">
                <span class="text-red-400 text-[9px] font-black tracking-[0.6em] uppercase italic">Neural Recovery Mode</span>
                <h2 class="text-3xl font-black tracking-tighter text-white mt-2 uppercase">Akses <span class="text-red-500">Terputus</span></h2>
                <p class="text-gray-500 text-[10px] mt-4 font-light leading-relaxed">
                    MASUKKAN EMAIL IDENTITAS LU UNTUK MENERIMA TAUTAN DEKRIPSI PASSWORD.
                </p>
            </div>

            <x-auth-session-status class="mb-4 text-center text-xs text-green-400 font-mono" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                @csrf
                <div class="relative">
                    <label class="block text-[10px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-4">Registered Email</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus 
                        class="w-full bg-black/40 border border-white/5 rounded-2xl px-6 py-4 text-white text-xs placeholder-gray-700 focus:outline-none focus:border-red-500/50 transition-all"
                        placeholder="ENTER YOUR NEURAL LINK">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-[10px] text-red-500 italic ml-4" />
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-red-600 to-orange-700 text-white font-black py-5 rounded-2xl shadow-xl shadow-red-900/20 transition-all transform active:scale-95 uppercase tracking-[0.3em] text-[10px]">
                    Kirim Link Autentikasi
                </button>
            </form>

            <div class="mt-8 text-center">
                <a href="{{ route('login') }}" class="text-[10px] font-black text-gray-600 hover:text-white transition-colors uppercase tracking-widest">
                     Kembali ke Portal Login
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>