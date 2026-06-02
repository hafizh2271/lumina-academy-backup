<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Lumina Academy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #0b1120; color: white; overflow-x: hidden; }
        .glass { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.1); }
        .hero-gradient { background: radial-gradient(circle at top right, rgba(34, 211, 238, 0.08), transparent); }
    </style>
</head>
<body>

    <nav class="fixed w-full z-[100] px-6 py-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center glass rounded-2xl px-8 py-4">
            <a href="/" class="text-xl font-extrabold tracking-tighter">
                LUMINA<span class="text-cyan-400">ACADEMY</span>
            </a>
            <a href="/" class="text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-white transition">← Kembali</a>
        </div>
    </nav>

    <main class="pt-40 pb-20 px-6 hero-gradient">
        <div class="max-w-7xl mx-auto">
            <div class="mb-20" data-aos="fade-up">
                <span class="text-cyan-400 text-[10px] font-black tracking-[.4em] uppercase">The Genesis</span>
                <h1 class="text-5xl md:text-7xl font-black mt-4 tracking-tighter leading-none">Mendefinisikan Ulang<br><span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500">Masa Depan Belajar.</span></h1>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="relative" data-aos="zoom-in">
                    <div class="absolute -inset-4 bg-cyan-500/20 blur-2xl rounded-full opacity-30"></div>
                    <div class="glass aspect-video rounded-[3rem] overflow-hidden relative flex items-center justify-center border-white/20 shadow-2xl">
                        <span class="text-cyan-400/50 text-8xl font-black italic">LMN</span>
                        </div>
                </div>

                <div class="space-y-6 text-gray-400 leading-relaxed text-lg" data-aos="fade-left">
                    <p>Lumina Academy lahir dari visi sederhana: <b class="text-white">Pendidikan tidak boleh diam di tempat.</b> Di era di mana teknologi berkembang setiap detik, kami membangun ekosistem yang menggabungkan kecerdasan buatan dengan empati manusia.</p>
                    <p>Sejak didirikan pada tahun 2024, kami telah berkomitmen untuk menciptakan ruang belajar yang tidak hanya fokus pada nilai akademik, tapi juga pada kesiapan siswa menghadapi tantangan global di tahun 2030 dan seterusnya.</p>
                    
                    <div class="grid grid-cols-2 gap-6 pt-6">
                        <div class="glass p-6 rounded-3xl">
                            <h4 class="text-white font-bold text-2xl">0%</h4>
                            <p class="text-[10px] uppercase tracking-widest font-black">Hambatan Teknologi</p>
                        </div>
                        <div class="glass p-6 rounded-3xl">
                            <h4 class="text-white font-bold text-2xl">100%</h4>
                            <p class="text-[10px] uppercase tracking-widest font-black">Kurikulum Adaptif</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init({ duration: 1000, once: true });</script>
</body>
</html>