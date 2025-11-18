<x-site-layout title="Explore the Catalog">

    <div class="max-w-7xl mx-auto px-6 pt-28 pb-16">
        <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-8">Master Catalog</h1>
        <p class="text-gray-400 mb-12 max-w-2xl">Browse thousands of series, filter by type, and search for your next
            favorite archive entry.</p>

        <div class="flex flex-col md:flex-row gap-4 mb-8 bg-[#0F0F0F] p-4 rounded-xl border border-white/5">
            <input
                    type="text"
                    placeholder="Search series by title..."
                    class="flex-1 p-3 rounded-lg bg-black/50 text-white border border-transparent focus:border-accent focus:ring-0 transition"
            >

            <select class="p-3 rounded-lg bg-black/50 text-white border border-transparent focus:border-accent focus:ring-0 transition w-full md:w-52">
                <option value="all">Filter by Genre</option>
                @foreach($genres as $genre)
                    <option value="{{ strtolower($genre->name) }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex border-b border-white/10 mb-8">
            <button
                    class="tab-button px-6 py-3 text-lg font-bold transition duration-300 border-b-2 border-accent text-accent"
                    data-type="Anime"
            >
                Anime
            </button>
            <button
                    class="tab-button px-6 py-3 text-lg font-bold text-gray-400 hover:text-white transition duration-300 border-b-2 border-transparent hover:border-white/20"
                    data-type="Manga"
            >
                Manga
            </button>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-7 gap-6">
            @foreach($series as $show)
                @php
                    $genreTags = $show->genres->pluck('name')->take(3)->implode(', ');
                    $fakeRating = number_format(fake()->randomFloat(1, 7.0, 9.8), 1);
                @endphp

                <a href="/series/{{$show->id}}"
                   class="group relative rounded-xl overflow-hidden cursor-pointer bg-[#111] transition hover:-translate-y-1 duration-300"
                   data-type="{{ $show->type }}">

                    <div class="aspect-[2/3] w-full relative">
                        <img src="{{ $show->imageUrl }}" alt="{{ $show->name }}"
                             class="w-full h-full object-cover opacity-90 group-hover:opacity-100 transition-opacity">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>

                        <div class="absolute top-2 right-2 bg-black/60 backdrop-blur-md border border-white/10 text-white text-xs font-bold px-2 py-1 rounded-md flex items-center gap-1">
                            <svg class="w-3 h-3 text-accent" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            {{ $fakeRating }}
                        </div>
                    </div>

                    <div class="absolute bottom-0 left-0 w-full p-3 pt-6">
                        <h3 class="text-sm font-bold text-white leading-tight truncate">{{ $show->name }}</h3>
                        <p class="text-xs text-gray-400 mt-1 truncate">{{ $genreTags }}</p>
                    </div>
                </a>
            @endforeach
        </div>

    </div>
</x-site-layout>