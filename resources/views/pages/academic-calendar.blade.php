@extends('layouts.app')
@section('title', 'Academic Calendar – Ghana School of Law')
@section('description', 'Key academic dates at the Ghana School of Law for the 2026/2027 academic year.')
@section('content')

    @php
        $calendar = [
            ['31 July 2026', 'Application Deadline', 'Deadline for all 2026/2027 programme applications.'],
            [
                '15 August 2026',
                'Entrance Examination',
                'Entrance examination for shortlisted LPTC 2026/2027 applicants.',
            ],
            [
                '01 September 2026',
                'Pre-Bar Course Commences',
                'The official start of the 2026/2027 Pre-Bar Course academic year.',
            ],
            [
                '07 November 2026',
                'Orientation – Kumasi',
                'Orientation for new students joining the Kumasi campus cohort.',
            ],
            ['10 November 2026', 'Call to the Bar 2026', 'Annual ceremony calling qualified lawyers to the Ghana Bar.'],
            [
                '14 January 2027',
                'Induction Ceremony',
                'New student induction for the 2026/2027 academic year across all GSL campuses.',
            ],
        ];
    @endphp

    <section class="relative pt-[97px] md:pt-[133px] min-h-[300px] flex items-end pb-14 px-[5%]"
        style="background:linear-gradient(135deg,#030f1a 0%,#0c4a6e 50%,#051b2c 100%)">
        <div class="max-w-6xl mx-auto w-full">
            <p class="text-[14px] font-bold text-gold/70 tracking-[3px] uppercase mb-3">Academics</p>
            <h1 class="font-serif font-semibold text-white leading-[1.1] mb-4" style="font-size:clamp(32px,5vw,58px)">
                Academic Calendar</h1>
            <p class="text-[16px] text-cloud/62 max-w-xl leading-[1.7]">Key dates for the 2026/2027 academic year -
                applications, examinations, and important ceremonies.</p>
        </div>
    </section>

    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-3xl mx-auto">
            <div class="flex flex-col gap-4">
                @foreach ($calendar as $c)
                    <div class="flex gap-6 items-start p-6 rounded-xl border border-gray-200 bg-gray-50">
                        <p class="text-[14px] font-bold tracking-[1.5px] uppercase text-gold w-32 flex-shrink-0 pt-0.5">
                            {{ $c[0] }}</p>
                        <div>
                            <h3 class="font-serif font-semibold text-[17px] text-navy mb-1">{{ $c[1] }}</h3>
                            <p class="text-[14px] text-gray-600 leading-[1.65]">{{ $c[2] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <p class="mt-8 text-[14px] text-gray-500 text-center">See the full <a href="{{ route('events') }}"
                    class="text-gold hover:underline">Events Calendar</a> for ceremonies, orientations, and
                institutional events.</p>
        </div>
    </section>

@endsection
