<div>
    <nav class="mb-4 flex flex-wrap items-center gap-1 text-sm text-gray-500 dark:text-gray-400">
        @foreach ($breadcrumbs as $index => $crumb)
            @if (!$loop->last)
                <button
                    type="button"
                    wire:click="goToBreadcrumb({{ $index }})"
                    class="font-medium text-primary-600 hover:underline dark:text-primary-400"
                >
                    {{ $crumb['name'] }}
                </button>
                <x-filament::icon icon="heroicon-o-chevron-right" class="h-3 w-3" />
            @else
                <span class="font-medium text-gray-950 dark:text-white">{{ $crumb['name'] }}</span>
            @endif
        @endforeach
    </nav>

    <div class="mb-4 flex items-center gap-3">
        <div class="flex-1">
            <x-filament::input.wrapper prefix-icon="heroicon-o-magnifying-glass">
                <x-filament::input
                    type="search"
                    wire:model.live.debounce.400ms="search"
                    placeholder="Search files by name..."
                />
            </x-filament::input.wrapper>
        </div>

        <div class="flex shrink-0 gap-1 rounded-lg border border-gray-200 p-1 dark:border-white/10">
            <button
                type="button"
                wire:click="setViewMode('grid')"
                title="Grid view"
                @class([
                    'rounded-md p-1.5 transition',
                    'bg-primary-50 text-primary-600 dark:bg-primary-500/10 dark:text-primary-400' => $viewMode === 'grid',
                    'text-gray-400 hover:text-gray-600 dark:hover:text-gray-200' => $viewMode !== 'grid',
                ])
            >
                <x-filament::icon icon="heroicon-o-squares-2x2" class="h-4 w-4" />
            </button>

            <button
                type="button"
                wire:click="setViewMode('list')"
                title="List view"
                @class([
                    'rounded-md p-1.5 transition',
                    'bg-primary-50 text-primary-600 dark:bg-primary-500/10 dark:text-primary-400' => $viewMode === 'list',
                    'text-gray-400 hover:text-gray-600 dark:hover:text-gray-200' => $viewMode !== 'list',
                ])
            >
                <x-filament::icon icon="heroicon-o-bars-3" class="h-4 w-4" />
            </button>
        </div>
    </div>

    @if (! $error && ! empty($files))
        <div class="mb-4">
            @include('livewire.partials.pagination', [
                'page' => $page,
                'totalPages' => $this->totalPages(),
                'previousAction' => 'previousPage',
                'nextAction' => 'nextPage',
            ])
        </div>
    @endif

    @if ($error)
        <div class="rounded-lg bg-danger-50 p-4 text-sm text-danger-700 dark:bg-danger-500/10 dark:text-danger-400">
            {{ $error }}
        </div>
    @elseif (empty($files))
        <div class="rounded-lg bg-gray-50 p-6 text-center text-sm text-gray-500 dark:bg-white/5 dark:text-gray-400">
            No files found.
        </div>
    @elseif ($viewMode === 'grid')
        <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6">
            @foreach ($this->paginatedFiles() as $file)
                <div
                    wire:key="drive-grid-{{ $file['id'] }}"
                    class="group flex flex-col overflow-hidden rounded-xl border border-gray-200 bg-white transition hover:shadow-md dark:border-white/10 dark:bg-white/5"
                >
                    <button
                        type="button"
                        @if ($file['isFolder'])
                            wire:click="openFolder('{{ $file['id'] }}', '{{ addslashes($file['name']) }}')"
                        @else
                            wire:click="preview('{{ $file['id'] }}', '{{ addslashes($file['name']) }}', '{{ $file['mimeType'] }}', '{{ $file['size'] }}')"
                        @endif
                        class="flex aspect-square w-full items-center justify-center bg-gray-50 dark:bg-white/10"
                    >
                        @if (! $file['isFolder'] && str_starts_with($file['mimeType'], 'image/') && $file['thumbnailLink'])
                            <img
                                src="{{ $file['thumbnailLink'] }}"
                                alt="{{ $file['name'] }}"
                                loading="lazy"
                                referrerpolicy="no-referrer"
                                class="h-full w-full object-cover"
                                onerror="this.remove(); document.getElementById('drive-thumb-fallback-{{ $file['id'] }}')?.classList.remove('hidden')"
                            >
                            <span id="drive-thumb-fallback-{{ $file['id'] }}" class="hidden">
                                <x-filament::icon
                                    :icon="$this->fileIcon($file['mimeType'], false)"
                                    class="h-10 w-10 text-gray-400"
                                />
                            </span>
                        @else
                            <x-filament::icon
                                :icon="$this->fileIcon($file['mimeType'], $file['isFolder'])"
                                class="h-10 w-10 text-gray-400"
                            />
                        @endif
                    </button>

                    <div class="flex items-center justify-between gap-2 border-t border-gray-100 px-3 py-2 dark:border-white/10">
                        <span
                            class="truncate text-xs font-medium text-gray-950 dark:text-white"
                            title="{{ $file['name'] }}"
                        >
                            {{ $file['name'] }}
                        </span>

                        @if (! $file['isFolder'])
                            <button
                                type="button"
                                wire:click="download('{{ $file['id'] }}', '{{ addslashes($file['name']) }}')"
                                title="Download"
                                class="shrink-0 text-gray-400 hover:text-primary-600 dark:hover:text-primary-400"
                            >
                                <x-filament::icon icon="heroicon-o-arrow-down-tray" class="h-4 w-4" />
                            </button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-white/10">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-50 text-xs uppercase text-gray-500 dark:bg-white/5 dark:text-gray-400">
                    <tr>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Type</th>
                        <th class="px-4 py-3">Size</th>
                        <th class="px-4 py-3">Last Modified</th>
                        <th class="px-4 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-white/10">
                    @foreach ($this->paginatedFiles() as $file)
                        <tr wire:key="drive-file-{{ $file['id'] }}">
                            <td class="px-4 py-3 font-medium text-gray-950 dark:text-white">
                                <div class="flex items-center gap-2">
                                    <x-filament::icon
                                        :icon="$this->fileIcon($file['mimeType'], $file['isFolder'])"
                                        class="h-4 w-4 shrink-0 text-gray-400"
                                    />
                                    @if ($file['isFolder'])
                                        <button
                                            type="button"
                                            wire:click="openFolder('{{ $file['id'] }}', '{{ addslashes($file['name']) }}')"
                                            class="text-left hover:underline"
                                        >
                                            {{ $file['name'] }}
                                        </button>
                                    @else
                                        {{ $file['name'] }}
                                    @endif
                                </div>
                            </td>
                            <td class="px-4 py-3 text-gray-500 dark:text-gray-400">
                                {{ $file['isFolder'] ? 'Folder' : $file['mimeType'] }}
                            </td>
                            <td class="px-4 py-3 text-gray-500 dark:text-gray-400">
                                {{ $file['isFolder'] ? '—' : static::formatFileSize($file['size'] ?? null) }}
                            </td>
                            <td class="px-4 py-3 text-gray-500 dark:text-gray-400">
                                {{ $file['modifiedTime'] ? \Illuminate\Support\Carbon::parse($file['modifiedTime'])->format('d M Y, H:i') : '—' }}
                            </td>
                            <td class="px-4 py-3 text-right">
                                @if ($file['isFolder'])
                                    <x-filament::button
                                        size="sm"
                                        color="gray"
                                        wire:click="openFolder('{{ $file['id'] }}', '{{ addslashes($file['name']) }}')"
                                    >
                                        Open
                                    </x-filament::button>
                                @else
                                    <div class="flex justify-end gap-2">
                                        <x-filament::button
                                            size="sm"
                                            color="gray"
                                            wire:click="preview('{{ $file['id'] }}', '{{ addslashes($file['name']) }}', '{{ $file['mimeType'] }}', '{{ $file['size'] }}')"
                                        >
                                            Preview
                                        </x-filament::button>

                                        <x-filament::button
                                            size="sm"
                                            color="primary"
                                            wire:click="download('{{ $file['id'] }}', '{{ addslashes($file['name']) }}')"
                                        >
                                            Download
                                        </x-filament::button>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @if (! $error && ! empty($files))
        <div class="mt-4">
            @include('livewire.partials.pagination', [
                'page' => $page,
                'totalPages' => $this->totalPages(),
                'previousAction' => 'previousPage',
                'nextAction' => 'nextPage',
            ])
        </div>
    @endif

    <x-filament::modal
        id="drive-preview-modal"
        width="4xl"
        :close-by-clicking-away="true"
        x-on:close-modal.window="if ($event.detail?.id === 'drive-preview-modal') $wire.closePreview()"
    >
        <x-slot name="heading">
            {{ $previewFile['name'] ?? 'Preview' }}
        </x-slot>

        @if ($previewFile)
            @if (str_starts_with($previewFile['mimeType'], 'image/'))
                <img
                    src="{{ $previewFile['dataUri'] }}"
                    alt="{{ $previewFile['name'] }}"
                    class="mx-auto max-h-[75vh] rounded-lg"
                >
            @elseif ($previewFile['mimeType'] === 'application/pdf')
                <iframe
                    src="{{ $previewFile['dataUri'] }}"
                    class="h-[75vh] w-full rounded-lg border border-gray-200 dark:border-white/10"
                ></iframe>
            @elseif (str_starts_with($previewFile['mimeType'], 'text/'))
                <pre class="max-h-[75vh] overflow-auto whitespace-pre-wrap rounded-lg bg-gray-50 p-4 text-xs dark:bg-white/5">{{ $previewFile['text'] }}</pre>
            @endif
        @endif
    </x-filament::modal>
</div>
