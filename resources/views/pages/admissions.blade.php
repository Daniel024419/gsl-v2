@extends('layouts.app')
@section('title', 'Admissions – Ghana School of Law')
@section('description',
    'Apply to the Ghana School of Law. Requirements, application process, key dates, and contact
    information for all programmes.')
@section('content')

    <section class="relative pt-[97px] md:pt-[133px] min-h-[300px] flex items-end pb-14 px-[5%]"
        style="background:linear-gradient(135deg,#030f1a 0%,#0c4a6e 50%,#051b2c 100%)">
        <div class="max-w-6xl mx-auto w-full">
            <p class="text-[14px] font-bold text-gold/70 tracking-[3px] uppercase mb-3">Admissions</p>
            <h1 class="font-serif font-semibold text-white leading-[1.1] mb-4" style="font-size:clamp(32px,5vw,58px)">Start
                Your Journey<br><span class='text-gold'>to the Bar</span></h1>
            <p class="text-[16px] text-cloud/62 max-w-xl leading-[1.7]">Applications for the September 2026 intake are now
                open. Find out how to apply for each programme.</p>
        </div>
    </section>

    {{-- Admission Requirements --}}
    <section class="py-20 px-[5%] bg-white" id="requirements">
        <div class="max-w-6xl mx-auto">
            <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3">Eligibility</p>
            <h2 class="font-serif font-semibold text-navy text-[34px] mb-14">Admission Requirements</h2>

            <div class="flex flex-col gap-10">

                {{-- Professional Law Course --}}
                <div class="p-8 lg:p-10 rounded-2xl border border-gray-200 bg-gray-50">
                    <h3 class="font-serif font-semibold text-navy text-[24px] mb-2">Professional Law Course</h3>
                    <div class="w-10 h-[3px] bg-gold rounded-full mb-6"></div>
                    <p class="text-[15px] text-gray-600 leading-[1.8] mb-6">
                        Applicant must first pass the Entrance Examination. The following are eligible to apply:
                    </p>

                    <div class="p-5 rounded-lg bg-gold/8 border border-gold/20 mb-8">
                        <p class="text-[11px] font-bold text-gold tracking-[2px] uppercase mb-2">Additional
                            Requirement</p>
                        <p class="text-[14px] text-gray-600 mb-3">Applicant must also have passed at least one of
                            the following elective subjects:</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach (['Natural Resources Law', 'Environmental Law', 'Intellectual Property Law', 'Law of Taxation'] as $e)
                                <span
                                    class="px-3 py-1.5 rounded-full bg-white border border-gold/25 text-[13px] text-navy">{{ $e }}</span>
                            @endforeach
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div>
                            <h4 class="font-semibold text-[15px] text-navy mb-3">Local Applicant</h4>
                            <div class="space-y-3">
                                @foreach (['LLB graduates from Public Universities in Ghana (UG, KNUST, GIMPA) approved by the General Legal Council (GLC) and National Accreditation Board (NAB)', 'LLB graduates from Private Universities in Ghana accredited by the GLC and NAB'] as $r)
                                    <div class="flex items-start gap-3 p-4 rounded-lg bg-white border border-gray-200">
                                        <div class="w-2 h-2 rounded-full bg-gold flex-shrink-0 mt-1.5"></div>
                                        <p class="text-[14px] text-gray-600 leading-[1.65]">{{ $r }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <h4 class="font-semibold text-[15px] text-navy mb-3">Foreign Applicants (Ghanaian
                                Citizens)</h4>
                            <p class="text-[14px] text-gray-600 leading-[1.7] mb-3">
                                Ghanaian LLB graduates or holders of equivalent law degrees from UK, USA, Canada or
                                other Common Law jurisdictions, who have passed the following subjects:
                            </p>
                            <div class="grid grid-cols-2 gap-2">
                                @foreach (['Ghana Constitutional Law', 'Ghana Legal System and Methods', 'Criminal Law', 'Law of Equity and Succession', 'Law of Torts', 'Law of Contract', 'Law of Immovable Property', 'Company Law', 'Commercial Law'] as $s)
                                    <div class="px-3 py-2 rounded-lg bg-white border border-gray-200 text-[13px] text-gray-600">
                                        {{ $s }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <p class="text-[14px] text-gray-500 leading-[1.7] mt-8 pt-6 border-t border-gray-200">
                        <span class="font-bold text-navy">Outcome:</span> Successful candidates are enrolled in
                        the Professional Law Course and, upon completion, are called to the Bar as
                        Barristers-at-Law and Solicitors of the Supreme Court.
                    </p>
                </div>

                {{-- Post-Call Law Course --}}
                <div class="p-8 lg:p-10 rounded-2xl border border-gray-200 bg-gray-50">
                    <h3 class="font-serif font-semibold text-navy text-[24px] mb-2">Post-Call Law Course for
                        Lawyers from Other Common Law Jurisdictions</h3>
                    <div class="w-10 h-[3px] bg-gold rounded-full mb-6"></div>
                    <p class="text-[15px] text-gray-600 leading-[1.8] mb-8">
                        For lawyers trained in other Common Law jurisdictions.
                    </p>

                    <h4 class="font-semibold text-[15px] text-navy mb-3">Who Can Apply</h4>
                    <div class="space-y-3 mb-8">
                        @foreach (['Ghanaian citizens qualified to practice law abroad in jurisdictions analogous to Ghana', 'Non-Ghanaian lawyers from countries with reciprocal arrangements with Ghana'] as $w)
                            <div class="flex items-start gap-3 p-4 rounded-lg bg-white border border-gray-200">
                                <div class="w-2 h-2 rounded-full bg-gold flex-shrink-0 mt-1.5"></div>
                                <p class="text-[14px] text-gray-600 leading-[1.65]">{{ $w }}</p>
                            </div>
                        @endforeach
                    </div>

                    <h4 class="font-semibold text-[15px] text-navy mb-3">Requirements</h4>
                    <p class="text-[14px] text-gray-600 leading-[1.7] mb-4">
                        Applicants should have studied (or their equivalents of) the following subjects:
                    </p>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-4">
                        <div>
                            <p class="text-[11px] font-bold text-gold tracking-[2px] uppercase mb-3">Core
                                Subjects</p>
                            <div class="grid grid-cols-2 gap-2">
                                @foreach (['Law of Contract', 'Law of Torts', 'Criminal Law', 'Law of Immovable Property', 'Equity of Succession', 'Company Law', 'Commercial Law'] as $s)
                                    <div class="px-3 py-2 rounded-lg bg-white border border-gray-200 text-[13px] text-gray-600">
                                        {{ $s }}</div>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <p class="text-[11px] font-bold text-gold tracking-[2px] uppercase mb-3">Plus One
                                Elective</p>
                            <div class="grid grid-cols-2 gap-2">
                                @foreach (['Natural Resources Law', 'Law of Taxation', 'Intellectual Property Law', 'Environmental Law', 'Labour Law'] as $s)
                                    <div class="px-3 py-2 rounded-lg bg-white border border-gray-200 text-[13px] text-gray-600">
                                        {{ $s }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <p class="text-[13px] text-gray-400 mb-8">Course titles may differ depending on jurisdiction.
                    </p>

                    <p class="text-[14px] text-gray-500 leading-[1.7] pt-6 border-t border-gray-200">
                        <span class="font-bold text-navy">Outcome:</span> Admission as a Barrister-at-Law and
                        Solicitor of the Supreme Court.
                    </p>
                </div>

                {{-- Pre-Bar Course --}}
                <div class="p-8 lg:p-10 rounded-2xl border border-gray-200 bg-gray-50">
                    <h3 class="font-serif font-semibold text-navy text-[24px] mb-2">The Transitional Pre-Bar
                        Course</h3>
                    <div class="w-10 h-[3px] bg-gold rounded-full mb-6"></div>

                    <div class="flex flex-col gap-5 text-[15px] text-gray-600 leading-[1.8] mb-8">
                        <p>
                            The Director of Legal Education and the Ghana School of Law, Professor Raymond
                            Atuguba, issued directives on behalf of the Attorney-General and the Minister for
                            Justice of the Republic of Ghana introducing the Pre-Bar Course, which serves as a
                            transitional arrangement following the passage of the Legal Education Act, 2026 (Act
                            1170). Under the reforms, accredited universities may retain graduating LLB students
                            for an additional year to undertake a Pre-Bar Course covering core theoretical
                            subjects. Graduates who complete the course become eligible for the Law Practice
                            Training (LPT) Programme and the National Bar Examinations.
                        </p>
                        <p>
                            The reforms also abolish the previous entrance examination system administered by the
                            Independent Examinations Committee (IEC). Existing LLB graduates may now apply
                            directly to accredited law faculties or the Ghana School of Law for admission into the
                            transitional programme. Universities that are unable to offer the Pre-Bar Course may
                            collaborate with or transfer students to the Ghana School of Law.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div>
                            <h4 class="font-semibold text-[15px] text-navy mb-3">Core Theoretical Subjects</h4>
                            <div class="space-y-2">
                                @foreach (['Company Law', 'Commercial Law', 'Alternative Dispute Resolution (ADR)', 'Family Law', 'Interpretation of Deeds and Statutes', 'Any other relevant elective subjects (including those faculties may add to meet minimum credit requirements)'] as $m)
                                    <div class="px-4 py-2.5 rounded-lg bg-white border border-gray-200 text-[14px] text-gray-600">
                                        {{ $m }}</div>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <h4 class="font-semibold text-[15px] text-navy mb-3">Who Is Eligible</h4>
                            <div class="space-y-2">
                                @foreach (['LLB Graduates - Class of 2026', 'Existing LLB Graduates', 'Graduates from Any GTEC/GLC Accredited Law Faculty', 'Ghanaian Nationals with LLB from Common Law Jurisdictions'] as $e)
                                    <div class="flex items-center gap-3 p-3 rounded-lg bg-white border border-gray-200">
                                        <div
                                            class="w-7 h-7 rounded-full border border-gold bg-gold/10 flex items-center justify-center flex-shrink-0">
                                            <svg class="w-3 h-3" fill="none" stroke="#b8960c" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                                <polyline points="20 6 9 17 4 12" />
                                            </svg>
                                        </div>
                                        <p class="text-[14px] text-gray-700">{{ $e }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Application Steps --}}
    <section class="py-20 px-[5%] bg-navy">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3">How to Apply</p>
                <h2 class="font-serif font-semibold text-white text-[34px]">Application Process</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ([['01', 'Complete Online Form', 'Visit forms.gslaw.school and fill in the application form with personal and academic details.'], ['02', 'Upload Documents', 'Submit LLB transcript, certificate, national ID or passport, and passport photograph.'], ['03', 'Entrance Examination', 'Shortlisted candidates are invited to sit the GSL entrance examination.'], ['04', 'Enrolment', 'Successful candidates receive an offer letter and proceed to enrolment.']] as $s)
                    <div class="relative p-6 rounded-xl bg-navy-mid border border-gold/10">
                        <span
                            class="absolute -top-3 -left-3 w-9 h-9 rounded-full bg-gold text-navy font-bold text-[15px] flex items-center justify-center">{{ $s[0] }}</span>
                        <h4 class="font-serif font-semibold text-[17px] text-white mb-2 mt-2">{{ $s[1] }}</h4>
                        <p class="text-[14px] text-cloud/58 leading-[1.65]">{{ $s[2] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Dates + Contact --}}
    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3">Key Dates</p>
                <h2 class="font-serif font-semibold text-navy text-[28px] mb-6">Important Deadlines</h2>
                <div class="space-y-3">
                    @foreach ([['Applications Open', 'Now - 2026', 'border-gold/25 bg-gold/8 text-gold'], ['Application Deadline', 'July 2026', 'border-gray-200 bg-gray-50 text-gray-600'], ['Entrance Examination', 'August 2026', 'border-gray-200 bg-gray-50 text-gray-600'], ['Programme Commences', 'September 2026', 'border-gray-200 bg-gray-50 text-gray-600']] as $d)
                        <div class="flex items-center justify-between px-5 py-4 rounded-lg border {{ $d[2] }}">
                            <p class="text-[15px] font-medium">{{ $d[0] }}</p>
                            <p class="text-[14px] font-bold">{{ $d[1] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3">Need Help?</p>
                <h2 class="font-serif font-semibold text-navy text-[28px] mb-6">Contact Admissions</h2>
                <div class="space-y-3">
                    @foreach ([['+233 246 006 210', 'Phone'], ['+233 531 003 918', 'Phone'], ['helpdesk@gslaw.edu.gh', 'Email'], ['admissions@gslaw.edu.gh', 'Email']] as $c)
                        <div class="flex items-center gap-4 p-4 rounded-lg bg-gray-50 border border-gray-200">
                            <div
                                class="w-9 h-9 rounded-lg bg-gold/10 border border-gold/20 flex items-center justify-center flex-shrink-0">
                                <span
                                    class="text-gold font-bold text-[14px] tracking-[1px]">{{ strtoupper(substr($c[1], 0, 2)) }}</span>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold text-gold/70 tracking-[2px] uppercase">{{ $c[1] }}
                                </p>
                                <p class="text-[15px] text-gray-700">{{ $c[0] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
