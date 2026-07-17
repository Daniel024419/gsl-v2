@extends('layouts.app')
@section('title', 'Ghana School of Law – Your Journey to the Bar Starts Here')
@section('description',
    'Ghana School of Law – Your official pathway to the Ghana Bar. LPTC, Post-Call Course, Bar Exam
    Preparation and Specialised Professional Development under CLET Act 1170.')
@section('content')

    {{-- HERO --}}
    <section class="relative min-h-screen flex flex-col justify-center pt-[72px] pb-16 px-[5%] overflow-hidden bg-navy-dark">
        {{-- Blurred building photo --}}
        <div class="absolute inset-0 scale-110"
            style="background:url('/GSL.png') center/cover no-repeat; filter:blur(5px) brightness(0.32);">
        </div>
        {{-- Dark navy/teal gradient overlay for brand tone --}}
        <div class="absolute inset-0"
            style="background:linear-gradient(135deg,rgba(3,15,26,0.72) 0%,rgba(12,74,110,0.45) 55%,rgba(5,27,44,0.72) 100%)">
        </div>
        {{-- Subtle gold grid texture --}}
        <div class="absolute inset-0 opacity-[0.10]"
            style="background-image:url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%2280%22 height=%2280%22><g fill=%22%23b8960c%22 fill-opacity=%220.15%22><path d=%22M40 46v-6h-3v6h-6v3h6v6h3v-6h6v-3h-6zm0-40V0h-3v6h-6v3h6v6h3V9h6V6h-6z%22/></g></svg>')">
        </div>
        <div class="relative z-10 max-w-6xl mx-auto w-full">

            <p class="text-[13px] text-gold/70 tracking-[3px] uppercase mb-3 font-light">Ghana School of Law</p>
            <h1 class="font-serif font-semibold text-white leading-[1.08] mb-6 max-w-[860px]"
                style="font-size:clamp(44px,7vw,88px)">
                Your Journey to<br>the <span class="text-gold">Bar</span> Starts Here
            </h1>
            <p class="font-light text-cloud/80 leading-[1.75] max-w-[560px] mb-11" style="font-size:clamp(16px,1.8vw,20px)">
                Statutory administration, professional legal training, and the official pathway
                to Ghana's Bar - now under CLET (Act 1170).
            </p>
            <div class="flex gap-4 flex-wrap items-center">
                <a href="https://forms.gslaw.school/surveys/23" target="_blank" rel="noopener"
                    class="inline-flex items-center gap-2 px-7 py-3.5 text-[14px] font-semibold
                      bg-gold text-navy rounded hover:bg-gold-light hover:-translate-y-0.5 transition-all duration-200">
                    Apply Now
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" viewBox="0 0 24 24">
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <polyline points="12 5 19 12 12 19" />
                    </svg>
                </a>
                <a href="{{ route('programmes') }}"
                    class="inline-flex items-center gap-2 px-7 py-[13px] text-[14px] font-medium
                      border border-cloud/30 text-cloud rounded hover:border-gold hover:text-gold transition-all duration-200">
                    Explore Programmes
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </a>
            </div>
            <div class="flex flex-col items-center gap-2 mt-16 text-cloud/35 text-[10px] tracking-[3px] uppercase">
                <div class="w-px h-11 bg-gradient-to-b from-gold/60 to-transparent scroll-pulse"></div>
                <span>Scroll</span>
            </div>
        </div>
    </section>

    {{-- STATS --}}
    <div class="border-t border-b border-gray-100 bg-white">
        <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-3 divide-y sm:divide-y-0 sm:divide-x divide-gray-100">
            @foreach ([['961', 'Called to the Bar 2025', 'Main call 824 · Mini call 137'], ['513', 'Female Lawyers Called 2025', 'Main call 453 · Mini call 60'], ['12,226', 'Lawyers Enrolled to Bar', 'Since GSL was founded in 1963']] as $stat)
                <div class="flex flex-col items-center text-center px-8 py-10">
                    <span class="font-serif font-bold text-gold leading-none mb-2"
                        style="font-size:clamp(40px,5vw,64px)">{{ $stat[0] }}</span>
                    <span
                        class="text-[12px] font-semibold text-navy tracking-[1.5px] uppercase mb-1">{{ $stat[1] }}</span>
                    <span class="text-[12px] text-navy/40">{{ $stat[2] }}</span>
                </div>
            @endforeach
        </div>
    </div>

    {{-- MISSION --}}
    <section class="py-24 px-[5%] bg-white">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">
            <div class="relative">
                <div class="w-full aspect-[4/3] rounded-lg flex flex-col items-center justify-center"
                    style="background:linear-gradient(135deg,#0c4a6e,#051b2c)">
                    <p class="text-[10px] font-bold text-gold/60 tracking-[3px] uppercase mb-3">Ghana School of Law</p>
                    <p class="font-serif text-[22px] font-semibold text-white/70">Centre of Excellence</p>
                    <div class="w-10 h-0.5 bg-gold rounded-full my-4"></div>
                    <p class="text-[12px] text-cloud/40">Accra · Kumasi</p>
                </div>
                <div class="absolute -bottom-5 -right-5 bg-gold text-navy px-6 py-5 rounded-lg shadow-lg">
                    <span class="block font-serif font-bold text-[34px] leading-none">1963</span>
                    <span class="text-[10px] font-bold tracking-[2px] uppercase">Est.</span>
                </div>
            </div>
            <div>
                <p class="text-[13px] font-bold text-gold tracking-[3px] uppercase mb-3">Our New Role Under Act 1170</p>
                <h2 class="font-serif font-semibold text-navy leading-[1.2] mb-4" style="font-size:clamp(28px,3.5vw,44px)">
                    Shape Ghana's<br><span class="text-gold">Legal Future</span>
                </h2>
                <div class="w-11 h-[3px] bg-gold rounded-full mb-6"></div>
                <p class="text-[15px] text-navy/65 leading-[1.8] mb-7 max-w-[520px]">
                    As a Directorate of CLET, the Ghana School of Law has evolved into a multifaceted institution -
                    delivering world-class professional legal education, serving international lawyers, and advancing
                    Ghana's legal profession under rigorous national standards.
                </p>
                <ul class="flex flex-col gap-3 mb-8">
                    @foreach (['Delivers the Law Practice Training Course as an accredited provider', 'Exclusively offers the Post-Call Course for foreign lawyers', 'Provides National Bar Examination remedial courses', 'Designs specialised professional development programmes', 'Operates under CLET accreditation with annual inspections'] as $pt)
                        <li class="flex items-start gap-3 text-[14px] text-navy/70 leading-[1.6]">
                            <span
                                class="mt-1 w-5 h-5 rounded-full border border-gold bg-gold/10 flex items-center justify-center flex-shrink-0">
                                <svg class="w-2.5 h-2.5" fill="none" stroke="#b8960c" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </span>
                            {{ $pt }}
                        </li>
                    @endforeach
                </ul>
                <a href="{{ route('about') }}"
                    class="inline-flex items-center gap-2 px-7 py-3.5 text-[14px] font-semibold
                      bg-gold text-navy rounded hover:bg-gold-light hover:-translate-y-0.5 transition-all duration-200">
                    Learn More About GSL
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" viewBox="0 0 24 24">
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <polyline points="12 5 19 12 12 19" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- JOURNEY --}}
    <div class="border-t border-b border-gold/10 py-12 px-[5%] bg-navy">
        <div class="max-w-6xl mx-auto flex flex-wrap items-center justify-center">
            @foreach ([['1', 'Pre-Bar Course', 'GSL'], null, ['2', 'Law Practice Training', 'LPT'], null, ['3', 'National Bar Examination', 'Assessment'], null, ['4', 'Call to the Bar', 'Legal Practice']] as $s)
                @if ($s)
                    <div class="flex flex-col items-center text-center px-6 sm:px-10 py-4">
                        <div
                            class="w-12 h-12 rounded-full border-2 border-gold flex items-center justify-center font-serif font-bold text-[18px] text-gold mb-3">
                            {{ $s[0] }}</div>
                        <p class="text-[13px] font-bold text-white mb-1">{{ $s[1] }}</p>
                        <p class="text-[10px] font-bold text-gold/65 tracking-[1.5px] uppercase">{{ $s[2] }}</p>
                    </div>
                @else
                    <div class="text-gold/30 text-xl px-1 py-4">&#8594;</div>
                @endif
            @endforeach
        </div>
    </div>

    {{-- ══ PROGRAMMES CAROUSEL ══════════════════════════════════════════ --}}
    <section class="py-24 px-[5%] bg-gray-50" data-carousel="programmes">
        <div class="max-w-6xl mx-auto">

            {{-- Header with inline nav --}}
            <div class="flex flex-wrap items-end justify-between gap-4 mb-10">
                <div>
                    <p class="text-[13px] font-bold text-gold tracking-[3px] uppercase mb-3">Our Programmes</p>
                    <h2 class="font-serif font-semibold text-navy leading-[1.2]" style="font-size:clamp(28px,3.5vw,44px)">
                        Four Pathways to <span class="text-gold">Legal Excellence</span>
                    </h2>
                </div>
                <div class="flex items-center gap-3">
                    <button data-carousel-prev
                        class="w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center text-navy/50 hover:border-gold hover:text-gold shadow-sm transition-all duration-200"
                        aria-label="Previous programme">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <polyline points="15 18 9 12 15 6" />
                        </svg>
                    </button>
                    <button data-carousel-next
                        class="w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center text-navy/50 hover:border-gold hover:text-gold shadow-sm transition-all duration-200"
                        aria-label="Next programme">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <polyline points="9 18 15 12 9 6" />
                        </svg>
                    </button>
                    <a href="{{ route('admissions') }}"
                        class="ml-1 px-5 py-2.5 text-[13px] font-medium border border-navy/20 text-navy/55 rounded hover:border-gold hover:text-gold transition-all duration-200">
                        Admissions
                    </a>
                </div>
            </div>

            {{-- Track --}}
            <div data-carousel-track
                class="flex overflow-x-auto hide-scrollbar snap-x snap-mandatory rounded-xl border border-gold/8 bg-gold/8">
                @foreach ([
            ['01', 'Law Practice Training Course', 'The flagship one-year professional qualification. Bridges academic legal education with the realities of practice - civil procedure, criminal procedure, advocacy, conveyancing, and law of evidence.', '1 Academic Year', 'September 2026', 'Accra · Kumasi', false, '<path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>'],
            ['02', 'Post-Call Law Course', "Ghana's exclusive statutory gateway for foreign lawyers and reciprocal jurisdiction candidates seeking enrolment on Ghana's Roll of Lawyers. Under Section 78, Act 1170 - only GSL delivers this.", '6–12 Months', 'Variable', 'Foreign / Reciprocal Lawyers', true, '<circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>'],
            ['03', 'Bar Examination Remedial Courses', 'Flexible, exam-focused preparation. Choose from intensive full-course prep (8–12 wks), subject-specific modules, mock examinations, or one-on-one tutoring with experienced faculty.', 'Flexible', 'Before Bar Exam', 'All Candidates', false, '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>'],
            ['04', 'Specialised Professional Development', 'Advanced courses for practising lawyers in emerging areas - technology & cyberlaw, ADR, corporate law, environmental law, and more. Masterclasses, certificates and professional diplomas.', 'Masterclass–Diploma', 'Rolling', 'Practising Lawyers', false, '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>'],
        ] as $p)
                    <div data-carousel-slide
                        class="relative bg-navy-mid p-10 hover:bg-teal/20 transition-colors duration-200
                        flex-shrink-0 w-full md:w-1/2 snap-start border-r border-gold/8 last:border-r-0">
                        @if ($p[6])
                            <span
                                class="absolute top-4 right-5 text-[10px] font-bold bg-gold text-navy px-2.5 py-1 rounded-full tracking-[1px] uppercase">Only
                                at GSL</span>
                        @endif
                        <p class="text-[13px] font-bold text-gold/45 tracking-[3px] uppercase mb-4">Programme
                            {{ $p[0] }}</p>
                        <div
                            class="w-12 h-12 rounded-lg bg-gold/8 border border-gold/20 flex items-center justify-center mb-5">
                            <svg class="w-6 h-6 stroke-gold fill-none" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" viewBox="0 0 24 24">{!! $p[7] !!}</svg>
                        </div>
                        <h3 class="font-serif font-semibold text-[20px] text-white mb-3 leading-snug">{{ $p[1] }}
                        </h3>
                        <p class="text-[14px] text-cloud/60 leading-[1.75] mb-6">{{ $p[2] }}</p>
                        <div class="flex flex-wrap gap-x-4 gap-y-1 mb-6">
                            @foreach ([['Duration', $p[3]], ['Start', $p[4]], ['For', $p[5]]] as $m)
                                <span class="text-[12px] text-cloud/45"><strong
                                        class="text-cloud/65 font-semibold">{{ $m[0] }}:</strong>
                                    {{ $m[1] }}</span>
                            @endforeach
                        </div>
                        <a href="{{ route('programmes') }}"
                            class="inline-flex items-center gap-1.5 text-[13px] font-semibold text-gold hover:gap-3 transition-all duration-200">
                            Learn More
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <line x1="5" y1="12" x2="19" y2="12" />
                                <polyline points="12 5 19 12 12 19" />
                            </svg>
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- Dots --}}
            <div data-carousel-dots class="flex items-center justify-center gap-2 mt-6"></div>
        </div>
    </section>

    {{-- WHY GSL --}}
    @php
        $whyGsl = [
            [
                'CLET Accredited',
                'Full CLET accreditation with rigorous annual inspections - ensuring Ghana and international quality standards are consistently met.',
                '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>',
            ],
            [
                'Expert Faculty',
                'Senior lecturers, practising lawyers, judges and industry leaders bringing decades of real-world Ghanaian legal experience.',
                '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
            ],
            [
                'Three Campuses',
                'Modern facilities in Accra and Kumasi - each with mock courtrooms, law libraries, computer labs and client suites.',
                '<rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/>',
            ],
        ];
    @endphp
    <section class="py-24 px-[5%] bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <p class="text-[13px] font-bold text-gold tracking-[3px] uppercase mb-3">Why Choose GSL</p>
                <h2 class="font-serif font-semibold text-navy leading-[1.2]" style="font-size:clamp(28px,3.5vw,44px)">
                    Ghana's Premier <span class="text-gold">Legal Training</span> Institution
                </h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                @foreach ($whyGsl as $c)
                    <div
                        class="p-8 rounded-xl bg-white border border-gray-100 shadow-sm hover:border-gold/35 hover:shadow-md hover:-translate-y-1 transition-all duration-200">
                        <div
                            class="w-11 h-11 rounded-lg bg-gold/8 border border-gold/20 flex items-center justify-center mb-5">
                            <svg class="w-5 h-5 stroke-gold fill-none" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" viewBox="0 0 24 24">{!! $c[2] !!}</svg>
                        </div>
                        <h3 class="font-serif font-semibold text-[17px] text-navy mb-2.5">{{ $c[0] }}</h3>
                        <p class="text-[14px] text-navy/58 leading-[1.7]">{{ $c[1] }}</p>
                    </div>
                @endforeach
            </div>
            <div class="mt-10 text-center">
                <a href="{{ route('about') }}"
                    class="inline-flex items-center gap-2 px-6 py-3 text-[13px] font-semibold
                      border border-gold text-gold rounded hover:bg-gold hover:text-navy transition-all duration-200">
                    View All Reasons to Choose GSL
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <polyline points="12 5 19 12 12 19" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- ADMISSIONS STRIP --}}
    <section class="py-16 px-[5%] border-t border-b border-gold/10 bg-navy-dark/60">
        <div class="max-w-6xl mx-auto flex flex-col lg:flex-row items-start lg:items-center justify-between gap-10">
            <div>
                <p class="text-[13px] font-bold text-gold tracking-[3px] uppercase mb-3">Admissions Open</p>
                <h2 class="font-serif font-semibold text-white leading-snug mb-3" style="font-size:clamp(22px,3vw,34px)">
                    Pre-Bar Course 2026/2027<br>Applications Now Open
                </h2>
                <p class="text-[15px] text-cloud/62 leading-[1.7] max-w-[540px]">
                    Open to LLB Graduates (Class of 2026), existing graduates, Ghanaians with LLB
                    from common law jurisdictions, and GTEC/GLC-accredited law faculty graduates.
                </p>
                <div class="flex flex-wrap gap-3 mt-5">
                    <div class="px-4 py-3 rounded-lg bg-gold/7 border border-gold/18">
                        <p class="text-[10px] font-bold text-gold tracking-[2px] uppercase mb-1">Admissions Contact</p>
                        <p class="text-[13px] text-cloud/75">+233 246 006 210</p>
                        <p class="text-[13px] text-cloud/75">helpdesk@gslaw.edu.gh</p>
                    </div>
                    <div class="px-4 py-3 rounded-lg bg-gold/7 border border-gold/18">
                        <p class="text-[10px] font-bold text-gold tracking-[2px] uppercase mb-1">Programme Starts</p>
                        <p class="font-serif font-semibold text-[18px] text-white">September 2026</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center gap-3 flex-shrink-0">
                <a href="https://forms.gslaw.school/surveys/23" target="_blank" rel="noopener"
                    class="inline-flex items-center gap-2 px-8 py-4 text-[15px] font-semibold
                      bg-gold text-navy rounded hover:bg-gold-light hover:-translate-y-0.5 transition-all duration-200">
                    Start Application
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" viewBox="0 0 24 24">
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <polyline points="12 5 19 12 12 19" />
                    </svg>
                </a>
                <p class="text-[13px] text-cloud/30">Or scan QR code at gslaw.edu.gh</p>
            </div>
        </div>
    </section>

    {{-- ══ EVENTS CAROUSEL ══════════════════════════════════════════════ --}}
    <section class="py-24 px-[5%] bg-white" data-carousel="events">
        <div class="max-w-6xl mx-auto">

            {{-- Header with nav --}}
            <div class="flex flex-wrap items-end justify-between gap-4 mb-10">
                <div>
                    <p class="text-[13px] font-bold text-gold tracking-[3px] uppercase mb-3">Events Calendar</p>
                    <h2 class="font-serif font-semibold text-navy leading-[1.2]" style="font-size:clamp(28px,3.5vw,44px)">
                        Upcoming <span class="text-gold">Events</span>
                    </h2>
                </div>
                <div class="flex items-center gap-2">
                    <button data-carousel-prev
                        class="w-9 h-9 rounded-full bg-white border border-gray-200 flex items-center justify-center text-navy/50 hover:border-gold hover:text-gold shadow-sm transition-all duration-200"
                        aria-label="Previous event">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <polyline points="15 18 9 12 15 6" />
                        </svg>
                    </button>
                    <button data-carousel-next
                        class="w-9 h-9 rounded-full bg-white border border-gray-200 flex items-center justify-center text-navy/50 hover:border-gold hover:text-gold shadow-sm transition-all duration-200"
                        aria-label="Next event">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <polyline points="9 18 15 12 9 6" />
                        </svg>
                    </button>
                    <a href="{{ route('events') }}"
                        class="ml-1 px-5 py-2 text-[13px] font-medium border border-navy/20 text-navy/55 rounded hover:border-gold hover:text-gold transition-all duration-200">
                        View All
                    </a>
                </div>
            </div>

            {{-- Track --}}
            <div data-carousel-track class="flex gap-5 overflow-x-auto hide-scrollbar snap-x snap-mandatory pb-2">
                @foreach ([['14', 'Jan', '10:00 – 12:00', 'Induction Ceremony', 'New student induction for the 2026/2027 academic year.'], ['07', 'Nov', '10:00 – 12:00', 'Orientation – Kumasi', 'Orientation session for students at the Kumasi campus.'], ['10', 'Nov', '10:00 – 12:00', 'Call to the Bar', 'Annual ceremony calling qualified lawyers to the Ghana Bar.']] as $ev)
                    <div data-carousel-slide
                        class="bg-white rounded-xl overflow-hidden border border-gray-100 hover:border-gold/35 hover:shadow-md transition-all duration-300
                        flex-shrink-0 snap-start w-[80vw] sm:w-[55vw] md:w-[42vw] lg:w-[calc(33.333%-14px)]">
                        <div class="flex items-baseline gap-2.5 bg-gold px-5 py-4">
                            <span
                                class="font-serif font-bold text-[38px] text-navy leading-none">{{ $ev[0] }}</span>
                            <span
                                class="text-[13px] font-bold text-navy uppercase tracking-wide">{{ $ev[1] }}</span>
                        </div>
                        <div class="p-5">
                            <p class="text-[13px] font-bold text-gold/80 tracking-[1.5px] uppercase mb-2">
                                {{ $ev[2] }}</p>
                            <h4 class="font-serif font-semibold text-[16px] text-navy mb-2">{{ $ev[3] }}</h4>
                            <p class="text-[13px] text-navy/55 leading-[1.6]">{{ $ev[4] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Dots --}}
            <div data-carousel-dots class="flex items-center justify-center gap-2 mt-6"></div>
        </div>
    </section>

    {{-- ══ NEWS CAROUSEL ════════════════════════════════════════════════ --}}
    <section class="py-24 px-[5%] bg-gray-50" data-carousel="news">
        <div class="max-w-6xl mx-auto">

            {{-- Header with nav --}}
            <div class="flex flex-wrap items-end justify-between gap-4 mb-10">
                <div>
                    <p class="text-[13px] font-bold text-gold tracking-[3px] uppercase mb-3">Latest News</p>
                    <h2 class="font-serif font-semibold text-navy leading-[1.2]" style="font-size:clamp(28px,3.5vw,44px)">
                        From the <span class="text-gold">School</span>
                    </h2>
                </div>
                <div class="flex items-center gap-2">
                    <button data-carousel-prev
                        class="w-9 h-9 rounded-full bg-white border border-gray-200 flex items-center justify-center text-navy/50 hover:border-gold hover:text-gold shadow-sm transition-all duration-200"
                        aria-label="Previous article">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <polyline points="15 18 9 12 15 6" />
                        </svg>
                    </button>
                    <button data-carousel-next
                        class="w-9 h-9 rounded-full bg-white border border-gray-200 flex items-center justify-center text-navy/50 hover:border-gold hover:text-gold shadow-sm transition-all duration-200"
                        aria-label="Next article">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <polyline points="9 18 15 12 9 6" />
                        </svg>
                    </button>
                    <a href="{{ route('news') }}"
                        class="ml-1 px-5 py-2 text-[13px] font-medium border border-navy/20 text-navy/55 rounded hover:border-gold hover:text-gold transition-all duration-200">
                        All News
                    </a>
                </div>
            </div>

            {{-- Track --}}
            <div data-carousel-track class="flex gap-5 overflow-x-auto hide-scrollbar snap-x snap-mandatory pb-2">
                @foreach ([['Institutional', 'Orientation 2025', 'The Ghana School of Law successfully held its 2025/2026 orientation for new students across all three campuses.', 'June 2025'], ['Events', 'Call to the Bar 2025', '961 lawyers were called to the Ghana Bar in 2025 - 513 female, marking a historic milestone for gender inclusion.', 'November 2025'], ['Academic', 'Act 1170 Transformation', 'GSL formally transitions to its new role as a Directorate of CLET under the Legal Education Act, 2026 (Act 1170).', '2026']] as $art)
                    <div data-carousel-slide
                        class="bg-white rounded-xl overflow-hidden border border-gray-100 hover:border-gold/35 hover:-translate-y-1 hover:shadow-md transition-all duration-300
                        flex-shrink-0 snap-start w-[80vw] sm:w-[55vw] md:w-[42vw] lg:w-[calc(33.333%-14px)] flex flex-col">
                        <div class="h-44 flex items-center justify-center flex-shrink-0"
                            style="background:linear-gradient(135deg,#0c4a6e,#051b2c)">
                            <span class="text-[10px] font-bold text-gold/50 tracking-[3px] uppercase">Ghana School of
                                Law</span>
                        </div>
                        <div class="p-5 flex flex-col flex-1">
                            <p class="text-[10px] font-bold text-gold tracking-[2px] uppercase mb-2.5">{{ $art[0] }}
                            </p>
                            <h4 class="font-serif font-semibold text-[16px] text-navy leading-snug mb-2 flex-1">
                                {{ $art[1] }}</h4>
                            <p class="text-[13px] text-navy/55 leading-[1.65] mb-3">{{ $art[2] }}</p>
                            <p class="text-[12px] text-navy/35">{{ $art[3] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Dots --}}
            <div data-carousel-dots class="flex items-center justify-center gap-2 mt-6"></div>
        </div>
    </section>

    {{-- CTA BANNER --}}
    <section class="py-20 px-[5%] text-center border-t border-b border-gold/15"
        style="background:linear-gradient(135deg,#0c4a6e 0%,#051b2c 100%)">
        <p class="text-[13px] font-bold text-gold tracking-[3px] uppercase mb-4">Your Legal Career Awaits</p>
        <h2 class="font-serif font-semibold text-white mb-4" style="font-size:clamp(28px,3.5vw,44px)">
            Ready to Join Ghana's Legal Profession?
        </h2>
        <p class="text-[17px] text-cloud/65 max-w-[500px] mx-auto leading-[1.7] mb-9">
            Applications for the September 2026 intake are open now. Take the first step toward your Call to the Bar.
        </p>
        <div class="flex gap-4 flex-wrap justify-center">
            <a href="https://forms.gslaw.school/surveys/23" target="_blank" rel="noopener"
                class="inline-flex items-center gap-2 px-8 py-4 text-[15px] font-semibold
                  bg-gold text-navy rounded hover:bg-gold-light hover:-translate-y-0.5 transition-all duration-200">
                Apply for September 2026
            </a>
            <a href="{{ route('about') }}"
                class="inline-flex items-center gap-2 px-8 py-[15px] text-[15px] font-medium
                  border border-cloud/25 text-cloud rounded hover:border-gold hover:text-gold transition-all duration-200">
                Learn About GSL
            </a>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        (function() {
            'use strict';

            // ── dot class helpers ──────────────────────────────────────────
            const DOT_ACTIVE = 'h-1.5 rounded-full bg-gold transition-all duration-300 w-6';
            const DOT_INACTIVE = 'h-1.5 rounded-full bg-navy/20 transition-all duration-300 w-1.5';

            document.querySelectorAll('[data-carousel]').forEach(function(section) {
                const track = section.querySelector('[data-carousel-track]');
                const slides = Array.from(track.querySelectorAll('[data-carousel-slide]'));
                const wrap = section.querySelector('[data-carousel-dots]');
                const prevBtn = section.querySelector('[data-carousel-prev]');
                const nextBtn = section.querySelector('[data-carousel-next]');

                if (!track || slides.length === 0) return;

                let cur = 0;

                // ── build dots ─────────────────────────────────────────────
                slides.forEach(function(_, i) {
                    var d = document.createElement('button');
                    d.setAttribute('aria-label', 'Go to slide ' + (i + 1));
                    d.className = i === 0 ? DOT_ACTIVE : DOT_INACTIVE;
                    d.addEventListener('click', function() {
                        go(i);
                    });
                    wrap && wrap.appendChild(d);
                });

                function syncDots() {
                    if (!wrap) return;
                    Array.from(wrap.children).forEach(function(d, i) {
                        d.className = i === cur ? DOT_ACTIVE : DOT_INACTIVE;
                    });
                }

                // ── scroll to slide ────────────────────────────────────────
                function go(index) {
                    var n = slides.length;
                    cur = ((index % n) + n) % n;
                    var gap = parseFloat(getComputedStyle(track).gap) || 0;
                    track.scrollTo({
                        left: cur * (slides[0].offsetWidth + gap),
                        behavior: 'smooth'
                    });
                    syncDots();
                }

                prevBtn && prevBtn.addEventListener('click', function() {
                    go(cur - 1);
                });
                nextBtn && nextBtn.addEventListener('click', function() {
                    go(cur + 1);
                });

                // ── sync dots on native scroll / swipe ─────────────────────
                var scrollTimer;
                track.addEventListener('scroll', function() {
                    clearTimeout(scrollTimer);
                    scrollTimer = setTimeout(function() {
                        var gap = parseFloat(getComputedStyle(track).gap) || 0;
                        var w = slides[0].offsetWidth + gap;
                        var n = Math.round(track.scrollLeft / w);
                        if (n !== cur) {
                            cur = n;
                            syncDots();
                        }
                    }, 60);
                }, {
                    passive: true
                });
            });
        }());
    </script>
@endpush
