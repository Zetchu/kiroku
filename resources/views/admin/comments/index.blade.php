<x-admin-layout>
    <x-slot name="header">Comment Moderation</x-slot>

    <div class="bg-[#1a1a1a] overflow-hidden shadow-xl rounded-2xl border border-white/5">
        <div class="p-6">
            <h3 class="text-xl font-bold text-white mb-6">Recent Comments</h3>

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
                                {{ $comment->user->name }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-300 max-w-md truncate">
                                {{ $comment->content }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-purple-400">
                                <a href="{{ route('series.show', $comment->series_id) }}" target="_blank"
                                   class="hover:underline">
                                    {{ $comment->series->name }}
                                </a>
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