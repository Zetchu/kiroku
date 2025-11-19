<x-site-layout title="{{ $series->name }}">

    <div class="pt-28 pb-16 max-w-7xl mx-auto px-6">

        {{-- Hero section--}}
        <div class="flex flex-col md:flex-row gap-10 items-start mb-16">

            {{-- poster  --}}
            <div class="w-full md:w-64 flex-shrink-0 relative rounded-xl overflow-hidden shadow-2xl shadow-purple-900/40">
                <img src="{{ $series->imageUrl }}" alt="{{ $series->name }}" class="w-full aspect-[2/3] object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
            </div>

            {{-- series info  --}}
            <div class="flex-grow pt-8">
                <h1 class="text-5xl font-extrabold text-white mb-4 leading-tight">
                    {{ $series->name }}
                </h1>
                <p class="text-gray-400 text-lg mb-6 leading-relaxed max-w-4xl">
                    {{ $series->synopsis }}
                </p>

                <div class="flex flex-wrap gap-2 mb-10">
                    @foreach($series->genres as $genre)
                        <a href="/genres/{{ $genre->id }}"
                           class="px-3 py-1 text-sm font-medium rounded-full bg-purple-700/50 text-purple-300 hover:bg-purple-600/60 transition">
                            {{ $genre->name }}
                        </a>
                    @endforeach
                    <span class="px-3 py-1 text-sm font-medium rounded-full bg-gray-700/50 text-gray-300">
                        {{ $series->type }}
                    </span>
                </div>

                <div class="flex gap-4">
                    <button class="bg-accent text-white font-bold px-6 py-3 rounded-lg shadow-lg shadow-accent/30 hover:bg-[#7a25c9] transition flex items-center gap-2">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Add to List
                    </button>
                    <button class="border border-white/20 text-white font-medium px-6 py-3 rounded-lg hover:bg-white/10 transition">
                        Write Review
                    </button>
                </div>
            </div>
        </div>


        {{-- information and reviews --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            {{-- information box --}}
            <div class="md:col-span-1 bg-[#0F0F0F] p-6 rounded-2xl border border-white/5 h-fit">
                <h2 class="text-xl font-bold text-white mb-4">Information</h2>
                <ul class="space-y-4 text-gray-300">
                    <li class="flex items-center gap-3">
                        <svg class="h-5 w-5 text-accent flex-shrink-0" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Type: <span class="text-white font-medium">{{ $series->type }}</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="h-5 w-5 text-accent flex-shrink-0" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Status: <span class="text-white font-medium">{{ $series->status }}</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="h-5 w-5 text-accent flex-shrink-0" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M7 4v16M17 4v16M3 8h4M17 8h4M3 12h18M3 16h4M17 16h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                        </svg>
                        Episodes: <span
                                class="text-white font-medium">24</span> {{-- Placeholder --}}
                    </li>

                    <li class="flex items-center gap-3">
                        <svg class="h-5 w-5 text-accent flex-shrink-0" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.477 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.477-3-9s1.343-9 3-9m-9 9h18"/>
                        </svg>
                        Studio: <span class="text-white font-medium">Nexus Animation</span> {{-- Placeholder --}}
                    </li>
                </ul>
            </div>

            {{-- comments box --}}
            <div class="md:col-span-2 bg-[#0F0F0F] p-6 rounded-2xl border border-white/5">
                <h2 class="text-xl font-bold text-white mb-6">Community Reviews</h2>

                @if($series->comments->isNotEmpty())
                    <ul class="space-y-6">
                        @foreach($series->comments->take(5) as $comment)

                            <li class="border-b border-white/5 pb-6 last:border-b-0 last:pb-0">
                                <div class="flex justify-between items-center mb-2">

                                    <h3 class="font-bold text-white flex items-center gap-2">
                                        {{ $comment->user->name }}
                                    </h3>
                                    {{-- Placeholder for time --}}
                                    <p class="text-xs text-gray-500">
                                        {{ $comment->created_at->diffForHumans() }}
                                    </p>
                                </div>
                                <p class="text-gray-300 leading-relaxed text-sm">
                                    {{ $comment->content }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-400">No comments yet. Be the first one to say something! 💬</p>
                    {{-- WE need to add "Add Comment" button here --}}
                @endif
            </div>

        </div>
    </div>

</x-site-layout>