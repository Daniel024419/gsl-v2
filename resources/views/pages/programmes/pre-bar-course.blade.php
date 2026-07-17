@extends('layouts.app')
@section('title', 'Pre-Bar Course – Ghana School of Law')
@section('description',
    'The Pre-Bar Course at GSL - curriculum, eligibility, and how it prepares LLB graduates for the
    Law Practice Training Course.')
@section('content')

    <section class="relative pt-[97px] md:pt-[133px] min-h-[300px] flex items-end pb-14 px-[5%]"
        style="background:linear-gradient(135deg,#030f1a 0%,#0c4a6e 50%,#051b2c 100%)">
        <div class="max-w-6xl mx-auto w-full">
            <p class="text-[14px] font-bold text-gold/70 tracking-[3px] uppercase mb-3">Our Programmes</p>
            <h1 class="font-serif font-semibold text-white leading-[1.1] mb-4" style="font-size:clamp(32px,5vw,58px)">
                Pre-Bar Course</h1>
            <p class="text-[16px] text-cloud/62 max-w-xl leading-[1.7]">A preparatory programme for LLB graduates
                ahead of the Law Practice Training Course, for the 2026/2027 academic year.</p>
        </div>
    </section>

    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <h3 class="font-serif font-semibold text-[20px] text-navy mb-5">Who Can Apply?</h3>
                <div class="space-y-3">
                    @foreach (['LLB Graduates - Class of 2026', 'Existing LLB graduates (all years)', 'Ghanaian nationals with LLB from common law jurisdictions', 'Graduates from GTEC/GLC-accredited law faculties'] as $e)
                        <div class="flex items-center gap-3 p-4 rounded-lg bg-gray-50 border border-gray-200">
                            <div
                                class="w-8 h-8 rounded-full border border-gold bg-gold/10 flex items-center justify-center flex-shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="#b8960c" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </div>
                            <p class="text-[15px] text-gray-700">{{ $e }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <h3 class="font-serif font-semibold text-[20px] text-navy mb-5">Course Modules</h3>
                <div class="grid grid-cols-2 gap-2.5 mb-6">
                    @foreach (['Company Law', 'Commercial Law', 'Alternative Dispute Resolution', 'Family Law', 'Interpretation of Deeds & Statutes', 'Approved Electives'] as $m)
                        <div class="px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 text-[14px] text-gray-600">
                            {{ $m }}</div>
                    @endforeach
                </div>
                <a href="{{ route('admissions') }}"
                    class="inline-flex items-center gap-2 px-7 py-3.5 text-[15px] font-semibold bg-gold text-navy rounded hover:bg-gold-light hover:-translate-y-0.5 transition-all">
                    Apply for the Pre-Bar Course
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" viewBox="0 0 24 24">
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <polyline points="12 5 19 12 12 19" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

@endsection
