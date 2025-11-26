<x-admin-layout>
    <x-slot name="header">Add New Series</x-slot>

    <div class="max-w-4xl mx-auto bg-[#1a1a1a] p-8 rounded-2xl shadow-2xl border border-white/5">

        <form action="{{ route('admin.series.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">

                {{-- Title --}}
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-400 mb-2">Series Title</label>
                    <input type="text" name="name" required
                           placeholder="e.g. Attack on Titan"
                           class="w-full bg-[#0a0a0a] border border-white/10 rounded-lg px-4 py-3 text-white placeholder-gray-600 focus:border-purple-500 focus:ring-1 focus:ring-purple-500 focus:outline-none transition duration-200">
                </div>

                {{-- Type --}}
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Type</label>
                    <div class="relative">
                        <select name="type"
                                class="w-full bg-[#0a0a0a] border border-white/10 rounded-lg px-4 py-3 text-white appearance-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 focus:outline-none transition duration-200">
                            <option value="Anime">Anime</option>
                            <option value="Manga">Manga</option>
                        </select>
                        {{-- Custom Arrow Icon --}}
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Status --}}
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Global Status</label>
                    <div class="relative">
                        <select name="status"
                                class="w-full bg-[#0a0a0a] border border-white/10 rounded-lg px-4 py-3 text-white appearance-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 focus:outline-none transition duration-200">
                            <option value="Airing">Airing</option>
                            <option value="Finished">Finished</option>
                            <option value="Not yet aired">Not yet aired</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Studio --}}
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Studio</label>
                    <input type="text" name="studio"
                           placeholder="e.g. MAPPA"
                           class="w-full bg-[#0a0a0a] border border-white/10 rounded-lg px-4 py-3 text-white placeholder-gray-600 focus:border-purple-500 focus:ring-1 focus:ring-purple-500 focus:outline-none transition duration-200">
                </div>

                {{-- Episodes --}}
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2">Total Episodes</label>
                    <input type="number" name="episodes"
                           placeholder="e.g. 24"
                           class="w-full bg-[#0a0a0a] border border-white/10 rounded-lg px-4 py-3 text-white placeholder-gray-600 focus:border-purple-500 focus:ring-1 focus:ring-purple-500 focus:outline-none transition duration-200">
                </div>

                {{-- File Upload (Styled) --}}
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-400 mb-2">Cover Image</label>
                    <input type="file" name="photo" required
                           class="block w-full text-sm text-gray-400
                                  file:mr-4 file:py-2.5 file:px-4
                                  file:rounded-lg file:border-0
                                  file:text-sm file:font-bold
                                  file:bg-purple-600 file:text-white
                                  hover:file:bg-purple-700
                                  file:cursor-pointer cursor-pointer
                                  bg-[#0a0a0a] border border-white/10 rounded-lg
                                  focus:outline-none
                           "/>
                    <p class="mt-1 text-xs text-gray-500">JPG, PNG or WebP (Max 4MB)</p>
                    @error('photo') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Synopsis --}}
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-400 mb-2">Synopsis</label>
                    <textarea name="synopsis" rows="5"
                              placeholder="Write a brief description..."
                              class="w-full bg-[#0a0a0a] border border-white/10 rounded-lg px-4 py-3 text-white placeholder-gray-600 focus:border-purple-500 focus:ring-1 focus:ring-purple-500 focus:outline-none transition duration-200 resize-none"></textarea>
                </div>
            </div>

            {{-- Genres Checkboxes --}}
            <div class="mb-8">
                <label class="block text-sm font-medium text-gray-400 mb-3">Select Genres</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 bg-[#0a0a0a] p-5 rounded-xl border border-white/10 max-h-60 overflow-y-auto custom-scrollbar">
                    @foreach($genres as $genre)
                        <label class="inline-flex items-center group cursor-pointer">
                            <div class="relative flex items-center">
                                <input type="checkbox" name="genres[]" value="{{ $genre->id }}"
                                       class="peer h-5 w-5 cursor-pointer appearance-none rounded-md border border-white/20 bg-[#1a1a1a] transition-all checked:border-purple-500 checked:bg-purple-600 hover:border-purple-400">
                                <svg class="pointer-events-none absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 opacity-0 peer-checked:opacity-100 transition-opacity"
                                     width="12" height="12" viewBox="0 0 12 12" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 3L4.5 8.5L2 6" stroke="white" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <span class="ml-3 text-gray-400 group-hover:text-white transition-colors text-sm">{{ $genre->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-end pt-6 border-t border-white/10">
                <button type="submit"
                        class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-8 rounded-lg shadow-lg shadow-purple-500/20 transition transform hover:-translate-y-0.5">
                    Save Series
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>