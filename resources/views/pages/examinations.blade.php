@extends('layouts.app')
@section('title', 'Examinations – Ghana School of Law')
@section('description', 'Entrance Examination and Bar Examination information for GSL candidates.')
@section('content')

    <section class="relative pt-[97px] md:pt-[133px] min-h-[300px] flex items-end pb-14 px-[5%]"
        style="background:linear-gradient(135deg,#030f1a 0%,#0c4a6e 50%,#051b2c 100%)">
        <div class="max-w-6xl mx-auto w-full">
            <p class="text-[14px] font-bold text-gold/70 tracking-[3px] uppercase mb-3">Academics</p>
            <h1 class="font-serif font-semibold text-white leading-[1.1] mb-4" style="font-size:clamp(32px,5vw,58px)">
                Examinations</h1>
            <p class="text-[16px] text-cloud/62 max-w-xl leading-[1.7]">What to expect from the Entrance Examination
                and the Bar Examination on your path to the Ghana Bar.</p>
        </div>
    </section>

    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="p-8 rounded-xl border border-gray-200 bg-gray-50">
                <p class="text-[11px] font-bold text-gold tracking-[3px] uppercase mb-3">Before Enrolment</p>
                <h2 class="font-serif font-semibold text-navy text-[24px] mb-4">Entrance Examination</h2>
                <p class="text-[15px] text-gray-600 leading-[1.8] mb-5">
                    Shortlisted applicants for the Pre-Bar Course and Law Practice Training Course sit the GSL
                    entrance examination as part of the admissions process. It assesses readiness for professional
                    legal training before an offer of enrolment is made.
                </p>
                <a href="{{ route('admissions') }}"
                    class="text-[11px] font-bold tracking-[2px] uppercase text-gold hover:underline">See the
                    Application Process &rarr;</a>
            </div>
            <div class="p-8 rounded-xl border border-gray-200 bg-gray-50">
                <p class="text-[11px] font-bold text-gold tracking-[3px] uppercase mb-3">Call to the Bar</p>
                <h2 class="font-serif font-semibold text-navy text-[24px] mb-4">The Bar Examination</h2>
                <p class="text-[15px] text-gray-600 leading-[1.8] mb-5">
                    Candidates completing the Law Practice Training Course sit the Bar Examination before being
                    called to the Ghana Bar. GSL's Bar Examination Remedial Courses - full intensive prep,
                    subject-specific remedial, mock exams, and one-on-one tutoring - support candidates preparing to
                    sit or resit the examination.
                </p>
                <a href="{{ route('programmes') }}#remedial"
                    class="text-[11px] font-bold tracking-[2px] uppercase text-gold hover:underline">See Remedial
                    Courses &rarr;</a>
            </div>
        </div>
    </section>

@endsection
