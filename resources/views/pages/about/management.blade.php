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
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ([['RA', 'Prof. Raymond Akongburo Atuguba', 'Ag. Director, Ghana School of Law'], ['JA', 'Mrs. Julliet Adu-Adjei', 'Registrar, Ghana School of Law']] as $m)
                    <div class="p-8 rounded-xl border border-gray-200 bg-gray-50 text-center">
                        <div
                            class="w-20 h-20 mx-auto rounded-full border-2 border-gold bg-gold/10 flex items-center justify-center font-serif font-bold text-[20px] text-gold mb-5">
                            {{ $m[0] }}</div>
                        <h3 class="font-serif font-semibold text-[18px] text-navy mb-1">{{ $m[1] }}</h3>
                        <p class="text-[11px] font-bold text-gold tracking-[1.5px] uppercase mb-4">{{ $m[2] }}</p>
                        <p class="text-[14px] text-gray-500 leading-[1.7]">Full profile coming soon.</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
