<x-admin-layout>
    <x-slot name="header">Edit Series: {{ $series->name }}</x-slot>

    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow">

        <form action="{{ route('admin.series.update', $series->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                {{-- Name --}}
                <div class="col-span-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                    <input type="text" name="name"
                           value="{{ old('name', $series->name) }}"
                           required
                           class="w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50">
                </div>

                {{-- Type --}}
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Type</label>
                    <select name="type" class="w-full border-gray-300 rounded-md shadow-sm">
                        <option value="Anime" {{ old('type', $series->type) == 'Anime' ? 'selected' : '' }}>Anime
                        </option>
                        <option value="Manga" {{ old('type', $series->type) == 'Manga' ? 'selected' : '' }}>Manga
                        </option>
                    </select>
                </div>

                {{-- Status (Global) --}}
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Global Status</label>
                    <select name="status" class="w-full border-gray-300 rounded-md shadow-sm">
                        <option value="Airing" {{ old('status', $series->status) == 'Airing' ? 'selected' : '' }}>
                            Airing
                        </option>
                        <option value="Finished" {{ old('status', $series->status) == 'Finished' ? 'selected' : '' }}>
                            Finished
                        </option>
                        <option value="Not yet aired" {{ old('status', $series->status) == 'Not yet aired' ? 'selected' : '' }}>
                            Not yet aired
                        </option>
                        <option value="Cancelled" {{ old('status', $series->status) == 'Cancelled' ? 'selected' : '' }}>
                            Cancelled
                        </option>
                    </select>
                </div>

                {{-- Studio --}}
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Studio</label>
                    <input type="text" name="studio"
                           value="{{ old('studio', $series->studio) }}"
                           class="w-full border-gray-300 rounded-md shadow-sm">
                </div>

                {{-- Episodes --}}
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Episodes</label>
                    <input type="number" name="episodes"
                           value="{{ old('episodes', $series->episodes) }}"
                           class="w-full border-gray-300 rounded-md shadow-sm">
                </div>

                {{-- Image URL --}}
                <div class="col-span-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Cover Image URL</label>
                    <input type="url" name="imageUrl"
                           value="{{ old('imageUrl', $series->imageUrl) }}"
                           placeholder="https://..." required
                           class="w-full border-gray-300 rounded-md shadow-sm">

                    {{-- Visual Preview of current image --}}
                    <div class="mt-2">
                        <p class="text-xs text-gray-500 mb-1">Current Cover:</p>
                        <img src="{{ $series->imageUrl }}" alt="Current Cover"
                             class="h-20 w-auto rounded shadow-sm border">
                    </div>
                </div>

                {{-- Synopsis --}}
                <div class="col-span-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Synopsis</label>
                    <textarea name="synopsis" rows="4"
                              class="w-full border-gray-300 rounded-md shadow-sm">{{ old('synopsis', $series->synopsis) }}</textarea>
                </div>
            </div>

            {{-- Genres Checkboxes --}}
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Genres</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-2 bg-gray-50 p-4 rounded border">
                    @foreach($genres as $genre)
                        <label class="inline-flex items-center">
                            <input type="checkbox"
                                   name="genres[]"
                                   value="{{ $genre->id }}"
                                   {{-- Check if the series already has this genre --}}
                                   @checked($series->genres->contains($genre->id))
                                   class="rounded border-gray-300 text-purple-600 shadow-sm focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50">
                            <span class="ml-2 text-gray-700">{{ $genre->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-between items-center">
                {{-- Cancel Button --}}
                <a href="{{ route('admin.series.index') }}" class="text-gray-500 hover:text-gray-700 font-medium">
                    Cancel
                </a>

                {{-- Save Button --}}
                <button type="submit"
                        class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-6 rounded transition">
                    Update Series
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
