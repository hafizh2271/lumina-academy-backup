<x-app-layout>
    <div class="py-12 bg-[#0b1120] min-h-screen text-white font-sans relative overflow-hidden">
        
        <div class="absolute top-0 left-0 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10 pointer-events-none"></div>

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 relative z-10">
            <div class="mb-8 text-center">
                <h2 class="text-3xl font-black italic tracking-tighter uppercase text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-500">
                    Pemindaian Saraf: ID Mahasiswa
                </h2>
                <p class="text-[10px] font-black tracking-[0.4em] text-gray-500 mt-2">AWAITING_STUDENT_UPLINK...</p>
            </div>

            <div class="glass p-8 rounded-[3rem] border border-white/10 shadow-2xl relative overflow-hidden">
                <div id="scan-feedback" class="absolute inset-0 z-20 pointer-events-none transition-all duration-300 flex items-center justify-center opacity-0 bg-green-500/20 backdrop-blur-md">
                    <div class="text-center">
                        <div class="text-6xl mb-4 animate-bounce">⚡</div>
                        <h3 class="text-2xl font-black italic text-white tracking-widest uppercase">Uplink Success</h3>
                        <p id="feedback-text" class="text-[10px] font-mono text-white/70">MENSINKRONISASI DATA KE DATABASE...</p>
                    </div>
                </div>

                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-cyan-500 to-purple-600 rounded-[2.5rem] blur opacity-20 group-hover:opacity-40 transition"></div>
                    <div class="relative bg-[#0f172a] rounded-[2.5rem] p-4 border border-white/10 overflow-hidden">
                        <div id="reader" class="w-full overflow-hidden rounded-2xl border border-white/5"></div>
                    </div>
                </div>

                <div class="mt-8 flex justify-center gap-4">
                    <button onclick="window.location.href='/guru/dashboard'" class="px-8 py-3 bg-white/5 hover:bg-white/10 border border-white/10 rounded-2xl text-[10px] font-black uppercase tracking-widest transition-all">
                        🔙 Kembali ke Dasbor
                    </button>
                    <button onclick="testTransition()" class="px-8 py-3 bg-cyan-500/10 hover:bg-cyan-500 text-cyan-400 hover:text-black border border-cyan-500/30 rounded-2xl text-[10px] font-black uppercase tracking-widest transition-all italic">
                        ⚡ Test Transition
                    </button>
                </div>
            </div>

            <div class="mt-10 glass p-6 rounded-[2.5rem] border border-white/10">
                <div class="flex items-center justify-between mb-6 px-4">
                    <h4 class="text-[10px] font-black text-cyan-400 tracking-[0.3em] uppercase">Log Transmisi Terakhir</h4>
                    <span class="text-[9px] font-mono text-gray-600">STATUS: ENCRYPTED</span>
                </div>
                <div id="attendance-list" class="space-y-3">
                    <p class="text-center text-[10px] text-gray-600 italic py-4">Menunggu transmisi data pertama...</p>
                </div>
            </div>
        </div>
    </div>

    <style>
        .glass { background: rgba(255, 255, 255, 0.02); backdrop-filter: blur(8px); }
        #reader { background: #000 !important; border: none !important; }
        #reader video { border-radius: 1rem; object-fit: cover; }
    </style>

    <script src="https://unpkg.com/html5-qrcode"></script>
    <script>
        function updateLog(id) {
            const list = document.getElementById('attendance-list');
            list.innerHTML = `
                <div class="flex items-center justify-between p-4 bg-green-500/10 border border-green-500/20 rounded-2xl animate-pulse">
                    <div class="flex items-center gap-3">
                        <span class="text-green-400">✅</span>
                        <span class="text-[10px] font-black text-white uppercase tracking-widest italic">Neural Link established: ID_${id}</span>
                    </div>
                    <span class="text-[9px] font-mono text-green-500/50">UPLOAD_COMPLETE</span>
                </div>
            ` + (list.innerHTML.includes('Menunggu') ? '' : list.innerHTML);
        }

        function onScanSuccess(decodedText, decodedResult) {
            html5QrcodeScanner.clear();

            // Jalankan Animasi Feedback
            const feedback = document.getElementById('scan-feedback');
            feedback.classList.remove('opacity-0', 'pointer-events-none');
            feedback.classList.add('opacity-100');
            
            // Update Log di bawah (visual only sebelum redirect)
            updateLog(decodedText);

            // Kirim Data ke Backend
            fetch('/guru/attendance/store', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ student_id: decodedText })
            }).then(response => {
                setTimeout(() => {
                    window.location.href = "/guru/dashboard?scan_success=true";
                }, 2000);
            }).catch(err => {
                document.getElementById('feedback-text').innerText = "ERROR: UPLINK FAILED";
                console.error(err);
            });
        }

        function testTransition() {
            const feedback = document.getElementById('scan-feedback');
            feedback.classList.remove('opacity-0');
            feedback.classList.add('opacity-100');
            updateLog("DEMO_MODE");
            setTimeout(() => {
                window.location.href = "/guru/dashboard";
            }, 1500);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner("reader", { 
            fps: 20, 
            qrbox: {width: 250, height: 250},
            aspectRatio: 1.0 
        });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
</x-app-layout>