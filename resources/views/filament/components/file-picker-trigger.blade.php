@php
    $modalId = 'file-picker-modal-'.str_replace('.', '-', $statePath);
    $mode ??= 'fileUpload';
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

    @if ($mode === 'richEditor')
        <div
            x-on:file-picked.window="
                if ($event.detail.statePath === @js($statePath)) {
                    const current = $wire.$get($event.detail.statePath) ?? '';
                    $wire.$set($event.detail.statePath, current + '<img data-id=\'' + $event.detail.path + '\'>');
                    $dispatch('close-modal', { id: @js($modalId) });
                }
            "
        ></div>
    @else
        <div
            x-on:file-picked.window="
                if ($event.detail.statePath === @js($statePath)) {
                    $wire.$set($event.detail.statePath, { ['picked-' + Date.now()]: $event.detail.path });
                    $dispatch('close-modal', { id: @js($modalId) });
                }
            "
        ></div>
    @endif
</span>

<x-filament::modal :id="$modalId" width="5xl" :close-by-clicking-away="true">
    <x-slot name="heading">
        Select a file
    </x-slot>

    <livewire:file-picker :state-path="$statePath" :key="$modalId" />
</x-filament::modal>
