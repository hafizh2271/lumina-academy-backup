<x-app-layout>
    <div class="py-12 bg-[#0b1120] min-h-screen text-white font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-10 animate-fade-in flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <span class="text-cyan-400 text-[10px] font-black tracking-[0.4em] uppercase italic">Tingkat Keamanan: Administrator</span>
                    <h2 class="text-4xl font-black tracking-tighter uppercase leading-none mt-2">
                        KOMANDO <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500">PUSAT</span>
                    </h2>
                    <p class="text-gray-500 text-xs mt-3 font-light">Memantau aktivitas pendaftaran dan manajemen otorisasi akun.</p>
                </div>
                
                <div class="flex gap-4">
                    <div class="bg-white/5 backdrop-blur-md px-8 py-4 rounded-3xl border border-white/10 text-center shadow-2xl">
                        <p class="text-[9px] text-gray-500 font-black uppercase tracking-widest mb-1">Jumlah Pelamar</p>
                        <p class="text-3xl font-black text-cyan-400 leading-none">{{ $applicants->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white/5 backdrop-blur-xl rounded-[2.5rem] border border-white/10 overflow-hidden mb-12 shadow-2xl">
                <div class="p-8">
                    <h3 class="text-lg font-bold italic text-cyan-400 mb-6 flex items-center gap-2">
                        <span class="w-1.5 h-1.5 bg-cyan-400 rounded-full animate-pulse"></span>
                        Aplikasi Neural yang Masuk
                    </h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-separate border-spacing-y-3">
                            <thead>
                                <tr class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-500">
                                    <th class="px-6 py-2">Profil Pelamar</th>
                                    <th class="px-6 py-2">Sekolah Asal</th>
                                    <th class="px-6 py-2 text-right">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($applicants as $data)
                                <tr class="bg-white/5 hover:bg-white/10 transition-all group">
                                    <td class="px-6 py-5 rounded-l-3xl border-y border-l border-white/5">
                                        <p class="text-sm font-bold group-hover:text-cyan-400 transition-colors">{{ $data->nama }}</p>
                                        <p class="text-[10px] text-gray-500 font-mono">{{ $data->email }}</p>
                                    </td>
                                    <td class="px-6 py-5 border-y border-white/5 text-xs text-gray-400 italic">{{ $data->asal_sekolah }}</td>
                                    <td class="px-6 py-5 rounded-r-3xl border-y border-r border-white/5 text-right">
                                        <button class="text-[10px] font-black uppercase px-4 py-2 bg-white/5 hover:bg-cyan-500 hover:text-black rounded-xl transition-all">Review</button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center py-20 text-gray-600 font-light italic tracking-widest">Tidak ada data masuk...</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="bg-white/5 backdrop-blur-xl p-8 rounded-[2.5rem] border border-cyan-500/20 shadow-2xl">
                    <h3 class="text-md font-black uppercase tracking-tighter mb-8 italic">Otorisasi Identitas</h3>
                    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="text" name="name" placeholder="NAMA LENGKAP" required class="w-full bg-black/40 border-white/10 rounded-2xl px-6 py-4 text-xs focus:border-cyan-500 outline-none transition-all">
                        <input type="email" name="email" placeholder="ADMIN@SMARTSCHOOL.TEST" required class="w-full bg-black/40 border-white/10 rounded-2xl px-6 py-4 text-xs focus:border-cyan-500 outline-none transition-all">
                        <select name="role" class="w-full bg-[#0b1120] border border-white/10 rounded-2xl px-6 py-4 text-xs focus:border-cyan-400">
                            <option value="student">MAHASISWA (Operasi Saraf)</option>
                            <option value="guru">GURU (Komando Tinggi)</option>
                            <option value="admin">ADMIN (Overlord Sistem)</option>
                        </select>
                        <input type="password" name="password" placeholder="••••••••••••" required class="w-full bg-black/40 border-white/10 rounded-2xl px-6 py-4 text-xs focus:border-cyan-500 outline-none transition-all">
                        <button type="submit" class="w-full py-5 bg-gradient-to-r from-cyan-600 to-blue-600 hover:scale-[1.02] active:scale-95 rounded-2xl font-black uppercase text-[10px] tracking-[0.3em] transition-all shadow-lg shadow-cyan-500/20">Ciptakan Tautan</button>
                    </form>
                </div>

                <div class="lg:col-span-2 bg-white/5 backdrop-blur-xl rounded-[2.5rem] border border-white/10 p-8 shadow-2xl">
                    <h3 class="text-md font-black uppercase tracking-tighter mb-8 italic">Tautan Sistem Aktif</h3>
                    <div class="space-y-3 max-h-[400px] overflow-y-auto pr-2 custom-scrollbar">
                        @foreach($users as $user)
                        <div class="flex items-center justify-between p-5 bg-white/5 border border-white/5 rounded-[1.5rem] group hover:border-cyan-500/30 transition-all shadow-inner">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-gray-800 to-black border border-white/10 flex items-center justify-center font-black text-cyan-500 italic shadow-lg shadow-black/50">
                                    {{ strtoupper(substr($user->role, 0, 1)) }}
                                </div>
                                <div>
                                    <h5 class="font-bold text-sm tracking-tight group-hover:text-cyan-400 transition-colors">{{ $user->name }}</h5>
                                    <p class="text-[9px] text-gray-500 font-mono tracking-tighter">{{ $user->email }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="text-[8px] font-black uppercase px-2 py-1 bg-white/10 border border-white/10 rounded text-gray-400">{{ $user->role }}</span>
                                @if($user->id !== auth()->id())
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Hapus identitas ini?')">
                                    @csrf @method('DELETE')
                                    <button class="text-[10px] font-black text-red-500/50 hover:text-red-500 uppercase tracking-widest transition-all">Menghapus</button>
                                </form>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(6, 182, 212, 0.2); border-radius: 10px; }
        @keyframes fade-in { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-in { animation: fade-in 0.8s ease-out forwards; }
    </style>
</x-app-layout>