@extends('layouts.app')
@section('title', 'Overview – Ghana School of Law')
@section('description', 'An overview of the Ghana School of Law - vision, mission, and core values.')
@section('content')

    <section class="relative pt-[97px] md:pt-[133px] min-h-[300px] flex items-end pb-14 px-[5%]"
        style="background:linear-gradient(135deg,#030f1a 0%,#0c4a6e 50%,#051b2c 100%)">
        <div class="max-w-6xl mx-auto w-full">
            <p class="text-[14px] font-bold text-gold/70 tracking-[3px] uppercase mb-3">About Ghana School of Law</p>
            <h1 class="font-serif font-semibold text-white leading-[1.1] mb-4" style="font-size:clamp(32px,5vw,58px)">
                Overview</h1>
            <p class="text-[16px] text-cloud/62 max-w-xl leading-[1.7]">Ghana's premier institution for professional
                legal training, operating as a Directorate of CLET under the Legal Education Act, 2026 (Act 1170).</p>
        </div>
    </section>

    {{-- Vision / Mission / Values --}}
    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3">Our Identity</p>
                <h2 class="font-serif font-semibold text-navy text-[34px]">Vision, Mission <span class="text-gold">&amp;
                        Values</span></h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ([['Vision', 'The vision of Ghana School of Law is to become a center of excellence in Africa and the world at large for professional legal training and research.'], ['Mission', "The General Legal Council ensures fair and efficient legal education and upholds high professional standards in Ghana's legal practice."], ['Values', 'Excellence · Integrity · Innovation · Inclusion · Collaboration · Service to the Legal Profession and to Ghana.']] as $v)
                    <div class="p-8 rounded-xl border border-gray-200 bg-gray-50 text-center">
                        <h3 class="font-serif font-semibold text-[20px] text-navy mb-4 pb-4 border-b border-gray-200">
                            {{ $v[0] }}</h3>
                        <p class="text-[15px] text-gray-600 leading-[1.75]">{{ $v[1] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Institutional Overview --}}
    <section class="py-20 px-[5%] bg-gray-50">
        <div class="max-w-4xl mx-auto">
            <div class="space-y-5 text-[15px] text-gray-600 leading-[1.8] mb-10">
                <p>The Ghana School of Law was established in <strong class="text-navy">1958</strong>, by Ghana's
                    first President <strong class="text-navy">Dr. Kwame Nkrumah</strong>, and was the first of its
                    kind in <strong class="text-navy">Sub-Saharan Africa</strong>. The school is the leading Law
                    School in the sub-region and serves students from other Commonwealth countries in the
                    sub-region.</p>
                <p>To cater to the increasing number of applicants both from within the country and beyond, the
                    School currently has two additional campuses to the main campus namely the
                    <strong class="text-navy">Kumasi</strong> campus based at the Kwame Nkrumah University of
                    Science and Technology (KNUST), and the <strong class="text-navy">Greenhill Legon</strong>
                    campus based at the Ghana Institute of Management and Public Administration (GIMPA) and UPSA.
                </p>
                <p>We are indeed proud of our numerous alumni who are serving in various capacities throughout the
                    world and advancing the cause of justice.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <a href="#msg-from-director"
                    class="flex items-center justify-center text-center p-6 rounded-xl bg-white border border-gray-200 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                    <span class="font-serif font-semibold text-navy text-[15px] uppercase tracking-[1px]">Welcome
                        from the Director</span>
                </a>
                <a href="#msg-from-registrar"
                    class="flex items-center justify-center text-center p-6 rounded-xl bg-white border border-gray-200 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                    <span class="font-serif font-semibold text-navy text-[15px] uppercase tracking-[1px]">Message
                        from the Registrar</span>
                </a>
            </div>
        </div>
    </section>

    {{-- Objectives --}}
    <section class="py-20 px-[5%] bg-navy">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-14">
                <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3">
                    What We Do
                </p>

                <h2 class="font-serif font-semibold text-white text-[34px]">
                    Our Objectives
                </h2>

                <p class="mt-4 text-white/75 max-w-2xl mx-auto leading-7">
                    We are committed to delivering quality legal education, professional development,
                    and practical training for the legal profession.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                @foreach (['Provision of continuing legal education for professional lawyers and paralegals', 'Provision of facilities to enable professional lawyers to specialize in various areas of the law', 'Pupilage of newly enrolled lawyers', 'Training of suitable persons to become professional lawyers'] as $o)
                    <div
                        class="group bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-gold/15">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gold" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>

                            <p class="text-[15px] leading-7 text-gray-700">
                                {{ $o }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Welcome from the Director --}}
    <section class="py-20 px-[5%] bg-white" id="msg-from-director">
        <div class="max-w-4xl mx-auto">
            <img src="{{ asset('assets/images/management/director.png') }}" alt="Prof. Raymond Akongburo Atuguba"
                loading="lazy" class="float-right ml-6 mb-4 w-40 h-40 rounded-full object-cover border-2 border-gold">
            <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3">A Message</p>
            <h2 class="font-serif font-semibold text-navy text-[30px] leading-[1.2] mb-6">Welcome from the Director
            </h2>
            <div class="space-y-5 text-[15px] text-gray-600 leading-[1.8]">
                <p><strong class="text-navy">It is a privilege to welcome you to the Ghana School of Law.</strong></p>
                <p>For over six decades, this institution has been the crucible through which many of Ghana's finest
                    legal minds have passed, judges, advocates, public servants, scholars, and leaders across every
                    sphere of national life. You now join that distinguished tradition.</p>
                <p>The study of law is not merely an academic pursuit. It is a calling to serve, to protect justice,
                    strengthen institutions, and contribute meaningfully to our nation's development. We therefore
                    expect you to approach your training with discipline, humility, and a deep sense of
                    responsibility.</p>
                <p>At GSL, you will encounter rigorous teaching, practical training, and a community that is
                    committed to excellence and ethical leadership. Engage fully. Read widely. Ask questions. Develop
                    not only your intellect, but your character, your sense of duty, and your commitment to the rule
                    of law.</p>
                <p>As we continue to modernize legal education, strengthening digital systems, expanding student
                    services, and reinforcing institutional standards, we ask for your partnership. Together, we are
                    building a School that reflects the aspirations of Ghana and the demands of a rapidly evolving
                    world.</p>
                <p>I wish you a purposeful and enriching journey here. May your time at the Ghana School of Law
                    prepare you not only to practice law, but to help shape the future of our nation.</p>
                <p class="pt-2">
                    <strong class="text-navy block">Prof. Raymond Akongburo Atuguba</strong>
                    <strong class="text-navy block">Ag. Director, Ghana School of Law</strong>
                </p>
            </div>
        </div>
    </section>

    {{-- Message from the Registrar --}}
    <section class="py-20 px-[5%] bg-gray-50" id="msg-from-registrar">
        <div class="max-w-4xl mx-auto">
            <img src="{{ asset('assets/images/management/image 42.png') }}" alt="Mrs. Julliet Adu-Adjei" loading="lazy"
                class="float-right ml-6 mb-4 w-40 h-40 rounded-full object-cover border-2 border-gold">
            <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3">A Message</p>
            <h2 class="font-serif font-semibold text-navy text-[30px] leading-[1.2] mb-6">Message from the Registrar
            </h2>
            <div class="space-y-5 text-[15px] text-gray-600 leading-[1.8]">
                <p><strong class="text-navy">Welcome to the Ghana School of Law.</strong></p>
                <p>As Registrar, it is my duty and privilege to support your academic journey, ensure the smooth
                    administration of all programmes, and uphold the standards that define this great institution.
                    Whether you are joining us for the first time or continuing your studies, you are now part of a
                    community built on discipline, integrity, and excellence.</p>
                <p>The path you have chosen is demanding. Legal education requires rigour, not only in study, but in
                    conduct, attitude, and respect for institutional systems. We encourage you to embrace the
                    structures that guide your training, to engage actively with faculty and colleagues, and to
                    approach every aspect of your work with professionalism.</p>
                <p>Our administrative and support teams are here to assist you. From admissions and records, to
                    academic scheduling, student services, IT support, and campus operations, we are committed to
                    helping create an environment that enables learning, growth, and success. If you need guidance,
                    request it early. If you face challenges, communicate with us. Partnership and accountability are
                    the hallmarks of excellence.</p>
                <p>This period also represents an important moment in the School's evolution, strengthening academic
                    delivery, streamlining processes, digitising key systems, and enhancing the student experience.
                    We ask for your cooperation as we implement reforms designed to create a modern, efficient, and
                    secure learning ecosystem.</p>
                <p>We are confident that with commitment, discipline, and respect for the profession you aspire to
                    join, your time here will be rewarding and transformative.</p>
                <p>We wish you the very best in your studies and in your service to the law and our nation.</p>
                <p class="pt-2">
                    <strong class="text-navy block">Mrs. Julliet Adu-Adjei</strong>
                    <strong class="text-navy block">Registrar, Ghana School of Law</strong>
                </p>
            </div>
        </div>
    </section>

@endsection
