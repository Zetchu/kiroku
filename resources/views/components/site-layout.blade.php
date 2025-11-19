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
            <a href="/" class="hover:text-white transition">My List</a>
        </nav>

        <div class="flex items-center gap-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="text-sm font-medium hover:text-accent transition">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                       class="text-sm font-medium text-gray-300 hover:text-white transition">Login</a>
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