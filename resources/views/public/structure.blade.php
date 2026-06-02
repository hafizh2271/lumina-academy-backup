<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi | SMAN 14 Buru Selatan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        :root { color-scheme: dark; }
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #020617; 
            color: #f8fafc; 
            background-image: radial-gradient(circle at 50% 0%, #0f172a 0%, #020617 70%);
            min-height: 100vh; 
            overflow-x: hidden;
        }
        .glass-card { 
            background: rgba(15, 23, 42, 0.7); 
            backdrop-filter: blur(16px); 
            border: 1px solid rgba(34, 211, 238, 0.15); 
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); 
        }
        .glass-card:hover { 
            border-color: rgba(34, 211, 238, 0.6); 
            transform: translateY(-5px); 
            box-shadow: 0 15px 35px -10px rgba(34, 211, 238, 0.3); 
        }
        .student-card { border-color: rgba(168, 85, 247, 0.15); }
        .student-card:hover {
            border-color: rgba(168, 85, 247, 0.6);
            box-shadow: 0 15px 35px -10px rgba(168, 85, 247, 0.3);
        }
        .photo-crop { object-fit: cover; object-position: top; width: 100%; height: 100%; }
        .line-v { width: 2px; background: rgba(34, 211, 238, 0.4); margin: 0 auto; }
        .line-h { height: 2px; background: rgba(34, 211, 238, 0.4); width: 100%; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="py-16 px-4 md:px-8" x-data="{ open: false, selected: {} }">
    
    <div class="max-w-[1400px] mx-auto text-center">
        <div class="mb-20">
            <h1 class="text-4xl md:text-6xl font-black italic uppercase tracking-tighter text-white">
                ORGANIZATIONAL <span class="text-cyan-400">STRUCTURE</span>
            </h1>
            <div class="flex items-center justify-center gap-4 mt-4">
                <span class="h-[1px] w-16 bg-gradient-to-r from-transparent to-cyan-500"></span>
                <p class="text-[10px] md:text-xs font-mono text-cyan-400 tracking-[0.4em] uppercase font-bold text-center">
                    SMA Negeri 14 Buru Selatan Official Directory
                </p>
                <span class="h-[1px] w-16 bg-gradient-to-l from-transparent to-cyan-500"></span>
            </div>
        </div>

        @php
            // DATA STATIS DENGAN PATH FOTO
            $kepsek = (object)['name' => 'Salis Kelmuri, S.Ag', 'nip' => '197310212006041009', 'jabatan' => 'Kepala Sekolah', 'photo' => 'salis.jpg'];
            
            $wakas = [
                (object)['name' => 'Navratilova Kaya, S.Pd., M.H.', 'nip' => '19900812205042001', 'jabatan' => 'Waka Kurikulum', 'photo' => 'navratilova.jpg'],
                (object)['name' => 'Elda Rosye Sapulete, S.Pd.', 'nip' => '198412132010012010', 'jabatan' => 'Waka Kesiswaan', 'photo' => 'elda.jpg'],
                (object)['name' => 'Jumli Buton, S.Pd.', 'nip' => '199405022023211023', 'jabatan' => 'Waka Sapras', 'photo' => 'jumli.jpg'],
                (object)['name' => 'Fatma Solissa, S.Sos.', 'nip' => '196810272014102001', 'jabatan' => 'Waka Humas', 'photo' => 'fatma.jpg'],
            ];

            $admins = [
                (object)['name' => 'Halija Solissa, S.Pd.', 'nip' => '198202012011012006', 'jabatan' => 'Bendahara', 'photo' => 'halija.jpg'],
                (object)['name' => 'Hawa Seknun, Amd.Com', 'nip' => '-', 'jabatan' => 'TU (Tata Usaha)', 'photo' => 'hawa.jpg'],
            ];

            $walikelas = [
                (object)['name' => 'Jumli Buton, S.Pd.', 'nip' => '199405022023211023', 'jabatan' => 'Wali Kelas X', 'photo' => 'jumli.jpg'],
                (object)['name' => 'Fitri Ir Widiasari, S.Pd.', 'nip' => '198805252022212035', 'jabatan' => 'Wali Kelas XI', 'photo' => 'widiasari.jpg'],
                (object)['name' => 'Ade Irma Ahmad, S.Pd.', 'nip' => '-', 'jabatan' => 'Wali Kelas XII', 'photo' => 'ade-irma.jpg'],
            ];

            // DATA DINAMIS
            $allTeachers = collect($teachers ?? [])->filter(fn($t) => !str_contains(strtolower($t->name), 'salis kelmuri'));
            $allStudents = $students ?? [];
        @endphp

        <div class="relative flex flex-col items-center z-10">
            @php 
               // Ganti baris pathKepsek menjadi lebih sederhana untuk testing:
$pathKepsek = asset('images/personnel/' . $kepsek->photo);
            @endphp
            <div @click="open = true; selected = { name: '{{ $kepsek->name }}', role: '{{ strtoupper($kepsek->jabatan) }}', id: '{{ $kepsek->nip }}', type: 'head', photo: '{{ $pathKepsek }}' }" 
                 class="glass-card p-6 md:p-8 rounded-[2.5rem] w-72 md:w-80 cursor-pointer shadow-[0_0_40px_rgba(34,211,238,0.15)] relative z-20 bg-[#020617]">
                <div class="w-28 h-28 mx-auto mb-5 rounded-[1.5rem] overflow-hidden border-2 border-cyan-400 p-1">
                    <img src="{{ $pathKepsek }}" class="photo-crop rounded-[1.1rem]">
                </div>
                <h3 class="text-xl font-black text-white uppercase tracking-tight">{{ $kepsek->name }}</h3>
                <span class="bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 text-[10px] font-bold px-4 py-1.5 rounded-full uppercase mt-3 inline-block tracking-widest">Kepala Sekolah</span>
            </div>
            <div class="line-v h-10"></div>
        </div>

        <div class="relative w-full max-w-5xl mx-auto">
            <div class="line-h absolute top-0 left-0 rounded-full hidden md:block" style="width: 75%; left: 12.5%;"></div>
            <div class="flex justify-center flex-wrap gap-4 md:gap-6 pt-6 relative z-10">
                @foreach($wakas as $waka)
                @php 
                    $pathWaka = !empty($waka->photo) && file_exists(public_path('images/personnel/'.$waka->photo)) ? asset('images/personnel/'.$waka->photo) : 'https://ui-avatars.com/api/?name='.urlencode($waka->name).'&background=020617&color=22d3ee&bold=true';
                @endphp
                <div @click="open = true; selected = { name: '{{ $waka->name }}', role: '{{ strtoupper($waka->jabatan) }}', id: '{{ $waka->nip }}', type: 'staff', photo: '{{ $pathWaka }}' }"
                     class="glass-card p-4 md:p-5 rounded-[2rem] w-[45%] md:w-48 flex flex-col items-center text-center cursor-pointer bg-[#020617]">
                    <div class="w-16 h-16 md:w-20 md:h-20 mb-4 rounded-[1rem] overflow-hidden border border-white/10 p-0.5 bg-slate-900">
                        <img src="{{ $pathWaka }}" class="photo-crop rounded-[0.8rem]" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($waka->name) }}&background=020617&color=22d3ee&bold=true'">
                    </div>
                    <h4 class="text-[10px] font-bold text-white uppercase truncate w-full px-1">{{ $waka->name }}</h4>
                    <p class="text-[8px] text-cyan-400 font-mono font-bold mt-1.5 uppercase bg-cyan-900/30 px-2 py-1 rounded-md">{{ $waka->jabatan }}</p>
                </div>
                @endforeach
            </div>
            <div class="line-v h-10"></div>
        </div>

        <div class="relative w-full max-w-2xl mx-auto">
            <div class="line-h absolute top-0 left-0 rounded-full hidden md:block" style="width: 50%; left: 25%;"></div>
            <div class="flex justify-center gap-6 pt-6 relative z-10">
                @foreach($admins as $admin)
                @php 
                    $pathAdmin = !empty($admin->photo) && file_exists(public_path('images/personnel/'.$admin->photo)) ? asset('images/personnel/'.$admin->photo) : 'https://ui-avatars.com/api/?name='.urlencode($admin->name).'&background=020617&color=22d3ee&bold=true';
                @endphp
                <div @click="open = true; selected = { name: '{{ $admin->name }}', role: '{{ strtoupper($admin->jabatan) }}', id: '{{ $admin->nip }}', type: 'staff', photo: '{{ $pathAdmin }}' }"
                     class="glass-card p-5 rounded-[2rem] w-48 flex flex-col items-center text-center cursor-pointer bg-[#020617]">
                    <div class="w-16 h-16 mb-4 rounded-[1rem] overflow-hidden border border-white/10 p-0.5 bg-slate-900">
                        <img src="{{ $pathAdmin }}" class="photo-crop rounded-[0.8rem]" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($admin->name) }}&background=020617&color=22d3ee&bold=true'">
                    </div>
                    <h4 class="text-[10px] font-bold text-white uppercase truncate w-full px-1">{{ $admin->name }}</h4>
                    <p class="text-[8px] text-cyan-400 font-mono font-bold mt-1.5 uppercase bg-cyan-900/30 px-2 py-1 rounded-md">{{ $admin->jabatan }}</p>
                </div>
                @endforeach
            </div>
            <div class="line-v h-10"></div>
        </div>

        <div class="relative w-full max-w-4xl mx-auto mb-24">
            <div class="line-h absolute top-0 left-0 rounded-full hidden md:block" style="width: 66%; left: 17%;"></div>
            <div class="flex justify-center flex-wrap gap-6 pt-6 relative z-10">
                @foreach($walikelas as $wk)
                @php 
                    $pathWK = !empty($wk->photo) && file_exists(public_path('images/personnel/'.$wk->photo)) ? asset('images/personnel/'.$wk->photo) : 'https://ui-avatars.com/api/?name='.urlencode($wk->name).'&background=020617&color=22d3ee&bold=true';
                @endphp
                <div @click="open = true; selected = { name: '{{ $wk->name }}', role: '{{ strtoupper($wk->jabatan) }}', id: '{{ $wk->nip }}', type: 'staff', photo: '{{ $pathWK }}' }"
                     class="glass-card p-5 rounded-[2rem] w-48 flex flex-col items-center text-center cursor-pointer bg-[#020617]">
                    <div class="w-16 h-16 mb-4 rounded-[1rem] overflow-hidden border border-white/10 p-0.5 bg-slate-900">
                        <img src="{{ $pathWK }}" class="photo-crop rounded-[0.8rem]" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($wk->name) }}&background=020617&color=22d3ee&bold=true'">
                    </div>
                    <h4 class="text-[10px] font-bold text-white uppercase truncate w-full px-1">{{ $wk->name }}</h4>
                    <p class="text-[8px] text-cyan-400 font-mono font-bold mt-1.5 uppercase bg-cyan-900/30 px-2 py-1 rounded-md">{{ $wk->jabatan }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <div class="pt-16 border-t border-white/10 mb-24 relative">
            <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-[#020617] px-6">
                <span class="text-white font-black text-xs md:text-sm uppercase tracking-[0.4em] border border-white/10 px-8 py-2.5 rounded-full glass-card shadow-lg">Seluruh Dewan Guru</span>
            </div>
            
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5 mt-12">
                @foreach($allTeachers as $guru)
                @php
                    $finalPhotoGuru = (!empty($guru->photo) && file_exists(public_path('images/personnel/'.$guru->photo))) ? asset('images/personnel/'.$guru->photo) : 'https://ui-avatars.com/api/?name='.urlencode($guru->name).'&background=020617&color=22d3ee&bold=true';
                @endphp
                <div @click="open = true; selected = { name: '{{ $guru->name }}', role: 'GURU PENGAJAR', id: '{{ $guru->nip ?? '-' }}', type: 'staff', photo: '{{ $finalPhotoGuru }}' }"
                     class="glass-card p-5 rounded-[1.5rem] flex flex-col items-center cursor-pointer group">
                    <div class="w-16 h-16 mb-4 rounded-xl overflow-hidden grayscale group-hover:grayscale-0 transition-all duration-500 border border-white/10">
                        <img src="{{ $finalPhotoGuru }}" class="photo-crop rounded-lg" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($guru->name) }}&background=020617&color=22d3ee&bold=true'">
                    </div>
                    <h5 class="text-[10px] font-bold text-white uppercase text-center line-clamp-2 w-full px-1">{{ $guru->name }}</h5>
                    <p class="text-[8px] text-gray-500 font-mono mt-2 uppercase">{{ $guru->jabatan ?? 'Tenaga Pendidik' }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <div class="pt-20 border-t border-purple-500/20 relative">
            <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-[#020617] px-6">
                <span class="text-purple-400 font-black text-xs md:text-sm uppercase tracking-[0.4em] border border-purple-500/30 px-8 py-2.5 rounded-full glass-card shadow-[0_0_15px_rgba(168,85,247,0.2)]">Direktori Siswa</span>
            </div>

            <div class="max-w-2xl mx-auto mt-12 mb-12 relative">
                <svg class="w-6 h-6 text-purple-400 absolute left-6 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <input type="text" id="searchInput" placeholder="Cari nama atau NISN siswa..." 
                    class="w-full bg-slate-900/80 border-2 border-purple-500/30 rounded-full px-16 py-5 text-sm font-mono focus:outline-none focus:border-purple-400 transition-all text-purple-100 placeholder-purple-500/50 shadow-xl">
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-5 text-left" id="studentContainer">
                @foreach($allStudents as $student)
                @php
                    $pathStudent = !empty($student->photo) && file_exists(public_path('images/students/'.$student->photo)) ? asset('images/students/'.$student->photo) : 'https://ui-avatars.com/api/?name='.urlencode($student->name).'&background=020617&color=a855f7&bold=true';
                @endphp
                <div @click="open = true; selected = { name: '{{ $student->name }}', role: 'SISWA AKTIF', id: '{{ $student->nisn ?? '-' }}', type: 'student', photo: '{{ $pathStudent }}' }"
                     class="student-card glass-card p-4 rounded-2xl flex items-center gap-4 cursor-pointer group">
                    <div class="w-14 h-14 rounded-xl overflow-hidden shrink-0 border border-purple-500/30 p-0.5 bg-slate-900">
                        <img src="{{ $pathStudent }}" class="photo-crop rounded-lg" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($student->name) }}&background=020617&color=a855f7&bold=true'">
                    </div>
                    <div class="overflow-hidden flex-1">
                        <h4 class="font-black text-white text-xs truncate uppercase group-hover:text-purple-300 transition-colors">{{ $student->name }}</h4>
                        <div class="flex items-center gap-2 mt-1.5">
                            <span class="bg-purple-900/40 text-purple-300 text-[8px] px-2 py-0.5 rounded font-mono border border-purple-500/20">{{ $student->nisn ?? 'NISN KOSONG' }}</span>
                            <span class="text-[9px] font-mono text-gray-500 uppercase">Kelas {{ $student->kelas ?? 'X' }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div x-show="open" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 backdrop-blur-none"
             x-transition:enter-end="opacity-100 backdrop-blur-xl"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 backdrop-blur-xl"
             x-transition:leave-end="opacity-0 backdrop-blur-none"
             class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/80" x-cloak>
            
            <div @click.away="open = false" 
                 class="glass-card max-w-2xl w-full rounded-[2.5rem] relative overflow-hidden p-6 md:p-10 border-2 shadow-2xl"
                 :class="selected.type === 'student' ? 'border-purple-500/50 shadow-purple-500/20' : 'border-cyan-400/50 shadow-cyan-400/20'">
                
                <button @click="open = false" class="absolute top-6 right-8 text-gray-500 hover:text-white text-4xl leading-none z-10">&times;</button>
                
                <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                    <div class="w-40 h-40 md:w-48 md:h-48 rounded-[2rem] overflow-hidden shrink-0 border-4 p-1 shadow-xl bg-[#020617]"
                         :class="selected.type === 'student' ? 'border-purple-500/50' : 'border-cyan-400/50'">
                        <img :src="selected.photo" class="photo-crop rounded-[1.7rem]" onerror="this.src='https://ui-avatars.com/api/?name=Error&background=020617&color=fff'">
                    </div>
                    
                    <div class="text-center md:text-left flex-1 w-full mt-4 md:mt-0">
                        <div class="inline-block px-3 py-1 rounded border mb-3 text-[10px] font-black uppercase tracking-widest"
                             :class="selected.type === 'student' ? 'bg-purple-500/10 border-purple-500/30 text-purple-300' : 'bg-cyan-500/10 border-cyan-500/30 text-cyan-300'" 
                             x-text="selected.role"></div>
                             
                        <h2 class="text-2xl md:text-3xl font-black text-white uppercase leading-tight mb-4" x-text="selected.name"></h2>
                        
                        <div class="grid grid-cols-2 gap-4 border-t border-white/10 pt-4 mt-2 text-left">
                            <div class="bg-slate-900/50 p-3.5 rounded-xl border border-white/5">
                                <p class="text-[9px] text-gray-500 uppercase font-bold mb-1 tracking-widest" x-text="selected.type === 'student' ? 'NISN' : 'ID / NIP'"></p>
                                <p class="text-xs text-white font-mono font-bold" x-text="selected.id && selected.id !== '-' ? selected.id : 'Data Belum Lengkap'"></p>
                            </div>
                            <div class="bg-slate-900/50 p-3.5 rounded-xl border border-white/5">
                                <p class="text-[9px] text-gray-500 uppercase font-bold mb-1 tracking-widest">Status</p>
                                <div class="flex items-center gap-2 mt-1.5">
                                    <span class="w-2 h-2 rounded-full animate-pulse" :class="selected.type === 'student' ? 'bg-purple-400' : 'bg-green-400'"></span>
                                    <p class="text-[10px] font-mono font-bold uppercase" :class="selected.type === 'student' ? 'text-purple-400' : 'text-green-400'">Aktif / Terverifikasi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const term = e.target.value.toLowerCase();
            const cards = document.querySelectorAll('.student-card');
            cards.forEach(card => {
                const textData = card.innerText.toLowerCase();
                card.style.display = textData.includes(term) ? 'flex' : 'none';
            });
        });
    </script>
</body>
</html>