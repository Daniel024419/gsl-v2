@extends('layouts.app')
@section('title', 'Events – Ghana School of Law')
@section('description',
    'Upcoming events at the Ghana School of Law - inductions, orientations, Call to the Bar
    ceremonies, and more.')
@section('content')

    @php
        $events = [
            [
                '14',
                'January',
                '2027',
                '10:00 – 12:00',
                'Induction Ceremony',
                'New student induction for the 2026/2027 academic year across all GSL campuses.',
                'All Campuses',
            ],
            [
                '07',
                'November',
                '2026',
                '10:00 – 12:00',
                'Orientation – Kumasi',
                'Orientation for new students joining the Kumasi campus cohort.',
                'Kumasi Campus',
            ],
            [
                '10',
                'November',
                '2026',
                '10:00 – 12:00',
                'Call to the Bar 2026',
                'Annual ceremony calling qualified lawyers to the Ghana Bar.',
                'Accra',
            ],
            [
                '01',
                'September',
                '2026',
                '08:00 – 17:00',
                'Pre-Bar Course Commences',
                'The official start of the 2026/2027 Pre-Bar Course academic year.',
                'All Campuses',
            ],
            [
                '15',
                'August',
                '2026',
                '09:00 – 13:00',
                'Entrance Examination',
                'Entrance examination for shortlisted LPTC 2026/2027 applicants.',
                'Accra',
            ],
            [
                '31',
                'July',
                '2026',
                '23:59',
                'Application Deadline',
                'Deadline for all 2026/2027 programme applications.',
                'Online Portal',
            ],
        ];
    @endphp

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

    {{-- ══ EVENTS GRID ════════════════════════════════════════════════════ --}}
    <section class="px-[5%] pt-[45px] pb-28 bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($events as $ev)
                    <div
                        class="group flex flex-col bg-gray-50 border border-gray-200 rounded-xl hover:bg-white hover:shadow-lg transition-all duration-500 cursor-pointer">
                        <div
                            class="p-8 flex flex-col h-full border-t-2 border-gold/0 group-hover:border-gold transition-all duration-500 rounded-xl">

                            {{-- Date row --}}
                            <div class="flex items-start justify-between mb-8">
                                <div class="flex flex-col leading-none">
                                    <span class="font-serif font-bold text-gold leading-none mb-1.5"
                                        style="font-size:clamp(44px,5vw,58px)">{{ $ev[0] }}</span>
                                    <span
                                        class="text-[10px] font-bold tracking-[3px] uppercase text-gray-500">{{ $ev[1] }}</span>
                                </div>
                                <span
                                    class="text-[10px] font-bold tracking-[2px] uppercase text-gray-400 mt-1">{{ $ev[2] }}</span>
                            </div>

                            {{-- Time --}}
                            <span
                                class="text-[10px] font-bold tracking-[3px] uppercase text-gold/70 mb-3.5">{{ $ev[3] }}</span>

                            {{-- Title --}}
                            <h3
                                class="font-serif font-semibold text-[19px] text-navy leading-snug mb-5 group-hover:translate-x-1 transition-transform duration-300">
                                {{ $ev[4] }}
                            </h3>

                            {{-- Description --}}
                            <p class="text-[14px] text-gray-600 leading-[1.75] flex-grow mb-10">{{ $ev[5] }}</p>

                            {{-- Location --}}
                            <div class="flex items-center gap-2.5 text-gray-400 pt-5 border-t border-gray-200">
                                @if ($ev[6] === 'Online Portal')
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
                                    class="text-[14px] font-bold tracking-[2px] uppercase text-gray-500">{{ $ev[6] }}</span>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
