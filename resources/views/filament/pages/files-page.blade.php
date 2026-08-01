<x-filament-panels::page>
    <div class="mb-6 border-b border-gray-200 dark:border-white/10">
        <nav class="-mb-px flex gap-6">
            <button
                type="button"
                wire:click="setActiveTab('drive')"
                @class([
                    'border-b-2 px-1 py-3 text-sm font-medium transition',
                    'border-primary-600 text-primary-600 dark:border-primary-400 dark:text-primary-400' => $activeTab === 'drive',
                    'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200' => $activeTab !== 'drive',
                ])
            >
                Google Drive
            </button>

            <button
                type="button"
                wire:click="setActiveTab('r2')"
                @class([
                    'border-b-2 px-1 py-3 text-sm font-medium transition',
                    'border-primary-600 text-primary-600 dark:border-primary-400 dark:text-primary-400' => $activeTab === 'r2',
                    'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200' => $activeTab !== 'r2',
                ])
            >
                Cloudflare
            </button>
        </nav>
    </div>

    @if ($activeTab === 'drive')
        <livewire:google-drive-browser wire:key="drive-browser" />
    @else
        <livewire:cloudflare-browser wire:key="r2-browser" />
    @endif
</x-filament-panels::page>
