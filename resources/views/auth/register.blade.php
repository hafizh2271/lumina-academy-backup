<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#0b1120] relative overflow-hidden py-10">
        <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-purple-600/10 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-cyan-500/10 blur-[120px] rounded-full"></div>

        <div class="w-full max-w-md px-8 py-10 glass rounded-[2.5rem] border border-white/10 relative z-10 shadow-2xl">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-black tracking-tighter text-white">JOIN <span class="text-cyan-400">LUMINA</span></h2>
                <p class="text-gray-400 text-[10px] mt-2 font-bold uppercase tracking-[0.3em]">Registrasi Akun Siswa Baru</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-[10px] font-bold text-cyan-400 uppercase tracking-widest mb-1.5 px-1">Nama Lengkap</label>
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus 
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all text-sm"
                        placeholder="Nama Lengkap Anda">
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs text-red-400" />
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-cyan-400 uppercase tracking-widest mb-1.5 px-1">Akses Identitas (Email)</label>
                    <input id="email" type="email" name="email" :value="old('email')" required 
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all text-sm"
                        placeholder="email@sekolah.id">
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-400" />
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-cyan-400 uppercase tracking-widest mb-1.5 px-1">Kunci Keamanan</label>
                    <input id="password" type="password" name="password" required 
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all text-sm"
                        placeholder="••••••••">
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-400" />
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-cyan-400 uppercase tracking-widest mb-1.5 px-1">Konfirmasi Kunci</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required 
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all text-sm"
                        placeholder="••••••••">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs text-red-400" />
                </div>

                <div class="pt-2">
                    <button class="w-full bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 text-slate-900 font-black py-4 rounded-2xl shadow-[0_0_30px_rgba(34,211,238,0.2)] transition-all transform active:scale-95 uppercase tracking-widest text-[11px]">
                        Daftar Sekarang
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-[10px] text-gray-500 uppercase tracking-tighter">Sudah terdaftar? 
                    <a href="{{ route('login') }}" class="text-white hover:text-cyan-400 font-bold transition">Masuk Portal</a>
                </p>
            </div>
        </div>
    </div>

    <style>
        .glass {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(20px);
        }
    </style>
</x-guest-layout>