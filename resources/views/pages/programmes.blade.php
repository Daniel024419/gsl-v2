@extends('layouts.app')
@section('title','Programmes – Ghana School of Law')
@section('description','Explore GSL programmes: Law Practice Training, Post-Call Law Course, Bar Exam Remedial, and Specialised Development.')
@section('content')

<section class="relative pt-[72px] min-h-[300px] flex items-end pb-14 px-[5%]"
         style="background:linear-gradient(135deg,#030f1a 0%,#0c4a6e 50%,#051b2c 100%)">
    <div class="max-w-6xl mx-auto w-full">
        <p class="text-[11px] font-bold text-gold/70 tracking-[3px] uppercase mb-3">Our Programmes</p>
        <h1 class="font-serif font-semibold text-white leading-[1.1] mb-4" style="font-size:clamp(32px,5vw,58px)">Four Pathways to<br><span class='text-gold'>Legal Excellence</span></h1>
        <p class="text-[16px] text-cloud/62 max-w-xl leading-[1.7]">From the flagship LPTC to the exclusively GSL-delivered Post-Call Course — find the programme that fits your journey.</p>
    </div>
</section>

{{-- LPTC --}}
<section class="py-20 px-[5%] bg-navy-mid" id="lptc">
    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16">
        <div>
            <h3 class="font-serif font-semibold text-[20px] text-white mb-5">Curriculum Highlights</h3>
            <div class="flex flex-col gap-3">
                @foreach([['Civil Procedure','Civil procedure rules, pleadings, and court practice with evidence component.'],['Criminal Procedure','Criminal procedure rules, prosecutorial practice, and criminal evidence.'],['Advocacy, Ethics & Law Practice','Oral advocacy, professional conduct, and law practice management.'],['Conveyancing & Drafting','Property transactions, document drafting, and real estate practice.'],['Law of Evidence','Rules of evidence in civil and criminal proceedings.']] as $c)
                <div class="flex items-start gap-4 p-4 rounded-lg bg-navy border border-gold/8">
                    <div class="w-2 h-2 rounded-full bg-gold flex-shrink-0 mt-1.5"></div>
                    <div>
                        <p class="text-[14px] font-semibold text-white mb-0.5">{{ $c[0] }}</p>
                        <p class="text-[13px] text-cloud/55">{{ $c[1] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- Post-Call --}}
<section class="py-20 px-[5%] bg-navy" id="post-call">
    <div class="max-w-6xl mx-auto">
        <div class="flex items-center gap-3 mb-6">
            <p class="text-[11px] font-bold text-gold/50 tracking-[3px] uppercase">Programme 02</p>
            <span class="px-2.5 py-1 text-[10px] font-bold bg-gold text-navy rounded-full tracking-[1px] uppercase">Only at GSL</span>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <div>
                <h2 class="font-serif font-semibold text-white text-[32px] leading-[1.2] mb-2">Post-Call Law Course</h2>
                <div class="w-10 h-[3px] bg-gold rounded-full mb-5"></div>
                <p class="text-[15px] text-cloud/70 leading-[1.8] mb-5">
                    Under Section 78, Act 1170, GSL is the only institution in Ghana statutorily authorised to
                    deliver this programme — the official gateway for foreign lawyers and reciprocal jurisdiction
                    candidates seeking to join Ghana's legal profession.
                </p>
                <div class="grid grid-cols-1 gap-3 mb-6">
                    @foreach([['Category A: Foreign Lawyers','Qualified and licensed in an analogous legal system (e.g. UK, Nigeria, South Africa). Country must have a reciprocal arrangement with Ghana.'],['Category B: Reciprocal Jurisdiction Citizens','Citizens who have met educational requirements in a reciprocal jurisdiction and seek Ghana Roll of Lawyers enrolment.']] as $cat)
                    <div class="p-5 rounded-lg bg-navy-mid border border-gold/12">
                        <p class="text-[13px] font-bold text-gold mb-1.5">{{ $cat[0] }}</p>
                        <p class="text-[13px] text-cloud/60 leading-[1.65]">{{ $cat[1] }}</p>
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('admissions') }}"
                   class="inline-flex items-center gap-2 px-7 py-3.5 text-[14px] font-semibold bg-gold text-navy rounded hover:bg-gold-light hover:-translate-y-0.5 transition-all">
                    Apply for Post-Call Course
                </a>
            </div>
            <div>
                <div class="grid grid-cols-2 gap-3 mb-6">
                    @foreach([['Duration','6–12 Months'],['Format','Full-time or Part-time'],['Language','English'],['Outcome','Roll of Lawyers Eligibility']] as $m)
                    <div class="px-4 py-3 rounded-lg bg-navy-mid border border-gold/10">
                        <p class="text-[10px] font-bold text-gold tracking-[2px] uppercase mb-1">{{ $m[0] }}</p>
                        <p class="text-[13px] text-cloud/80">{{ $m[1] }}</p>
                    </div>
                    @endforeach
                </div>
                <h4 class="font-semibold text-[14px] text-white mb-3">Content Covers</h4>
                <ul class="space-y-2">
                    @foreach(["Ghana's legal system and constitution","Civil and criminal procedure in Ghana","Ghanaian substantive law","Professional conduct standards in Ghana","Practical experience with Ghana courts and lawyers"] as $c)
                    <li class="flex items-start gap-2.5 text-[13px] text-cloud/65"><span class="text-gold mt-0.5">›</span>{{ $c }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- Remedial --}}
<section class="py-20 px-[5%] bg-navy-mid" id="remedial">
    <div class="max-w-6xl mx-auto">
        <p class="text-[11px] font-bold text-gold/50 tracking-[3px] uppercase mb-2">Programme 03</p>
        <h2 class="font-serif font-semibold text-white text-[32px] leading-[1.2] mb-2">Bar Examination Remedial Courses</h2>
        <div class="w-10 h-[3px] bg-gold rounded-full mb-8"></div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach([['A','Full Intensive Prep','8–12 Weeks','All 5 subjects comprehensively. Daily lectures, discussions, practice questions, and full mock exams.'],['B','Subject-Specific Remedial','4–6 Weeks / Subject','Deep dive into specific exam areas. Ideal for targeted improvement.'],['C','Mock Exam & Review','2–3 Days','Full-length mock exam under real conditions with detailed performance analysis.'],['D','One-on-One Tutoring','Flexible','Private sessions with experienced faculty, customised to your needs.']] as $opt)
            <div class="p-6 rounded-xl bg-navy border border-gold/10 hover:border-gold/30 transition-all">
                <div class="w-9 h-9 rounded-full border border-gold bg-gold/10 flex items-center justify-center font-serif font-bold text-gold mb-4">{{ $opt[0] }}</div>
                <h4 class="font-serif font-semibold text-[16px] text-white mb-1">{{ $opt[1] }}</h4>
                <p class="text-[11px] font-bold text-gold/60 tracking-[1.5px] uppercase mb-3">{{ $opt[2] }}</p>
                <p class="text-[13px] text-cloud/58 leading-[1.65]">{{ $opt[3] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Specialised --}}
<section class="py-20 px-[5%] bg-navy" id="specialised">
    <div class="max-w-6xl mx-auto">
        <p class="text-[11px] font-bold text-gold/50 tracking-[3px] uppercase mb-2">Programme 04</p>
        <h2 class="font-serif font-semibold text-white text-[32px] leading-[1.2] mb-2">Specialised Professional Development</h2>
        <div class="w-10 h-[3px] bg-gold rounded-full mb-8"></div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach([
                ['Emerging Practice Areas',['Technology & Cyberlaw','Environmental Law','Corporate & Commercial Law','Alternative Dispute Resolution','Administrative & Human Rights Law']],
                ['Professional Skills',['Advanced Advocacy & Trial Practice','Legal Writing & Drafting','Law Practice Management','Professional Ethics','Legal Research & Scholarship']],
                ['Sectoral Specialisations',['Real Estate & Property Law','Family Law & Succession','Criminal Law Practice','Labour & Employment Law','Intellectual Property Law']],
            ] as $cat)
            <div class="p-7 rounded-xl bg-navy-mid border border-gold/10">
                <h4 class="font-serif font-semibold text-[18px] text-white mb-5 pb-4 border-b border-gold/10">{{ $cat[0] }}</h4>
                <ul class="space-y-2.5">
                    @foreach($cat[1] as $course)
                    <li class="flex items-center gap-2.5 text-[13px] text-cloud/65">
                        <span class="w-1.5 h-1.5 rounded-full bg-gold/60 flex-shrink-0"></span>{{ $course }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
