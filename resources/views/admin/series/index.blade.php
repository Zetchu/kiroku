<x-admin-layout>
    <x-slot name="header">Manage Series</x-slot>
    <div class="flex gap-2">
        <a href="{{ route('admin.series.export') }}" target="_blank"
           class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
            Export Data
        </a>

        <a href="{{ route('admin.series.create') }}"
           class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
            Create New
        </a>
    </div>

    <div class="bg-[#1a1a1a] overflow-hidden shadow-xl rounded-2xl border border-white/5">

        <div class="p-6 pb-0 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <livewire:series-importer/>

            <a href="{{ route('admin.series.create') }}"
               class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2.5 px-6 rounded-2xl border border-purple-500/30 shadow-lg shadow-purple-500/30 transition-all">
                Add New Series
            </a>
        </div>

        <livewire:series-list/>

    </div>
</x-admin-layout>