@if ($totalPages > 1)
    <div class="flex items-center justify-between">
        <x-filament::button
            size="sm"
            color="gray"
            :disabled="$page <= 1"
            wire:click="{{ $previousAction }}"
        >
            Previous
        </x-filament::button>

        <span class="text-sm text-gray-500 dark:text-gray-400">
            Page {{ $page }} of {{ $totalPages }}
        </span>

        <x-filament::button
            size="sm"
            color="gray"
            :disabled="$page >= $totalPages"
            wire:click="{{ $nextAction }}"
        >
            Next
        </x-filament::button>
    </div>
@endif
