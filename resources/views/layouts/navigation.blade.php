@php
    // 1. Set default ke rute dashboard biasa
    $dashboardLink = route('dashboard'); 

    // 2. Cek apakah user sudah login
    if (auth()->check()) {
        $user = auth()->user();
        
        // 3. Baru cek role-nya
        if ($user->role === 'admin') {
            $dashboardLink = route('admin.dashboard');
        } elseif ($user->role === 'guru') {
            $dashboardLink = route('guru.dashboard');
        }
    } else {
        // 4. Kalau guest, arahkan ke login atau tetap di landing
        $dashboardLink = route('login');
    }
@endphp

<nav x-data="{ open: false }" class="bg-[#0b1120]/50 backdrop-blur-xl border-b border-white/5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <div class="shrink-0 flex items-center font-black text-xl tracking-tighter">
                    <a href="{{ $dashboardLink }}" class="flex items-center gap-2">
                        <span class="text-white">LUMINA</span>
                        <span class="text-cyan-400">ACADEMY</span>
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="$dashboardLink" :active="request()->url() == $dashboardLink" class="text-xs uppercase tracking-[0.2em] font-bold text-gray-400 hover:text-cyan-400 border-cyan-400">
                        {{ __('Dasbor') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-white/10 text-xs leading-4 font-bold rounded-xl text-gray-400 bg-white/5 hover:text-white focus:outline-none transition ease-in-out duration-150 uppercase tracking-widest">
                            <div>{{ auth()->check() ? auth()->user()->name : 'Guest' }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="bg-[#111827] border border-white/10 rounded-lg overflow-hidden">
                            <x-dropdown-link :href="route('profile.edit')" class="text-gray-400 hover:bg-white/5 hover:text-cyan-400">
                                {{ __('Profil') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-400 hover:bg-red-500/10">
                                    {{ __('Keluar Sistem') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>