@extends('layouts.app')
@section('title', 'Admissions – Ghana School of Law')
@section('description',
    'Apply to the Ghana School of Law. Requirements, application process, key dates, and contact
    information for all programmes.')
@section('content')

    <section class="relative pt-[72px] min-h-[300px] flex items-end pb-14 px-[5%]"
        style="background:linear-gradient(135deg,#030f1a 0%,#0c4a6e 50%,#051b2c 100%)">
        <div class="max-w-6xl mx-auto w-full">
            <p class="text-[13px] font-bold text-gold/70 tracking-[3px] uppercase mb-3">Admissions</p>
            <h1 class="font-serif font-semibold text-white leading-[1.1] mb-4" style="font-size:clamp(32px,5vw,58px)">Start
                Your Journey<br><span class='text-gold'>to the Bar</span></h1>
            <p class="text-[16px] text-cloud/62 max-w-xl leading-[1.7]">Applications for the September 2026 intake are now
                open. Find out how to apply for each programme.</p>
        </div>
    </section>

    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-wrap items-center justify-between gap-4 mb-10">
                <div>
                    <div
                        class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-gold/10 border border-gold/25 mb-3">
                        <span class="w-1.5 h-1.5 rounded-full bg-gold"></span>
                        <span class="text-[10px] font-bold text-gold tracking-[2px] uppercase">Applications Open</span>
                    </div>
                    <h2 class="font-serif font-semibold text-navy text-[30px]">Pre-Bar Course 2026/2027</h2>
                </div>
                <a href="https://forms.gslaw.school/surveys/23" target="_blank" rel="noopener"
                    class="inline-flex items-center gap-2 px-6 py-3 text-[14px] font-semibold bg-gold text-navy rounded hover:bg-gold-light hover:-translate-y-0.5 transition-all">
                    Apply Online Now
                </a>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
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
                                <p class="text-[14px] text-gray-700">{{ $e }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div>
                    <h3 class="font-serif font-semibold text-[20px] text-navy mb-5">Course Modules</h3>
                    <div class="grid grid-cols-2 gap-2.5 mb-6">
                        @foreach (['Company Law', 'Commercial Law', 'Alternative Dispute Resolution', 'Family Law', 'Interpretation of Deeds & Statutes', 'Approved Electives'] as $m)
                            <div class="px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 text-[13px] text-gray-600">
                                {{ $m }}</div>
                        @endforeach
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        @foreach ([['Starts', 'September 2026'], ['Deadline', 'July 2026'], ['Phone', '+233 246 006 210'], ['Email', 'helpdesk@gslaw.edu.gh']] as $d)
                            <div class="px-4 py-3 rounded-lg bg-gold/8 border border-gold/20">
                                <p class="text-[10px] font-bold text-gold tracking-[2px] uppercase mb-1">{{ $d[0] }}
                                </p>
                                <p class="text-[13px] text-gray-700">{{ $d[1] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Application Steps --}}
    <section class="py-20 px-[5%] bg-navy">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <p class="text-[13px] font-bold text-gold tracking-[3px] uppercase mb-3">How to Apply</p>
                <h2 class="font-serif font-semibold text-white text-[34px]">Application Process</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ([['01', 'Complete Online Form', 'Visit forms.gslaw.school and fill in the application form with personal and academic details.'], ['02', 'Upload Documents', 'Submit LLB transcript, certificate, national ID or passport, and passport photograph.'], ['03', 'Entrance Examination', 'Shortlisted candidates are invited to sit the GSL entrance examination.'], ['04', 'Enrolment', 'Successful candidates receive an offer letter and proceed to enrolment.']] as $s)
                    <div class="relative p-6 rounded-xl bg-navy-mid border border-gold/10">
                        <span
                            class="absolute -top-3 -left-3 w-9 h-9 rounded-full bg-gold text-navy font-bold text-[14px] flex items-center justify-center">{{ $s[0] }}</span>
                        <h4 class="font-serif font-semibold text-[17px] text-white mb-2 mt-2">{{ $s[1] }}</h4>
                        <p class="text-[13px] text-cloud/58 leading-[1.65]">{{ $s[2] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Dates + Contact --}}
    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <p class="text-[13px] font-bold text-gold tracking-[3px] uppercase mb-3">Key Dates</p>
                <h2 class="font-serif font-semibold text-navy text-[28px] mb-6">Important Deadlines</h2>
                <div class="space-y-3">
                    @foreach ([['Applications Open', 'Now - 2026', 'border-gold/25 bg-gold/8 text-gold'], ['Application Deadline', 'July 2026', 'border-gray-200 bg-gray-50 text-gray-600'], ['Entrance Examination', 'August 2026', 'border-gray-200 bg-gray-50 text-gray-600'], ['Programme Commences', 'September 2026', 'border-gray-200 bg-gray-50 text-gray-600']] as $d)
                        <div class="flex items-center justify-between px-5 py-4 rounded-lg border {{ $d[2] }}">
                            <p class="text-[14px] font-medium">{{ $d[0] }}</p>
                            <p class="text-[13px] font-bold">{{ $d[1] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <p class="text-[13px] font-bold text-gold tracking-[3px] uppercase mb-3">Need Help?</p>
                <h2 class="font-serif font-semibold text-navy text-[28px] mb-6">Contact Admissions</h2>
                <div class="space-y-3">
                    @foreach ([['+233 246 006 210', 'Phone'], ['+233 531 003 918', 'Phone'], ['helpdesk@gslaw.edu.gh', 'Email'], ['admissions@gslaw.edu.gh', 'Email']] as $c)
                        <div class="flex items-center gap-4 p-4 rounded-lg bg-gray-50 border border-gray-200">
                            <div
                                class="w-9 h-9 rounded-lg bg-gold/10 border border-gold/20 flex items-center justify-center flex-shrink-0">
                                <span
                                    class="text-gold font-bold text-[13px] tracking-[1px]">{{ strtoupper(substr($c[1], 0, 2)) }}</span>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold text-gold/70 tracking-[2px] uppercase">{{ $c[1] }}
                                </p>
                                <p class="text-[14px] text-gray-700">{{ $c[0] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
