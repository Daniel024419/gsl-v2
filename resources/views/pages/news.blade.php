@extends('layouts.app')
@section('title', 'News – Ghana School of Law')
@section('description',
    'Latest news from the Ghana School of Law - institutional updates, events, and academic
    announcements.')
@section('content')

    {{-- ══ BREAKING TICKER ══════════════════════════════════════════════ --}}
    <div class="bg-navy-dark border-y border-gold/15 py-2.5 overflow-hidden mt-[72px]">
        <div class="max-w-6xl mx-auto px-[5%] flex items-center gap-4">
            <span
                class="text-[10px] font-bold tracking-[3px] uppercase bg-gold text-navy px-2.5 py-1 flex-shrink-0 rounded-sm">BREAKING</span>
            <div class="overflow-hidden flex-1">
                <span class="animate-marquee text-[14px] italic text-cloud/60 whitespace-nowrap">
                    Pre-Bar Course 2026/2027 applications now open &nbsp;&mdash;&nbsp;
                    961 lawyers called to the Ghana Bar in 2025 - 513 female, a historic milestone &nbsp;&mdash;&nbsp;
                    GSL formally transitions under CLET Act 1170 &nbsp;&mdash;&nbsp;
                    CLET inaugural Board officially constituted &nbsp;&mdash;&nbsp;
                    Bar Examination results to be published - check gslaw.edu.gh for updates
                </span>
            </div>
        </div>
    </div>

    {{-- ══ HERO ══════════════════════════════════════════════════════════ --}}
    <section class="max-w-6xl mx-auto px-[5%] py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            {{-- Featured Article --}}
            <a href="{{ route('news.show', $articles[2]['slug']) }}" class="lg:col-span-8 group block">
                <div class="aspect-[16/9] w-full overflow-hidden rounded-xl relative">
                    <img src="{{ asset('assets/images/homehero.png') }}" alt="Ghana School of Law campus"
                        loading="lazy" class="absolute inset-0 w-full h-full object-cover">
                    <div class="absolute inset-0"
                        style="background:linear-gradient(135deg,rgba(3,15,26,0.75) 0%,rgba(7,30,47,0.55) 45%,rgba(12,74,110,0.3) 100%)">
                    </div>
                    <div class="absolute top-5 left-5">
                        <img src="{{ asset('assets/clet-gsl-logo.png') }}" alt="Ghana School of Law"
                            loading="lazy" class="h-14 w-auto opacity-90">
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 h-1/2"
                        style="background:linear-gradient(to top,#030f1a,transparent)"></div>
                </div>
                <div class="mt-7">
                    <span class="text-[10px] font-bold tracking-[3px] uppercase text-gold block mb-3">Academic</span>
                    <h1 class="font-serif font-semibold text-white leading-[1.2] mb-5 group-hover:text-gold transition-colors duration-200"
                        style="font-size:clamp(24px,3.5vw,40px)">
                        Act 1170 Transformation: GSL Enters a New Era Under CLET
                    </h1>
                    <p class="text-[15px] text-cloud/62 leading-[1.75] mb-7 max-w-2xl">
                        GSL formally transitions to its new role as a Directorate of CLET under the Legal Education Act,
                        2026 (Act 1170) - reshaping professional legal education governance in Ghana.
                    </p>
                    <div class="flex items-center gap-3.5 border-t border-white/6 pt-5">
                        <div
                            class="w-9 h-9 rounded-full bg-gold/8 border border-gold/20 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 stroke-gold fill-none" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[14px] font-medium text-cloud/75">GSL Communications</p>
                            <p class="text-[14px] text-cloud/35 uppercase tracking-[1px] mt-0.5">January 2026 &bull; 7 Min
                                Read</p>
                        </div>
                        <span
                            class="ml-auto text-[14px] font-bold tracking-[2px] uppercase text-gold border border-gold/25 px-4 py-2 rounded group-hover:bg-gold/8 transition-colors">
                            READ MORE &rarr;
                        </span>
                    </div>
                </div>
            </a>

            {{-- Hero Sidebar --}}
            <div class="lg:col-span-4 flex flex-col gap-6">

                {{-- Must Read --}}
                <div class="bg-navy-mid p-6 border border-gold/12 rounded-xl">
                    <div class="mb-6">
                        <span
                            class="text-[10px] font-bold tracking-[3px] uppercase text-gold pb-2.5 border-b-2 border-gold inline-block">MUST
                            READ</span>
                    </div>
                    <div class="space-y-6">
                        @foreach ([$articles[0], $articles[1], $articles[4]] as $mr)
                            <article class="group">
                                <a href="{{ route('news.show', $mr['slug']) }}">
                                    <h4
                                        class="font-serif font-semibold text-[15px] text-white leading-snug group-hover:text-gold transition-colors duration-200">
                                        {{ $mr['title'] }}
                                    </h4>
                                    <p class="text-[13px] text-cloud/45 leading-[1.6] mt-1.5 line-clamp-2">
                                        {{ $mr['excerpt'] }}</p>
                                    <p class="text-[10px] font-bold tracking-[2px] uppercase text-cloud/30 mt-2">
                                        {{ $mr['cat'] }}</p>
                                </a>
                            </article>
                        @endforeach
                    </div>
                </div>

                {{-- GSL Bulletin / Newsletter CTA --}}
                <div class="bg-navy p-7 border border-gold/20 rounded-xl flex flex-col items-center text-center">
                    <p class="text-[10px] font-bold tracking-[3px] uppercase text-gold mb-2">THE GSL BULLETIN</p>
                    <h3 class="font-serif font-semibold text-[17px] text-white leading-snug mb-5">
                        Stay ahead of GSL news &amp; announcements.
                    </h3>
                    <div class="w-full flex">
                        <input type="email" placeholder="Your email address"
                            class="flex-grow min-w-0 bg-white/5 border border-gold/20 border-r-0 text-white placeholder-cloud/30 px-4 py-3 text-[14px] rounded-l focus:outline-none focus:border-gold/40" />
                        <button
                            class="bg-gold text-navy px-4 py-3 text-[10px] font-bold tracking-[2px] uppercase rounded-r hover:bg-gold-light transition-colors flex-shrink-0">
                            JOIN
                        </button>
                    </div>
                    <p class="mt-4 text-[14px] text-cloud/30 leading-snug">By subscribing you agree to our privacy policy.
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- ══ MAIN CONTENT GRID (light section) ═══════════════════════════ --}}
    <section class="bg-white">
        <div class="max-w-6xl mx-auto px-[5%] py-16">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                {{-- ── Centre Feed ─────────────────────────────────────────── --}}
                <div class="lg:col-span-8">

                    {{-- Tab Bar --}}
                    <div class="flex gap-8 border-b border-gray-200 mb-10" data-news-tabs>
                        <button type="button" data-news-tab="recent"
                            class="text-[10px] font-bold tracking-[3px] uppercase text-navy py-4 border-b-2 border-gold -mb-px">RECENT
                            POSTS</button>
                        <button type="button" data-news-tab="all"
                            class="text-[10px] font-bold tracking-[3px] uppercase text-gray-400 py-4 border-b-2 border-transparent -mb-px hover:text-navy/60 transition-colors">ALL
                            CATEGORIES</button>
                    </div>

                    <div data-news-panel="recent" class="space-y-12">

                        {{-- Feed: horizontal article cards (articles 3 & 5) --}}
                        @foreach ([$articles[3], $articles[5]] as $fa)
                            <a href="{{ route('news.show', $fa['slug']) }}"
                                class="flex flex-col md:flex-row gap-6 group p-4 -mx-4 hover:bg-gray-50 rounded-xl transition-colors duration-200">
                                <div class="md:w-1/3 aspect-[4/3] overflow-hidden rounded-lg flex-shrink-0">
                                    @if (!empty($fa['image']))
                                        <img src="{{ asset($fa['image']) }}" alt="{{ $fa['title'] }}" loading="lazy"
                                            class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center"
                                            style="background:linear-gradient(135deg,#071e2f,#0c4a6e)">
                                            <svg class="w-10 h-10 stroke-gold/25 fill-none" stroke-width="1"
                                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                                {!! $fa['icon'] !!}
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="md:w-2/3 flex flex-col justify-center">
                                    <span
                                        class="text-[10px] font-bold tracking-[3px] uppercase text-gold mb-2">{{ $fa['cat'] }}</span>
                                    <h3
                                        class="font-serif font-semibold text-[18px] text-navy leading-snug mb-3 group-hover:text-gold transition-colors duration-200">
                                        {{ $fa['title'] }}
                                    </h3>
                                    <p class="text-[14px] text-gray-600 leading-[1.7] mb-4">{{ $fa['excerpt'] }}</p>
                                    <div class="flex items-center gap-4 border-t border-gray-200 pt-3">
                                        <span
                                            class="text-[14px] text-gray-400 uppercase tracking-[1px]">{{ $fa['date'] }}</span>
                                        <span
                                            class="text-[14px] text-gray-400 uppercase tracking-[1px]">{{ $fa['read'] }}</span>
                                        <span
                                            class="ml-auto text-[10px] font-bold tracking-[2px] uppercase text-gold group-hover:underline">
                                            READ MORE &rarr;
                                        </span>
                                    </div>
                                </div>
                            </a>
                        @endforeach

                        {{-- Bento: 2-col mini-cards (articles 0 & 1) --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-t border-gray-200 pt-12">
                            @foreach ([$articles[0], $articles[1]] as $bc)
                                <a href="{{ route('news.show', $bc['slug']) }}" class="group block">
                                    <div class="w-full aspect-video rounded-lg overflow-hidden mb-4">
                                        @if (!empty($bc['image']))
                                            <img src="{{ asset($bc['image']) }}" alt="{{ $bc['title'] }}"
                                                loading="lazy" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center"
                                                style="background:linear-gradient(135deg,#051b2c,#0c4a6e)">
                                                <svg class="w-8 h-8 stroke-gold/20 fill-none" stroke-width="1"
                                                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                                    {!! $bc['icon'] !!}
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <span
                                        class="text-[10px] font-bold tracking-[3px] uppercase text-gold mb-1.5 block">{{ $bc['cat'] }}</span>
                                    <h3
                                        class="font-serif font-semibold text-[15px] text-navy leading-snug group-hover:text-gold transition-colors duration-200">
                                        {{ $bc['title'] }}
                                    </h3>
                                    <p class="mt-2 text-[14px] text-gray-500 leading-[1.65] line-clamp-2">
                                        {{ $bc['excerpt'] }}
                                    </p>
                                    <div class="mt-3 flex items-center justify-between">
                                        <span
                                            class="text-[14px] text-gray-400 uppercase tracking-[1px]">{{ $bc['date'] }}
                                            &bull; {{ $bc['read'] }}</span>
                                        <span
                                            class="text-[10px] font-bold tracking-[2px] uppercase text-gold group-hover:underline">READ
                                            &rarr;</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                    </div>

                    {{-- All Categories: every article --}}
                    <div data-news-panel="all" class="hidden">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($articles as $a)
                            <a href="{{ route('news.show', $a['slug']) }}"
                                class="group block p-4 -mx-4 rounded-xl hover:bg-gray-50 transition-colors duration-200">
                                <div class="w-full aspect-video rounded-lg overflow-hidden mb-4">
                                    @if (!empty($a['image']))
                                        <img src="{{ asset($a['image']) }}" alt="{{ $a['title'] }}" loading="lazy"
                                            class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center"
                                            style="background:linear-gradient(135deg,#051b2c,#0c4a6e)">
                                            <svg class="w-8 h-8 stroke-gold/20 fill-none" stroke-width="1"
                                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                                {!! $a['icon'] !!}
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <span
                                    class="text-[10px] font-bold tracking-[3px] uppercase text-gold mb-1.5 block">{{ $a['cat'] }}</span>
                                <h3
                                    class="font-serif font-semibold text-[15px] text-navy leading-snug group-hover:text-gold transition-colors duration-200">
                                    {{ $a['title'] }}
                                </h3>
                                <p class="mt-2 text-[14px] text-gray-500 leading-[1.65] line-clamp-2">
                                    {{ $a['excerpt'] }}
                                </p>
                                <div class="mt-3 flex items-center justify-between">
                                    <span class="text-[14px] text-gray-400 uppercase tracking-[1px]">{{ $a['date'] }}
                                        &bull; {{ $a['read'] }}</span>
                                    <span
                                        class="text-[10px] font-bold tracking-[2px] uppercase text-gold group-hover:underline">READ
                                        &rarr;</span>
                                </div>
                            </a>
                        @endforeach
                        </div>
                    </div>
                </div>

                {{-- ── Right Sidebar ────────────────────────────────────────── --}}
                <aside class="lg:col-span-4 space-y-6">

                    {{-- Recent Announcements --}}
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <h3
                            class="text-[10px] font-bold tracking-[3px] uppercase text-gray-500 pb-3 mb-5 border-b border-gray-200 flex items-center justify-between">
                            ANNOUNCEMENTS
                            <svg class="w-4 h-4 stroke-gold/70 fill-none" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                                <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                            </svg>
                        </h3>
                        <div class="space-y-4">
                            @foreach ([['Pre-Bar applications deadline: July 2026', 'Admissions'], ['Bar Examination results to be published', 'Academic'], ['GSL Accra library extended hours in effect', 'Institutional']] as $ann)
                                <div class="flex gap-3 group cursor-pointer">
                                    <div
                                        class="w-0.5 bg-gold/30 rounded-full flex-shrink-0 group-hover:bg-gold transition-colors duration-200">
                                    </div>
                                    <div>
                                        <p
                                            class="text-[14px] font-medium text-navy leading-snug group-hover:text-gold transition-colors duration-200">
                                            {{ $ann[0] }}</p>
                                        <p class="text-[10px] font-bold tracking-[2px] uppercase text-gray-400 mt-1">
                                            {{ $ann[1] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button
                            class="w-full mt-6 py-2.5 border border-gold/30 text-[10px] font-bold tracking-[2px] uppercase text-gold/70 hover:text-gold hover:border-gold/50 transition-colors rounded">
                            VIEW ALL ANNOUNCEMENTS
                        </button>
                    </div>

                    {{-- Admissions CTA --}}
                    <div class="relative border border-gold/18 rounded-xl overflow-hidden aspect-square flex items-center justify-center"
                        style="background:linear-gradient(135deg,#030f1a 0%,#071e2f 60%,#051b2c 100%)">
                        <div class="absolute inset-0 opacity-20"
                            style="background:radial-gradient(ellipse at 30% 70%,#b8960c,transparent 55%),radial-gradient(ellipse at 75% 25%,#0c4a6e,transparent 55%)">
                        </div>
                        <div class="relative z-10 text-center p-8">
                            <p class="text-[10px] font-bold tracking-[3px] uppercase text-gold/55 mb-3">APPLY NOW</p>
                            <h3 class="font-serif font-semibold text-white leading-[1.25] mb-4"
                                style="font-size:clamp(18px,2vw,22px)">
                                Pre-Bar Course<br>2026 &ndash; 2027
                            </h3>
                            <p class="text-[14px] text-cloud/50 mb-6 leading-[1.65]">
                                Applications open.<br>Deadline: July 2026.
                            </p>
                            <a href="https://forms.gslaw.school/surveys/23"
                                class="inline-block bg-gold text-navy px-6 py-2.5 text-[10px] font-bold tracking-[2px] uppercase rounded hover:bg-gold-light transition-colors">
                                APPLY NOW
                            </a>
                        </div>
                    </div>

                    {{-- Trending at GSL --}}
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <h3 class="text-[10px] font-bold tracking-[3px] uppercase text-gold mb-5">TRENDING AT GSL</h3>
                        <ol class="space-y-4">
                            @foreach (['Act 1170: What it means for aspiring lawyers', 'How to prepare for the National Bar Examination', 'Post-Call Law Course: Gateway for international lawyers', 'GSL Kumasi campus: What students need to know'] as $i => $trend)
                                <li class="flex gap-3 group cursor-pointer items-start">
                                    <span
                                        class="text-[22px] font-serif font-bold text-gold/25 leading-none mt-0.5 flex-shrink-0 w-6 text-right">{{ $i + 1 }}</span>
                                    <span
                                        class="text-[14px] text-gray-600 leading-snug group-hover:text-gold transition-colors duration-200">{{ $trend }}</span>
                                </li>
                            @endforeach
                        </ol>
                    </div>

                </aside>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        (function() {
            'use strict';

            const ACTIVE = 'text-[10px] font-bold tracking-[3px] uppercase text-navy py-4 border-b-2 border-gold -mb-px';
            const INACTIVE = 'text-[10px] font-bold tracking-[3px] uppercase text-gray-400 py-4 border-b-2 border-transparent -mb-px hover:text-navy/60 transition-colors';

            document.querySelectorAll('[data-news-tabs]').forEach(function(tabs) {
                const buttons = Array.from(tabs.querySelectorAll('[data-news-tab]'));
                const panels = Array.from(document.querySelectorAll('[data-news-panel]'));

                buttons.forEach(function(btn) {
                    btn.addEventListener('click', function() {
                        const target = btn.getAttribute('data-news-tab');

                        buttons.forEach(function(b) {
                            b.className = b === btn ? ACTIVE : INACTIVE;
                        });

                        panels.forEach(function(p) {
                            p.classList.toggle('hidden', p.getAttribute('data-news-panel') !== target);
                        });
                    });
                });
            });
        }());
    </script>
@endpush
