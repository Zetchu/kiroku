<x-site-layout title="{{ $series->name }}">


    <div x-data="{ modalOpen: false }">

        <div class="pt-28 pb-16 max-w-7xl mx-auto px-6">

            {{-- Hero section--}}
            <div class="flex flex-col md:flex-row gap-10 items-start mb-16">

                {{-- poster  --}}
                <div class="w-full md:w-64 flex-shrink-0 relative rounded-xl overflow-hidden shadow-2xl shadow-purple-900/40">
                    <img src="{{ $series->imageUrl }}" alt="{{ $series->name }}"
                         class="w-full aspect-[2/3] object-cover">
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
                            <svg class="h-5 w-5" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 4v16m8-8H4"/>
                            </svg>
                            Add to List
                        </button>

                        @auth
                            <button @click="modalOpen = true"
                                    class="border border-white/20 text-white font-medium px-6 py-3 rounded-lg hover:bg-white/10 transition flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24"
                                     stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                                </svg>
                                Write Comment
                            </button>
                        @endauth

                        @guest
                            <a href="{{ route('login') }}"
                               class="border border-white/20 text-white font-medium px-6 py-3 rounded-lg hover:bg-white/10 transition">
                                Log in to Comment
                            </a>
                        @endguest
                    </div>
                </div>
            </div>


            {{-- information and comments --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                {{-- information box --}}
                <div class="md:col-span-1 bg-[#0F0F0F] p-6 rounded-2xl border border-white/5 h-fit">
                    <h2 class="text-xl font-bold text-white mb-4">Information</h2>
                    <ul class="space-y-4 text-gray-300">
                        <li class="flex items-center gap-3">
                            <svg class="h-5 w-5 text-accent flex-shrink-0" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Type: <span class="text-white font-medium">{{ $series->type }}</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="h-5 w-5 text-accent flex-shrink-0" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M5 13l4 4L19 7"/>
                            </svg>
                            Status: <span class="text-white font-medium">{{ $series->status }}</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="h-5 w-5 text-accent flex-shrink-0" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M7 4v16M17 4v16M3 8h4M17 8h4M3 12h18M3 16h4M17 16h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                            </svg>
                            Episodes: <span
                                    class="text-white font-medium">{{$series->episodes}}</span> {{-- Placeholder --}}
                        </li>

                        <li class="flex items-center gap-3">
                            <svg class="h-5 w-5 text-accent flex-shrink-0" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.477 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.477-3-9s1.343-9 3-9m-9 9h18"/>
                            </svg>
                            Studio: <span
                                    class="text-white font-medium">{{$series->studio}}</span> {{-- Placeholder --}}
                        </li>
                    </ul>
                </div>

                {{-- comments box --}}
                <div class="md:col-span-2 bg-[#0F0F0F] p-6 rounded-2xl border border-white/5">
                    <h2 class="text-xl font-bold text-white mb-6">Community Discussion</h2>

                    @if($series->comments->isNotEmpty())
                        <ul class="space-y-6">
                            @foreach($series->comments->take(5) as $comment)

                                <li class="border-b border-white/5 pb-6 last:border-b-0 last:pb-0">
                                    <div class="flex justify-between items-center mb-2">

                                        <h3 class="font-bold text-white flex items-center gap-2">
                                            {{ $comment->user->name }}
                                        </h3>
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
                    @endif
                </div>

            </div>
        </div>

        {{-- dialog --}}
        <div x-show="modalOpen"
             style="display: none;"
             class="fixed inset-0 z-50 overflow-y-auto"
             aria-labelledby="modal-title"
             role="dialog"
             aria-modal="true">

            <div class="flex items-center justify-center min-h-screen p-4 text-center">


                <div x-show="modalOpen"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="fixed inset-0 bg-black/80 transition-opacity"
                     @click="modalOpen = false"
                     aria-hidden="true"></div>

                <div x-show="modalOpen"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="relative inline-block w-full max-w-lg p-6 overflow-hidden text-left align-middle transition-all transform bg-[#1a1a1a] border border-white/10 rounded-2xl shadow-xl">

                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                            <h3 class="text-xl leading-6 font-bold text-white" id="modal-title">
                                Leave a Comment
                            </h3>
                            <div class="mt-4">
                                <form action="{{ route('comments.store', $series->id) }}" method="POST">
                                    @csrf
                                    <textarea
                                            name="content"
                                            rows="5"
                                            class="w-full bg-black/50 text-white border border-white/10 rounded-lg p-4 focus:border-purple-500 focus:ring-0 transition resize-none"
                                            placeholder="Share your thoughts on this series..."
                                            required></textarea>

                                    <div class="mt-6 flex justify-end gap-3">
                                        <button type="button"
                                                @click="modalOpen = false"
                                                class="px-4 py-2 text-sm font-medium text-gray-300 bg-transparent border border-white/10 rounded-lg hover:bg-white/5 transition">
                                            Cancel
                                        </button>
                                        <button type="submit"
                                                class="px-4 py-2 text-sm font-bold text-white bg-accent rounded-lg hover:bg-[#7a25c9] transition shadow-lg shadow-accent/20">
                                            Post Comment
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-site-layout>