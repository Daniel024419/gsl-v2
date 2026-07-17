@extends('layouts.app')
@section('title', 'Non-Statutory Programme – Ghana School of Law')
@section('description',
    'Bar Examination Remedial Courses and Specialised Professional Development - elective programmes
    offered by GSL beyond its statutory mandate.')
@section('content')

    <section class="relative pt-[97px] md:pt-[133px] min-h-[300px] flex items-end pb-14 px-[5%]"
        style="background:linear-gradient(135deg,#030f1a 0%,#0c4a6e 50%,#051b2c 100%)">
        <div class="max-w-6xl mx-auto w-full">
            <p class="text-[14px] font-bold text-gold/70 tracking-[3px] uppercase mb-3">Our Programmes</p>
            <h1 class="font-serif font-semibold text-white leading-[1.1] mb-4" style="font-size:clamp(32px,5vw,58px)">
                Non-Statutory Programme</h1>
            <p class="text-[16px] text-cloud/62 max-w-xl leading-[1.7]">Elective programmes GSL offers beyond its
                statutory mandate, supporting Bar candidates and practising lawyers alike.</p>
        </div>
    </section>

    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ([['remedial', 'Bar Examination Remedial Courses', 'Full intensive prep, subject-specific remedial, mock exams, and one-on-one tutoring for candidates preparing to sit the Bar Examination.'], ['specialised', 'Specialised Professional Development', 'Continuing education across emerging practice areas, professional skills, and sectoral specialisations for practising lawyers.']] as $p)
                <a href="{{ route('programmes') }}#{{ $p[0] }}"
                    class="group p-8 rounded-xl border border-gray-200 bg-gray-50 hover:border-gold/40 transition-all duration-200">
                    <h3
                        class="font-serif font-semibold text-[20px] text-navy mb-3 group-hover:text-gold transition-colors duration-200">
                        {{ $p[1] }}</h3>
                    <p class="text-[15px] text-gray-600 leading-[1.75] mb-4">{{ $p[2] }}</p>
                    <span class="text-[11px] font-bold tracking-[2px] uppercase text-gold">View Details &rarr;</span>
                </a>
            @endforeach
        </div>
    </section>

@endsection
