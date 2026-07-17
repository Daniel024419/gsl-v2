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
                @foreach ([['Vision', 'To be Ghana\'s leading centre of professional legal education, producing competent, ethical, and innovative legal practitioners of international standing.'], ['Mission', 'To deliver high-quality professional legal education and training, support Bar Examination candidates, and serve as the gateway for international lawyers entering Ghana\'s legal profession.'], ['Values', 'Excellence · Integrity · Innovation · Inclusion · Collaboration · Service to the Legal Profession and to Ghana.']] as $v)
                    <div class="p-8 rounded-xl border border-gray-200 bg-gray-50 text-center">
                        <h3 class="font-serif font-semibold text-[20px] text-navy mb-4 pb-4 border-b border-gray-200">
                            {{ $v[0] }}</h3>
                        <p class="text-[15px] text-gray-600 leading-[1.75]">{{ $v[1] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
