@extends('layouts.app')
@section('title', 'Management – Ghana School of Law')
@section('description', 'Meet the leadership of the Ghana School of Law.')
@section('content')

    <section class="relative pt-[97px] md:pt-[133px] min-h-[300px] flex items-end pb-14 px-[5%]"
        style="background:linear-gradient(135deg,#030f1a 0%,#0c4a6e 50%,#051b2c 100%)">
        <div class="max-w-6xl mx-auto w-full">
            <p class="text-[14px] font-bold text-gold/70 tracking-[3px] uppercase mb-3">About Ghana School of Law</p>
            <h1 class="font-serif font-semibold text-white leading-[1.1] mb-4" style="font-size:clamp(32px,5vw,58px)">
                Management</h1>
            <p class="text-[16px] text-cloud/62 max-w-xl leading-[1.7]">The leadership guiding the Ghana School of
                Law's mission and daily operations.</p>
        </div>
    </section>

    {{-- Leadership --}}
    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-6xl mx-auto">
            <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3 text-center">Leadership</p>
            <h2 class="font-serif font-semibold text-navy text-[34px] leading-[1.2] mb-12 text-center">
                Ghana School of Law Management</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ([
                    ['assets/images/management/director.png', 'Professor Raymond Atuguba', 'Ag. Director of Legal Education & Ag. Director, Ghana School of Law'],
                    ['assets/images/management/registrar.png', 'Mrs. Juliet Adu-Adjei', 'Registrar, Ghana School of Law'],
                    ['assets/images/management/deputy-registrar.png', 'Ms. Marian Atta-Boahene', 'Deputy Registrar, Ghana School of Law'],
                    ['assets/images/management/chief-accountant.png', 'Mr. Yussif Osman', 'Chief Accountant, General Legal Council (Ghana School of Law)'],
                    ['assets/images/management/campus-cordinator.png', 'Mr. Michael Gyang Owusu', 'Campus Coordinator'],
                ] as $m)
                    <div class="p-8 rounded-xl border border-gray-200 bg-gray-50 text-center">
                        <img src="{{ asset($m[0]) }}" alt="{{ $m[1] }}" loading="lazy"
                            class="w-28 h-28 mx-auto rounded-full object-cover border-2 border-gold mb-5">
                        <h3 class="font-serif font-semibold text-[18px] text-navy mb-1">{{ $m[1] }}</h3>
                        <p class="text-[13px] text-gray-500 leading-[1.6]">{{ $m[2] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- General Legal Council --}}
    <section class="py-20 px-[5%]" style="background:#061d3d">
        <div class="max-w-6xl mx-auto">
            <p class="text-[14px] font-bold text-gold/70 tracking-[3px] uppercase mb-3 text-center">Governing Body</p>
            <h2 class="font-serif font-semibold text-white text-[34px] leading-[1.2] mb-12 text-center">
                General Legal Council</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                @foreach ([
                    ['assets/images/management/ag-chief-justice.png', 'His Lordship Justice Paul Baffoe-Bonnie', 'Chief Justice & Ag. Chairperson'],
                    ['assets/images/management/justice-of-supreme-court-1.png', 'His Lordship Justice Gabriel Pwamang', 'Justice of the Supreme Court'],
                    ['assets/images/management/justice-of-the-supreme-court-2.png', 'Her Ladyship Justice Avril Lovelace-Johnson', 'Justice of the Supreme Court'],
                    ['assets/images/management/attorney-general.png', 'Hon. Dr. Dominic Akuritinga Ayine', 'Attorney-General and Minister for Justice'],
                    ['assets/images/management/deputy-ag.png', 'Dr. Justice Srem-Sai', 'Dep. Attorney-General and Dep. Minister for Justice'],
                    ['assets/images/management/legal-practitioner.png', 'Dr. Abdul-Bassit Aziz Bamba', 'Legal Practitioner'],
                    ['assets/images/management/legal-practitioner-2.png', 'Mrs. Clara Beeri Kasser-Tee', 'Legal Practitioner'],
                    ['assets/images/management/national-pres-ghana-bar.png', 'Mrs. Efua Ghartey', 'National President, Ghana Bar Association'],
                    ['assets/images/management/national-vice-pres-ghana-bar.png', 'Mrs. Victoria Barth', 'National Vice President, Ghana Bar Association'],
                    ['assets/images/management/pres-central-region-bar.png', 'Mr. Samuel Adu Yeboah', 'President, Central Regional Bar Association'],
                    ['assets/images/management/national-secretary-gba.png', 'Mr. Kwaku Gyau Baffour', 'National Secretary, Ghana Bar Association'],
                    ['assets/images/management/dean-ug.png', 'Prof. Peter Atudiwe Atupare', 'Dean, University of Ghana Law School, Legon'],
                    ['assets/images/management/judiciary-secretary.png', 'Mr. Issah Ahmed', 'Judicial Secretary and Secretary, GLC'],
                ] as $m)
                    <div class="flex flex-col items-center text-center gap-2">
                        <img src="{{ asset($m[0]) }}" alt="{{ $m[1] }}" loading="lazy"
                            class="w-24 h-24 rounded-full object-cover border-2 border-gold/60">
                        <p class="text-[13px] font-semibold text-white leading-[1.4]">{{ $m[1] }}</p>
                        <p class="text-[11px] text-cloud/62 leading-[1.4]">{{ $m[2] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Chairpersons of the GLC --}}
    <section class="py-20 px-[5%] bg-gray-50">
        <div class="max-w-6xl mx-auto">
            <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3 text-center">Institutional Memory</p>
            <h2 class="font-serif font-semibold text-navy text-[34px] leading-[1.2] mb-12 text-center">
                Chairpersons of the General Legal Council</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ([
                    ['assets/images/management/ag-chief-justice.png', 'His Lordship Justice Paul Baffoe-Bonnie', '2025-'],
                    ['assets/images/management/sackey-torkorno.png', 'Hon. Justice Gertrude A.E. Sackey Torkorno', '2023-2025'],
                    ['assets/images/management/annin-yeboah.png', 'Hon. Justice Annin Yeboah', '2020-2023'],
                    ['assets/images/management/akuffo-archer.png', 'Hon. Sophia A.B. Akuffo Archer', '2017-2019'],
                    ['assets/images/management/georgina-t-wood.png', 'Hon. Mrs. Georgina T. Wood', '2007-2017'],
                    ['assets/images/management/jk-acquah.png', 'Hon. Mr. Justice G.K. Acquah', '2003-2006'],
                    ['assets/images/management/ek-wiredu.png', 'Hon. Mr. Justice E.K Wiredu', '2001-2003'],
                    ['assets/images/management/ik-abban.png', 'Hon. Mr. Justice I.K Abban', '1995-2001'],
                    ['assets/images/management/penk-archer.png', 'Hon. Mr. Justice P.E.N.K. Archer', '1991-1995'],
                    ['assets/images/management/nyb-adade.png', 'Hon. Mr. Justice N.Y.B. Adade (Ag.)', '1990-1991'],
                    ['assets/images/management/enp-sowah.png', 'Hon. Mr. Justice E.N.P. Sowah', '1986-1990'],
                    ['assets/images/management/justice-apaloo.png', 'Hon. Justice Apaloo', '1977-1985'],
                    ['assets/images/management/azu-crabbe.png', 'Hon. Mr. Justice Azu Crabbe', '1972-1977'],
                    ['assets/images/management/justice-bannerman.png', 'Hon. Mr. Justice Bannerman', '1970-1972'],
                    ['assets/images/management/akuffo-addo.png', 'Hon. Mr. Justice Akuffo-Addo', '1966-1970'],
                    ['assets/images/management/sarkodie-addo.png', 'Hon. Mr. Justice Sarkodie-Addo', '1964-1966'],
                    ['assets/images/management/arku-korsah.png', 'Hon. Justice Sir Arku Korsah', '1958-1963'],
                ] as $m)
                    <div class="flex flex-col items-center text-center gap-2">
                        <img src="{{ asset($m[0]) }}" alt="{{ $m[1] }}" loading="lazy"
                            class="w-20 h-20 rounded-full object-cover border-2 border-gold/40">
                        <p class="text-[12px] font-semibold text-navy leading-[1.4]">{{ $m[1] }}</p>
                        <p class="text-[11px] text-gold font-bold">{{ $m[2] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 2025 Enrollment Committee --}}
    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-6xl mx-auto">
            <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3 text-center">2025 Enrollment</p>
            <h2 class="font-serif font-semibold text-navy text-[34px] leading-[1.2] mb-12 text-center">
                Members of the Enrollment Committee</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ([
                    ['assets/images/management/justice-of-supreme-court-1.png', 'His Lordship Justice Gabriel Pwamang JSC', 'Chairman'],
                    ['assets/images/management/then-ag-judicial-secretary.png', 'Dr. Cyracus B. Bapuuroh', 'Then Ag. Judicial Secretary & Ag. Secretary GLC, Member'],
                    ['assets/images/management/director.png', 'Professor Raymond Atuguba', 'Ag. Director of Legal Education & Director GSL, Member'],
                    ['assets/images/management/gesila-adanu.png', 'H/L Justice Franklina Gesila Adanu J A', 'Counsel GLC, Member'],
                    ['assets/images/management/registrar.png', 'Mrs. Juliet Adu-Adjei', 'Registrar GSL, Member'],
                    ['assets/images/management/deputy-registrar.png', 'Ms. Marian Atta-Boahene', 'Dep. Registrar GSL, Member'],
                    ['assets/images/management/chief-accountant.png', 'Mr. Yussif Osman', 'Chief Accountant, GLC, Member'],
                    ['assets/images/management/v-vanderpuije.png', 'Mr. Viktor Vanderpuije', 'Asst. Registrar/Snr. Protocol Officer GSL, Secretary/Member'],
                    ['assets/images/management/georgina-awuku-apaw.png', 'Miss Georgina Awuku-Apaw', 'Principal Administrative Officer, GLC, Member'],
                ] as $m)
                    <div class="p-6 rounded-xl border border-gray-200 bg-gray-50 text-center">
                        <img src="{{ asset($m[0]) }}" alt="{{ $m[1] }}" loading="lazy"
                            class="w-20 h-20 mx-auto rounded-full object-cover border-2 border-gold mb-4">
                        <h3 class="font-serif font-semibold text-[15px] text-navy mb-1">{{ $m[1] }}</h3>
                        <p class="text-[12px] text-gray-500 leading-[1.5]">{{ $m[2] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Department Heads --}}
    <section class="py-20 px-[5%] bg-gray-50">
        <div class="max-w-6xl mx-auto">
            <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3 text-center">Administration</p>
            <h2 class="font-serif font-semibold text-navy text-[34px] leading-[1.2] mb-12 text-center">
                Department Heads</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ([
                    ['assets/images/management/director.png', 'Professor Raymond Atuguba', 'Legal Department'],
                    ['assets/images/management/deputy-registrar.png', 'Ms. Marian Atta-Boahene', 'Academic Affairs'],
                    ['assets/mr.-yusif-osman_finance-resource-manager.jpeg', 'Mr. Yusif Osman', 'Finance & Resource Management'],
                    ['assets/mr.-leo-arthur-yarkwah_assurance-&-compliance.jpeg', 'Mr. Leo Arthur Yarkwah', 'Assurance & Compliance'],
                    ['assets/hr.jpg', 'Mrs Louisa Condoberry-Asamoah', 'People & Culture'],
                    ['assets/dr.-mrs.-georgina-ahorbo_student-experience-&-engagements.jpeg', 'Dr. Mrs. Georgina Ahorbo', 'Student Experience & Engagements'],
                    ['assets/mrs.-janet-odetsi-twum_learning-resources-&-knowledge-services.jpeg', 'Mrs. Janet Odetsi-Twum', 'Learning Resources & Knowledge Services'],
                    ['assets/lorraine-e.ocloo.png', 'Ms. Lorraine Ocloo', 'Digital Transformation & Innovation'],
                    ['assets/mr.-enyo-tawiah_facilities,-operations-&-logistics.jpeg', 'Mr. Enyo Tawiah', 'Facilities, Operations & Logistics'],
                    ['assets/whatsapp-image-2026-05-27-at-5.30.25-pm(1).jpeg', 'Francisca Kakra Forson', 'Corporate Affairs'],
                ] as $m)
                    <div class="p-8 rounded-xl border border-gray-200 bg-white text-center">
                        <img src="{{ asset($m[0]) }}" alt="{{ $m[1] }}" loading="lazy"
                            class="w-28 h-28 mx-auto rounded-full object-cover border-2 border-gold mb-5">
                        <h3 class="font-serif font-semibold text-[18px] text-navy mb-1">{{ $m[1] }}</h3>
                        <p class="text-[13px] font-bold text-gold uppercase tracking-[1px]">{{ $m[2] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
