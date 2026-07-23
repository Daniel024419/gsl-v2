@extends('layouts.app')
@section('title', 'Events – Ghana School of Law')
@section('description',
    'Upcoming events at the Ghana School of Law - inductions, orientations, Call to the Bar
    ceremonies, and more.')
@section('content')

    {{-- ══ HERO ══════════════════════════════════════════════════════════ --}}
    <section class="pt-[97px] md:pt-[133px] pb-16 px-[5%]"
        style="background:linear-gradient(160deg,#030f1a 0%,#051b2c 60%,#071e2f 100%)">
        <div class="max-w-6xl mx-auto">
            <div class="max-w-3xl pt-20 pb-4">
                <span class="text-[10px] font-bold tracking-[4px] uppercase text-gold/65 block mb-7">Upcoming
                    Engagements</span>
                <h1 class="font-serif font-semibold leading-[1.1] tracking-tight mb-8">
                    <span class="text-white block" style="font-size:clamp(32px,6vw,68px)">
                        Academic <em class="not-italic font-normal opacity-60">&amp;</em> Institutional
                    </span>
                    <span class="block text-transparent bg-clip-text"
                        style="font-size:clamp(32px,6vw,68px);background-image:linear-gradient(90deg,#b8960c,rgba(184,150,12,.75),rgba(184,150,12,.3))">
                        Events Calendar
                    </span>
                </h1>
                <p class="text-[16px] text-cloud/60 max-w-2xl leading-[1.75]">
                    Stay current with official inductions, professional orientations, examinations,
                    and the esteemed annual Call to the Bar proceedings.
                </p>
            </div>
        </div>
    </section>

    {{-- ══ FILTER BAR ═══════════════════════════════════════════════════ --}}
    <section class="px-[5%] pt-10 bg-white">
        <div class="max-w-6xl mx-auto">
            <div data-events-filter class="rounded-xl bg-gray-50 border border-gray-200 overflow-hidden">
                <button type="button" data-events-filter-toggle aria-expanded="false"
                    class="w-full flex items-center justify-between gap-2 px-6 py-5 text-left">
                    <span class="flex items-center gap-2 text-[13px] font-bold text-gold tracking-[2px] uppercase">
                        <svg class="w-4 h-4 stroke-gold fill-none shrink-0" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" viewBox="0 0 24 24">
                            <rect x="3" y="4" width="18" height="18" rx="2" />
                            <line x1="16" y1="2" x2="16" y2="6" />
                            <line x1="8" y1="2" x2="8" y2="6" />
                            <line x1="3" y1="10" x2="21" y2="10" />
                        </svg>
                        Filter by Date &amp; Time
                        <span data-events-filter-count
                            class="hidden items-center justify-center min-w-5 h-5 px-1.5 rounded-full bg-gold text-navy text-[10px] font-bold"></span>
                    </span>
                    <svg data-events-filter-chevron
                        class="w-4 h-4 stroke-gray-500 fill-none shrink-0 transition-transform duration-300"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </button>
                <div data-events-filter-panel class="grid grid-rows-[0fr] transition-all duration-300 ease-in-out">
                    <div class="overflow-hidden">
                        <div class="flex flex-wrap gap-4 items-end px-6 pb-6">
                            <div class="flex-1 min-w-32.5">
                                <label
                                    class="block text-[11px] font-bold text-gray-500 tracking-[1.5px] uppercase mb-2">From
                                    Date</label>
                                <input type="date" data-events-filter-input="dateFrom"
                                    class="w-full px-3 py-2.5 bg-white border border-gray-300 rounded-lg text-[14px] text-navy focus:outline-none focus:border-gold/60 transition-colors">
                            </div>
                            <div class="flex-1 min-w-32.5">
                                <label
                                    class="block text-[11px] font-bold text-gray-500 tracking-[1.5px] uppercase mb-2">To
                                    Date</label>
                                <input type="date" data-events-filter-input="dateTo"
                                    class="w-full px-3 py-2.5 bg-white border border-gray-300 rounded-lg text-[14px] text-navy focus:outline-none focus:border-gold/60 transition-colors">
                            </div>
                            <div class="flex-1 min-w-32.5">
                                <label
                                    class="block text-[11px] font-bold text-gray-500 tracking-[1.5px] uppercase mb-2">From
                                    Time</label>
                                <input type="time" data-events-filter-input="timeFrom"
                                    class="w-full px-3 py-2.5 bg-white border border-gray-300 rounded-lg text-[14px] text-navy focus:outline-none focus:border-gold/60 transition-colors">
                            </div>
                            <div class="flex-1 min-w-32.5">
                                <label
                                    class="block text-[11px] font-bold text-gray-500 tracking-[1.5px] uppercase mb-2">To
                                    Time</label>
                                <input type="time" data-events-filter-input="timeTo"
                                    class="w-full px-3 py-2.5 bg-white border border-gray-300 rounded-lg text-[14px] text-navy focus:outline-none focus:border-gold/60 transition-colors">
                            </div>
                            <button type="button" data-events-filter-reset
                                class="w-full sm:w-auto px-5 py-2.5 text-[13px] font-semibold text-gold border border-gold/30 rounded-lg hover:bg-gold hover:text-navy active:scale-95 transition-all duration-150">
                                Reset
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ══ EVENTS GRID ════════════════════════════════════════════════════ --}}
    <section class="px-[5%] pt-10 pb-28 bg-white">
        <div class="max-w-6xl mx-auto">
            <p data-events-empty class="hidden text-center text-[15px] text-gray-500 py-16">
                No events match your selected date and time range.
            </p>
            <div data-events-grid class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($events as $ev)
                    <a href="{{ route('events.show', $ev['slug']) }}" data-events-card
                        data-event-date="{{ $ev['date'] }}" data-event-start="{{ $ev['start_time'] }}"
                        data-event-end="{{ $ev['end_time'] }}"
                        class="group flex flex-col bg-gray-50 border border-gray-200 rounded-xl overflow-hidden hover:bg-white hover:shadow-lg transition-all duration-500">

                        {{-- Thumbnail with calendar badge --}}
                        <div
                            class="relative aspect-4/3 overflow-hidden border-t-2 border-gold/0 group-hover:border-gold transition-all duration-500">
                            <img src="{{ asset($ev['image']) }}" alt="{{ $ev['title'] }}" loading="lazy"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            <div class="absolute top-4 left-4 w-14 rounded-lg overflow-hidden shadow-lg">
                                <div
                                    class="bg-gold text-navy text-[10px] font-bold uppercase tracking-wide text-center py-1">
                                    {{ strtoupper(substr($ev['month'], 0, 3)) }}</div>
                                <div
                                    class="bg-white text-navy font-serif font-bold text-[22px] text-center py-1.5 leading-none">
                                    {{ $ev['day'] }}</div>
                            </div>
                            <span
                                class="absolute top-4 right-4 text-[10px] font-bold tracking-[2px] uppercase text-white bg-black/40 backdrop-blur-sm px-2.5 py-1 rounded-full">
                                {{ $ev['year'] }}</span>
                        </div>

                        <div class="p-8 flex flex-col flex-1">

                            {{-- Time --}}
                            <p
                                class="flex items-center gap-1.5 text-[10px] font-bold tracking-[3px] uppercase text-gold/70 mb-3.5">
                                <svg class="w-3.5 h-3.5 stroke-gold/70 fill-none shrink-0" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" />
                                    <polyline points="12 6 12 12 16 14" />
                                </svg>
                                {{ $ev['time'] }}
                            </p>

                            {{-- Title --}}
                            <h3
                                class="font-serif font-semibold text-[19px] text-navy leading-snug mb-5 group-hover:translate-x-1 transition-transform duration-300">
                                {{ $ev['title'] }}
                            </h3>

                            {{-- Description --}}
                            <p class="text-[14px] text-gray-600 leading-[1.75] flex-grow mb-10">{{ $ev['desc'] }}</p>

                            {{-- Location --}}
                            <div class="flex items-center gap-2.5 text-gray-400 pt-5 border-t border-gray-200">
                                @if ($ev['location'] === 'Online Portal')
                                    <svg class="w-3.5 h-3.5 stroke-gold/70 fill-none flex-shrink-0" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10" />
                                        <line x1="2" y1="12" x2="22" y2="12" />
                                        <path
                                            d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z" />
                                    </svg>
                                @else
                                    <svg class="w-3.5 h-3.5 stroke-gold/70 fill-none flex-shrink-0" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                        <circle cx="12" cy="10" r="3" />
                                    </svg>
                                @endif
                                <span
                                    class="text-[14px] font-bold tracking-[2px] uppercase text-gray-500">{{ $ev['location'] }}</span>
                            </div>

                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        (function() {
            'use strict';

            document.querySelectorAll('[data-events-filter]').forEach(function(filter) {
                const inputs = {};
                filter.querySelectorAll('[data-events-filter-input]').forEach(function(input) {
                    inputs[input.getAttribute('data-events-filter-input')] = input;
                });
                const resetBtn = filter.querySelector('[data-events-filter-reset]');
                const count = filter.querySelector('[data-events-filter-count]');

                const toggleBtn = filter.querySelector('[data-events-filter-toggle]');
                const panel = filter.querySelector('[data-events-filter-panel]');
                const chevron = filter.querySelector('[data-events-filter-chevron]');

                toggleBtn && toggleBtn.addEventListener('click', function() {
                    const isOpen = panel.classList.contains('grid-rows-[1fr]');
                    panel.classList.toggle('grid-rows-[1fr]', !isOpen);
                    panel.classList.toggle('grid-rows-[0fr]', isOpen);
                    chevron.classList.toggle('rotate-180', !isOpen);
                    toggleBtn.setAttribute('aria-expanded', String(!isOpen));
                });

                const grid = document.querySelector('[data-events-grid]');
                const emptyMsg = document.querySelector('[data-events-empty]');
                if (!grid) return;
                const cards = Array.from(grid.querySelectorAll('[data-events-card]'));

                function apply() {
                    const dateFrom = inputs.dateFrom && inputs.dateFrom.value;
                    const dateTo = inputs.dateTo && inputs.dateTo.value;
                    const timeFrom = inputs.timeFrom && inputs.timeFrom.value;
                    const timeTo = inputs.timeTo && inputs.timeTo.value;

                    const activeCount = [dateFrom, dateTo, timeFrom, timeTo].filter(Boolean).length;
                    if (count) {
                        count.textContent = activeCount;
                        count.classList.toggle('hidden', activeCount === 0);
                        count.classList.toggle('inline-flex', activeCount > 0);
                    }

                    let visible = 0;

                    cards.forEach(function(card) {
                        const date = card.getAttribute('data-event-date');
                        const start = card.getAttribute('data-event-start');
                        const end = card.getAttribute('data-event-end');

                        let show = true;
                        if (dateFrom && date < dateFrom) show = false;
                        if (dateTo && date > dateTo) show = false;
                        if (timeFrom && end < timeFrom) show = false;
                        if (timeTo && start > timeTo) show = false;

                        card.classList.toggle('hidden', !show);
                        if (show) visible++;
                    });

                    if (emptyMsg) emptyMsg.classList.toggle('hidden', visible !== 0);
                }

                Object.values(inputs).forEach(function(input) {
                    input.addEventListener('input', apply);
                    input.addEventListener('change', apply);
                });

                resetBtn && resetBtn.addEventListener('click', function() {
                    Object.values(inputs).forEach(function(input) {
                        input.value = '';
                    });
                    apply();
                });
            });
        }());
    </script>
@endpush
