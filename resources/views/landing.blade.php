<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumina Academy | Future Smart School</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            scroll-behavior: smooth;
            overflow-x: hidden;
            background-color: #0b1120;
        }
        
        .glass {
            background: rgba(11, 17, 32, 0.8); 
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .hero-gradient {
            background: radial-gradient(circle at top right, rgba(34, 211, 238, 0.05), transparent),
                        radial-gradient(circle at bottom left, rgba(79, 70, 229, 0.05), transparent);
        }

        .glow-text {
            text-shadow: 0 0 20px rgba(34, 211, 238, 0.3);
        }

        .card-glow:hover {
            box-shadow: 0 0 30px rgba(34, 211, 238, 0.15);
            border-color: rgba(34, 211, 238, 0.4);
        }
    </style>
</head>
<body class="text-white">

    <nav class="fixed w-full z-[100] px-6 py-6 transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto flex justify-between items-center glass rounded-2xl px-8 py-4">
            <div class="text-2xl font-extrabold tracking-tighter">
                <span class="text-white">LUMINA</span><span class="text-cyan-400 glow-text">ACADEMY</span>
            </div>

            <div class="hidden md:flex space-x-8 text-[11px] font-bold uppercase tracking-[0.2em] items-center">
                <a href="#home" class="hover:text-cyan-400 transition-all text-white text-[10px]">Home</a>
                
                <div class="relative group">
                    <button class="hover:text-cyan-400 transition-all flex items-center gap-2 uppercase text-white text-[10px]">
                        Profile <span class="text-[8px] group-hover:rotate-180 transition-transform duration-300">▼</span>
                    </button>
                    <div class="absolute top-full left-1/2 -translate-x-1/2 mt-2 w-48 glass rounded-2xl p-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-[110]">
                        <a href="{{ route('public.about') }}" class="block px-4 py-3 hover:bg-white/5 rounded-xl transition normal-case tracking-normal">Tentang Kami</a>
                        <a href="{{ route('public.vision') }}" class="block px-4 py-3 hover:bg-white/5 rounded-xl transition normal-case tracking-normal text-[11px]">Visi & Misi</a>
                    </div>
                </div>

                <div class="relative group">
                    <button class="hover:text-cyan-400 transition-all flex items-center gap-2 uppercase text-white text-[10px]">
                        Academic <span class="text-[8px] group-hover:rotate-180 transition-transform duration-300">▼</span>
                    </button>
                    <div class="absolute top-full left-0 mt-4 w-52 glass rounded-2xl p-3 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 shadow-2xl z-[110]">
                        <a href="{{ route('public.ppdb') }}" class="block px-4 py-3 hover:bg-cyan-500/20 rounded-xl transition text-cyan-400 font-black normal-case tracking-normal text-[11px]">
                            PPDB 2026
                        </a>
                        <a href="{{ route('public.structure') }}" class="block px-4 py-3 hover:bg-white/10 rounded-xl transition normal-case tracking-normal text-[11px]">Institutional Structure</a>
                        <a href="#" class="block px-4 py-3 hover:bg-white/10 rounded-xl transition normal-case tracking-normal text-[11px]">Gallery</a>
                    </div>
                </div>

                <a href="#kontak" class="hover:text-cyan-400 transition-all text-white text-[10px]">Contact</a>
            </div>

            <div class="flex items-center gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-[10px] font-black bg-cyan-500 text-slate-900 px-6 py-2 rounded-xl uppercase tracking-widest hover:shadow-[0_0_20px_rgba(34,211,238,0.5)] transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-[10px] font-black border border-cyan-500/50 text-cyan-400 px-6 py-2 rounded-xl uppercase tracking-widest hover:bg-cyan-500/10 transition">
                        PORTAL
                    </a>
                @endauth
            </div>
        </div> 
    </nav> 

    <section id="home" class="relative min-h-screen flex items-center justify-center hero-gradient pt-20 px-6 overflow-hidden">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-cyan-500/10 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-blue-600/10 blur-[120px] rounded-full"></div>

        <div class="relative z-10 text-center">
            <div data-aos="fade-down" class="inline-block px-4 py-1 border border-cyan-500/30 rounded-full text-cyan-400 text-[10px] font-bold tracking-[0.3em] mb-8 bg-cyan-500/5">
                PIONEERING FUTURE EDUCATION
            </div>
            <h1 data-aos="zoom-out-up" data-aos-delay="200" class="text-6xl md:text-9xl font-extrabold mb-8 tracking-tighter leading-[0.9]">
                Level Up Your <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-blue-500 to-indigo-600">Knowledge.</span>
            </h1>
            <p data-aos="fade-up" data-aos-delay="400" class="text-gray-400 text-lg md:text-xl max-w-2xl mx-auto mb-12 font-light leading-relaxed">
                Platform pendidikan berbasis AI yang dirancang untuk mengasah potensi tak terbatas siswa di era digital.
            </p>
            <div data-aos="fade-up" data-aos-delay="600" class="flex flex-col md:flex-row gap-6 justify-center">
                <a href="{{ route('public.structure') }}" class="bg-white text-slate-900 px-10 py-4 rounded-2xl font-bold text-lg hover:shadow-[0_0_30px_rgba(255,255,255,0.2)] transition duration-300">
                    Cek Database
                </a>
                <button class="glass px-10 py-4 rounded-2xl font-bold text-lg hover:bg-white/10 transition duration-300 border border-white/20">
                    Watch Teaser
                </button>
            </div>
        </div>
    </section>

    <section id="stats" class="py-20 relative px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-6">
            <div data-aos="fade-up" data-aos-delay="100" class="glass p-10 rounded-[2rem] text-center border-b-4 border-cyan-500">
                <div class="text-4xl font-extrabold text-cyan-400 mb-2">2.5k+</div>
                <div class="text-[10px] uppercase tracking-widest text-gray-400 font-bold">Active Students</div>
            </div>
            <div data-aos="fade-up" data-aos-delay="200" class="glass p-10 rounded-[2rem] text-center border-b-4 border-blue-500">
                <div class="text-4xl font-extrabold text-blue-500 mb-2">150+</div>
                <div class="text-[10px] uppercase tracking-widest text-gray-400 font-bold">Expert Mentors</div>
            </div>
            <div data-aos="fade-up" data-aos-delay="300" class="glass p-10 rounded-[2rem] text-center border-b-4 border-purple-500">
                <div class="text-4xl font-extrabold text-purple-500 mb-2">48+</div>
                <div class="text-[10px] uppercase tracking-widest text-gray-400 font-bold">World Awards</div>
            </div>
            <div data-aos="fade-up" data-aos-delay="400" class="glass p-10 rounded-[2rem] text-center border-b-4 border-indigo-500">
                <div class="text-4xl font-extrabold text-indigo-500 mb-2">98%</div>
                <div class="text-[10px] uppercase tracking-widest text-gray-400 font-bold">Passing Rate</div>
            </div>
        </div>
    </section>

    <section id="directory" class="py-24 px-6 relative overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center mb-16 gap-6">
                <div data-aos="fade-right">
                    <h2 class="text-3xl md:text-5xl font-black italic uppercase tracking-tighter">
                        Neural <span class="text-cyan-400">Personnel</span> Live
                    </h2>
                    <p class="text-gray-500 font-mono text-xs mt-2">REAL-TIME_DATABASE_SYNCHRONIZATION_ACTIVE</p>
                </div>
                <a href="{{ route('public.structure') }}" data-aos="fade-left" class="text-xs font-bold text-cyan-400 border border-cyan-500/30 px-6 py-3 rounded-full hover:bg-cyan-500/10 transition font-mono">
                    VIEW_ALL_AGENTS_→
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($publicUsers as $user)
                    <div data-aos="fade-up" class="glass p-8 rounded-[2.5rem] card-glow transition-all duration-300 relative group overflow-hidden">
                        <div class="absolute -right-4 -top-4 w-24 h-24 bg-cyan-500/5 rounded-full blur-2xl group-hover:bg-cyan-500/20 transition-all"></div>
                        
                        <div class="flex items-center gap-5 relative z-10">
                            <div class="w-14 h-14 bg-gradient-to-br from-slate-800 to-slate-900 border border-white/10 rounded-2xl flex items-center justify-center text-xl shadow-xl">
                                👤
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-white tracking-tight">{{ $user->name }}</h4>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                                    <span class="text-[10px] font-bold text-cyan-500 uppercase tracking-widest font-mono">{{ $user->role }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-8 pt-6 border-t border-white/5 flex justify-between items-center">
                            <span class="text-[9px] text-gray-500 font-mono tracking-widest uppercase">ID: 00{{ $user->id }}</span>
                            <span class="text-[9px] text-gray-500 font-mono tracking-widest uppercase">STABLE_LINK</span>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-20 border-2 border-dashed border-white/5 rounded-[3rem]">
                        <p class="text-gray-600 font-mono italic uppercase tracking-widest">No_Personnel_Detected_In_Sector_7</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section id="features" class="py-32 px-6 bg-[#080d19]/30">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-end mb-20 gap-8">
                <div data-aos="fade-right">
                    <h2 class="text-4xl md:text-6xl font-black leading-tight">Ekosistem Belajar<br>Tanpa Batas.</h2>
                </div>
                <div data-aos="fade-left" class="max-w-md text-gray-400 text-right">
                    Kami mengintegrasikan teknologi tercanggih untuk memastikan setiap detik waktu belajar menjadi investasi masa depan.
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div data-aos="zoom-in" class="glass p-10 rounded-[3rem] group hover:bg-cyan-500/10 transition-all duration-500">
                    <div class="text-6xl mb-8 group-hover:scale-110 transition-transform duration-500">🧠</div>
                    <h3 class="text-2xl font-bold mb-4">Neural Learning AI</h3>
                    <p class="text-gray-400 font-light leading-relaxed">Sistem cerdas yang menganalisis cara belajar Anda secara personal.</p>
                </div>
                <div data-aos="zoom-in" data-aos-delay="200" class="glass p-10 rounded-[3rem] group border-cyan-500/20 shadow-[0_20px_50px_rgba(34,211,238,0.1)]">
                    <div class="text-6xl mb-8 group-hover:scale-110 transition-transform duration-500">🌐</div>
                    <h3 class="text-2xl font-bold mb-4">Metaverse Campus</h3>
                    <p class="text-gray-400 font-light leading-relaxed">Masuki ruang kelas 3D dari belahan dunia manapun secara interaktif.</p>
                </div>
                <div data-aos="zoom-in" data-aos-delay="400" class="glass p-10 rounded-[3rem] group hover:bg-indigo-500/10 transition-all duration-500">
                    <div class="text-6xl mb-8 group-hover:scale-110 transition-transform duration-500">⚡</div>
                    <h3 class="text-2xl font-bold mb-4">Fast-Track Career</h3>
                    <p class="text-gray-400 font-light leading-relaxed">Kurikulum yang terhubung langsung dengan industri global masa depan.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="kontak" class="py-32 px-6 relative">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                <div data-aos="fade-right">
                    <h2 class="text-5xl font-black mb-6 uppercase italic tracking-tighter">Visit Our <span class="text-cyan-400">Hub</span></h2>
                    <p class="text-gray-400 mb-10 leading-relaxed">Datang dan rasakan langsung atmosfer pendidikan masa depan di Sekolah kami.</p>
                    
                    <div class="space-y-8">
                        <div class="flex items-start gap-5">
                            <div class="w-12 h-12 rounded-2xl bg-cyan-500/10 flex items-center justify-center text-cyan-400 shrink-0 border border-cyan-500/20">📍</div>
                            <div>
                                <h4 class="font-bold text-lg">Alamat Sekolah</h4>
                                <p class="text-gray-500 text-sm">Jln.Baru Wali,Desa Wali, Kecamatan Namrole, Kabupaten Buru Selatan</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-5">
                            <div class="w-12 h-12 rounded-2xl bg-purple-500/10 flex items-center justify-center text-purple-400 shrink-0 border border-purple-500/20">📞</div>
                            <div>
                                <h4 class="font-bold text-lg">Hubungi Kami</h4>
                                <p class="text-gray-500 text-sm">(021) 888-2026 / smanegeri14buruselatan@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div data-aos="zoom-in-left" class="h-[450px] rounded-[3rem] overflow-hidden border border-white/10 shadow-2xl relative">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d415.3237946214707!2d126.76131775657583!3d-3.834145273329128!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sid!2sid!4v1776263333764!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div class="absolute inset-0 pointer-events-none bg-gradient-to-t from-[#0b1120] via-transparent to-transparent"></div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-20 border-t border-white/5 px-6 bg-[#080d19]">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                <div class="md:col-span-2">
                    <div class="text-2xl font-bold mb-6 italic tracking-tighter">LUMINA<span class="text-cyan-400">ACADEMY</span></div>
                    <p class="text-gray-500 text-sm max-w-sm leading-relaxed">
                        Membentuk generasi unggul dengan kurikulum adaptif berbasis kecerdasan buatan. Masa depan dimulai di sini.
                    </p>
                </div>
                <div>
                    <h5 class="font-bold mb-6 text-xs uppercase tracking-[0.2em] text-cyan-400">Location</h5>
                    <p class="text-gray-500 text-xs leading-relaxed">
                        Jln.Baru Wali, Desa Wali<br>
                        Kecamatan Namrole, Kabupaten Buru Selatan<br>
                        Indonesia
                    </p>
                </div>
                <div>
                    <h5 class="font-bold mb-6 text-xs uppercase tracking-[0.2em] text-cyan-400">Socials</h5>
                    <div class="flex flex-col gap-3 text-xs font-bold text-gray-400 uppercase">
                        <a href="#" class="hover:text-white transition">Instagram</a>
                        <a href="#" class="hover:text-white transition">LinkedIn</a>
                    </div>
                </div>
            </div>
            <div class="pt-8 border-t border-white/5 text-center">
                <p class="text-gray-600 text-[10px] uppercase tracking-widest">© 2026 Lumina Academy. Built for the Future.</p>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 1000, once: true });

        window.onscroll = function() {
            var nav = document.getElementById('navbar');
            if (window.pageYOffset > 50) {
                nav.classList.add('py-2');
            } else {
                nav.classList.remove('py-2');
            }
        };
    </script>
</body>
</html>