<x-app-layout>
    <div class="py-12 bg-[#0b1120] min-h-screen text-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-10 flex justify-between items-end">
                <div>
                    <h2 class="text-4xl font-black tracking-tighter uppercase italic">
                        Class <span class="text-cyan-400">Schedule</span>
                    </h2>
                    <p class="text-gray-500 text-[10px] font-bold tracking-[0.3em] mt-1">ACADEMIC YEAR 2025/2026</p>
                </div>
                <a href="{{ route('dashboard') }}" class="text-[10px] font-black tracking-widest text-gray-400 hover:text-cyan-400 transition-all uppercase border-b border-white/10 pb-1">
                    [ Back to Command Center ]
                </a>
            </div>

            <div class="glass rounded-[2.5rem] border border-white/10 overflow-hidden shadow-2xl">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-white/5 border-b border-white/10">
                            <th class="p-6 text-[10px] font-black uppercase tracking-[0.2em] text-cyan-400">Day</th>
                            <th class="p-6 text-[10px] font-black uppercase tracking-[0.2em] text-cyan-400">Subject</th>
                            <th class="p-6 text-[10px] font-black uppercase tracking-[0.2em] text-cyan-400">Time</th>
                            <th class="p-6 text-[10px] font-black uppercase tracking-[0.2em] text-cyan-400">Room</th>
                            <th class="p-6 text-[10px] font-black uppercase tracking-[0.2em] text-cyan-400">Status</th>
                            <th class="p-6 text-[10px] font-black uppercase tracking-[0.2em] text-cyan-400 text-right">Learning Module</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @foreach($schedules as $item)
                        <tr class="hover:bg-cyan-500/5 transition-colors group">
                            <td class="p-6">
                                <span class="bg-white/5 px-3 py-1 rounded-full text-[10px] font-black group-hover:bg-cyan-500 group-hover:text-slate-900 transition text-center inline-block min-w-[60px]">
                                    {{ $item['day'] }}
                                </span>
                            </td>
                            <td class="p-6 text-sm font-bold tracking-tight">{{ $item['subject'] }}</td>
                            <td class="p-6 text-xs text-gray-400 font-mono">{{ $item['time'] }}</td>
                            <td class="p-6 text-xs font-bold text-purple-400 uppercase tracking-widest">{{ $item['room'] }}</td>
                            <td class="p-6">
                                <div class="flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-cyan-500 animate-pulse"></span>
                                    <span class="text-[9px] font-black uppercase tracking-tighter text-cyan-500">Active</span>
                                </div>
                            </td>
                            <td class="p-6 text-right">
    @php
        // 1. Cari materi berdasarkan subjek jadwal ini
        $material = \App\Models\Material::where('subject', $item['subject'])->first();
        
        // 2. Cek apakah user ini sudah pernah download (absen)
        $isDownloaded = false;
        if($material) {
            $isDownloaded = \DB::table('material_progress')
                            ->where('user_id', auth()->user()->id)
                            ->where('material_id', $material->id)
                            ->exists();
        }
    @endphp

    @if($material)
        <a href="{{ route('materials.download', $material->id) }}" 
           class="inline-flex items-center gap-2 {{ $isDownloaded ? 'bg-green-500/20 text-green-400 border border-green-500/50' : 'bg-cyan-500 text-slate-900 shadow-[0_0_15px_rgba(34,211,238,0.3)] hover:bg-cyan-400' }} px-4 py-2 rounded-xl text-[10px] font-black transition-all active:scale-95">
            <span>{{ $isDownloaded ? 'ABSEN SELESAI' : 'DOWNLOAD' }}</span>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="{{ $isDownloaded ? 'M5 13l4 4L19 7' : 'M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4' }}"></path>
            </svg>
        </a>
    @else
        <span class="text-[9px] text-gray-600 font-bold uppercase tracking-tighter italic block">Locked</span>
    @endif
</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-8 p-6 bg-cyan-500/5 rounded-3xl border border-cyan-500/20 flex items-center gap-4">
                <span class="text-2xl">💡</span>
                <p class="text-xs text-gray-400 leading-relaxed italic">
                    "Sistem akan mencatat kehadiran secara otomatis setelah modul berhasil diunduh. Pastikan koneksi stabil sebelum memulai sinkronisasi data."
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
</x-app-layout>