<x-admin-layout>
    <x-slot name="header">Manage Genres</x-slot>

    <div class="bg-[#1a1a1a] overflow-hidden shadow-xl rounded-2xl border border-white/5">
        <div class="p-6">

            {{-- Header Section --}}
            <div class="flex justify-between items-center mb-8">
                <h3 class="text-xl font-bold text-white tracking-tight">All Genres</h3>
                <a href="{{ route('admin.genres.create') }}"
                   class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2.5 px-5 rounded-lg transition shadow-lg shadow-purple-500/20 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add New Genre
                </a>
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
                                        {{ $genre->series()->count() }} Series
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
    </div>
</x-admin-layout>