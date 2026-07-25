@extends('layouts.app')
@section('title', 'Notices – Ghana School of Law')
@section('description',
    'Official notices and announcements from the Ghana School of Law - admissions, examinations,
    academic calendar, and portal updates.')
@section('content')

    <section class="relative pt-[97px] md:pt-[133px] min-h-[260px] flex items-end pb-14 px-[5%]"
        style="background:linear-gradient(135deg,#030f1a 0%,#0c4a6e 50%,#051b2c 100%)">
        <div class="max-w-6xl mx-auto w-full">
            <p class="text-[14px] font-bold text-gold/70 tracking-[3px] uppercase mb-3">Notice Board</p>
            <h1 class="font-serif font-semibold text-white leading-[1.1] mb-4" style="font-size:clamp(28px,4.5vw,50px)">
                Notices &amp; Announcements</h1>
            <p class="text-[16px] text-cloud/62 max-w-xl leading-[1.7]">
                Official notices from the Ghana School of Law - admissions, examinations, academic calendar, and
                portal updates.
            </p>
        </div>
    </section>

    <section class="pt-10 px-[5%] bg-white">
        <div class="max-w-4xl mx-auto flex flex-col gap-4">
            <div class="relative">
                <svg class="w-4 h-4 text-gray-400 absolute left-4 top-1/2 -translate-y-1/2" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8" />
                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                </svg>
                <input type="text" data-notices-search placeholder="Search notices&hellip;" autocomplete="off"
                    class="w-full pl-11 pr-4 py-3.5 text-[14px] text-navy placeholder-gray-400 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-gold/50 transition-colors">
            </div>
            <div data-notices-filter class="rounded-xl bg-gray-50 border border-gray-200 overflow-hidden">
                <button type="button" data-notices-filter-toggle aria-expanded="false"
                    class="w-full flex items-center justify-between gap-2 px-6 py-5 text-left">
                    <span class="flex items-center gap-2 text-[13px] font-bold text-gold tracking-[2px] uppercase">
                        <svg class="w-4 h-4 stroke-gold fill-none shrink-0" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" viewBox="0 0 24 24">
                            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
                        </svg>
                        Filter by Category
                        <span data-notices-filter-count
                            class="hidden items-center justify-center min-w-5 h-5 px-1.5 rounded-full bg-gold text-navy text-[10px] font-bold"></span>
                    </span>
                    <svg data-notices-filter-chevron
                        class="w-4 h-4 stroke-gray-500 fill-none shrink-0 transition-transform duration-300"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </button>
            </div>
        </div>
    </section>

    {{-- LIST --}}
    <section class="py-10 px-[5%] bg-white">
        <div class="max-w-4xl mx-auto">
            <p data-notices-empty class="hidden text-center text-[15px] text-gray-500 py-16">
                No notices match your search.
            </p>
            <div data-notices-list class="flex flex-col divide-y divide-gray-200">
            @foreach ([
        [
            'slug' => 'pre-bar-course-2026-2027-applications-open',
            'cat' => 'Admissions',
            'title' => 'Pre-Bar Course 2026/2027 Applications Now Open',
            'excerpt' =>
                'Applications for the transitional Pre-Bar Course are open. Applicants must purchase an Application Voucher before accessing the applicant portal.',
            'date' => 'June 2026',
            'pinned' => true,
            'url' => '/admissions/instructions',
        ],] as $n)
                    <div data-notices-item data-notices-cat="{{ $n['cat'] }}"
                        data-notices-text="{{ strtolower($n['title'] . ' ' . $n['excerpt'] . ' ' . $n['cat']) }}"
                        class="py-6 flex flex-col sm:flex-row sm:items-start gap-2 sm:gap-6">
                        <span
                            class="flex-shrink-0 text-[13px] font-semibold text-gray-400 uppercase tracking-[1px] sm:w-32">{{ $n['date'] }}</span>
                        <div>
                            <span class="text-[11px] font-bold tracking-[2px] uppercase text-gold">{{ $n['cat'] }}</span>
                            <h3 class="font-serif font-semibold text-[17px] text-navy mt-1 mb-1.5">{{ $n['title'] }}
                            </h3>
                            <p class="text-[14px] text-gray-600 leading-[1.7]">{{ $n['excerpt'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        (function() {
            'use strict';

            document.querySelectorAll('[data-notices-filter]').forEach(function(filter) {
                const inputs = Array.from(filter.querySelectorAll('[data-notices-filter-input]'));
                const resetBtn = filter.querySelector('[data-notices-filter-reset]');
                const count = filter.querySelector('[data-notices-filter-count]');

                const toggleBtn = filter.querySelector('[data-notices-filter-toggle]');
                const panel = filter.querySelector('[data-notices-filter-panel]');
                const chevron = filter.querySelector('[data-notices-filter-chevron]');

                toggleBtn && toggleBtn.addEventListener('click', function() {
                    const isOpen = panel.classList.contains('grid-rows-[1fr]');
                    panel.classList.toggle('grid-rows-[1fr]', !isOpen);
                    panel.classList.toggle('grid-rows-[0fr]', isOpen);
                    chevron.classList.toggle('rotate-180', !isOpen);
                    toggleBtn.setAttribute('aria-expanded', String(!isOpen));
                });

                const searchInput = document.querySelector('[data-notices-search]');
                const list = document.querySelector('[data-notices-list]');
                const emptyMsg = document.querySelector('[data-notices-empty]');
                if (!list) return;
                const items = Array.from(list.querySelectorAll('[data-notices-item]'));

                function apply() {
                    const active = inputs.filter(function(i) {
                        return i.checked;
                    }).map(function(i) {
                        return i.value;
                    });

                    if (count) {
                        count.textContent = active.length;
                        count.classList.toggle('hidden', active.length === 0);
                        count.classList.toggle('inline-flex', active.length > 0);
                    }

                    const query = searchInput ? searchInput.value.trim().toLowerCase() : '';

                    let visible = 0;

                    items.forEach(function(item) {
                        const matchesCategory = active.length === 0 ||
                            active.indexOf(item.getAttribute('data-notices-cat')) !== -1;
                        const matchesQuery = !query ||
                            (item.getAttribute('data-notices-text') || '').indexOf(query) !== -1;
                        const show = matchesCategory && matchesQuery;
                        item.classList.toggle('hidden', !show);
                        if (show) visible++;
                    });

                    if (emptyMsg) emptyMsg.classList.toggle('hidden', visible !== 0);
                }

                inputs.forEach(function(input) {
                    input.addEventListener('change', apply);
                });

                searchInput && searchInput.addEventListener('input', apply);

                resetBtn && resetBtn.addEventListener('click', function() {
                    inputs.forEach(function(input) {
                        input.checked = false;
                    });
                    if (searchInput) searchInput.value = '';
                    apply();
                });
            });
        }());
    </script>
@endpush
