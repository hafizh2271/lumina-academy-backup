<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi & Misi | Lumina Academy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #0b1120; color: white; }
        .glass { background: rgba(255, 255, 255, 0.02); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.1); }
        .glow-cyan { box-shadow: 0 0 40px rgba(34, 211, 238, 0.1); }
    </style>
</head>
<body>

    <nav class="fixed w-full z-[100] px-6 py-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center glass rounded-2xl px-8 py-4">
            <a href="/" class="text-xl font-extrabold tracking-tighter">LUMINA<span class="text-cyan-400">VISION</span></a>
            <a href="/" class="text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-white transition">← Back to Hub</a>
        </div>
    </nav>

    <main class="pt-40 pb-20 px-6">
        <div class="max-w-4xl mx-auto text-center mb-24" data-aos="fade-down">
            <span class="text-cyan-400 text-[10px] font-black tracking-[.4em] uppercase">Core Philosophy</span>
            <h1 class="text-5xl md:text-7xl font-black mt-4 tracking-tighter italic">VISI & <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-cyan-400">MISI.</span></h1>
        </div>

        <div class="max-w-5xl mx-auto mb-32">
            <div class="glass p-12 rounded-[3.5rem] border-t-4 border-cyan-500 relative overflow-hidden glow-cyan" data-aos="zoom-in">
                <div class="absolute top-0 right-0 p-10 opacity-10 text-9xl font-black italic">VISI</div>
                <h2 class="text-cyan-400 text-xs font-black tracking-widest uppercase mb-6">The Ultimate Goal</h2>
                <p class="text-2xl md:text-4xl font-bold leading-tight tracking-tight">
                    "Menjadi pionir institusi pendidikan global yang mengintegrasikan <span class="text-white underline decoration-cyan-500 underline-offset-8">Kecerdasan Buatan</span> untuk melahirkan pemimpin masa depan yang adaptif dan beretika."
                </p>
            </div>
        </div>

        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-16">
                <h3 class="text-2xl font-black uppercase tracking-widest">Our Strategic Missions</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="glass p-8 rounded-[2.5rem] group hover:bg-white/5 transition duration-500" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-14 h-14 rounded-2xl bg-cyan-500 flex items-center justify-center text-slate-900 text-2xl font-black mb-6 shadow-[0_0_20px_rgba(34,211,238,0.4)]">01</div>
                    <h4 class="text-xl font-bold mb-4">Adaptive Curriculum</h4>
                    <p class="text-gray-400 text-sm leading-relaxed font-light">Menyusun kurikulum dinamis yang diperbarui secara real-time mengikuti perkembangan industri teknologi global.</p>
                </div>

                <div class="glass p-8 rounded-[2.5rem] group hover:bg-white/5 transition duration-500 border-b-4 border-blue-500" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-14 h-14 rounded-2xl bg-blue-500 flex items-center justify-center text-slate-900 text-2xl font-black mb-6 shadow-[0_0_20px_rgba(59,130,246,0.4)]">02</div>
                    <h4 class="text-xl font-bold mb-4">Neural Infrastructure</h4>
                    <p class="text-gray-400 text-sm leading-relaxed font-light">Menyediakan fasilitas belajar berbasis Metaverse dan AI Hub sebagai laboratorium eksplorasi siswa.</p>
                </div>

                <div class="glass p-8 rounded-[2.5rem] group hover:bg-white/5 transition duration-500" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-14 h-14 rounded-2xl bg-purple-500 flex items-center justify-center text-slate-900 text-2xl font-black mb-6 shadow-[0_0_20px_rgba(168,85,247,0.4)]">03</div>
                    <h4 class="text-xl font-bold mb-4">Global Character</h4>
                    <p class="text-gray-400 text-sm leading-relaxed font-light">Membangun integritas moral dan etika digital bagi siswa dalam berinteraksi dengan teknologi masa depan.</p>
                </div>
            </div>
        </div>
    </main>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init({ duration: 1000, once: true });</script>
</body>
</html>