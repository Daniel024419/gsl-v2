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

    {{-- History --}}
    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3">Our History</p>
                <h2 class="font-serif font-semibold text-navy text-[34px] leading-[1.2] mb-5">
                    Over Six Decades of<br><span class="text-gold">Legal Excellence</span>
                </h2>
                <div class="w-10 h-[3px] bg-gold rounded-full mb-6"></div>
                <p class="text-[15px] text-gray-600 leading-[1.8] mb-5">
                    The Ghana School of Law was established in 1963 to provide professional legal education
                    for law graduates seeking to be called to the Bar. For over six decades, GSL has been
                    the cornerstone of legal professional development in Ghana, producing over 12,000 qualified lawyers.
                </p>
                <p class="text-[15px] text-gray-600 leading-[1.8]">
                    In 2026, the Legal Education Act (Act 1170) transformed the institution. GSL became a
                    Directorate of the newly established Council for Legal Education and Training (CLET),
                    operating within a broader national framework for legal education quality and standards.
                </p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                @foreach ([['1963', 'GSL Founded'], ['12,226+', 'Lawyers Enrolled'], ['3', 'Campuses'], ['2026', 'Act 1170']] as $f)
                    <div class="p-6 rounded-xl bg-gray-50 border border-gray-200 text-center">
                        <p class="font-serif font-bold text-gold text-[32px] mb-1">{{ $f[0] }}</p>
                        <p class="text-[11px] text-gray-500 uppercase tracking-[1.5px] font-semibold">{{ $f[1] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
