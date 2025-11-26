<x-admin-layout>
    <x-slot name="header">Add New Series</x-slot>

    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow">
        <form action="{{ route('admin.series.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                {{-- Name --}}
                <div class="col-span-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                    <input type="text" name="name" required
                           class="w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50">
                </div>

                {{-- Type --}}
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Type</label>
                    <select name="type" class="w-full border-gray-300 rounded-md shadow-sm">
                        <option value="Anime">Anime</option>
                        <option value="Manga">Manga</option>
                    </select>
                </div>

                {{-- Status (Global) --}}
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Global Status</label>
                    <select name="status" class="w-full border-gray-300 rounded-md shadow-sm">
                        <option value="Airing">Airing</option>
                        <option value="Finished">Finished</option>
                        <option value="Not yet aired">Not yet aired</option>
                    </select>
                </div>

                {{-- Studio --}}
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Studio</label>
                    <input type="text" name="studio" class="w-full border-gray-300 rounded-md shadow-sm">
                </div>

                {{-- Episodes --}}
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Episodes</label>
                    <input type="number" name="episodes" class="w-full border-gray-300 rounded-md shadow-sm">
                </div>

                {{-- Image URL --}}
                <div class="col-span-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Cover Image (Upload)</label>
                    <input type="file" name="photo" required class="w-full border border-gray-300 rounded-md p-2">
                    @error('photo') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Synopsis --}}
                <div class="col-span-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Synopsis</label>
                    <textarea name="synopsis" rows="4" class="w-full border-gray-300 rounded-md shadow-sm"></textarea>
                </div>
            </div>

            {{-- Genres Checkboxes --}}
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Genres</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-2 bg-gray-50 p-4 rounded border">
                    @foreach($genres as $genre)
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="genres[]" value="{{ $genre->id }}"
                                   class="rounded border-gray-300 text-purple-600 shadow-sm focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50">
                            <span class="ml-2 text-gray-700">{{ $genre->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-6 rounded transition">
                    Save Series
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
