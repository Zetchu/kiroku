<x-admin-layout>
    <x-slot name="header">Edit Genre</x-slot>

    <div class="max-w-2xl mx-auto bg-[#1a1a1a] p-6 rounded-lg shadow">
        <form action="{{ route('admin.genres.update', $genre->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-white text-sm font-bold mb-2" for="name">
                    Genre Name
                </label>
                <input type="text" name="name" id="name" value="{{ old('name', $genre->name) }}" required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-300 leading-tight focus:outline-none focus:ring-2 focus:ring-purple-500">
                @error('name')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end">
                <a href="{{ route('admin.genres.index') }}" class="text-gray-500 hover:text-gray-700 mr-4">Cancel</a>
                <button type="submit"
                        class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Genre
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>