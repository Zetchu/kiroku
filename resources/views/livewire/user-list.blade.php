<div class="pt-28 pb-16 max-w-7xl mx-auto px-6">

    {{-- Stats Header (Powered by Computed Property) --}}
    <div class="grid grid-cols-3 gap-4 text-center mb-12">
        <div class="bg-[#1a1a1a] p-6 rounded-xl border border-white/5 flex flex-col items-center justify-center gap-2 shadow-lg">
            <h2 class="text-4xl font-extrabold text-white">{{ $stats['total_series'] }}</h2>
            <p class="text-gray-400 text-xs uppercase tracking-wider font-bold">Total Entries</p>
        </div>
        <div class="bg-[#1a1a1a] p-6 rounded-xl border border-white/5 flex flex-col items-center justify-center gap-2 shadow-lg">
            <h2 class="text-4xl font-extrabold text-white">{{ $stats['episodes_watched'] }}</h2>
            <p class="text-gray-400 text-xs uppercase tracking-wider font-bold">Episodes Watched</p>
        </div>
        <div class="bg-[#1a1a1a] p-6 rounded-xl border border-white/5 flex flex-col items-center justify-center gap-2 shadow-lg">
            <h2 class="text-4xl font-extrabold text-white">{{ $stats['chapters_read'] }}</h2>
            <p class="text-gray-400 text-xs uppercase tracking-wider font-bold">Chapters Read</p>
        </div>
    </div>

    {{-- Controls --}}
    <div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-10 border-b border-white/10 pb-6">

        {{-- Type Toggle --}}
        <div class="flex space-x-6">
            @foreach(['Anime', 'Manga'] as $t)
                <button wire:click="$set('type', '{{ $t }}')"
                        class="text-2xl font-bold transition duration-200 border-b-2 pb-1 {{ $type === $t ? 'text-white border-accent' : 'text-gray-500 border-transparent hover:text-gray-300' }}">
                    {{ $t }}
                </button>
            @endforeach
        </div>

        {{-- Search & Status --}}
        <div class="flex flex-col sm:flex-row gap-4">
            <input wire:model.live.debounce.300ms="search"
                   type="text"
                   placeholder="Search your list..."
                   class="bg-[#1a1a1a] text-white border border-white/10 rounded-lg px-4 py-2 focus:border-purple-500 focus:ring-0 transition w-full sm:w-64">

            <div class="bg-[#1a1a1a] p-1 rounded-lg flex space-x-1">
                @foreach(['All', 'Watching', 'Completed', 'Plan to Watch'] as $s)
                    <button wire:click="$set('status', '{{ $s }}')"
                            class="px-4 py-1.5 text-sm font-medium rounded-md transition duration-200 {{ $status === $s ? 'bg-white/10 text-white shadow-sm' : 'text-gray-400 hover:text-white' }}">
                        {{ $s }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Table --}}
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
                <tr wire:key="review-{{ $review->id }}"
                    class="border-b border-white/5 hover:bg-white/5 transition group">
                    <td class="py-4 pl-4">
                        @if($review->series)
                            <a href="{{ route('series.show', $review->series->id) }}"
                               class="flex items-center gap-4 group-hover:text-accent transition">
                                <img src="{{ $review->series->getImageUrl('preview') }}"
                                     class="w-12 h-16 object-cover rounded-md shadow-sm">
                                <span class="font-bold text-base">{{ $review->series->name }}</span>
                            </a>
                        @else
                            <div class="flex items-center gap-4 opacity-50">
                                <div class="w-12 h-16 bg-gray-800 rounded-md"></div>
                                <span class="text-gray-500 italic">Deleted Series</span>
                            </div>
                        @endif
                    </td>
                    <td class="py-4 text-center font-bold text-lg">
                        {{ $review->rating ?? '-' }}
                    </td>
                    <td class="py-4 px-4">
                        <div class="flex items-center justify-between text-xs text-gray-400 mb-1">
                            <span>{{ $review->progress }} / {{ $review->series?->episodes ?? '?' }}</span>
                            <span>
                                    @if($review->series && $review->series->episodes > 0)
                                    {{ round(($review->progress / $review->series->episodes) * 100) }}%
                                @else
                                    0%
                                @endif
                                </span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2 overflow-hidden">
                            <div class="bg-accent h-2 rounded-full"
                                 style="width: {{ ($review->series && $review->series->episodes > 0) ? min(($review->progress / $review->series->episodes) * 100, 100) : 0 }}%">
                            </div>
                        </div>
                    </td>
                    <td class="py-4 pr-4 text-right">
                            <span class="px-3 py-1 rounded-full text-xs font-bold border border-white/10 bg-white/5 text-gray-300">
                                {{ $review->series?->type ?? 'N/A' }}
                            </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="py-12 text-center text-gray-500">
                        No reviews found matching your filters.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>