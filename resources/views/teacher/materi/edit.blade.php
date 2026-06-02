<x-app-layout>
    <style>
        .glass { background: rgba(255, 255, 255, 0.02); backdrop-filter: blur(20px); }
        .input-cyber { 
            background: rgba(255, 255, 255, 0.05); 
            border: 1px solid rgba(168, 85, 247, 0.2); 
            color: white; 
            transition: all 0.3s;
        }
        .input-cyber:focus { 
            border-color: #a855f7; 
            box-shadow: 0 0 15px rgba(168, 85, 247, 0.3);
            outline: none;
        }
        @keyframes slide-up { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .animate-slide-up { animation: slide-up 0.6s ease-out forwards; }
    </style>

    <div class="py-12 bg-[#0b1120] min-h-screen text-white font-sans">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-6 animate-slide-up">
                <a href="{{ route('guru.dashboard') }}" class="text-purple-400 hover:text-purple-300 text-xs font-black uppercase tracking-[0.2em] flex items-center gap-2">
                    <span class="text-xl">←</span> Back to Command Center
                </a>
            </div>

            <div class="glass rounded-[2.5rem] border border-white/10 overflow-hidden shadow-2xl animate-slide-up">
                <div class="p-10">
                    <div class="flex items-center gap-4 mb-10">
                        <div class="w-2 h-10 bg-gradient-to-b from-purple-500 to-pink-500 rounded-full"></div>
                        <div>
                            <h2 class="text-3xl font-black italic uppercase tracking-tighter">Edit Materi</h2>
                            <p class="text-[10px] text-gray-500 font-mono tracking-widest uppercase">Sync_ID: {{ $materi->id }} // Status: Re-routing</p>
                        </div>
                    </div>

                    <form action="{{ route('teacher.materials.update', $materi->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf
                        @method('PUT')

                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-[0.3em] text-purple-400 ml-2">Judul Materi</label>
                            <input type="text" name="title" value="{{ old('title', $materi->title) }}" required
                                   class="w-full px-6 py-4 rounded-2xl input-cyber font-bold placeholder:text-gray-600"
                                   placeholder="Contoh: Pemrograman Web Lanjut">
                            @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-black uppercase tracking-[0.3em] text-purple-400 ml-2">Tag Mata Pelajaran</label>
                            <input type="text" name="subject" value="{{ old('subject', $materi->subject) }}" required
                                   class="w-full px-6 py-4 rounded-2xl input-cyber font-bold placeholder:text-gray-600"
                                   placeholder="Contoh: WEB_DEV, UI_UX, MATH">
                            @error('subject') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="space-y-4">
                            <label class="text-[10px] font-black uppercase tracking-[0.3em] text-purple-400 ml-2">Update File (Opsional)</label>
                            
                            <div class="p-4 bg-white/5 border border-white/5 rounded-2xl flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <span class="text-2xl">📄</span>
                                    <div>
                                        <p class="text-[10px] text-gray-500 uppercase font-black">File Saat Ini</p>
                                        <p class="text-xs font-mono text-cyan-400">{{ basename($materi->file_path) }}</p>
                                    </div>
                                </div>
                                <a href="{{ asset('storage/' . $materi->file_path) }}" target="_blank" class="text-[10px] font-black uppercase bg-white/10 px-4 py-2 rounded-lg hover:bg-white/20 transition-all">Lihat</a>
                            </div>

                            <div class="relative group">
                                <input type="file" name="file" 
                                       class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                <div class="w-full px-6 py-10 rounded-2xl border-2 border-dashed border-white/10 bg-white/5 group-hover:border-purple-500/50 transition-all text-center">
                                    <span class="text-2xl mb-2 block">☁️</span>
                                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Klik atau tarik file baru ke sini</p>
                                    <p class="text-[9px] text-gray-600 mt-2 italic">PDF, ZIP, RAR (MAX 20MB)</p>
                                </div>
                            </div>
                            @error('file') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="pt-6 flex flex-col md:flex-row gap-4">
                            <button type="submit" class="flex-1 px-8 py-5 bg-gradient-to-r from-purple-600 to-pink-600 rounded-2xl text-[11px] font-black uppercase tracking-[0.3em] hover:scale-[1.02] active:scale-95 transition-all shadow-xl shadow-purple-500/20">
                                Update Data Materi
                            </button>
                            <a href="{{ route('guru.dashboard') }}" class="px-8 py-5 bg-white/5 border border-white/10 rounded-2xl text-[11px] font-black uppercase tracking-[0.3em] text-center hover:bg-white/10 transition-all">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>