@extends('layouts.app')
@section('title', 'Law Practice Training (LPT) – Ghana School of Law')
@section('description',
    'The Law Practice Training (LPT) Programme under Act 1170 - the 1-year professional legal
    training stage on the path to the Ghana Bar.')
@section('content')

    <section class="relative pt-[97px] md:pt-[133px] min-h-[300px] flex items-end pb-14 px-[5%]"
        style="background:linear-gradient(135deg,#030f1a 0%,#0c4a6e 50%,#051b2c 100%)">
        <div class="max-w-6xl mx-auto w-full">
            <p class="text-[14px] font-bold text-gold/70 tracking-[3px] uppercase mb-3">Our Programmes</p>
            <h1 class="font-serif font-semibold text-white leading-[1.1] mb-4" style="font-size:clamp(32px,5vw,58px)">
                Law Practice Training<br><span class="text-gold">(LPT)</span></h1>
            <p class="text-[16px] text-cloud/62 max-w-xl leading-[1.7]">The 1-year professional legal training
                stage introduced by the Legal Education Act, 2026 (Act 1170), on the path to the Ghana Bar.</p>
        </div>
    </section>

    {{-- Status note --}}
    <section class="pt-14 px-[5%] bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="flex items-start gap-4 p-6 rounded-xl bg-gray-50 border border-gray-200">
                <div
                    class="w-9 h-9 rounded-full border border-gold bg-gold/10 flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="#b8960c" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                        <line x1="12" y1="16" x2="12" y2="12" />
                        <line x1="12" y1="8" x2="12.01" y2="8" />
                    </svg>
                </div>
                <p class="text-[14px] text-gray-600 leading-[1.75]">
                    CLET is yet to be constituted and universities are yet to be accredited to run the LPT
                    Programme. Applications for accreditation are expected to commence in October 2026, with full
                    implementation targeted for the 2027-28 academic year. In the interim, LLB graduates follow the
                    <a href="{{ route('programmes.pre-bar-course') }}"
                        class="text-gold font-semibold hover:underline">transitional Pre-Bar Course</a>.
                </p>
            </div>
        </div>
    </section>

    {{-- Narrative --}}
    <section class="py-14 px-[5%] bg-white">
        <div class="max-w-3xl mx-auto flex flex-col gap-5 text-[15px] text-gray-600 leading-[1.8]">
            <p>
                During his June 2025 vetting before Parliament's Appointments Committee as a nominee to the
                Supreme Court, Justice Philip Bright Mensah advocated reforms to Ghana's legal education system to
                address the growing number of LLB graduates seeking professional legal training. He proposed that
                accredited law faculties be permitted to provide professional legal training in addition to
                academic legal education, rather than limiting such training to the Ghana School of Law.
            </p>
            <p>
                Justice Mensah argued that expanding professional training capacity could help reduce the backlog
                of graduates awaiting admission, and suggested that candidates who had already completed their LLB
                programme be given priority consideration for admission into professional legal education.
            </p>
        </div>
    </section>

    <section class="pb-20 px-[5%] bg-white">
        <div class="max-w-6xl mx-auto">
            <h3 class="font-serif font-semibold text-[20px] text-navy mb-5">Courses Covered</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 mb-8">
                @foreach (['Civil Procedure', 'Criminal Procedure', 'Law of Evidence', 'Conveyancing & Drafting', 'Advocacy & Legal Ethics', 'Law Practice Management', 'Legal Accounting'] as $c)
                    <div class="flex items-start gap-4 p-4 rounded-lg bg-gray-50 border border-gray-200">
                        <div class="w-2 h-2 rounded-full bg-gold flex-shrink-0 mt-1.5"></div>
                        <p class="text-[15px] font-semibold text-navy">{{ $c }}</p>
                    </div>
                @endforeach
            </div>
            <a href="{{ route('academic-calendar') }}"
                class="inline-flex items-center gap-2 px-7 py-3.5 text-[15px] font-semibold bg-gold text-navy rounded hover:bg-gold-light hover:-translate-y-0.5 transition-all">
                View Academic Calendar
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" viewBox="0 0 24 24">
                    <line x1="5" y1="12" x2="19" y2="12" />
                    <polyline points="12 5 19 12 12 19" />
                </svg>
            </a>
        </div>
    </section>

@endsection
