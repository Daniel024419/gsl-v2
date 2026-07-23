@extends('layouts.app')
@section('title', 'Programmes – Ghana School of Law')
@section('description',
    'The Legal Education Reform under Act 1170 (2026), the Pre-Bar Course, Law Practice Training,
    Post-Call Law Course, Bar Exam Remedial, and Specialised Development at GSL.')
@section('content')

    <section class="relative pt-[97px] md:pt-[133px] min-h-[300px] flex items-end pb-14 px-[5%]"
        style="background:linear-gradient(135deg,#030f1a 0%,#0c4a6e 50%,#051b2c 100%)">
        <div class="max-w-6xl mx-auto w-full">
            <p class="text-[14px] font-bold text-gold/70 tracking-[3px] uppercase mb-3">Our Programmes</p>
            <h1 class="font-serif font-semibold text-white leading-[1.1] mb-4" style="font-size:clamp(32px,5vw,58px)">
                Legal Education Reform<br><span class='text-gold'>Act 1170 (2026)</span></h1>
            <p class="text-[16px] text-cloud/62 max-w-xl leading-[1.7]">A new four-stage path to the Ghana Bar - from
                the Pre-Bar Course and Law Practice Training to the Post-Call Law Course and continuing professional
                development.</p>
        </div>
    </section>

    {{-- Act 1170 Reform Overview --}}
    <section class="py-20 px-[5%] bg-white" id="reform">
        <div class="max-w-6xl mx-auto">
            <p class="text-[14px] font-bold text-gold/70 tracking-[3px] uppercase mb-2">The Legal Education Reform</p>
            <h2 class="font-serif font-semibold text-navy text-[32px] leading-[1.2] mb-2">Act 1170 (2026)</h2>
            <div class="w-10 h-[3px] bg-gold rounded-full mb-8"></div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <div class="flex flex-col gap-5 text-[15px] text-gray-600 leading-[1.8]">
                    <p>
                        President John Dramani Mahama signed the Legal Education Bill, 2026 into law on 11th May,
                        2026 at the Jubilee House in Accra. The Legal Education Act establishes the Council for
                        Legal Education and Training (CLET) as the body obligated to regulate legal education in
                        Ghana and to provide the curriculum for legal education. CLET has also been tasked with
                        licensing and accrediting legal institutions and universities running legal education
                        programmes, in collaboration with the Ghana Tertiary Education Commission (GTEC).
                    </p>
                    <p>
                        This reform creates equal opportunities for those aspiring to be lawyers in Ghana, and
                        gives rise to the Law Practice Training (LPT) Programme.
                    </p>
                    <p>
                        Act 1170 abolishes the Independent Examinations Committee (IEC) and the entrance
                        examination for admission to professional legal training. Admissions no longer depend on
                        IEC examinations, and instead rest on each institution's own academic rules, admission
                        policies, available capacity, and relevant regulatory requirements.
                    </p>
                    <p>
                        Although CLET is yet to be constituted and universities are yet to be accredited to run
                        the new LPT Programme, the Attorney-General and Minister for Justice, Dr. Dominic
                        Akuritinga Ayine, following consultations with the Chairman of the General Legal Council,
                        issued Interim Policy Directives to all accredited universities offering law programmes to
                        address urgent matters arising during the transition to the new legal education regime.
                    </p>
                    <p>
                        With the Act coming into force ahead of the 2026/2027 academic year, there is insufficient
                        time for institutions to be accredited to begin the LPT under the new law, and an
                        estimated 5,000 to 8,000 LL.B. graduates are awaiting professional legal training.
                        Transitional arrangements - including the Pre-Bar Course - have therefore been introduced
                        to ensure a smooth and effective transition to the new legal education framework.
                    </p>
                </div>

                <div>
                    <h3 class="font-serif font-semibold text-[20px] text-navy mb-5">The 4-Stage Path to the Ghana
                        Bar</h3>
                    <div class="flex flex-col gap-3">
                        @foreach ([['1', 'Bachelor of Laws (LL.B.)', 'At an accredited institution, including the interim One-Year Transitional Pre-Bar Course.'], ['2', 'Law Practice Training (LPT)', '1 year at an accredited institution.'], ['3', 'National Bar Examinations', 'Sat upon completion of the Law Practice Training.'], ['4', 'Call to the Ghana Bar', 'Upon satisfaction of professional fitness criteria.']] as $s)
                            <div class="flex items-start gap-4 p-4 rounded-lg bg-gray-50 border border-gray-200">
                                <div
                                    class="w-8 h-8 rounded-full border border-gold bg-gold/10 flex items-center justify-center font-serif font-bold text-gold flex-shrink-0">
                                    {{ $s[0] }}</div>
                                <div>
                                    <p class="text-[15px] font-semibold text-navy mb-0.5">{{ $s[1] }}</p>
                                    <p class="text-[14px] text-gray-600">{{ $s[2] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-14">
                @foreach ([['programmes.pre-bar-course', 'Pre-Bar Course', 'Transitional one-year preparatory course for LLB graduates ahead of full accreditation of the LPT Programme.'], ['programmes.law-practice-training', 'Law Practice Training (LPT)', 'The 1-year professional training programme introduced by Act 1170, covering procedure, evidence, advocacy, and practice management.'], ['programmes.post-call-law-course', 'Post-Call Law Course', 'A 1-year course for lawyers already called to the Bar in comparable Common Law jurisdictions.']] as $p)
                    <a href="{{ route($p[0]) }}"
                        class="group p-8 rounded-xl border border-gray-200 bg-gray-50 hover:border-gold/40 transition-all duration-200">
                        <h3
                            class="font-serif font-semibold text-[20px] text-navy mb-3 group-hover:text-gold transition-colors duration-200">
                            {{ $p[1] }}</h3>
                        <p class="text-[15px] text-gray-600 leading-[1.75] mb-4">{{ $p[2] }}</p>
                        <span class="text-[11px] font-bold tracking-[2px] uppercase text-gold">View Details
                            &rarr;</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Remedial --}}
    <section class="py-20 px-[5%] bg-white" id="remedial">
        <div class="max-w-6xl mx-auto">
            <p class="text-[14px] font-bold text-gold/70 tracking-[3px] uppercase mb-2">Programme 02</p>
            <h2 class="font-serif font-semibold text-navy text-[32px] leading-[1.2] mb-2">Bar Examination Remedial Courses
            </h2>
            <div class="w-10 h-[3px] bg-gold rounded-full mb-8"></div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ([['A', 'Full Intensive Prep', '8–12 Weeks', 'All 5 subjects comprehensively. Daily lectures, discussions, practice questions, and full mock exams.'], ['B', 'Subject-Specific Remedial', '4–6 Weeks / Subject', 'Deep dive into specific exam areas. Ideal for targeted improvement.'], ['C', 'Mock Exam & Review', '2–3 Days', 'Full-length mock exam under real conditions with detailed performance analysis.'], ['D', 'One-on-One Tutoring', 'Flexible', 'Private sessions with experienced faculty, customised to your needs.']] as $opt)
                    <div class="p-6 rounded-xl bg-gray-50 border border-gray-200 hover:border-gold/40 transition-all">
                        <div
                            class="w-9 h-9 rounded-full border border-gold bg-gold/10 flex items-center justify-center font-serif font-bold text-gold mb-4">
                            {{ $opt[0] }}</div>
                        <h4 class="font-serif font-semibold text-[16px] text-navy mb-1">{{ $opt[1] }}</h4>
                        <p class="text-[14px] font-bold text-gold/70 tracking-[1.5px] uppercase mb-3">{{ $opt[2] }}
                        </p>
                        <p class="text-[14px] text-gray-600 leading-[1.65]">{{ $opt[3] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Specialised --}}
    <section class="py-20 px-[5%] bg-navy" id="specialised">
        <div class="max-w-6xl mx-auto">
            <p class="text-[14px] font-bold text-gold/50 tracking-[3px] uppercase mb-2">Programme 03</p>
            <h2 class="font-serif font-semibold text-white text-[32px] leading-[1.2] mb-2">Specialised Professional
                Development</h2>
            <div class="w-10 h-[3px] bg-gold rounded-full mb-8"></div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ([['Emerging Practice Areas', ['Technology & Cyberlaw', 'Environmental Law', 'Corporate & Commercial Law', 'Alternative Dispute Resolution', 'Administrative & Human Rights Law']], ['Professional Skills', ['Advanced Advocacy & Trial Practice', 'Legal Writing & Drafting', 'Law Practice Management', 'Professional Ethics', 'Legal Research & Scholarship']], ['Sectoral Specialisations', ['Real Estate & Property Law', 'Family Law & Succession', 'Criminal Law Practice', 'Labour & Employment Law', 'Intellectual Property Law']]] as $cat)
                    <div class="p-7 rounded-xl bg-navy-mid border border-gold/10">
                        <h4 class="font-serif font-semibold text-[18px] text-white mb-5 pb-4 border-b border-gold/10">
                            {{ $cat[0] }}</h4>
                        <ul class="space-y-2.5">
                            @foreach ($cat[1] as $course)
                                <li class="flex items-center gap-2.5 text-[14px] text-cloud/65">
                                    <span
                                        class="w-1.5 h-1.5 rounded-full bg-gold/60 flex-shrink-0"></span>{{ $course }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
