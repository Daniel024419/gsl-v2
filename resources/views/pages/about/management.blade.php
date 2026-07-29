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
                @foreach ($leadership as $m)
                    <div class="group relative p-8 rounded-xl border border-gray-200 bg-gray-50 text-center hover:z-20">
                        <img src="{{ $m->image_url }}" alt="{{ $m->name }}" loading="lazy"
                            class="w-35 h-35 mx-auto rounded-full object-cover border-2 border-gold mb-5">
                        <h3 class="font-serif font-semibold text-[18px] text-navy mb-1">{{ $m->name }}</h3>
                        <p class="text-[13px] text-gray-500 leading-[1.6]">{{ $m->role?->name }}</p>

                        <div
                            class="pointer-events-none absolute bottom-full left-1/2 z-30 mb-3 w-65 -translate-x-1/2 scale-95 opacity-0 transition-all duration-300 ease-out group-hover:scale-100 group-hover:opacity-100">
                            <div class="rounded-xl bg-white p-4 text-center shadow-2xl ring-1 ring-black/5">
                                <img src="{{ $m->image_url }}" alt="{{ $m->name }}" loading="lazy"
                                    class="mx-auto mb-2 h-50 w-50 rounded-full object-cover border-2 border-gold">
                                <p class="font-serif font-semibold text-[13px] text-navy leading-snug">{{ $m->name }}</p>
                                <p class="mt-0.5 text-[11px] text-gray-500 leading-snug">{{ $m->role?->name }}</p>
                            </div>
                            <div class="mx-auto -mt-1.5 h-3 w-3 rotate-45 bg-white ring-1 ring-black/5"></div>
                        </div>
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
                @foreach ($governingBody as $m)
                    <div class="group relative flex flex-col items-center text-center gap-2 hover:z-20">
                        <img src="{{ $m->image_url }}" alt="{{ $m->name }}" loading="lazy"
                            class="w-35 h-35 rounded-full object-cover border-2 border-gold/60">
                        <p class="text-[13px] font-semibold text-white leading-[1.4]">{{ $m->name }}</p>
                        <p class="text-[12px] text-cloud/62 leading-[1.4]">{{ $m->role?->name }}</p>

                        <div
                            class="pointer-events-none absolute bottom-full left-1/2 z-30 mb-3 w-56 -translate-x-1/2 scale-95 opacity-0 transition-all duration-300 ease-out group-hover:scale-100 group-hover:opacity-100">
                            <div class="rounded-xl bg-white p-4 text-center shadow-2xl ring-1 ring-black/5">
                                <img src="{{ $m->image_url }}" alt="{{ $m->name }}" loading="lazy"
                                    class="mx-auto mb-2 h-50 w-50 rounded-full object-cover border-2 border-gold">
                                <p class="font-serif font-semibold text-[13px] text-navy leading-snug">{{ $m->name }}</p>
                                <p class="mt-0.5 text-[11px] text-gray-500 leading-snug">{{ $m->role?->name }}</p>
                            </div>
                            <div class="mx-auto -mt-1.5 h-3 w-3 rotate-45 bg-white ring-1 ring-black/5"></div>
                        </div>
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
                @foreach ($institutionalMemory as $m)
                    <div class="group relative flex flex-col items-center text-center gap-2 hover:z-20">
                        <img src="{{ $m->image_url }}" alt="{{ $m->name }}" loading="lazy"
                            class="w-35 h-35 rounded-full object-cover border-2 border-gold/40">
                        <p class="text-[13px] font-semibold text-navy leading-[1.4]">{{ $m->name }}</p>
                        <p class="text-[12px] text-gold font-bold">{{ $m->tenure }}</p>

                        <div
                            class="pointer-events-none absolute bottom-full left-1/2 z-30 mb-3 w-56 -translate-x-1/2 scale-95 opacity-0 transition-all duration-300 ease-out group-hover:scale-100 group-hover:opacity-100">
                            <div class="rounded-xl bg-white p-4 text-center shadow-2xl ring-1 ring-black/5">
                                <img src="{{ $m->image_url }}" alt="{{ $m->name }}" loading="lazy"
                                    class="mx-auto mb-2 h-50 w-50 rounded-full object-cover border-2 border-gold">
                                <p class="font-serif font-semibold text-[13px] text-navy leading-snug">{{ $m->name }}</p>
                                <p class="mt-0.5 text-[11px] text-gold font-bold leading-snug">{{ $m->tenure }}</p>
                            </div>
                            <div class="mx-auto -mt-1.5 h-3 w-3 rotate-45 bg-white ring-1 ring-black/5"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 2025 Enrollment Committee --}}
    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-6xl mx-auto">
            <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3 text-center">Enrollment Committee</p>
            <h2 class="font-serif font-semibold text-navy text-[34px] leading-[1.2] mb-12 text-center">
                Members of the Enrollment Committee</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($enrollmentCommittee as $m)
                    <div class="group relative p-6 rounded-xl border border-gray-200 bg-gray-50 text-center hover:z-20">
                        <img src="{{ $m->image_url }}" alt="{{ $m->name }}" loading="lazy"
                            class="w-35 h-35 mx-auto rounded-full object-cover border-2 border-gold mb-4">
                        <h3 class="font-serif font-semibold text-[15px] text-navy mb-1">{{ $m->name }}</h3>
                        <p class="text-[13px] text-gray-500 leading-[1.5]">{{ $m->role?->name }}</p>

                        <div
                            class="pointer-events-none absolute bottom-full left-1/2 z-30 mb-3 w-56 -translate-x-1/2 scale-95 opacity-0 transition-all duration-300 ease-out group-hover:scale-100 group-hover:opacity-100">
                            <div class="rounded-xl bg-white p-4 text-center shadow-2xl ring-1 ring-black/5">
                                <img src="{{ $m->image_url }}" alt="{{ $m->name }}" loading="lazy"
                                    class="mx-auto mb-2 h-50 w-50 rounded-full object-cover border-2 border-gold">
                                <p class="font-serif font-semibold text-[13px] text-navy leading-snug">{{ $m->name }}</p>
                                <p class="mt-0.5 text-[11px] text-gray-500 leading-snug">{{ $m->role?->name }}</p>
                            </div>
                            <div class="mx-auto -mt-1.5 h-3 w-3 rotate-45 bg-white ring-1 ring-black/5"></div>
                        </div>
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
                @foreach ($departmentHeads as $m)
                    <div class="group relative p-8 rounded-xl border border-gray-200 bg-white text-center hover:z-20">
                        <img src="{{ $m->image_url }}" alt="{{ $m->name }}" loading="lazy"
                            class="w-35 h-35 mx-auto rounded-full object-cover border-2 border-gold mb-5">
                        <h3 class="font-serif font-semibold text-[18px] text-navy mb-1">{{ $m->name }}</h3>
                        <p class="text-[13px] font-bold text-gold uppercase tracking-[1px]">{{ $m->role?->name }}</p>

                        <div
                            class="pointer-events-none absolute bottom-full left-1/2 z-30 mb-3 w-56 -translate-x-1/2 scale-95 opacity-0 transition-all duration-300 ease-out group-hover:scale-100 group-hover:opacity-100">
                            <div class="rounded-xl bg-white p-4 text-center shadow-2xl ring-1 ring-black/5">
                                <img src="{{ $m->image_url }}" alt="{{ $m->name }}" loading="lazy"
                                    class="mx-auto mb-2 h-50 w-50 rounded-full object-cover border-2 border-gold">
                                <p class="font-serif font-semibold text-[13px] text-navy leading-snug">{{ $m->name }}</p>
                                <p class="mt-0.5 text-[11px] font-bold text-gold uppercase tracking-[1px] leading-snug">
                                    {{ $m->role?->name }}</p>
                            </div>
                            <div class="mx-auto -mt-1.5 h-3 w-3 rotate-45 bg-white ring-1 ring-black/5"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
