<div>
    <button wire:click="openModal"
            class="bg-[#2a2a2a] hover:bg-[#333] text-gray-200 border border-white/10 px-4 py-2.5 rounded-lg flex items-center gap-2 transition-all shadow-sm">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
        </svg>
        <span>Fetch from API</span>
    </button>

    <div x-data="{ show: @entangle('showModal') }"
         x-show="show"
         x-cloak
         class="fixed inset-0 z-50 overflow-y-auto"
         aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <div x-show="show" class="fixed inset-0 bg-black/80 transition-opacity"></div>

        <div class="flex min-h-full items-center justify-center p-4 text-center">
            <div x-show="show"
                 class="relative transform overflow-hidden rounded-2xl bg-[#1a1a1a] border border-white/10 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-4xl">

                @if($step === 1)
                    <div class="px-6 py-6">
                        <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                        <span class="bg-blue-500/10 text-blue-500 p-1.5 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </span>
                            Fetch Parameters
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-400 mb-2">Type</label>
                                <select wire:model="type"
                                        class="w-full bg-[#0f0f0f] border border-white/10 rounded-lg text-white px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <option value="anime">Anime</option>
                                    <option value="manga">Manga</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-400 mb-2">Page Number</label>
                                <input wire:model="page" type="number" min="1"
                                       class="w-full bg-[#0f0f0f] border border-white/10 rounded-lg text-white px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                        </div>

                        @if($statusMessage)
                            <div class="mt-4 p-3 rounded-lg bg-red-500/10 text-red-400 text-sm border border-red-500/20">
                                {{ $statusMessage }}
                            </div>
                        @endif

                        <div class="mt-8 flex justify-end gap-3">
                            <button wire:click="$set('showModal', false)"
                                    class="px-4 py-2 text-gray-400 hover:text-white transition">Cancel
                            </button>

                            <button wire:click="fetch" wire:loading.attr="disabled"
                                    class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2 px-6 rounded-lg transition flex items-center gap-2">
                                <span wire:loading.remove wire:target="fetch">Fetch Data</span>
                                <span wire:loading wire:target="fetch" class="flex items-center gap-2">
                                <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10"
                                                                 stroke="currentColor" stroke-width="4"></circle><path
                                            class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                Fetching...
                            </span>
                            </button>
                        </div>
                    </div>
                @endif

                @if($step === 2)
                    <div class="px-6 py-6">
                        <h3 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                        <span class="bg-green-500/10 text-green-500 p-1.5 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </span>
                            Preview Import ({{ count($fetchedData) }} items)
                        </h3>

                        <div class="bg-[#0f0f0f] rounded-lg border border-white/5 h-80 overflow-y-auto mb-6">
                            <table class="w-full text-left text-sm text-gray-300">
                                <thead class="bg-black sticky top-0">
                                <tr>
                                    <th class="p-3">Cover</th>
                                    <th class="p-3">Title</th>
                                    <th class="p-3">Episodes</th>
                                    <th class="p-3">Studio</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-white/5">
                                @foreach($fetchedData as $item)
                                    <tr>
                                        <td class="p-3"><img src="{{ $item['imageUrl'] }}"
                                                             class="w-8 h-12 object-cover rounded"></td>
                                        <td class="p-3 font-medium text-white">{{ $item['name'] }}</td>
                                        <td class="p-3">{{ $item['episodes'] }}</td>
                                        <td class="p-3 text-gray-500">{{ $item['studio'] }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="flex justify-between items-center">
                            <button wire:click="backToInput"
                                    class="text-sm text-gray-400 hover:text-white flex items-center gap-1">
                                &larr; Back to Parameters
                            </button>

                            <div class="flex gap-3">
                                <button wire:click="$set('showModal', false)"
                                        class="px-4 py-2 text-gray-400 hover:text-white transition">Cancel
                                </button>

                                <button wire:click="importToDatabase" wire:loading.attr="disabled"
                                        class="bg-purple-600 hover:bg-purple-500 text-white font-bold py-2 px-6 rounded-lg transition flex items-center gap-2">
                                    <span wire:loading.remove wire:target="importToDatabase">Confirm Import</span>
                                    <span wire:loading wire:target="importToDatabase" class="flex items-center gap-2">
                                    <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10"
                                                                     stroke="currentColor" stroke-width="4"></circle><path
                                                class="opacity-75" fill="currentColor"
                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                    Importing...
                                </span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>