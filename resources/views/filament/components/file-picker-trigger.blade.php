@php
    $modalId = 'file-picker-modal-'.str_replace('.', '-', $statePath);
@endphp

<span x-data>
    <button
        type="button"
        x-on:click="$dispatch('open-modal', { id: @js($modalId) })"
        class="inline-flex items-center gap-1 text-xs font-medium text-primary-600 hover:underline dark:text-primary-400"
    >
        <x-filament::icon icon="heroicon-o-cloud-arrow-down" class="h-3.5 w-3.5" />
        Browse Drive / Cloudflare
    </button>

    <div
        x-on:file-picked.window="
            if ($event.detail.statePath === @js($statePath)) {
                $wire.$set($event.detail.statePath, { ['picked-' + Date.now()]: $event.detail.path });
                $dispatch('close-modal', { id: @js($modalId) });
            }
        "
    ></div>
</span>

<x-filament::modal :id="$modalId" width="5xl" :close-by-clicking-away="true">
    <x-slot name="heading">
        Select a file
    </x-slot>

    <livewire:file-picker :state-path="$statePath" :key="$modalId" />
</x-filament::modal>
