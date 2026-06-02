<x-app-layout>
    <div class="py-12 bg-[#050810] min-h-screen text-white font-mono">
        <div class="max-w-xl mx-auto px-4 text-center">
            
            <div class="mb-8">
                <h2 class="text-2xl font-black tracking-widest text-cyan-400 animate-pulse">> INITIALIZING SCANNER...</h2>
                <p class="text-[10px] text-gray-500 mt-2">ALGORITMA SINKRONISASI PRESENSI V.1.0</p>
            </div>

            <div class="relative">
                <div id="reader" class="overflow-hidden rounded-[2rem] border-2 border-cyan-500/30 shadow-[0_0_50px_rgba(34,211,238,0.1)] bg-black"></div>
                
                <div class="absolute inset-0 pointer-events-none border-[20px] border-black/40"></div>
                <div class="absolute top-5 left-5 w-10 h-10 border-t-4 border-l-4 border-cyan-500 rounded-tl-xl"></div>
                <div class="absolute top-5 right-5 w-10 h-10 border-t-4 border-r-4 border-cyan-500 rounded-tr-xl"></div>
                <div class="absolute bottom-5 left-5 w-10 h-10 border-b-4 border-l-4 border-cyan-500 rounded-bl-xl"></div>
                <div class="absolute bottom-5 right-5 w-10 h-10 border-b-4 border-r-4 border-cyan-500 rounded-br-xl"></div>
            </div>

            <div id="result-status" class="mt-8 p-4 rounded-2xl bg-white/5 border border-white/10 hidden">
                <p id="status-text" class="text-xs font-bold uppercase tracking-widest"></p>
            </div>

        </div>
    </div>

    <script src="https://unpkg.com/html5-qrcode"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // Bunyi Beep (Opsional)
            let audio = new Audio('https://www.soundjay.com/button/beep-07.mp3');
            audio.play();

            // Matikan scanner sementara biar gak double scan
            html5QrcodeScanner.clear();

            // Kirim ID Siswa ke Server lewat AJAX
            fetch("{{ route('attendance.store') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ student_id: decodedText })
            })
            .then(res => res.json())
            .then(data => {
                document.getElementById('result-status').classList.remove('hidden');
                document.getElementById('status-text').innerText = "SUCCESS: " + data.message;
                document.getElementById('status-text').classList.add('text-green-400');
                
                // Restart scanner setelah 2 detik
                setTimeout(() => location.reload(), 2000);
            });
        }

        let html5QrcodeScanner = new Html5QrcodeScanner("reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
</x-app-layout>