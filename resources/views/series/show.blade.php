<x-site-layout title="{{ $series->name }}">

    <div x-data="{ commentModalOpen: false, reviewModalOpen: false }">

        <div class="pt-28 pb-16 max-w-7xl mx-auto px-6">

            <div class="flex flex-col md:flex-row gap-10 items-start mb-16">

                <div class="w-full md:w-64 flex-shrink-0 relative rounded-xl overflow-hidden shadow-2xl shadow-purple-900/40">
                    <img src="{{ $series->imageUrl }}" alt="{{ $series->name }}"
                         class="w-full aspect-[2/3] object-cover">

                    @if(isset($userReview) && $userReview)
                        <div class="absolute top-0 right-0 bg-purple-600 text-white text-xs font-bold px-3 py-1 rounded-bl-lg shadow-md">
                            {{ $userReview->status }}
                        </div>
                    @endif

                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                </div>
                
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

                        @auth
                            <button @click="reviewModalOpen = true"
                                    class="bg-accent text-white font-bold px-6 py-3 rounded-lg shadow-lg shadow-accent/30 hover:bg-[#7a25c9] transition flex items-center gap-2">
                                @if(isset($userReview) && $userReview)
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Edit Entry
                                @else
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 4v16m8-8H4"/>
                                    </svg>
                                    Add to List
                                @endif
                            </button>
                        @else
                            <a href="{{ route('login') }}"
                               class="bg-accent text-white font-bold px-6 py-3 rounded-lg shadow-lg shadow-accent/30 hover:bg-[#7a25c9] transition flex items-center gap-2">
                                Add to List
                            </a>
                        @endauth


                        @auth
                            <button @click="commentModalOpen = true"
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

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                {{-- Information Box --}}
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
                            Episodes: <span class="text-white font-medium">{{ $series->episodes ?? '?' }}</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="h-5 w-5 text-accent flex-shrink-0" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.477 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.477-3-9s1.343-9 3-9m-9 9h18"/>
                            </svg>
                            Studio: <span class="text-white font-medium">{{ $series->studio ?? 'Unknown' }}</span>
                        </li>
                    </ul>
                </div>

                {{-- Comments Box --}}
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
                        <div class="text-center py-8">
                            <p class="text-gray-400 mb-4">No comments yet. Be the first one to say something! 💬</p>
                            @auth
                                <button @click="commentModalOpen = true" class="text-accent hover:underline text-sm">
                                    Write a comment now
                                </button>
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>


        <div x-show="commentModalOpen" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto"
             aria-modal="true">
            <div class="flex items-center justify-center min-h-screen p-4 text-center">

                <div x-show="commentModalOpen"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                     class="fixed inset-0 bg-black/80 transition-opacity"
                     @click="commentModalOpen = false"></div>

                <div x-show="commentModalOpen"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                     class="relative inline-block w-full max-w-lg p-6 overflow-hidden text-left align-middle transition-all transform bg-[#1a1a1a] border border-white/10 rounded-2xl shadow-xl">

                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                            <h3 class="text-xl leading-6 font-bold text-white">Leave a Comment</h3>
                            <div class="mt-4">
                                <form action="{{ route('comments.store', $series->id) }}" method="POST">
                                    @csrf
                                    <textarea name="content" rows="5"
                                              class="w-full bg-black/50 text-white border border-white/10 rounded-lg p-4 focus:border-purple-500 focus:ring-0 transition resize-none"
                                              placeholder="Share your thoughts..." required></textarea>
                                    <div class="mt-6 flex justify-end gap-3">
                                        <button type="button" @click="commentModalOpen = false"
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

        <div x-show="reviewModalOpen" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto"
             aria-modal="true">
            <div class="flex items-center justify-center min-h-screen p-4 text-center">

                <div x-show="reviewModalOpen"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                     class="fixed inset-0 bg-black/80 transition-opacity"
                     @click="reviewModalOpen = false"></div>

                <div x-show="reviewModalOpen"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                     class="relative inline-block w-full max-w-lg p-6 overflow-hidden text-left align-middle transition-all transform bg-[#1a1a1a] border border-white/10 rounded-2xl shadow-xl">

                    <h3 class="text-xl font-bold text-white mb-4">Update Your List</h3>

                    <form action="{{ route('reviews.store', $series->id) }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 gap-6">

                            <div>
                                <label class="block text-sm font-bold text-gray-400 mb-2">Status</label>
                                <select name="status"
                                        class="w-full bg-black/50 text-white border border-white/10 rounded-lg p-3 focus:border-purple-500 focus:ring-0">
                                    @foreach(['Watching', 'Completed', 'Plan to Watch'] as $status)
                                        <option value="{{ $status }}" {{ (isset($userReview) && $userReview->status == $status) ? 'selected' : '' }}>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-bold text-gray-400 mb-2">
                                        Watched @if($series->episodes)
                                            <span class="text-xs font-normal text-gray-500">/ {{ $series->episodes }}</span>
                                        @endif
                                    </label>
                                    <input type="number" name="progress" min="0" max="{{ $series->episodes ?? 9999 }}"
                                           value="{{ $userReview->progress ?? 0 }}"
                                           class="w-full bg-black/50 text-white border border-white/10 rounded-lg p-3 focus:border-purple-500 focus:ring-0">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-400 mb-2">Score (1-10)</label>
                                    <select name="rating"
                                            class="w-full bg-black/50 text-white border border-white/10 rounded-lg p-3 focus:border-purple-500 focus:ring-0">
                                        <option value="">Select...</option>
                                        @for($i = 10; $i >= 1; $i--)
                                            <option value="{{ $i }}" {{ (isset($userReview) && $userReview->rating == $i) ? 'selected' : '' }}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end gap-3">
                            <button type="button" @click="reviewModalOpen = false"
                                    class="px-4 py-2 text-gray-300 hover:text-white">Cancel
                            </button>
                            <button type="submit"
                                    class="px-6 py-2 font-bold text-white bg-accent rounded-lg hover:bg-[#7a25c9]">Save
                                Entry
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-site-layout>