<x-admin-layout>
    <x-slot name="header">Manage Series</x-slot>

    <div class="bg-[#1a1a1a] overflow-hidden shadow-xl rounded-2xl border border-white/5">

        <div class="p-6 pb-0 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">

            <livewire:series-importer/>

            <div class="flex gap-3">
                <a href="{{ route('admin.series.create') }}"
                   class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2.5 px-6 rounded-lg border border-purple-500/30 shadow-lg shadow-purple-500/30 transition-all flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add New
                </a>
                
                <a href="{{ route('admin.series.export') }}" target="_blank"
                   class="px-4 py-2.5 bg-gray-700 hover:bg-gray-600 text-white font-medium rounded-lg transition border border-white/10 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Export Data
                </a>

            </div>

        </div>

        <livewire:series-list/>

    </div>
</x-admin-layout>