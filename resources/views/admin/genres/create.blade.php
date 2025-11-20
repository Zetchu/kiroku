<x-admin-layout>
    <x-slot name="header">Add New Genre</x-slot>

    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">
        <form action="{{ route('admin.genres.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Genre Name
                </label>
                <input type="text" name="name" id="name" required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-purple-500"
                       placeholder="e.g. Cyberpunk">
                @error('name')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end">
                <a href="{{ route('admin.genres.index') }}" class="text-gray-500 hover:text-gray-700 mr-4">Cancel</a>
                <button type="submit"
                        class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Create Genre
                </button>
            </div>
        </form>
    </div>
</x-admin-layout><?php
