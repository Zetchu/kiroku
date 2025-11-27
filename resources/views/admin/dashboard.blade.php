<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-white tracking-tight">Dashboard Overview</h2>
    </x-slot>

    {{-- Quick Actions or Welcome Message --}}
    <div class="bg-[#1a1a1a] rounded-2xl border border-white/5 p-8 mb-8 text-center">
        <h3 class="text-xl font-bold text-white mb-2">Welcome back, Admin!</h3>
        <p class="text-gray-400 max-w-2xl mx-auto">
            You have full control over the Kiroku master catalog. Use the cards above to manage content or add new
            series.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">

        {{-- Card 1: Series --}}
        <div class="bg-[#1a1a1a] rounded-2xl border border-white/5 shadow-xl overflow-hidden group">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-purple-500/10 rounded-xl p-3 group-hover:bg-purple-500/20 transition-colors">
                        <svg class="h-8 w-8 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M7 4v16M17 4v16M3 8h4M17 8h4M3 12h18M3 16h4M17 16h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-400 truncate uppercase tracking-wider">Total
                                Series
                            </dt>
                            <dd class="text-3xl font-bold text-white mt-1">
                                {{ \App\Models\Series::count() }}
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="bg-[#252525] px-6 py-3 border-t border-white/5">
                <a href="{{ route('admin.series.index') }}"
                   class="flex items-center text-sm font-medium text-purple-400 hover:text-purple-300 transition">
                    Manage Series
                    <svg class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
        {{-- Card 4: Genres --}}
        <div class="bg-[#1a1a1a] rounded-2xl border border-white/5 shadow-xl overflow-hidden group">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-orange-500/10 rounded-xl p-3 group-hover:bg-orange-500/20 transition-colors">
                        <svg class="h-8 w-8 text-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-400 truncate uppercase tracking-wider">Total
                                Genres
                            </dt>
                            <dd class="text-3xl font-bold text-white mt-1">
                                {{ \App\Models\Genre::count() }}
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="bg-[#252525] px-6 py-3 border-t border-white/5">
                <a href="{{ route('admin.genres.index') }}"
                   class="flex items-center text-sm font-medium text-orange-400 hover:text-orange-300 transition">
                    Manage Genres
                    <svg class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>


        {{-- Card 2: Users --}}
        <div class="bg-[#1a1a1a] rounded-2xl border border-white/5 shadow-xl overflow-hidden">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-blue-500/10 rounded-xl p-3">
                        <svg class="h-8 w-8 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-400 truncate uppercase tracking-wider">Total
                                Users
                            </dt>
                            <dd class="text-3xl font-bold text-white mt-1">
                                {{ \App\Models\User::count() }}
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card 3: Comments --}}
        <div class="bg-[#1a1a1a] rounded-2xl border border-white/5 shadow-xl overflow-hidden">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-500/10 rounded-xl p-3">
                        <svg class="h-8 w-8 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-400 truncate uppercase tracking-wider">Comments
                            </dt>
                            <dd class="text-3xl font-bold text-white mt-1">
                                {{ \App\Models\Comments::count() }}
                            </dd>
                        </dl>
                    </div>
                </div>

            </div>
            <div class="bg-[#252525] px-6 py-3 border-t border-white/5">
                <a href="{{ route('admin.comments.index') }}"
                   class="flex items-center text-sm font-medium text-green-400 hover:text-green-300 transition">
                    Manage Comments
                    <svg class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>


    </div>


</x-admin-layout>