<x-app-layout>
    @if(request()->get('scan_success') || request()->get('scan_status') === 'success')
        <div x-data="{ show: true }" 
             x-show="show" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-10"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-10"
             x-init="setTimeout(() => show = false, 4000)"
             class="fixed top-10 left-1/2 -translate-x-1/2 z-[100] w-[90%] max-w-md">
            <div class="bg-green-500/20 border border-green-500/50 backdrop-blur-xl p-4 rounded-3xl shadow-[0_0_30px_rgba(34,197,94,0.3)] flex items-center gap-4 animate-bounce">
                <div class="h-10 w-10 bg-green-500 rounded-2xl flex items-center justify-center text-xl shadow-lg">✅</div>
                <div>
                    <p class="text-[10px] font-black text-green-400 uppercase tracking-widest">Neural Sync Success</p>
                    <p class="text-[9px] text-white/70 font-mono italic uppercase">Data absensi telah diarsipkan</p>
                </div>
            </div>
        </div>
    @endif

    <div class="py-12 bg-[#0b1120] min-h-screen text-white font-sans relative overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10 pointer-events-none"></div>
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-10">
            
            @if (session('status') === 'profile-updated')
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                     class="mb-6 p-4 bg-cyan-500/20 border border-cyan-400/50 rounded-2xl text-cyan-400 text-[10px] font-black tracking-[0.3em] uppercase animate-pulse">
                    🚀 SYSTEM: DATA NEURAL BERHASIL DISINKRONISASI
                </div>
            @endif

            <div class="mb-10 animate-fade-in flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <h2 class="text-5xl font-black tracking-tighter uppercase leading-none italic">
                        Welcome Back, <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-500">{{ auth()->user()->name }}</span>
                    </h2>
                    <div class="flex items-center gap-3 mt-4">
                        <span class="h-2.5 w-2.5 rounded-full bg-green-500 shadow-[0_0_15px_rgba(34,197,94,0.8)] animate-pulse"></span>
                        <p class="text-gray-500 text-[10px] font-black tracking-[0.4em] uppercase">Status: {{ strtoupper(auth()->user()->role) }} LINK OPTIMIZED</p>
                    </div>
                </div>
                <div class="bg-white/5 border border-white/10 px-6 py-3 rounded-2xl backdrop-blur-md">
                    <p class="text-[9px] text-gray-500 font-black uppercase tracking-widest mb-1 text-right">Server Time</p>
                    <p id="clock" class="text-xl font-mono font-bold text-cyan-400 tracking-tighter">00:00:00</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="space-y-6">
                    <div class="glass p-8 rounded-[3rem] border border-white/10 relative overflow-hidden group shadow-2xl">
                        <div class="absolute -right-20 -top-20 w-60 h-60 bg-purple-600/10 blur-[100px] rounded-full"></div>
                        
                        <div class="relative z-10">
                            <div class="flex flex-col items-center text-center">
                                <a href="{{ route('profile.edit') }}" class="relative group cursor-crosshair">
                                    <div class="absolute inset-0 bg-cyan-500 blur-2xl opacity-20 group-hover:opacity-40 transition duration-500"></div>
                                    <div class="w-32 h-32 mb-6 overflow-hidden rounded-[2.5rem] border-2 border-cyan-500/30 p-1.5 bg-[#0b1120] relative">
                                        @if(auth()->user()->avatar)
                                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="w-full h-full object-cover rounded-[2rem]">
                                        @else
                                            <div class="w-full h-full bg-gradient-to-br from-cyan-600 to-purple-700 flex items-center justify-center text-4xl font-black rounded-[2rem]">
                                                {{ substr(auth()->user()->name, 0, 1) }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="absolute bottom-4 right-0 bg-cyan-500 text-[#0b1120] rounded-full p-2 scale-0 group-hover:scale-100 transition-transform duration-300 shadow-xl text-[10px] font-black">EDIT</div>
                                </a>
                                <h3 class="text-3xl font-black tracking-tight text-white leading-tight uppercase italic">{{ auth()->user()->name }}</h3>
                                <p class="text-cyan-400 text-[11px] font-black tracking-[0.5em] mt-2 uppercase opacity-80 border-y border-cyan-400/20 py-1 px-4 inline-block">
                                    ID: {{ auth()->user()->nisn ?? auth()->user()->nip ?? 'LMN-GUEST' }}
                                </p>
                            </div>

                            <div class="mt-10 relative group/card text-center">
                                <div class="absolute -inset-1 bg-gradient-to-r from-cyan-600 to-purple-600 rounded-[2.5rem] blur opacity-25 group-hover/card:opacity-60 transition duration-1000"></div>
                                <div class="relative bg-[#0f172a]/90 border border-white/10 p-8 rounded-[2.5rem] flex flex-col items-center">
                                    <div id="qr-wrapper" class="relative">
                                        <div id="scan-success-overlay" class="absolute inset-0 bg-green-500 rounded-2xl z-20 flex flex-col items-center justify-center opacity-0 pointer-events-none transition-all duration-500">
                                            <span class="text-4xl">✅</span>
                                            <span class="text-[8px] font-black text-white mt-2 tracking-widest uppercase">Uplink Granted</span>
                                        </div>
                                        <div id="qr-container" class="bg-white p-4 rounded-2xl shadow-[0_0_50px_rgba(255,255,255,0.1)] transform group-hover/card:scale-105 transition duration-500">
                                            {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(140)
                                                ->format('svg')
                                                ->color(15, 23, 42)
                                                ->backgroundColor(255, 255, 255)
                                                ->margin(1)
                                                ->generate(auth()->user()->id) !!}
                                        </div>
                                    </div>

                                    <div class="mt-6 space-y-3 w-full">
                                        <button onclick="simulateScan()" class="w-full py-3 bg-cyan-500/10 hover:bg-cyan-500 text-cyan-400 hover:text-[#0b1120] border border-cyan-500/30 rounded-2xl text-[10px] font-black uppercase tracking-[0.3em] transition-all flex items-center justify-center gap-2 group/btn">
                                            <span>⚡</span> TEST_SCAN_UPLINK
                                        </button>
                                        <button onclick="downloadQR()" class="w-full py-3 bg-white/5 hover:bg-white/10 text-gray-400 hover:text-white border border-white/5 rounded-2xl text-[9px] font-black uppercase tracking-[0.2em] transition-all italic">
                                            Download Digital Pass
                                        </button>
                                    </div>
                                    <div class="mt-6 flex flex-col items-center text-gray-500">
                                        <div class="h-[1px] w-12 bg-white/10 mb-4"></div>
                                        <span class="text-[9px] font-black uppercase tracking-[0.4em]">Lumina Academy Access</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="glass p-6 rounded-[2.5rem] border border-white/5 flex items-center justify-between shadow-xl">
                        <div>
                            <p class="text-[9px] text-gray-500 font-black uppercase tracking-widest">Global Rank</p>
                            <p class="text-2xl font-black text-purple-400 italic">#12 <span class="text-[10px] text-gray-400 not-italic">S-GRADE</span></p>
                        </div>
                        <div class="h-12 w-12 rounded-full border-2 border-purple-500/20 flex items-center justify-center bg-purple-500/10 text-xl text-purple-400">👑</div>
                    </div>
                </div>

                <div class="lg:col-span-2 space-y-8">
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <a href="{{ route('profile.edit') }}" class="glass p-6 rounded-[2.5rem] border border-white/5 hover:border-cyan-500/50 hover:bg-cyan-500/5 transition-all group relative overflow-hidden text-center">
                             <i class="block text-2xl mb-3 group-hover:scale-110 transition duration-300">👤</i>
                            <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 group-hover:text-cyan-400">Sync Profile</p>
                        </a>
                        <a href="#" class="glass p-6 rounded-[2.5rem] border border-white/5 hover:border-purple-500/50 hover:bg-purple-500/5 transition-all group relative overflow-hidden text-center">
                            <i class="block text-2xl mb-3 group-hover:scale-110 transition duration-300">📚</i>
                            <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 group-hover:text-purple-400">Kursus</p>
                        </a>
                        <a href="{{ route('directory.index') }}" class="glass p-6 rounded-[2.5rem] border border-cyan-500/30 bg-cyan-500/10 hover:border-cyan-400 transition-all group relative overflow-hidden text-center shadow-[0_0_30px_rgba(34,211,238,0.1)]">
                            <i class="block text-2xl mb-3 animate-pulse">🗂️</i>
                            <p class="text-[10px] font-black uppercase tracking-widest text-cyan-400">Database</p>
                        </a>
                        <div class="glass p-6 rounded-[2.5rem] border border-white/5 hover:border-red-500/50 hover:bg-red-500/5 transition-all group relative overflow-hidden text-center cursor-pointer">
                            <i class="block text-2xl mb-3 group-hover:rotate-12 transition">🛠️</i>
                            <p class="text-[10px] font-black uppercase tracking-widest text-gray-400 group-hover:text-red-400">Support</p>
                        </div>
                    </div>

                    <div class="glass p-8 rounded-[3rem] border border-white/10 relative shadow-2xl">
                        <div class="flex items-center justify-between mb-8">
                            <h3 class="text-xl font-black italic text-cyan-400 flex items-center gap-3 tracking-tighter uppercase">
                                <span class="flex h-3 w-3 rounded-full bg-cyan-400 shadow-[0_0_10px_rgba(34,211,238,1)]"></span>
                                Live Feed: Transmisi Hari Ini
                            </h3>
                            <span class="text-[9px] font-mono text-gray-600 tracking-[0.3em]">SECURE_LINE_V2</span>
                        </div>
                        
                        <div class="space-y-4">
                            @forelse($todaySchedules ?? [] as $class)
                                <div class="group bg-white/5 border border-white/5 p-6 rounded-[2.5rem] flex items-center justify-between hover:bg-white/10 hover:border-cyan-500/30 transition-all cursor-pointer">
                                    <div class="flex items-center gap-6">
                                        <div class="w-14 h-14 rounded-3xl bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center text-2xl shadow-lg group-hover:rotate-6 transition duration-300">⚡</div>
                                        <div>
                                            <h4 class="text-xl font-black uppercase italic text-white group-hover:text-cyan-400 transition">{{ $class['subject'] }}</h4>
                                            <div class="flex gap-4 mt-1">
                                                <p class="text-[9px] text-gray-500 font-bold uppercase tracking-widest">Room: <span class="text-white">{{ $class['room'] }}</span></p>
                                                <p class="text-[9px] text-gray-500 font-bold uppercase tracking-widest text-cyan-500/70">Sync: {{ $class['time'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="px-4 py-1 bg-cyan-500/20 text-cyan-400 text-[8px] font-black rounded-full animate-pulse uppercase tracking-[0.2em] border border-cyan-500/30">Active_Now</span>
                                </div>
                            @empty
                                <div class="text-center py-10 rounded-[2.5rem] border-2 border-dashed border-white/5">
                                    <p class="text-gray-600 text-[10px] font-black uppercase tracking-[0.4em] italic">No active data transmission detected</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .glass { background: rgba(255, 255, 255, 0.02); backdrop-filter: blur(40px); }
        @keyframes fade-in { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-in { animation: fade-in 1s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    </style>

    <script>
        function updateClock() {
            const now = new Date();
            const timeString = now.getHours().toString().padStart(2, '0') + ':' + 
                               now.getMinutes().toString().padStart(2, '0') + ':' + 
                               now.getSeconds().toString().padStart(2, '0');
            document.getElementById('clock').textContent = timeString;
        }
        setInterval(updateClock, 1000);
        updateClock();

        function simulateScan() {
            const overlay = document.getElementById('scan-success-overlay');
            const qr = document.getElementById('qr-container');
            
            // Suara Bip Futuristik
            try {
                const audioCtx = new (window.AudioContext || window.webkitAudioContext)();
                const oscillator = audioCtx.createOscillator();
                const gainNode = audioCtx.createGain();
                oscillator.type = 'sine';
                oscillator.frequency.setValueAtTime(880, audioCtx.currentTime);
                oscillator.frequency.exponentialRampToValueAtTime(440, audioCtx.currentTime + 0.1);
                gainNode.gain.setValueAtTime(0.1, audioCtx.currentTime);
                gainNode.gain.exponentialRampToValueAtTime(0.01, audioCtx.currentTime + 0.2);
                oscillator.connect(gainNode);
                gainNode.connect(audioCtx.destination);
                oscillator.start();
                oscillator.stop(audioCtx.currentTime + 0.2);
            } catch(e) { console.log("Audio not supported"); }

            // Animasi Visual
            overlay.classList.remove('opacity-0', 'pointer-events-none');
            qr.classList.add('scale-95', 'blur-sm', 'rotate-3');

            // Redirect ke Database dengan flag success
            setTimeout(() => {
                window.location.href = "{{ route('directory.index') }}?scan_success=1";
            }, 1500);
        }

        function downloadQR() {
            const svg = document.querySelector('#qr-container svg');
            const svgData = new XMLSerializer().serializeToString(svg);
            const canvas = document.createElement("canvas");
            const ctx = canvas.getContext("2d");
            const img = new Image();
            const size = 1000;
            canvas.width = size;
            canvas.height = size;

            img.onload = function() {
                ctx.fillStyle = "white";
                ctx.fillRect(0, 0, canvas.width, canvas.height);
                ctx.drawImage(img, 100, 100, size - 200, size - 200);
                const link = document.createElement("a");
                link.download = "LUMINA_UPLINK_{{ auth()->user()->name }}.png";
                link.href = canvas.toDataURL("image/png");
                link.click();
            };
            img.src = "data:image/svg+xml;base64," + btoa(unescape(encodeURIComponent(svgData)));
        }
    </script>
</x-app-layout>