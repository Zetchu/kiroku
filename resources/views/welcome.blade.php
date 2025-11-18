<x-site-layout>

    {{-- 1. Hero Section --}}
    <div class="relative h-[85vh] w-full flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://img.freepik.com/free-photo/illustration-anime-city_23-2151779742.jpg?t=st=1763492556~exp=1763496156~hmac=8013b9c892b43de4df1307314d8a8ecaf874bf670ad363d37828ae6f68986685&w=2000"
                 alt="Anime Background"
                 class="w-full h-full object-cover opacity-60">
            <div class="absolute inset-0 bg-gradient-to-b from-[#050505]/30 via-[#050505]/60 to-[#050505]"></div>
        </div>

        <div class="relative z-10 text-center max-w-3xl px-6 mt-10">
            <div class="inline-block mb-4 px-3 py-1 rounded-full border border-white/10 bg-white/5 text-xs font-medium tracking-wider text-accent uppercase backdrop-blur-md">
                The Ultimate Tracker
            </div>
            <h1 class="text-5xl md:text-7xl font-bold mb-6 tracking-tight leading-tight text-white drop-shadow-xl">
                Your Gateway to the <br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600">Anime Universe</span>
            </h1>
            <p class="text-lg text-gray-300 mb-10 max-w-2xl mx-auto leading-relaxed">
                Track, Discover, and Connect with Kiroku. Never miss an episode and dive deeper into the stories you
                love.
            </p>
            <a href="/register"
               class="inline-flex items-center justify-center px-8 py-4 text-base font-bold text-white transition-all duration-200 bg-accent rounded-lg hover:bg-[#7a25c9] hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 focus:ring-offset-[#050505] shadow-[0_0_20px_rgba(138,43,226,0.4)]">
                Start Tracking
            </a>
        </div>
    </div>

    
</x-site-layout>