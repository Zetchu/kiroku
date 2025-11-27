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

    {{--2. Trending Section --}}
    <section class="max-w-7xl mx-auto px-6 -mt-20 relative z-20">
        <div class="flex items-end justify-between mb-8">
            <h2 class="text-2xl font-bold text-white">Trending This Season</h2>
            <a href="/series" class="text-sm text-gray-400 hover:text-accent transition">View all -></a>
        </div>


        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @foreach($trendingSeries as $series)
                <a href="/series/{{$series->id}}"
                   class="group relative rounded-xl overflow-hidden cursor-pointer bg-[#111] transition hover:-translate-y-2 duration-300"
                   data-type="{{ $series->type }}">
                    <div class="aspect-[2/3] w-full relative">
                        <img src="{{ $series->getImageUrl('website') }}" alt="{{ $series->name }}"
                             class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent"></div>

                        <div class="absolute top-2 right-2 bg-black/60 backdrop-blur-md border border-white/10 text-white text-xs font-bold px-2 py-1 rounded-md flex items-center gap-1">
                            <svg class="w-3 h-3 text-accent" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            {{ $series->reviews_avg_rating ? number_format($series->reviews_avg_rating, 1) : 'N/A' }}
                        </div>
                    </div>

                    <div class="absolute bottom-0 left-0 w-full p-3">
                        <h3 class="text-sm font-bold text-white leading-tight truncate">{{ $series->name }}</h3>
                        <p class="text-xs text-gray-400 mt-1 truncate">{{ $series->type }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    {{-- 3. Features Section --}}
    <section class="py-24 bg-[#050505]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-white mb-4">Why Choose Kiroku?</h2>
                <p class="text-gray-400 max-w-2xl mx-auto">We've built the tools you need to manage your anime addiction
                    efficiently.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="p-8 rounded-2xl bg-[#0F0F0F] border border-white/5 hover:border-accent/30 transition duration-300 group">
                    <div class="w-12 h-12 bg-white/5 rounded-lg flex items-center justify-center mb-6 text-accent group-hover:scale-110 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Discover New Favorites</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Explore a vast library of anime. Our curated recommendations help you find exactly what you're
                        looking for based on your tastes.
                    </p>
                </div>

                <div class="p-8 rounded-2xl bg-[#0F0F0F] border border-white/5 hover:border-accent/30 transition duration-300 group">
                    <div class="w-12 h-12 bg-white/5 rounded-lg flex items-center justify-center mb-6 text-accent group-hover:scale-110 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Track Your Progress</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Effortlessly log episodes, mark as watched, and keep track of your viewing journey. Never forget
                        where you left off.
                    </p>
                </div>

                <div class="p-8 rounded-2xl bg-[#0F0F0F] border border-white/5 hover:border-accent/30 transition duration-300 group">
                    <div class="w-12 h-12 bg-white/5 rounded-lg flex items-center justify-center mb-6 text-accent group-hover:scale-110 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Connect with Fans</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Join a vibrant community of anime enthusiasts. Share reviews, discuss theories, and discover new
                        perspectives.
                    </p>
                </div>
            </div>
        </div>
    </section>


</x-site-layout>