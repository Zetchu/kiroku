<x-admin-layout>
    <x-slot name="header">Comment Moderation</x-slot>

    <div class="bg-[#1a1a1a] overflow-hidden shadow-xl rounded-2xl border border-white/5">
        <div class="p-6">
            <h3 class="text-xl font-bold text-white mb-6">Recent Comments</h3>
            <form method="GET" action="{{ route('admin.comments.index') }}" class="w-full md:w-72 mb-4">
                <div class="relative">
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Search content, user, or series..."
                           class="w-full bg-[#0a0a0a] border border-white/10 text-white rounded-lg pl-10 pr-4 py-2.5 focus:border-purple-500 focus:ring-1 focus:ring-purple-500 focus:outline-none transition duration-200 placeholder-gray-600">

                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>
            </form>


            <div class="overflow-x-auto rounded-xl border border-white/5">
                <table class="min-w-full divide-y divide-white/10">
                    <thead class="bg-[#252525]">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">User
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">
                            Comment
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">
                            Series
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Date
                        </th>
                        <th class="px-6 py-4 text-right text-xs font-bold text-gray-400 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-[#1a1a1a] divide-y divide-white/5">
                    @foreach($comments as $comment)
                        <tr class="hover:bg-white/5 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-white">
                                {{ $comment->user->name ?? 'Unknown / Deleted User' }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-300 max-w-md truncate">
                                {{ $comment->content }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-purple-400">
                                @if($comment->series)
                                    <a href="{{ route('series.show', $comment->series_id) }}" target="_blank"
                                       class="hover:underline">
                                        {{ $comment->series->name }}
                                    </a>
                                @else
                                    <span class="text-red-400 italic text-xs">
                        Series Deleted
                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs text-gray-500">
                                {{ $comment->created_at->diffForHumans() }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST"
                                      class="inline-block" onsubmit="return confirm('Are you sure?');">
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

            <div class="mt-6">
                {{ $comments->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>