@extends('layouts.app')
@section('title', 'Post-Call Law Course – Ghana School of Law')
@section('description',
    'The Post-Call Law Course at GSL - for lawyers already called to the Bar in other Common Law
    jurisdictions comparable to Ghana.')
@section('content')

    <section class="relative pt-[97px] md:pt-[133px] min-h-[300px] flex items-end pb-14 px-[5%]"
        style="background:linear-gradient(135deg,#030f1a 0%,#0c4a6e 50%,#051b2c 100%)">
        <div class="max-w-6xl mx-auto w-full">
            <p class="text-[14px] font-bold text-gold/70 tracking-[3px] uppercase mb-3">Our Programmes</p>
            <h1 class="font-serif font-semibold text-white leading-[1.1] mb-4" style="font-size:clamp(32px,5vw,58px)">
                Post-Call Law Course</h1>
            <p class="text-[16px] text-cloud/62 max-w-xl leading-[1.7]">
                The Post-Call Law Course is designed for Ghanaians and non-Ghanaians who have already been called
                to the Bar in other Common Law jurisdictions with legal systems comparable to that of Ghana. The
                course provides a structured introduction to the Ghanaian legal system and professional practice.
            </p>
        </div>
    </section>

    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-14">
                @foreach ([['Duration', 'One (1) Academic Year'], ['Qualification Awarded', 'Barrister-at-Law (BL)'], ['Programme Schedule', 'October to June each academic year'], ['Final Examinations', 'Conducted at the end of the programme']] as $m)
                    <div class="px-5 py-4 rounded-lg bg-gray-50 border border-gray-200">
                        <p class="text-[10px] font-bold text-gold tracking-[2px] uppercase mb-1">{{ $m[0] }}</p>
                        <p class="text-[14px] text-navy font-semibold">{{ $m[1] }}</p>
                    </div>
                @endforeach
            </div>

            <h3 class="font-serif font-semibold text-[20px] text-navy mb-5">Compulsory Subjects</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 mb-14">
                @foreach (['Law of Evidence', 'Family Law & Practice', 'Interpretation of Deeds & Statutes', 'Ghana Constitutional Law', 'Ghana Legal System'] as $s)
                    <div class="flex items-start gap-4 p-4 rounded-lg bg-gray-50 border border-gray-200">
                        <div class="w-2 h-2 rounded-full bg-gold flex-shrink-0 mt-1.5"></div>
                        <p class="text-[15px] font-semibold text-navy">{{ $s }}</p>
                    </div>
                @endforeach
            </div>

            <p class="text-[15px] text-gray-600 leading-[1.8] max-w-3xl">
                Successful candidates are enrolled as Barristers and Solicitors of the Supreme Court of Ghana.
            </p>
        </div>
    </section>

@endsection
