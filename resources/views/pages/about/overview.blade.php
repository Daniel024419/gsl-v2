@extends('layouts.app')
@section('title', 'Overview – Ghana School of Law')
@section('description', 'An overview of the Ghana School of Law - vision, mission, and core values.')
@section('content')

    <section class="relative pt-[97px] md:pt-[133px] min-h-[300px] flex items-end pb-14 px-[5%]"
        style="background:linear-gradient(135deg,#030f1a 0%,#0c4a6e 50%,#051b2c 100%)">
        <div class="max-w-6xl mx-auto w-full">
            <p class="text-[14px] font-bold text-gold/70 tracking-[3px] uppercase mb-3">About Ghana School of Law</p>
            <h1 class="font-serif font-semibold text-white leading-[1.1] mb-4" style="font-size:clamp(32px,5vw,58px)">
                Overview</h1>
            <p class="text-[16px] text-cloud/62 max-w-xl leading-[1.7]">Ghana's premier institution for professional
                legal training, operating as a Directorate of CLET under the Legal Education Act, 2026 (Act 1170).</p>
        </div>
    </section>

    {{-- Vision / Mission / Values --}}
    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3">Our Identity</p>
                <h2 class="font-serif font-semibold text-navy text-[34px]">Vision, Mission <span class="text-gold">&amp;
                        Values</span></h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($pillars as $v)
                    <div class="p-8 rounded-xl border border-gray-200 bg-gray-50 text-center">
                        <h3 class="font-serif font-semibold text-[20px] text-navy mb-4 pb-4 border-b border-gray-200">
                            {{ $v->title }}</h3>
                        <p class="text-[15px] text-gray-600 leading-[1.75]">{{ $v->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Institutional Overview --}}
    <section class="py-20 px-[5%] bg-gray-50">
        <div class="max-w-4xl mx-auto">
            <div class="space-y-5 text-[15px] text-gray-600 leading-[1.8] mb-10">
                <p>The Ghana School of Law was established in <strong class="text-navy">1958</strong>, by Ghana's
                    first President <strong class="text-navy">Dr. Kwame Nkrumah</strong>, and was the first of its
                    kind in <strong class="text-navy">Sub-Saharan Africa</strong>. The school is the leading Law
                    School in the sub-region and serves students from other Commonwealth countries in the
                    sub-region.</p>
                <p>To cater to the increasing number of applicants both from within the country and beyond, the
                    School currently has two additional campuses to the main campus namely the
                    <strong class="text-navy">Kumasi</strong> campus based at the Kwame Nkrumah University of
                    Science and Technology (KNUST), and the <strong class="text-navy">Greenhill Legon</strong>
                    campus based at the Ghana Institute of Management and Public Administration (GIMPA) and UPSA.
                </p>
                <p>We are indeed proud of our numerous alumni who are serving in various capacities throughout the
                    world and advancing the cause of justice.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach ($messages as $m)
                    <a href="#msg-{{ $m->slug }}"
                        class="flex items-center justify-center text-center p-6 rounded-xl bg-white border border-gray-200 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                        <span
                            class="font-serif font-semibold text-navy text-[15px] uppercase tracking-[1px]">{{ $m->heading }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Objectives full --}}
    <section class="py-20 px-[5%] bg-navy">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-14">
                <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3">
                    What We Do
                </p>

                <h2 class="font-serif font-semibold text-white text-[34px]">
                    Our Objectives
                </h2>

                <p class="mt-4 text-white/75 max-w-2xl mx-auto leading-7">
                    We are committed to delivering quality legal education, professional development,
                    and practical training for the legal profession.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                @foreach ($objectives as $o)
                    <div
                        class="group bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-gold/15">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gold" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>

                            <p class="text-[15px] leading-7 text-gray-700">
                                {{ $o->text }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Messages --}}
    @foreach ($messages as $m)
        <section class="py-20 px-[5%] {{ $loop->even ? 'bg-gray-50' : 'bg-white' }}" id="msg-{{ $m->slug }}">
            <div class="max-w-4xl mx-auto">
                <img src="{{ $m->image_url }}" alt="{{ $m->name }}" loading="lazy"
                    class="float-right ml-6 mb-4 w-40 h-40 rounded-full object-cover border-2 border-gold">
                <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3">A Message</p>
                <h2 class="font-serif font-semibold text-navy text-[30px] leading-[1.2] mb-6">{{ $m->heading }}
                </h2>
                <div class="space-y-5 text-[15px] text-gray-600 leading-[1.8]">
                    @foreach ($m->body as $paragraph)
                        <p>
                            @if ($loop->first)
                                <strong class="text-navy">{{ $paragraph }}</strong>
                            @else
                                {{ $paragraph }}
                            @endif
                        </p>
                    @endforeach
                    <p class="pt-2">
                        <strong class="text-navy block">{{ $m->name }}</strong>
                        <strong class="text-navy block">{{ $m->signature_title }}</strong>
                    </p>
                </div>
            </div>
        </section>
    @endforeach

@endsection
