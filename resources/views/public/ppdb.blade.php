<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB 2026 | Lumina Academy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #0b1120; color: white; overflow-x: hidden; }
        .glass { background: rgba(255, 255, 255, 0.02); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.1); }
        .input-focus:focus { outline: none; border-color: #22d3ee; box-shadow: 0 0 15px rgba(34, 211, 238, 0.3); }
        .hero-gradient { background: radial-gradient(circle at top right, rgba(34, 211, 238, 0.05), transparent); }
    </style>
</head>
<body>

    <nav class="fixed w-full z-[100] px-6 py-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center glass rounded-2xl px-8 py-4">
            <a href="/" class="text-xl font-extrabold tracking-tighter text-white">LUMINA<span class="text-cyan-400">JOIN</span></a>
            <a href="/" class="text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-white transition">Aborting...</a>
        </div>
    </nav>

    <main class="pt-32 pb-20 px-6 hero-gradient">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-cyan-400 text-[10px] font-black tracking-[0.4em] uppercase">Recruitment Phase 01</span>
                <h1 class="text-5xl font-black mt-4 tracking-tighter">ENROLL <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500">NOW.</span></h1>
                <p class="text-gray-500 mt-4 font-light">Jadilah bagian dari generasi pionir digital tahun akademik 2026/2027.</p>
            </div>

            <div class="glass p-8 md:p-12 rounded-[3rem] shadow-2xl relative overflow-hidden" data-aos="zoom-in">
                <div class="absolute -right-20 -top-20 w-64 h-64 bg-cyan-500/10 blur-[100px] rounded-full"></div>
                
                <form action="{{ route('ppdb.store') }}" method="POST" class="relative z-10 space-y-8">
    @csrf 
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="space-y-2">
            <label class="text-[10px] font-black uppercase tracking-widest text-cyan-400 ml-2">Full Name</label>
            <input type="text" name="nama" required placeholder="e.g. Aristha Putra" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm input-focus transition-all">
        </div>
        <div class="space-y-2">
            <label class="text-[10px] font-black uppercase tracking-widest text-cyan-400 ml-2">Email Address</label>
            <input type="email" name="email" required placeholder="aristha@example.com" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm input-focus transition-all">
        </div>
    </div> <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="space-y-2">
            <label class="text-[10px] font-black uppercase tracking-widest text-cyan-400 ml-2">Asal Sekolah</label>
            <input type="text" name="asal_sekolah" required placeholder="SMP Future Tech" class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm input-focus transition-all">
        </div>
        <div class="space-y-2">
            <label class="text-[10px] font-black uppercase tracking-widest text-cyan-400 ml-2">Peminatan (Major)</label>
            <select name="major" class="w-full bg-[#0f172a] border border-white/10 rounded-2xl px-6 py-4 text-sm input-focus transition-all appearance-none text-gray-400">
                <option value="AI">AI & Data Science</option>
                <option value="Cyber">Cyber Security</option>
                <option value="Robotic">Robotic Engineering</option>
                <option value="Metaverse">Digital Arts & Metaverse</option>
            </select>
        </div>
    </div>

    <div class="space-y-2">
        <label class="text-[10px] font-black uppercase tracking-widest text-cyan-400 ml-2">Why Lumina? (Personal Statement)</label>
        <textarea name="pesan" rows="4" placeholder="Ceritakan ambisi terbesarmu..." class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-sm input-focus transition-all resize-none"></textarea>
    </div>

    <button type="submit" class="w-full bg-cyan-500 hover:bg-cyan-400 text-slate-900 font-black py-5 rounded-2xl uppercase tracking-[0.3em] text-xs shadow-[0_0_30px_rgba(34,211,238,0.3)] transition-all hover:scale-[1.02] active:scale-95">
        Submit Application & Initialize Neural Link
    </button>
</form>
            </div>
        </div>
    </main>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init({ duration: 1000, once: true });</script>
</body>
</html>