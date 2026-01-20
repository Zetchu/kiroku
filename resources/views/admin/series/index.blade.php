<x-admin-layout>
    <x-slot name="header">Manage Series</x-slot>

    <div class="bg-[#1a1a1a] overflow-hidden shadow-xl rounded-2xl border border-white/5">
        <div class="p-6">

            <div class="flex w-full md:w-auto gap-4">
                <form method="GET" action="{{ route('admin.series.index') }}" class="flex-1  md:w-64">
                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}"
                               placeholder="Search series..."
                               class="w-full bg-black/30 border border-white/10 text-white rounded-lg pl-10 pr-4 py-2 focus:border-purple-500 focus:ring-0">
                        <svg class="w-5 h-5 text-gray-500 absolute left-3 top-2.5" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </form>

                <livewire:series-importer/>

                <a href="{{ route('admin.series.create') }}"
                   class="inline-flex items-center gap-2 bg-purple-600 hover:bg-purple-700 text-white font-bold py-2.5 px-6 rounded-2xl border border-purple-500/30 shadow-lg shadow-purple-500/30 transition-all duration-200 hover:-translate-y-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add New Series
                </a>
            </div>
        </div>

        <div class="overflow-x-auto rounded-xl border border-white/5">
            <table class="min-w-full divide-y divide-white/10">
                <thead class="bg-[#252525]">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">
                        Title & Status
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">
                        Type
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">
                        Studio
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">
                        Genres
                    </th>
                    <th class="px-6 py-4 text-right text-xs font-bold text-gray-400 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody class="bg-[#1a1a1a] divide-y divide-white/5">
                @foreach($series as $show)
                    <tr class="hover:bg-white/5 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-12 w-12">
                                    <img class="h-12 w-12 rounded-lg object-cover border border-white/10"
                                         src="{{ $show->getImageUrl('preview') }}"
                                         alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-bold text-white">{{ $show->name }}</div>
                                    <div class="text-xs text-gray-500 mt-0.5">{{ $show->status }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full border {{ $show->type === 'Anime' ? 'bg-purple-500/10 text-purple-400 border-purple-500/20' : 'bg-blue-500/10 text-blue-400 border-blue-500/20' }}">
                                        {{ $show->type }}
                                    </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                            {{ $show->studio ?? '-' }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">
                            {{ $show->genres->pluck('name')->implode(', ') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('admin.series.edit', $show->id) }}"
                               class="text-gray-400 hover:text-white mr-4 transition">Edit</a>

                            <form action="{{ route('admin.series.destroy', $show->id) }}" method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete {{ $show->name }}?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-400 transition">Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination with Dark Mode Support --}}
        <div class="mt-6">
            {{ $series->links() }}
        </div>
    </div>
    </div>
</x-admin-layout>