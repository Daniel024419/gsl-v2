@extends('layouts.app')
@section('title', 'History – Ghana School of Law')
@section('description', 'The history of the Ghana School of Law - over six decades of legal excellence in Ghana.')
@section('content')

    <section class="relative pt-[97px] md:pt-[133px] min-h-[300px] flex items-end pb-14 px-[5%]"
        style="background:linear-gradient(135deg,#030f1a 0%,#0c4a6e 50%,#051b2c 100%)">
        <div class="max-w-6xl mx-auto w-full">
            <p class="text-[14px] font-bold text-gold/70 tracking-[3px] uppercase mb-3">About Ghana School of Law</p>
            <h1 class="font-serif font-semibold text-white leading-[1.1] mb-4" style="font-size:clamp(32px,5vw,58px)">
                History</h1>
            <p class="text-[16px] text-cloud/62 max-w-xl leading-[1.7]">Over six decades of legal excellence,
                producing thousands of qualified lawyers for Ghana and the sub-region.</p>
        </div>
    </section>

    {{-- 1957 - 1958: A Vision for Legal Education --}}
    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3">1957 – 1958</p>
                <h2 class="font-serif font-semibold text-navy text-[34px] leading-[1.2] mb-5">
                    A Vision for<br><span class="text-gold">Legal Education</span>
                </h2>
                <div class="w-10 h-0.75 bg-gold rounded-full mb-6"></div>
                <p class="text-[15px] text-gray-600 leading-[1.8] mb-5">
                    When Ghana gained independence in 1957, President Dr. Kwame Nkrumah recognized the need
                    for a local system to train lawyers. Until then, aspiring lawyers had to travel to the
                    United Kingdom for legal education - a privilege available to only a few.
                </p>
                <p class="text-[15px] text-gray-600 leading-[1.8]">
                    Though not a lawyer himself, Nkrumah's foresight led to the creation of an indigenous
                    institution that would train lawyers in Ghana, for Ghana.
                </p>
            </div>
            <div class="flex items-center justify-center">
                <img src="{{ asset('assets/images/history/Dr.-Kwame-Nkrumah-Copy-696x491 1.png') }}" alt="Dr. Kwame Nkrumah"
                    loading="lazy" class="rounded-full border-8 border-gold/60 object-cover w-70 h-70 sm:w-85 sm:h-85">
            </div>
        </div>
    </section>

    {{-- 1958: Establishment of the GSL --}}
    <section class="py-20 px-[5%]" style="background:#061d3d">
        <div class="max-w-4xl mx-auto">
            <p class="text-[14px] font-bold text-gold/70 tracking-[3px] uppercase mb-3">1958</p>
            <h2 class="font-serif font-semibold text-white text-[34px] leading-[1.2] mb-6">
                Establishment of the Ghana School of Law</h2>
            <p class="text-[15px] text-cloud/80 leading-[1.8] mb-5">
                In 1958, Parliament passed the Legal Practitioners Act, which:
            </p>
            <ul class="list-disc list-inside space-y-2 text-[15px] text-cloud/80 leading-[1.8] mb-5">
                <li>Established the General Legal Council (GLC) to regulate legal education and professional
                    standards.</li>
                <li>Created the Board of Legal Education, responsible for organizing courses and examinations.</li>
            </ul>
            <p class="text-[15px] text-cloud/80 leading-[1.8]">
                The GLC held its first meeting on 3rd September 1958, chaired by Chief Justice Sir Arku
                Korsah, marking the beginning of a new chapter in Ghana's legal history.
            </p>
        </div>
    </section>

    {{-- 1958 - 1959: The School Opens at Makola --}}
    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-4xl mx-auto">
            <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3">1958 – 1959</p>
            <h2 class="font-serif font-semibold text-navy text-[34px] leading-[1.2] mb-6">
                The School Opens at Makola</h2>
            <div class="w-10 h-0.75 bg-gold rounded-full mb-6"></div>
            <p class="text-[15px] text-gray-600 leading-[1.8] mb-5">
                The Ghana School of Law officially opened its doors in December 1958 at Makola, Accra - a
                name meaning:
            </p>
            <blockquote class="border-l-4 border-gold pl-5 mb-5">
                <p class="font-serif italic text-navy text-[20px] leading-normal mb-2">"I have come to fetch fire."</p>
                <p class="text-[15px] text-gray-600 leading-[1.8]">Hundreds applied, but after rigorous selection,
                    only 97 students began their training.</p>
            </blockquote>
            <p class="text-[15px] text-gray-600 leading-[1.8]">
                In 1959, Dr. Nkrumah unveiled a commemorative plaque at the completed campus, symbolizing the
                dawn of Ghana's own legal education system.
            </p>
        </div>
    </section>

    {{-- 1963: The First Graduating Class --}}
    <section class="py-20 px-[5%] bg-[#FCFAF5]">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            <div>
                <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3">
                    1963
                </p>

                <h2 class="font-serif font-semibold text-navy text-[34px] leading-[1.2] mb-6">
                    The First Graduating Class
                </h2>

                <p class="text-[15px] text-navy/80 leading-[1.9] mb-5">
                    By June 1963, after years of dedication, nine pioneering students became the first
                    locally trained Ghanaian lawyers. They were called to the Ghana Bar on
                    <span class="font-semibold text-navy">22nd June 1963</span>.
                    The first nine graduates were:
                </p>

                <ul class="grid grid-cols-2 gap-x-6 gap-y-2 text-[15px] text-navy/80 leading-[1.8] mb-6">
                    <li>• E.K. Aikins</li>
                    <li>• M. Akotiah</li>
                    <li>• H. Anancy</li>
                    <li>• K. Bannerman-Williams</li>
                    <li>• E. Creepy</li>
                    <li>• E. Essiem</li>
                    <li>• E. Offei</li>
                    <li>• Osafo-Buabeng</li>
                    <li>• P.K. Senayah</li>
                </ul>

                <p class="text-[13px] italic text-navy/60 leading-[1.7] border-l-4 border-gold pl-4">
                    Kwaku Baah Esq. was also part of the first cohort but could not be called to the Bar on that day.
                </p>
            </div>

            <div class="flex items-center justify-center">
                <img src="{{ asset('assets/images/history/pioneers-1024x578-1 2.png') }}" alt="The pioneering graduates"
                    loading="lazy" class="rounded-xl shadow-2xl border border-gold/20 max-w-full">
            </div>

        </div>
    </section>

    {{-- 1963: The Pioneering Years --}}
    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-6xl mx-auto">
            <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3">1963</p>
            <h2 class="font-serif font-semibold text-navy text-[34px] leading-[1.2] mb-6">The Pioneering Years</h2>
            <div class="grid grid-cols-1 lg:grid-cols-[minmax(0,1fr)_2fr] gap-12">
                <div>
                    <p class="text-[15px] text-gray-600 leading-[1.8] mb-4">
                        Following the first call to the Bar in 1963, the Ghana School of Law quickly gained
                        recognition for its high academic and professional standards.
                    </p>
                    <p class="text-[15px] text-gray-600 leading-[1.8]">
                        The Class of 1967 produced some of Ghana's most influential lawyers, judges, and
                        public servants - pioneers who helped cement the School's reputation and shaped the
                        nation's legal landscape.
                    </p>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
                    @foreach ([['assets/images/history/justice_brobbey 1.png', 'Justice S.A Brobbey'], ['assets/images/history/President-Atta-Mills 1.png', 'Pres. J.E.A Mills'], ['assets/images/history/Former-finance-minister-Kwesi-Botchwey-is-dead 1.png', 'Dr. Kwesi Botchway'], ['assets/images/history/placeholder.png', 'H.E. Prof. Turkson'], ['assets/images/history/tawia-modibo-ocran-b5fc758c-8c5d-4016-be56-d61b1c3a6f7-resize-750 1.png', 'Justice Modibo Ocran'], ['assets/images/history/placeholder.png', 'Justice Adjabeng'], ['assets/images/history/placeholder.png', 'Major General Donkor'], ['assets/images/history/placeholder.png', 'Dr Bimpong Buta'], ['assets/images/history/placeholder.png', 'Prof. Ofori Amankwah'], ['assets/images/history/placeholder.png', 'Ignatius De Paul'], ['assets/images/history/placeholder.png', 'Mrs. Kokovi Tay']] as $p)
                        <div class="flex flex-col items-center text-center gap-2">
                            <img src="{{ asset($p[0]) }}" alt="{{ $p[1] }}" loading="lazy"
                                class="w-20 h-20 rounded-full object-cover border-4 border-gold/50">
                            <span class="text-[12px] text-gray-600 leading-[1.4]">{{ $p[1] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Today: A Legacy of Excellence --}}
    <section class="py-20 px-[5%] bg-gray-50">
        <div class="max-w-6xl mx-auto">
            <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3 text-center">Today</p>
            <h2 class="font-serif font-semibold text-navy text-[34px] leading-[1.2] mb-12 text-center">
                A Legacy of Excellence</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                @foreach ([['400+ Judges & Public Officials', 'Serving with integrity across courts and public institutions.'], ['12,226+ Lawyers Trained', "Shaping Ghana's legal system and beyond."], ['Alumni in 20+ Countries', 'Championing Ghanaian legal excellence worldwide.']] as $s)
                    <div
                        class="p-8 rounded-xl bg-gold/20 border border-gold/30 text-center flex flex-col items-center justify-center gap-3">
                        <p class="font-serif font-bold text-navy text-[20px] leading-[1.3]">{{ $s[0] }}</p>
                        <p class="text-[14px] text-gray-600 leading-[1.6]">{{ $s[1] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
