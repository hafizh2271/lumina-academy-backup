<x-app-layout>
    <style>
        .glass { background: rgba(255, 255, 255, 0.02); backdrop-filter: blur(20px); }
        @keyframes fade-in { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-in { animation: fade-in 0.8s ease-out forwards; }
        .profile-border { border: 1px solid rgba(168, 85, 247, 0.4); }
        .scan-line {
            position: absolute; height: 2px; width: 100%; background: #a855f7;
            box-shadow: 0 0 15px #a855f7; top: 0; animation: scan-anim 2s infinite;
        }
        @keyframes scan-anim { 0% { top: 0; } 100% { top: 100%; } }
    </style>

    <div class="py-10 bg-[#0b1120] min-h-screen text-white font-sans">
        
        @if(session('success') || session('status') === 'profile-updated')
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)" 
             class="fixed bottom-10 right-10 z-50 transition-all duration-500">
            <div class="bg-cyan-500 text-white p-5 rounded-2xl shadow-[0_0_20px_rgba(6,182,212,0.3)] flex items-center gap-4 border border-white/10">
                <span class="text-2xl">⚡</span>
                <div>
                    <h5 class="font-black text-[10px] uppercase tracking-[0.2em]">System Message</h5>
                    <p class="text-sm font-bold">{{ session('success') ?? 'Data Profile Synchronized' }}</p>
                </div>
            </div>
        </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-10 animate-fade-in w-full px-2">
                <p class="text-purple-400 text-[10px] font-black tracking-[0.5em] uppercase mb-3">Pusat Kendali Akademi</p>
                <h1 class="text-4xl md:text-6xl font-black italic uppercase tracking-tighter text-white leading-tight pb-2">
                    Selamat Datang, <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-500">{{ explode(' ', auth()->user()->name)[0] }}</span>
                </h1>
                <div class="w-40 h-1.5 bg-gradient-to-r from-purple-600 via-pink-500 to-transparent mt-2 rounded-full shadow-[0_0_15px_rgba(168,85,247,0.5)]"></div>
            </div>

            <div class="mb-10 animate-fade-in flex flex-col md:flex-row items-center justify-between gap-6 p-8 glass rounded-[2.5rem] profile-border shadow-2xl shadow-purple-500/5">
                <div class="flex items-center gap-6">
                    <div class="relative group">
                        @if(auth()->user()->avatar)
                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" 
                                 class="w-20 h-20 rounded-full object-cover border-2 border-purple-400/50 shadow-[0_0_15px_rgba(168,85,247,0.4)]">
                        @else
                            <div class="w-20 h-20 rounded-full bg-gradient-to-tr from-purple-600 to-pink-500 flex items-center justify-center text-3xl font-black text-white border-2 border-purple-400/50 shadow-[0_0_15px_rgba(168,85,247,0.4)]">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                        @endif
                        <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-green-500 border-4 border-[#0b1120] rounded-full"></div>
                    </div>

                    <div>
                        <span class="text-purple-400 text-[9px] font-black tracking-[0.4em] uppercase">Pendidik Terverifikasi</span>
                        <h2 class="text-3xl font-black tracking-tighter uppercase leading-none mt-1">
                            {{ auth()->user()->name }}
                        </h2>
                        <div class="flex flex-wrap gap-2 mt-3">
                            <span class="px-3 py-1 bg-purple-500/20 border border-purple-500/40 text-purple-300 text-[10px] font-bold rounded-lg uppercase tracking-wider">
                                {{ auth()->user()->role_type ?? 'TENAGA PENDIDIK' }}
                            </span>
                            <span class="px-3 py-1 bg-white/5 border border-white/10 text-gray-400 text-[10px] font-mono rounded-lg uppercase">
                                NIP: {{ auth()->user()->nip ?? 'NOT_ASSIGNED' }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="flex gap-3">
                    <a href="{{ route('teacher.materials.create') }}" class="px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:scale-105 transition-all shadow-lg shadow-purple-500/20">
                        + Modul Baru
                    </a>
                    <a href="{{ route('profile.edit') }}" class="p-3 bg-white/5 border border-white/10 rounded-2xl hover:bg-white/10 transition-all text-xl">
                        ⚙️
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <div class="glass p-6 rounded-[2rem] border border-white/5">
                    <p class="text-[9px] text-gray-500 font-black uppercase tracking-[0.2em] mb-2">Total Materi</p>
                    <p class="text-3xl font-black text-white">{{ $materials->count() }} <span class="text-xs text-gray-600 font-normal italic ml-2">Modul Terbit</span></p>
                </div>
                <div class="glass p-6 rounded-[2rem] border border-white/5">
                    <p class="text-[9px] text-gray-500 font-black uppercase tracking-[0.2em] mb-2">Kelas Aktif</p>
                    <p class="text-3xl font-black text-white">4 <span class="text-xs text-gray-600 font-normal italic ml-2">Sesi Terjadwal</span></p>
                </div>
                <div class="glass p-6 rounded-[2rem] border border-white/5 text-right">
                    <p class="text-[9px] text-gray-500 font-black uppercase tracking-[0.2em] mb-2">Status Server</p>
                    <p class="text-sm font-black text-cyan-400 animate-pulse uppercase tracking-tighter italic">OPTIMIZED_ACTIVE</p>
                </div>
            </div>

            <div class="mb-10">
                <a href="{{ route('teacher.attendance.scan') }}" 
                   class="group relative block overflow-hidden glass border-2 border-purple-500/30 p-8 rounded-[2.5rem] hover:border-purple-400 transition-all shadow-2xl shadow-purple-500/10">
                    <div class="flex items-center justify-between relative z-10">
                        <div>
                            <h3 class="text-2xl font-black italic uppercase tracking-tighter text-white group-hover:text-purple-400 transition-colors">Akses Pemindai Saraf</h3>
                            <p class="text-xs text-gray-500 font-mono tracking-widest uppercase mt-1">Lakukan Absensi Siswa melalui QR_Uplink</p>
                        </div>
                        <div class="w-16 h-16 bg-purple-500/20 rounded-2xl flex items-center justify-center text-3xl group-hover:scale-110 transition-transform shadow-inner">
                            📸
                        </div>
                    </div>
                    <div class="scan-line opacity-0 group-hover:opacity-100 transition-opacity"></div>
                </a>
            </div>

            <div class="glass rounded-[2.5rem] border border-white/10 overflow-hidden relative shadow-2xl">
                <div class="p-8 relative z-10">
                    <div class="flex items-center justify-between mb-8">
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-8 bg-purple-500 rounded-full shadow-[0_0_10px_#a855f7]"></div>
                            <h3 class="text-xl font-bold tracking-tight text-white italic uppercase">Inventaris Modul</h3>
                        </div>
                        <div class="px-4 py-2 bg-white/5 rounded-xl border border-white/10 text-[10px] font-mono text-gray-400 uppercase">
                            DATA_SYNC: <span class="text-cyan-400 font-bold">NORMAL</span>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-separate border-spacing-y-3">
                            <thead>
                                <tr class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-500">
                                    <th class="px-6 py-4">Nama Modul</th>
                                    <th class="px-6 py-4">Mata Pelajaran</th>
                                    <th class="px-6 py-4 text-right">Manajemen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($materials as $item)
                                <tr class="bg-white/5 hover:bg-white/10 transition-all duration-300 group">
                                    <td class="px-6 py-5 rounded-l-3xl border-y border-l border-white/5">
                                        <div class="flex items-center gap-4">
                                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-500 to-pink-600 flex items-center justify-center text-lg shadow-lg group-hover:scale-110 transition-transform">📚</div>
                                            <div>
                                                <p class="text-sm font-bold text-white tracking-tight">{{ $item->title }}</p>
                                                <p class="text-[9px] text-gray-500 font-mono italic tracking-tighter">ID: MOD-{{ $item->id }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-5 border-y border-white/5">
                                        <span class="px-3 py-1 bg-purple-500/10 border border-purple-500/20 text-purple-400 text-[9px] font-black uppercase rounded-lg">
                                            {{ $item->subject }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-5 rounded-r-3xl border-y border-r border-white/5 text-right">
                                        <div class="flex justify-end gap-2">
                                            <button onclick="openPreview('{{ asset('storage/' . $item->file_path) }}', '{{ $item->title }}')" 
                                                class="p-2.5 bg-white/5 hover:bg-cyan-500/20 rounded-xl transition-all text-xs border border-white/10 hover:border-cyan-500/50">
                                                👁️ <span class="text-[9px] font-black ml-1 uppercase">Quick View</span>
                                            </button>
                                            <a href="{{ route('teacher.materials.edit', $item->id) }}" 
                                                class="p-2.5 bg-white/5 hover:bg-yellow-500/20 rounded-xl transition-all text-xs border border-white/10 hover:border-yellow-500/50">
                                                ✏️
                                            </a>
                                            <form action="{{ route('teacher.materials.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus modul dari pusat data?')">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="p-2.5 bg-white/5 hover:bg-red-500/20 rounded-xl transition-all text-xs border border-white/10 hover:border-red-500/50">
                                                    🗑️
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center py-20 text-gray-500 italic font-light tracking-[0.2em]">DATABASE KOSONG</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="previewModal" class="fixed inset-0 z-[100] hidden flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-[#0b1120]/90 backdrop-blur-md" onclick="closePreview()"></div>
        <div class="relative bg-[#0f172a] border border-white/10 w-full max-w-5xl h-[90vh] rounded-[2.5rem] overflow-hidden shadow-2xl flex flex-col">
            <div class="p-6 border-b border-white/10 flex justify-between items-center bg-white/5">
                <div>
                    <h3 id="modalTitle" class="text-xl font-black italic uppercase tracking-tighter text-white">Preview Module</h3>
                    <p class="text-[10px] text-cyan-400 font-mono">FILE_STATUS: <span class="animate-pulse">DECRYPTING...</span></p>
                </div>
                <button onclick="closePreview()" class="w-10 h-10 rounded-full bg-white/5 text-white flex items-center justify-center hover:bg-red-500 transition-all">✕</button>
            </div>
            <div class="flex-1">
                <iframe id="pdfFrame" src="" class="w-full h-full border-none"></iframe>
            </div>
        </div>
    </div>

    <script>
        function openPreview(url, title) {
            document.getElementById('modalTitle').innerText = title;
            document.getElementById('pdfFrame').src = url;
            document.getElementById('previewModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        function closePreview() {
            document.getElementById('previewModal').classList.add('hidden');
            document.getElementById('pdfFrame').src = '';
            document.body.style.overflow = 'auto';
        }
    </script>
</x-app-layout>