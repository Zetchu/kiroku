<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Kiroku - Anime Tracker</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>

        .text-accent {
            color: #8A2BE2;
        }

        .bg-accent {
            background-color: #8A2BE2;
        }

        .bg-accent-hover:hover {
            background-color: #7a25c9;
        }
    </style>
</head>
<body class="bg-[#050505] text-white antialiased font-sans selection:bg-[#8A2BE2] selection:text-white">

<header class="fixed top-0 w-full z-50 transition-all duration-300 bg-gradient-to-b from-black/80 to-transparent backdrop-blur-sm border-b border-white/5">
    <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
        <a href="/" class="flex items-center gap-2 group">
            <div class="w-8 h-8 bg-accent rounded-lg flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
            </div>
            <span class="text-xl font-bold tracking-wide group-hover:text-gray-200 transition">Kiroku</span>
        </a>

        <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-gray-300">
            <a href="/" class="hover:text-white transition">Home</a>
            <a href="/series" class="hover:text-white transition">Explore</a>
            <a href="/genres" class="hover:text-white transition">Genres</a>
            @auth
                <a href="{{ route('my-list') }}" class="hover:text-white transition">My List</a>
            @endauth
        </nav>

        <div class="flex items-center gap-4">
            @if (Route::has('login'))
                @auth

                    @if(Auth::user()->is_admin)
                        <a href="{{ route('admin.index') }}"
                           class="hidden md:inline-block text-xs font-bold text-purple-400 border border-purple-500/30 bg-purple-500/10 px-3 py-1.5 rounded-md hover:bg-purple-500/20 transition">
                            Admin Panel
                        </a>
                    @endif

                    <div x-data="{ dropdownOpen: false }" class="relative">

                        <button @click="dropdownOpen = !dropdownOpen"
                                class="flex items-center gap-2 text-sm font-medium text-white hover:text-accent transition focus:outline-none">
                            <span>{{ Auth::user()->name }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                 :class="{'rotate-180': dropdownOpen}"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>

                        <div x-show="dropdownOpen"
                             @click.outside="dropdownOpen = false"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-48 bg-[#1a1a1a] border border-white/10 rounded-lg shadow-xl py-1 z-50"
                             style="display: none;">

                            <a href="{{ route('profile.edit') }}"
                               class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5 hover:text-white border-b border-white/5">
                                Profile
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="block w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-white/5 hover:text-red-300">
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </div>

                @else
                    <a href="{{ route('login') }}"
                       class="text-sm font-medium text-gray-300 hover:text-white transition">
                        Login
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="bg-accent bg-accent-hover text-white px-5 py-2 rounded-md text-sm font-medium transition shadow-[0_0_15px_rgba(138,43,226,0.3)]">
                            Sign Up
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</header>

<main>
    {{ $slot }}
</main>

<footer class="bg-[#0a0a0a] border-t border-white/5 py-12 mt-20">
    <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-6 text-sm text-gray-500">
        <p>&copy; 2025 Kiroku. All rights reserved.</p>
        <div class="flex gap-6">
            <a href="#" class="hover:text-white transition">Privacy Policy</a>
            <a href="#" class="hover:text-white transition">Terms of Service</a>
        </div>
    </div>
</footer>

</body>
</html>