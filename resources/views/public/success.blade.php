<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success | Lumina Academy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #0b1120; color: white; overflow: hidden; }
        .glass { background: rgba(255, 255, 255, 0.02); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.1); }
        .success-glow { box-shadow: 0 0 50px rgba(34, 211, 238, 0.2); }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">

    <div class="max-w-md w-full px-6 text-center" data-aos="zoom-out">
        <div class="w-24 h-24 bg-cyan-500/20 rounded-full flex items-center justify-center mx-auto mb-8 success-glow border border-cyan-500/50">
            <span class="text-4xl">✔️</span>
        </div>

        <h1 class="text-4xl font-black mb-4 tracking-tighter">NEURAL LINK <span class="text-cyan-400">ESTABLISHED.</span></h1>
        <p class="text-gray-400 font-light mb-10 leading-relaxed">
            Data pendaftaranmu sudah masuk ke enkripsi server kami. Tim seleksi akan segera memproses profilmu.
        </p>

        <div class="glass rounded-[2rem] p-6 text-left relative overflow-hidden mb-10">
            <div class="absolute top-0 right-0 p-4 opacity-10 font-black text-4xl">2026</div>
            <div class="space-y-4">
                <div>
                    <p class="text-[9px] uppercase tracking-widest text-cyan-400 font-bold">Registration Status</p>
                    <p class="text-sm font-bold uppercase">Phase 01: Synchronizing</p>
                </div>
                <div>
                    <p class="text-[9px] uppercase tracking-widest text-cyan-400 font-bold">Next Step</p>
                    <p class="text-sm font-light text-gray-300">Check your email for the entrance test schedule.</p>
                </div>
            </div>
        </div>

        <a href="/" class="inline-block w-full py-4 border border-white/10 rounded-2xl text-[11px] font-black uppercase tracking-[0.3em] hover:bg-white/5 transition">
            Back to Home Hub
        </a>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init({ duration: 1000 });</script>
</body>
</html>