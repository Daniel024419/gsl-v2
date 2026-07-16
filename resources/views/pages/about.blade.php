@extends('layouts.app')
@section('title', 'About Ghana School of Law')
@section('description', 'Learn about GSL - history, transformation under CLET Act 1170, vision, mission, and
    governance.')
@section('content')

    <section class="relative pt-[72px] min-h-[300px] flex items-end pb-14 px-[5%]"
        style="background:linear-gradient(135deg,#030f1a 0%,#0c4a6e 50%,#051b2c 100%)">
        <div class="max-w-6xl mx-auto w-full">
            <p class="text-[11px] font-bold text-gold/70 tracking-[3px] uppercase mb-3">About Ghana School of Law</p>
            <h1 class="font-serif font-semibold text-white leading-[1.1] mb-4" style="font-size:clamp(32px,5vw,58px)">Ghana's
                Premier<br><span class='text-gold'>Legal Training</span> Institution</h1>
            <p class="text-[16px] text-cloud/62 max-w-xl leading-[1.7]">Established in 1963, the Ghana School of Law now
                operates as a Directorate of CLET under the Legal Education Act, 2026 (Act 1170).</p>
        </div>
    </section>

    {{-- History --}}
    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <p class="text-[11px] font-bold text-gold tracking-[3px] uppercase mb-3">Our History</p>
                <h2 class="font-serif font-semibold text-navy text-[34px] leading-[1.2] mb-5">
                    Over Six Decades of<br><span class="text-gold">Legal Excellence</span>
                </h2>
                <div class="w-10 h-[3px] bg-gold rounded-full mb-6"></div>
                <p class="text-[15px] text-gray-600 leading-[1.8] mb-5">
                    The Ghana School of Law was established in 1963 to provide professional legal education
                    for law graduates seeking to be called to the Bar. For over six decades, GSL has been
                    the cornerstone of legal professional development in Ghana, producing over 12,000 qualified lawyers.
                </p>
                <p class="text-[15px] text-gray-600 leading-[1.8]">
                    In 2026, the Legal Education Act (Act 1170) transformed the institution. GSL became a
                    Directorate of the newly established Council for Legal Education and Training (CLET),
                    operating within a broader national framework for legal education quality and standards.
                </p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                @foreach ([['1963', 'GSL Founded'], ['12,226+', 'Lawyers Enrolled'], ['3', 'Campuses'], ['2026', 'Act 1170']] as $f)
                    <div class="p-6 rounded-xl bg-gray-50 border border-gray-200 text-center">
                        <p class="font-serif font-bold text-gold text-[32px] mb-1">{{ $f[0] }}</p>
                        <p class="text-[11px] text-gray-500 uppercase tracking-[1.5px] font-semibold">{{ $f[1] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Transformation --}}
    <section class="py-20 px-[5%] bg-navy">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <p class="text-[11px] font-bold text-gold tracking-[3px] uppercase mb-3">Act 1170 Transformation</p>
                <h2 class="font-serif font-semibold text-white text-[34px]">What Changed Under <span class="text-gold">Act
                        1170</span></h2>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="p-8 rounded-xl border border-red-500/20 bg-red-500/5">
                    <p class="text-[11px] font-bold text-red-400 tracking-[2px] uppercase mb-5">Before (Pre-Act 1170)</p>
                    @foreach (['Sole provider of professional legal education in Ghana', 'Set own standards and regulations independently', 'Operated autonomously with own Board of Governors', 'No external quality assurance or accreditation review', 'Delivered only the Law Practice Training Course'] as $b)
                        <div class="flex items-start gap-3 mb-3 text-[14px] text-cloud/60">
                            <span class="text-red-400 mt-0.5 flex-shrink-0">&#10005;</span>{{ $b }}
                        </div>
                    @endforeach
                </div>
                <div class="p-8 rounded-xl border border-gold/20 bg-gold/5">
                    <p class="text-[11px] font-bold text-gold tracking-[2px] uppercase mb-5">After (Under Act 1170)</p>
                    @foreach (['Directorate of CLET - part of national legal education system', 'Operates under CLET accreditation and quality standards', 'Reports to CLET Director-General; governed by CLET Board', 'Annual mandatory inspections by CLET', 'Four distinct programmes including two new statutory roles'] as $a)
                        <div class="flex items-start gap-3 mb-3 text-[14px] text-cloud/75">
                            <span class="text-gold mt-0.5 flex-shrink-0">&#10003;</span>{{ $a }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Vision / Mission / Values --}}
    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <p class="text-[11px] font-bold text-gold tracking-[3px] uppercase mb-3">Our Identity</p>
                <h2 class="font-serif font-semibold text-navy text-[34px]">Vision, Mission <span class="text-gold">&amp;
                        Values</span></h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ([['Vision', 'To be Ghana\'s leading centre of professional legal education, producing competent, ethical, and innovative legal practitioners of international standing.'], ['Mission', 'To deliver high-quality professional legal education and training, support Bar Examination candidates, and serve as the gateway for international lawyers entering Ghana\'s legal profession.'], ['Values', 'Excellence · Integrity · Innovation · Inclusion · Collaboration · Service to the Legal Profession and to Ghana.']] as $v)
                    <div class="p-8 rounded-xl border border-gray-200 bg-gray-50 text-center">
                        <h3 class="font-serif font-semibold text-[20px] text-navy mb-4 pb-4 border-b border-gray-200">
                            {{ $v[0] }}</h3>
                        <p class="text-[14px] text-gray-600 leading-[1.75]">{{ $v[1] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CLET Governance --}}
    <section class="py-20 px-[5%] bg-navy">
        <div class="max-w-2xl mx-auto text-center">
            <p class="text-[11px] font-bold text-gold tracking-[3px] uppercase mb-3">Governance Structure</p>
            <h2 class="font-serif font-semibold text-white text-[34px] mb-10">GSL within <span class="text-gold">CLET</span>
            </h2>
            <div class="flex flex-col items-center gap-2">
                @foreach ([['CLET Board', 'Governing body for all legal education in Ghana', false], ['CLET Director-General', 'Executive head of CLET', false], ['Ghana School of Law', 'Directorate of CLET - delivers all GSL programmes', true], ['GSL Principal', 'Head of GSL, reports to CLET Director-General', false]] as $i => $g)
                    @if ($i > 0)
                        <div class="w-px h-5 bg-gold/30"></div>
                    @endif
                    <div
                        class="w-full max-w-sm px-6 py-4 rounded-lg border {{ $g[2] ? 'border-gold bg-gold/10' : 'border-gold/15 bg-navy-mid' }}">
                        <p class="{{ $g[2] ? 'text-gold' : 'text-white' }} font-semibold text-[15px] mb-1">
                            {{ $g[0] }}</p>
                        <p class="text-[12px] text-cloud/50">{{ $g[1] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
