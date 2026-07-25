@extends('layouts.app')
@section('title', 'Alumni – Ghana School of Law')
@section('description',
    'The GSL Alumni Network - connecting lawyers called to the Ghana Bar through the Ghana School of
    Law.')
@section('content')

    <section class="relative pt-[97px] md:pt-[133px] min-h-[300px] flex items-end pb-14 px-[5%]"
        style="background:linear-gradient(135deg,#030f1a 0%,#0c4a6e 50%,#051b2c 100%)">
        <div class="max-w-6xl mx-auto w-full">
            <p class="text-[14px] font-bold text-gold/70 tracking-[3px] uppercase mb-3">Alumni Network</p>
            <h1 class="font-serif font-semibold text-white leading-[1.1] mb-4" style="font-size:clamp(32px,5vw,58px)">
                Once GSL,<br><span class="text-gold">Always GSL</span></h1>
            <p class="text-[16px] text-cloud/62 max-w-xl leading-[1.7]">Join a community of lawyers called to the Ghana Bar
                through the Ghana School of Law - staying connected, giving back, and advancing the legal profession.</p>
        </div>
    </section>

    {{-- INTRO --}}
    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
            <div>
                <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3">Who We Are</p>
                <h2 class="font-serif font-semibold text-navy text-[30px] leading-[1.25] mb-5">
                    A Lifelong Community of Ghana's Legal Professionals
                </h2>
                <p class="text-[15px] text-gray-600 leading-[1.85] mb-4">
                    Every lawyer admitted to the Ghana Bar through GSL becomes a permanent member of our alumni
                    community. From your Call to the Bar to your career milestones, the GSL Alumni Network is your
                    professional home - offering mentorship, continuing education, networking, and a platform to give
                    back to the next generation.
                </p>
                <p class="text-[15px] text-gray-600 leading-[1.85]">
                    The network spans all cohorts, all campuses, and all practice areas - connecting thousands of
                    lawyers across Ghana and the diaspora.
                </p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                @foreach ([['3,500+', 'Alumni Worldwide', 'Lawyers called to the Ghana Bar through GSL across all cohorts.'], ['30+', 'Years of Excellence', 'Decades of producing leading legal practitioners in Ghana.'], ['2', 'Campus Network', 'Accra, Kumasi, campuses serving the whole country.'], ['100%', 'Bar-Ready Training', 'Every graduate trained exclusively for Ghana Bar qualification.']] as $stat)
                    <div class="p-6 rounded-xl bg-gray-50 border border-gray-200 text-center">
                        <p class="font-serif font-bold text-[32px] text-gold leading-none mb-1">{{ $stat[0] }}</p>
                        <p class="text-[14px] font-semibold text-navy mb-2">{{ $stat[1] }}</p>
                        <p class="text-[13px] text-gray-500 leading-[1.6]">{{ $stat[2] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- BENEFITS --}}
    <section class="py-20 px-[5%] bg-navy">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <p class="text-[14px] font-bold text-gold/60 tracking-[3px] uppercase mb-3">Membership Benefits</p>
                <h2 class="font-serif font-semibold text-white text-[32px] leading-[1.2]">What the Network Offers</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ([['Mentorship Programme', 'Connect senior alumni with recent Call to the Bar graduates for guided early-career support.'], ['Continuing Legal Education', 'Exclusive CLE sessions, workshops, and seminars on emerging legal issues in Ghana and beyond.'], ['Professional Networking', 'Invitations to alumni dinners, reunions, Call to the Bar ceremonies, and sectoral mixer events.'], ['Career Resources', 'Access to job listings, chambers opportunities, and in-house counsel vacancies within the alumni network.'], ['Alumni Directory', 'A searchable directory of GSL alumni - find colleagues by practice area, year of call, or location.'], ['Give Back', 'Volunteer as a moot judge, guest lecturer, or scholarship sponsor for current GSL students.']] as $b)
                    <div
                        class="p-7 rounded-xl bg-navy-mid border border-gold/10 hover:border-gold/30 transition-all duration-200">
                        <h3 class="font-serif font-semibold text-[17px] text-white mb-3">{{ $b[0] }}</h3>
                        <p class="text-[14px] text-cloud/60 leading-[1.7]">{{ $b[1] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- NOTABLE ALUMNI --}}
    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3">Notable Alumni</p>
                <h2 class="font-serif font-semibold text-navy text-[32px] leading-[1.2]">GSL Alumni in Practice</h2>
                <p class="text-[15px] text-gray-500 mt-3 max-w-xl mx-auto">Graduates of the Ghana School of Law serve
                    across the judiciary, private practice, government, and academia.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                    $sectors = [
                        [
                            'label' => 'The Judiciary',
                            'desc' =>
                                "Judges and magistrates across all levels of Ghana's court system, from Circuit Courts to the Superior Courts.",
                            'tags' => ['High Court', 'Circuit Court', 'Supreme Court Registry'],
                            'icon' =>
                                '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />',
                        ],
                        [
                            'label' => 'Private Practice',
                            'desc' =>
                                'Partners and associates in leading law firms across Accra, Kumasi, and beyond.',
                            'tags' => ['Corporate Law', 'Litigation', 'In-House Counsel'],
                            'icon' =>
                                '<rect x="2" y="7" width="20" height="14" rx="2" ry="2" /><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />',
                        ],
                        [
                            'label' => 'Government & Public Service',
                            'desc' =>
                                'Legal advisors, prosecutors, and policy specialists in government ministries, departments, and agencies.',
                            'tags' => ['Attorney-General\'s Dept', 'Ministries & Agencies', 'State Prosecution'],
                            'icon' =>
                                '<line x1="3" y1="22" x2="21" y2="22" /><line x1="6" y1="18" x2="6" y2="11" /><line x1="10" y1="18" x2="10" y2="11" /><line x1="14" y1="18" x2="14" y2="11" /><line x1="18" y1="18" x2="18" y2="11" /><polygon points="12 2 20 7 4 7" />',
                        ],
                    ];
                @endphp
                @foreach ($sectors as $sector)
                    <div
                        class="group p-8 rounded-xl border border-gray-200 bg-gray-50 hover:border-gold/40 hover:bg-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <div
                            class="w-14 h-14 rounded-xl bg-navy group-hover:bg-gold flex items-center justify-center mb-6 transition-colors duration-300">
                            <svg class="w-6 h-6 text-gold group-hover:text-navy transition-colors duration-300"
                                fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
                                stroke-linejoin="round" viewBox="0 0 24 24">
                                {!! $sector['icon'] !!}
                            </svg>
                        </div>
                        <h3 class="font-serif font-semibold text-[18px] text-navy mb-3">{{ $sector['label'] }}</h3>
                        <p class="text-[14px] text-gray-600 leading-[1.75]">{{ $sector['desc'] }}</p>
                        <div class="flex flex-wrap gap-2 mt-6 pt-6 border-t border-gray-200">
                            @foreach ($sector['tags'] as $tag)
                                <span
                                    class="px-3 py-1 rounded-full bg-white border border-gray-200 text-[12px] font-medium text-gray-500 group-hover:border-gold/30 group-hover:text-navy transition-colors duration-300">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- JOIN / CTA --}}
    <section class="py-20 px-[5%] bg-gray-50 border-t border-gray-200">
        <div class="max-w-3xl mx-auto text-center">
            <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3">Stay Connected</p>
            <h2 class="font-serif font-semibold text-navy text-[30px] leading-[1.25] mb-5">
                Join the GSL Alumni Network
            </h2>
            <p class="text-[15px] text-gray-600 leading-[1.85] mb-8">
                Whether you were called last year or a decade ago, your place in the GSL community is always open.
                Register to update your details, access the alumni directory, and receive invitations to events.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="mailto:alumni@gslaw.edu.gh"
                    class="inline-flex items-center justify-center gap-2 px-8 py-3.5 text-[15px] font-semibold
                           bg-gold text-navy rounded hover:bg-gold-light hover:-translate-y-0.5 transition-all duration-200">
                    Register as Alumni
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" viewBox="0 0 24 24">
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <polyline points="12 5 19 12 12 19" />
                    </svg>
                </a>
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center justify-center gap-2 px-8 py-3.5 text-[15px] font-semibold
                           border border-navy/20 text-navy rounded hover:border-gold/50 hover:text-gold transition-all duration-200">
                    Contact the Alumni Office
                </a>
            </div>
            <p class="mt-6 text-[13px] text-gray-400">
                For enquiries email <a href="mailto:alumni@gslaw.edu.gh"
                    class="text-gold hover:underline">alumni@gslaw.edu.gh</a>
            </p>
        </div>
    </section>

@endsection
