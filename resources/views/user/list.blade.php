<x-site-layout title="My List">

    <div x-data="{
            currentType: 'Anime',
            currentStatus: 'All',
            filterItem(type, status) {
                return (this.currentType === type) &&
                       (this.currentStatus === 'All' || this.currentStatus === status);
            }
         }"
         class="pt-28 pb-16 max-w-7xl mx-auto px-6">

        {{-- status header --}}
        <div class="grid grid-cols-3 gap-4 text-center mb-12">
            <div class="bg-[#1a1a1a] p-6 rounded-xl border border-white/5 flex flex-col items-center justify-center gap-2 shadow-lg">
                <div class="p-3 bg-purple-500/10 rounded-full text-purple-400 mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
                <h2 class="text-4xl font-extrabold text-white">{{ $stats['total_series'] }}</h2>
                <p class="text-gray-400 text-xs uppercase tracking-wider font-bold">Total Entries</p>
            </div>
            <div class="bg-[#1a1a1a] p-6 rounded-xl border border-white/5 flex flex-col items-center justify-center gap-2 shadow-lg">
                <div class="p-3 bg-blue-500/10 rounded-full text-blue-400 mb-1">
                    {{-- Play/TV Icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h2 class="text-4xl font-extrabold text-white">{{ $stats['episodes_watched'] }}</h2>
                <p class="text-gray-400 text-xs uppercase tracking-wider font-bold">Episodes Watched</p>
            </div>
            <div class="bg-[#1a1a1a] p-6 rounded-xl border border-white/5 flex flex-col items-center justify-center gap-2 shadow-lg">
                <div class="p-3 bg-green-500/10 rounded-full text-green-400 mb-1">
                    {{-- Book Icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.247m0-13C13.168 5.477 14.754 5 16.5 5s3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.247"/>
                    </svg>
                </div>
                <h2 class="text-4xl font-extrabold text-white">{{ $stats['chapters_read'] }}</h2>
                <p class="text-gray-400 text-xs uppercase tracking-wider font-bold">Chapters Read</p>
            </div>
        </div>

        {{-- controls --}}
        <div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-10 border-b border-white/10 pb-6">

            <div class="flex space-x-6">
                <button @click="currentType = 'Anime'"
                        class="text-2xl font-bold transition duration-200 border-b-2 pb-1"
                        :class="currentType === 'Anime' ? 'text-white border-accent' : 'text-gray-500 border-transparent hover:text-gray-300'">
                    Anime
                </button>
                <button @click="currentType = 'Manga'"
                        class="text-2xl font-bold transition duration-200 border-b-2 pb-1"
                        :class="currentType === 'Manga' ? 'text-white border-accent' : 'text-gray-500 border-transparent hover:text-gray-300'">
                    Manga
                </button>
            </div>

            <div class="bg-[#1a1a1a] p-1 rounded-lg flex space-x-1">
                @foreach(['All', 'Watching', 'Completed', 'Plan to Watch'] as $status)
                    <button @click="currentStatus = '{{ $status }}'"
                            class="px-4 py-1.5 text-sm font-medium rounded-md transition duration-200"
                            :class="currentStatus === '{{ $status }}' ? 'bg-white/10 text-white shadow-sm' : 'text-gray-400 hover:text-white'">
                        {{ $status }}
                    </button>
                @endforeach
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                <tr class="text-gray-500 text-xs uppercase tracking-wider border-b border-white/10">
                    <th class="pb-4 pl-4">Series Title</th>
                    <th class="pb-4 text-center">Score</th>
                    <th class="pb-4 w-1/3">Progress</th>
                    <th class="pb-4 text-right pr-4">Type</th>
                </tr>
                </thead>
                <tbody class="text-white text-sm">
                @forelse($reviews as $review)
                    <tr x-show="filterItem('{{ $review->series->type }}', '{{ $review->status }}')"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        class="border-b border-white/5 hover:bg-white/5 transition group">

                        <td class="py-4 pl-4">
                            <a href="{{ route('series.show', $review->series->id) }}"
                               class="flex items-center gap-4 group-hover:text-accent transition">
                                <img src="{{ $review->series->getImageUrl('preview') }}" alt=""
                                     class="w-12 h-16 object-cover rounded-md shadow-sm">
                                <span class="font-bold text-base">{{ $review->series->name }}</span>
                            </a>
                        </td>

                        <td class="py-4 text-center font-bold text-lg">
                            {{ $review->rating ? $review->rating : '-' }}
                        </td>

                        <td class="py-4 px-4">
                            <div class="flex items-center justify-between text-xs text-gray-400 mb-1">
                                <span>{{ $review->progress }} / {{ $review->series->episodes ?? '?' }}</span>
                                <span>{{ $review->series->episodes > 0 ? round(($review->progress / $review->series->episodes) * 100) : 0 }}%</span>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2 overflow-hidden">
                                <div class="bg-accent h-2 rounded-full"
                                     style="width: {{ $review->series->episodes > 0 ? min(($review->progress / $review->series->episodes) * 100, 100) : 0 }}%">
                                </div>
                            </div>
                        </td>

                        <td class="py-4 pr-4 text-right">
                                <span class="px-3 py-1 rounded-full text-xs font-bold border border-white/10 bg-white/5 text-gray-300">
                                    {{ $review->series->type }}
                                </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-12 text-center text-gray-500">
                            You haven't added any series yet.
                            <a href="{{ route('series.index') }}" class="text-accent hover:underline">Go explore!</a>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-site-layout>