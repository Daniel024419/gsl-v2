@extends('layouts.app')
@section('title', 'News – Ghana School of Law')
@section('description',
    'Latest news from the Ghana School of Law - institutional updates, events, and academic
    announcements.')
@section('content')

    @php
        $articles = [
            [
                'cat' => 'Institutional',
                'title' => 'Orientation 2025',
                'excerpt' =>
                    'The Ghana School of Law successfully held its 2025/2026 orientation for new students across all three campuses.',
                'date' => 'June 2025',
                'read' => '5 min read',
                'icon' =>
                    '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
            ],
            [
                'cat' => 'Events',
                'title' => 'Call to the Bar 2025',
                'excerpt' =>
                    '961 lawyers were called to the Ghana Bar in 2025 - 513 female, marking a historic milestone for gender inclusion.',
                'date' => 'November 2025',
                'read' => '3 min read',
                'icon' => '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/>',
            ],
            [
                'cat' => 'Academic',
                'title' => 'Act 1170 Transformation',
                'excerpt' =>
                    'GSL formally transitions to its new role as a Directorate of CLET under the Legal Education Act, 2026 (Act 1170).',
                'date' => 'January 2026',
                'read' => '7 min read',
                'icon' => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>',
            ],
            [
                'cat' => 'Admissions',
                'title' => 'Pre-Bar Course Applications Open',
                'excerpt' =>
                    'Applications are now open for the official Pre-Bar Course for the 2026/2027 academic year.',
                'date' => 'June 2026',
                'read' => '2 min read',
                'icon' =>
                    '<path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect x="8" y="2" width="8" height="4" rx="1" ry="1"/>',
            ],
            [
                'cat' => 'Academic',
                'title' => 'CLET Board Announced',
                'excerpt' =>
                    'The Council for Legal Education and Training officially constituted its inaugural Board, marking a new era for legal education governance.',
                'date' => 'March 2026',
                'read' => '4 min read',
                'icon' =>
                    '<rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>',
            ],
            [
                'cat' => 'Events',
                'title' => 'Induction Ceremony 2025',
                'excerpt' =>
                    'The 2025/2026 academic year began with a vibrant induction ceremony welcoming new students to the GSL community.',
                'date' => 'September 2025',
                'read' => '3 min read',
                'icon' =>
                    '<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>',
            ],
        ];
    @endphp

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
            <div class="lg:col-span-8 group cursor-pointer">
                <div class="aspect-[16/9] w-full overflow-hidden rounded-xl relative"
                    style="background:linear-gradient(135deg,#030f1a 0%,#071e2f 45%,#0c4a6e 100%)">
                    <div class="absolute inset-0 flex flex-col items-center justify-center gap-4 p-8">
                        <div
                            class="w-20 h-20 rounded-full bg-gold/8 border border-gold/20 flex items-center justify-center">
                            <svg class="w-9 h-9 stroke-gold/50 fill-none" stroke-width="1.2" stroke-linecap="round"
                                stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                            </svg>
                        </div>
                        <div class="text-center">
                            <p class="text-[10px] font-bold tracking-[4px] uppercase text-gold/40">Ghana School of Law</p>
                            <p class="text-[14px] text-cloud/20 tracking-[2px] mt-1">Legal Education Act 2026 · Act 1170</p>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 h-1/3"
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
                        <a href="#"
                            class="ml-auto text-[14px] font-bold tracking-[2px] uppercase text-gold border border-gold/25 px-4 py-2 rounded hover:bg-gold/8 transition-colors">
                            READ MORE &rarr;
                        </a>
                    </div>
                </div>
            </div>

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
                            <article class="group cursor-pointer">
                                <h4
                                    class="font-serif font-semibold text-[15px] text-white leading-snug group-hover:text-gold transition-colors duration-200">
                                    {{ $mr['title'] }}
                                </h4>
                                <p class="text-[13px] text-cloud/45 leading-[1.6] mt-1.5 line-clamp-2">{{ $mr['excerpt'] }}
                                </p>
                                <p class="text-[10px] font-bold tracking-[2px] uppercase text-cloud/30 mt-2">
                                    {{ $mr['cat'] }}</p>
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
                    <div class="flex gap-8 border-b border-gray-200 mb-10">
                        <button
                            class="text-[10px] font-bold tracking-[3px] uppercase text-navy py-4 border-b-2 border-gold -mb-px">RECENT
                            POSTS</button>
                        <button
                            class="text-[10px] font-bold tracking-[3px] uppercase text-gray-400 py-4 hover:text-navy/60 transition-colors">ALL
                            CATEGORIES</button>
                    </div>

                    <div class="space-y-12">

                        {{-- Feed: horizontal article cards (articles 3 & 5) --}}
                        @foreach ([$articles[3], $articles[5]] as $fa)
                            <article
                                class="flex flex-col md:flex-row gap-6 group p-4 -mx-4 hover:bg-gray-50 rounded-xl transition-colors duration-200">
                                <div class="md:w-1/3 aspect-[4/3] overflow-hidden rounded-lg flex-shrink-0 flex items-center justify-center"
                                    style="background:linear-gradient(135deg,#071e2f,#0c4a6e)">
                                    <svg class="w-10 h-10 stroke-gold/25 fill-none" stroke-width="1" stroke-linecap="round"
                                        stroke-linejoin="round" viewBox="0 0 24 24">
                                        {!! $fa['icon'] !!}
                                    </svg>
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
                                        <a href="#"
                                            class="ml-auto text-[10px] font-bold tracking-[2px] uppercase text-gold hover:underline">
                                            READ MORE &rarr;
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach

                        {{-- Bento: 2-col mini-cards (articles 0 & 1) --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-t border-gray-200 pt-12">
                            @foreach ([$articles[0], $articles[1]] as $bc)
                                <article class="group cursor-pointer">
                                    <div class="w-full aspect-video rounded-lg overflow-hidden mb-4 flex items-center justify-center"
                                        style="background:linear-gradient(135deg,#051b2c,#0c4a6e)">
                                        <svg class="w-8 h-8 stroke-gold/20 fill-none" stroke-width="1"
                                            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                            {!! $bc['icon'] !!}
                                        </svg>
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
                                        <a href="#"
                                            class="text-[10px] font-bold tracking-[2px] uppercase text-gold hover:underline">READ
                                            &rarr;</a>
                                    </div>
                                </article>
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
