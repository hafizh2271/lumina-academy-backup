<section class="glass p-8 rounded-[2.5rem] border border-white/10">
    <header>
        <h2 class="text-lg font-bold text-white uppercase tracking-widest">Informasi Profil</h2>
        <p class="mt-1 text-sm text-gray-400">Perbarui identitas dan akses sistem Anda.</p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="flex items-center gap-6 mb-8">
            <div class="relative">
                @if(auth()->user()->avatar)
                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="w-20 h-20 rounded-2xl object-cover border-2 border-cyan-500 shadow-[0_0_15px_rgba(34,211,238,0.3)]">
                @else
                    <div class="w-20 h-20 bg-gradient-to-tr from-cyan-500 to-blue-600 rounded-2xl flex items-center justify-center text-2xl font-black">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                @endif
            </div>
            <div class="flex-1">
                <label class="text-[10px] font-black text-cyan-400 uppercase tracking-widest block mb-2">Unggah Foto Profil</label>
                <input type="file" name="avatar" class="text-xs text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-cyan-500 file:text-slate-900 hover:file:bg-cyan-400 cursor-pointer">
            </div>
        </div>

        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" class="text-cyan-400 text-[10px] font-black uppercase tracking-widest ml-1" />
            <input id="name" name="name" type="text" class="mt-1 block w-full bg-white/5 border-white/10 rounded-2xl text-white focus:border-cyan-500 focus:ring-cyan-500 py-3 px-5" value="{{ old('name', $user->name) }}" required />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        @if(auth()->user()->role === 'guru')
            <div>
                <x-input-label for="nip" :value="__('NIP (Nomor Induk Pegawai)')" class="text-cyan-400 text-[10px] font-black uppercase tracking-widest ml-1" />
                <input id="nip" name="nip" type="text" class="mt-1 block w-full bg-white/5 border-white/10 rounded-2xl text-white focus:border-cyan-500 focus:ring-cyan-500 py-3 px-5" value="{{ old('nip', $user->nip) }}" placeholder="Contoh: 197310212006041009" />
                <x-input-error class="mt-2" :messages="$errors->get('nip')" />
            </div>
            <div class="mt-4">
                <x-input-label for="role_type" :value="__('Jabatan Spesifik')" class="text-cyan-400 text-[10px] font-black uppercase tracking-widest ml-1" />
                <input id="role_type" name="role_type" type="text" class="mt-1 block w-full bg-white/5 border-white/10 rounded-2xl text-white focus:border-cyan-500 focus:ring-cyan-500 py-3 px-5" value="{{ old('role_type', $user->role_type) }}" placeholder="Contoh: Kepala Sekolah / Guru BK" />
            </div>
        @else
            <div>
                <x-input-label for="nisn" :value="__('NISN (Nomor Induk Siswa)')" class="text-cyan-400 text-[10px] font-black uppercase tracking-widest ml-1" />
                <input id="nisn" name="nisn" type="text" class="mt-1 block w-full bg-white/5 border-white/10 rounded-2xl text-white focus:border-cyan-500 focus:ring-cyan-500 py-3 px-5" value="{{ old('nisn', $user->nisn) }}" placeholder="Contoh: 008123456" />
                <x-input-error class="mt-2" :messages="$errors->get('nisn')" />
            </div>
        @endif

        <div>
            <x-input-label for="email" :value="__('Email Address')" class="text-cyan-400 text-[10px] font-black uppercase tracking-widest ml-1" />
            <input id="email" name="email" type="email" class="mt-1 block w-full bg-white/5 border-white/10 rounded-2xl text-white focus:border-cyan-500 focus:ring-cyan-500 py-3 px-5" value="{{ old('email', $user->email) }}" required />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button class="bg-cyan-500 hover:bg-cyan-400 text-slate-900 px-8 py-3 rounded-2xl text-xs font-black transition-all active:scale-95 shadow-[0_0_20px_rgba(34,211,238,0.3)] uppercase">
                Sync Data Profile
            </button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-green-400 font-bold">✅ Data Berhasil Disinkronisasi.</p>
            @endif
        </div>
    </form>
</section>