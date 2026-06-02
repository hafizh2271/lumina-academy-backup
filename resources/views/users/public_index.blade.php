<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumina Directory | {{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #0b1120; color: white; }
        .glass { background: rgba(255, 255, 255, 0.02); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.05); }
    </style>
</head>
<body>
    <div class="min-h-screen py-20 px-6">
        <div class="max-w-7xl mx-auto">
            <a href="/" class="text-{{ $color }}-400 text-[10px] font-black uppercase tracking-[0.3em] hover:opacity-70 transition">
                ← Kembali ke Beranda
            </a>

            <div class="mt-8 mb-16">
                <h1 class="text-6xl font-black tracking-tighter uppercase italic">
                    Lumina <span class="text-{{ $color }}-400">{{ $title }}</span>
                </h1>
                <div class="h-1 w-20 bg-{{ $color }}-500 mt-4 rounded-full"></div>
            </div>

            @if($users->isEmpty())
                <div class="glass p-20 rounded-[3rem] text-center">
                    <p class="text-gray-500 font-bold uppercase tracking-widest">Data belum tersedia dalam sistem.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($users as $user)
                    <div class="glass p-8 rounded-[2.5rem] group hover:border-{{ $color }}-500/50 transition duration-500 relative overflow-hidden">
                        <div class="absolute -right-10 -top-10 w-32 h-32 bg-{{ $color }}-500/5 blur-3xl rounded-full"></div>
                        
                        <div class="relative z-10 flex flex-col items-center text-center">
                            <div class="w-24 h-24 rounded-[2rem] bg-gradient-to-br from-{{ $color }}-500 to-blue-600 p-1 mb-6 transform group-hover:rotate-6 transition duration-500">
                                <div class="w-full h-full bg-[#0b1120] rounded-[1.8rem] flex items-center justify-center text-3xl font-black">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                            </div>
                            <h3 class="text-xl font-bold mb-1">{{ $user->name }}</h3>
                            <p class="text-[10px] font-black text-{{ $color }}-400 uppercase tracking-widest opacity-70">
                                {{ $user->role }} // Verified
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</body>
</html>