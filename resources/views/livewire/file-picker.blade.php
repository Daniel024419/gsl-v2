<div>
    <div class="mb-4 border-b border-gray-200 dark:border-white/10">
        <nav class="-mb-px flex gap-6">
            <button
                type="button"
                wire:click="setActiveTab('drive')"
                @class([
                    'border-b-2 px-1 py-2 text-sm font-medium transition',
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
                    'border-b-2 px-1 py-2 text-sm font-medium transition',
                    'border-primary-600 text-primary-600 dark:border-primary-400 dark:text-primary-400' => $activeTab === 'r2',
                    'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200' => $activeTab !== 'r2',
                ])
            >
                Cloudflare
            </button>
        </nav>
    </div>

    <div class="mb-4 flex items-center gap-3">
        <div class="flex-1">
            <x-filament::input.wrapper prefix-icon="heroicon-o-magnifying-glass">
                @if ($activeTab === 'drive')
                    <x-filament::input
                        type="search"
                        wire:model.live.debounce.400ms="driveSearch"
                        placeholder="Search Drive files by name..."
                    />
                @else
                    <x-filament::input
                        type="search"
                        wire:model.live.debounce.400ms="r2Search"
                        placeholder="Search Cloudflare files by name..."
                    />
                @endif
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

    @if ($activeTab === 'drive')
        <nav class="mb-3 flex flex-wrap items-center gap-1 text-sm text-gray-500 dark:text-gray-400">
            @foreach ($driveBreadcrumbs as $index => $crumb)
                @if (!$loop->last)
                    <button type="button" wire:click="goToDriveBreadcrumb({{ $index }})" class="font-medium text-primary-600 hover:underline dark:text-primary-400">
                        {{ $crumb['name'] }}
                    </button>
                    <x-filament::icon icon="heroicon-o-chevron-right" class="h-3 w-3" />
                @else
                    <span class="font-medium text-gray-950 dark:text-white">{{ $crumb['name'] }}</span>
                @endif
            @endforeach
        </nav>

        @if (! $driveError && ! empty($driveFiles))
            <div class="mb-3">
                @include('livewire.partials.pagination', [
                    'page' => $drivePage,
                    'totalPages' => $this->driveTotalPages(),
                    'previousAction' => 'previousDrivePage',
                    'nextAction' => 'nextDrivePage',
                ])
            </div>
        @endif

        @if ($driveError)
            <div class="rounded-lg bg-danger-50 p-4 text-sm text-danger-700 dark:bg-danger-500/10 dark:text-danger-400">
                {{ $driveError }}
            </div>
        @elseif (empty($driveFiles))
            <div class="rounded-lg bg-gray-50 p-6 text-center text-sm text-gray-500 dark:bg-white/5 dark:text-gray-400">
                No files found.
            </div>
        @elseif ($viewMode === 'grid')
            <div class="grid max-h-[60vh] grid-cols-2 gap-4 overflow-y-auto sm:grid-cols-3 md:grid-cols-4">
                @foreach ($this->paginatedDriveFiles() as $file)
                    <div wire:key="picker-drive-{{ $file['id'] }}" class="group flex flex-col overflow-hidden rounded-xl border border-gray-200 bg-white transition hover:shadow-md dark:border-white/10 dark:bg-white/5">
                        <button
                            type="button"
                            @if ($file['isFolder'])
                                wire:click="openDriveFolder('{{ $file['id'] }}', '{{ addslashes($file['name']) }}')"
                            @else
                                wire:click="selectDriveFile('{{ $file['id'] }}', '{{ addslashes($file['name']) }}', '{{ $file['mimeType'] }}')"
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
                                    onerror="this.remove(); document.getElementById('picker-drive-thumb-fallback-{{ $file['id'] }}')?.classList.remove('hidden')"
                                >
                                <span id="picker-drive-thumb-fallback-{{ $file['id'] }}" class="hidden">
                                    <x-filament::icon :icon="$this->fileIcon($file['mimeType'], false)" class="h-10 w-10 text-gray-400" />
                                </span>
                            @else
                                <x-filament::icon :icon="$this->fileIcon($file['mimeType'], $file['isFolder'])" class="h-10 w-10 text-gray-400" />
                            @endif
                        </button>

                        <div class="px-3 py-2">
                            <span class="block truncate text-xs font-medium text-gray-950 dark:text-white" title="{{ $file['name'] }}">
                                {{ $file['name'] }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="max-h-[60vh] overflow-y-auto rounded-xl border border-gray-200 dark:border-white/10">
                <table class="w-full text-left text-sm">
                    <tbody class="divide-y divide-gray-200 dark:divide-white/10">
                        @foreach ($this->paginatedDriveFiles() as $file)
                            <tr wire:key="picker-drive-row-{{ $file['id'] }}">
                                <td class="px-4 py-2.5">
                                    <button
                                        type="button"
                                        @if ($file['isFolder'])
                                            wire:click="openDriveFolder('{{ $file['id'] }}', '{{ addslashes($file['name']) }}')"
                                        @else
                                            wire:click="selectDriveFile('{{ $file['id'] }}', '{{ addslashes($file['name']) }}', '{{ $file['mimeType'] }}')"
                                        @endif
                                        class="flex w-full items-center gap-2 text-left hover:underline"
                                    >
                                        <x-filament::icon :icon="$this->fileIcon($file['mimeType'], $file['isFolder'])" class="h-4 w-4 shrink-0 text-gray-400" />
                                        <span class="truncate text-gray-950 dark:text-white">{{ $file['name'] }}</span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        @if (! $driveError && ! empty($driveFiles))
            <div class="mt-4">
                @include('livewire.partials.pagination', [
                    'page' => $drivePage,
                    'totalPages' => $this->driveTotalPages(),
                    'previousAction' => 'previousDrivePage',
                    'nextAction' => 'nextDrivePage',
                ])
            </div>
        @endif
    @else
        <nav class="mb-3 flex flex-wrap items-center gap-1 text-sm text-gray-500 dark:text-gray-400">
            @foreach ($r2Breadcrumbs as $index => $crumb)
                @if (!$loop->last)
                    <button type="button" wire:click="goToR2Breadcrumb({{ $index }})" class="font-medium text-primary-600 hover:underline dark:text-primary-400">
                        {{ $crumb['name'] }}
                    </button>
                    <x-filament::icon icon="heroicon-o-chevron-right" class="h-3 w-3" />
                @else
                    <span class="font-medium text-gray-950 dark:text-white">{{ $crumb['name'] }}</span>
                @endif
            @endforeach
        </nav>

        @if (! $r2Error && ! empty($r2Files))
            <div class="mb-3">
                @include('livewire.partials.pagination', [
                    'page' => $r2Page,
                    'totalPages' => $this->r2TotalPages(),
                    'previousAction' => 'previousR2Page',
                    'nextAction' => 'nextR2Page',
                ])
            </div>
        @endif

        @if ($r2Error)
            <div class="rounded-lg bg-danger-50 p-4 text-sm text-danger-700 dark:bg-danger-500/10 dark:text-danger-400">
                {{ $r2Error }}
            </div>
        @elseif (empty($r2Files))
            <div class="rounded-lg bg-gray-50 p-6 text-center text-sm text-gray-500 dark:bg-white/5 dark:text-gray-400">
                No files found.
            </div>
        @elseif ($viewMode === 'grid')
            <div class="grid max-h-[60vh] grid-cols-2 gap-4 overflow-y-auto sm:grid-cols-3 md:grid-cols-4">
                @foreach ($this->paginatedR2Files() as $file)
                    <div wire:key="picker-r2-{{ $file['id'] }}" class="group flex flex-col overflow-hidden rounded-xl border border-gray-200 bg-white transition hover:shadow-md dark:border-white/10 dark:bg-white/5">
                        <button
                            type="button"
                            @if ($file['isFolder'])
                                wire:click="openR2Folder('{{ $file['id'] }}', '{{ addslashes($file['name']) }}')"
                            @else
                                wire:click="selectR2File('{{ $file['id'] }}')"
                            @endif
                            class="flex aspect-square w-full items-center justify-center bg-gray-50 dark:bg-white/10"
                        >
                            @if (! $file['isFolder'] && $file['thumbnailUrl'])
                                <img
                                    src="{{ $file['thumbnailUrl'] }}"
                                    alt="{{ $file['name'] }}"
                                    loading="lazy"
                                    class="h-full w-full object-cover"
                                    onerror="this.remove(); document.getElementById('picker-r2-thumb-fallback-{{ $file['id'] }}')?.classList.remove('hidden')"
                                >
                                <span id="picker-r2-thumb-fallback-{{ $file['id'] }}" class="hidden">
                                    <x-filament::icon :icon="$this->fileIcon($file['mimeType'], false)" class="h-10 w-10 text-gray-400" />
                                </span>
                            @else
                                <x-filament::icon :icon="$this->fileIcon($file['mimeType'], $file['isFolder'])" class="h-10 w-10 text-gray-400" />
                            @endif
                        </button>

                        <div class="px-3 py-2">
                            <span class="block truncate text-xs font-medium text-gray-950 dark:text-white" title="{{ $file['name'] }}">
                                {{ $file['name'] }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="max-h-[60vh] overflow-y-auto rounded-xl border border-gray-200 dark:border-white/10">
                <table class="w-full text-left text-sm">
                    <tbody class="divide-y divide-gray-200 dark:divide-white/10">
                        @foreach ($this->paginatedR2Files() as $file)
                            <tr wire:key="picker-r2-row-{{ $file['id'] }}">
                                <td class="px-4 py-2.5">
                                    <button
                                        type="button"
                                        @if ($file['isFolder'])
                                            wire:click="openR2Folder('{{ $file['id'] }}', '{{ addslashes($file['name']) }}')"
                                        @else
                                            wire:click="selectR2File('{{ $file['id'] }}')"
                                        @endif
                                        class="flex w-full items-center gap-2 text-left hover:underline"
                                    >
                                        <x-filament::icon :icon="$this->fileIcon($file['mimeType'], $file['isFolder'])" class="h-4 w-4 shrink-0 text-gray-400" />
                                        <span class="truncate text-gray-950 dark:text-white">{{ $file['name'] }}</span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        @if (! $r2Error && ! empty($r2Files))
            <div class="mt-4">
                @include('livewire.partials.pagination', [
                    'page' => $r2Page,
                    'totalPages' => $this->r2TotalPages(),
                    'previousAction' => 'previousR2Page',
                    'nextAction' => 'nextR2Page',
                ])
            </div>
        @endif
    @endif
</div>
