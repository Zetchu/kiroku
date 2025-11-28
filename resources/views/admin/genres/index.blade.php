<x-admin-layout>
    <x-slot name="header">Manage Genres</x-slot>

    <div class="bg-[#1a1a1a] overflow-hidden shadow-xl rounded-2xl border border-white/5">
        <div class="p-6">

            <div class="flex w-full md:w-auto gap-4">
                <form method="GET" action="{{ route('admin.genres.index') }}" class="flex-1  md:w-64">
                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}"
                               placeholder="Search genres..."
                               class="w-full bg-black/30 border border-white/10 text-white rounded-lg pl-10 pr-4 py-2 focus:border-purple-500 focus:ring-0">
                        <svg class="w-5 h-5 text-gray-500 absolute left-3 top-2.5" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </form>

                <a href="{{ route('admin.genres.create') }}"
                   class="inline-flex items-center gap-2 bg-purple-600 hover:bg-purple-700 text-white font-bold py-2.5 px-6 rounded-2xl border border-purple-500/30 shadow-lg shadow-purple-500/30 transition-all duration-200 hover:-translate-y-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add New Genre
                </a>
            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto rounded-xl border border-white/5">
            <table class="min-w-full divide-y divide-white/10">
                <thead class="bg-[#252525]">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Name
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Series
                        Count
                    </th>
                    <th class="px-6 py-4 text-right text-xs font-bold text-gray-400 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody class="bg-[#1a1a1a] divide-y divide-white/5">
                @foreach($genres as $genre)
                    <tr class="hover:bg-white/5 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-white">
                            {{ $genre->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            {{-- Styled Badge for Count --}}
                            <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-500/10 text-purple-400 border border-purple-500/20">
                                       {{ $genre->series_count }} Series
                                    </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('admin.genres.edit', $genre->id) }}"
                               class="text-gray-400 hover:text-white mr-4 transition">Edit</a>

                            <form action="{{ route('admin.genres.destroy', $genre->id) }}" method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete {{ $genre->name }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-400 transition">Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-admin-layout>