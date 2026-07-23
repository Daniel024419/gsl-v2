@extends('layouts.app')
@section('title', $event['title'].' – Ghana School of Law')
@section('description', $event['desc'])
@section('content')

    {{-- ══ EVENT HERO ═══════════════════════════════════════════════════ --}}
    <section class="max-w-6xl mx-auto px-[5%] pt-[97px] md:pt-[133px] pb-16">
        <a href="{{ route('events') }}"
            class="inline-flex items-center gap-2 text-[13px] font-bold tracking-[2px] uppercase text-gold hover:underline mb-8">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" viewBox="0 0 24 24">
                <line x1="19" y1="12" x2="5" y2="12" />
                <polyline points="12 19 5 12 12 5" />
            </svg>
            Back to Events
        </a>

        <div class="relative aspect-[16/9] w-full overflow-hidden rounded-xl mb-8">
            <img src="{{ asset($event['image']) }}" alt="{{ $event['title'] }}" loading="lazy"
                class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0"
                style="background:linear-gradient(135deg,rgba(3,15,26,0.55) 0%,rgba(7,30,47,0.25) 45%,transparent 100%)">
            </div>
            {{-- Calendar badge --}}
            <div class="absolute top-5 left-5 w-16 rounded-lg overflow-hidden shadow-lg">
                <div class="bg-gold text-navy text-[11px] font-bold uppercase tracking-wide text-center py-1.5">
                    {{ strtoupper(substr($event['month'], 0, 3)) }}</div>
                <div class="bg-white text-navy font-serif font-bold text-[26px] text-center py-2 leading-none">
                    {{ $event['day'] }}</div>
            </div>
            <span
                class="absolute top-5 right-5 text-[11px] font-bold tracking-[2px] uppercase text-white bg-black/40 backdrop-blur-sm px-3 py-1.5 rounded-full">
                {{ $event['year'] }}</span>
        </div>

        <span class="text-[10px] font-bold tracking-[3px] uppercase text-gold block mb-3">Events Calendar</span>
        <h1 class="font-serif font-semibold text-white leading-[1.2] mb-6 max-w-3xl"
            style="font-size:clamp(28px,4vw,48px)">
            {{ $event['title'] }}
        </h1>

        <div class="flex flex-wrap items-center gap-x-8 gap-y-3">
            <p class="flex items-center gap-2 text-[15px] text-cloud/75">
                <svg class="w-4 h-4 stroke-gold fill-none shrink-0" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" />
                    <polyline points="12 6 12 12 16 14" />
                </svg>
                {{ $event['time'] }}
            </p>
            <p class="flex items-center gap-2 text-[15px] text-cloud/75">
                @if ($event['location'] === 'Online Portal')
                    <svg class="w-4 h-4 stroke-gold fill-none shrink-0" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                        <line x1="2" y1="12" x2="22" y2="12" />
                        <path
                            d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z" />
                    </svg>
                @else
                    <svg class="w-4 h-4 stroke-gold fill-none shrink-0" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                        <circle cx="12" cy="10" r="3" />
                    </svg>
                @endif
                {{ $event['location'] }}
            </p>
        </div>
    </section>

    {{-- ══ EVENT BODY ═══════════════════════════════════════════════════ --}}
    <section class="bg-white">
        <div class="max-w-6xl mx-auto px-[5%] py-16">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                <div class="lg:col-span-8 space-y-6">
                    @foreach ($event['body'] as $paragraph)
                        <p class="text-[16px] text-gray-600 leading-[1.85]">{{ $paragraph }}</p>
                    @endforeach
                </div>

                <aside class="lg:col-span-4 space-y-6">

                    {{-- More Events --}}
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <h3
                            class="text-[10px] font-bold tracking-[3px] uppercase text-gray-500 pb-3 mb-5 border-b border-gray-200">
                            MORE EVENTS</h3>
                        <div class="space-y-5">
                            @foreach (collect($events)->reject(fn($e) => $e['slug'] === $event['slug'])->take(4) as $other)
                                <a href="{{ route('events.show', $other['slug']) }}"
                                    class="group flex gap-3 items-start">
                                    <div class="w-16 h-16 rounded-lg overflow-hidden shrink-0">
                                        <img src="{{ asset($other['image']) }}" alt="{{ $other['title'] }}"
                                            loading="lazy" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <p
                                            class="text-[14px] font-medium text-navy leading-snug group-hover:text-gold transition-colors duration-200">
                                            {{ $other['title'] }}</p>
                                        <p class="text-[10px] font-bold tracking-[2px] uppercase text-gray-400 mt-1">
                                            {{ strtoupper(substr($other['month'], 0, 3)) }} {{ $other['day'] }},
                                            {{ $other['year'] }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    {{-- Admissions CTA --}}
                    <div class="relative border border-gold/18 rounded-xl overflow-hidden aspect-square flex items-center justify-center"
                        style="background:linear-gradient(135deg,#030f1a 0%,#071e2f 60%,#051b2c 100%)">
                        <div class="absolute inset-0 opacity-20"
                            style="background:radial-gradient(ellipse at 30% 70%,#b8960c,transparent 55%),radial-gradient(ellipse at 75% 25%,#0c4a6e,transparent 55%)">
                        </div>
                        <div class="relative z-10 text-center p-8">
                            <p class="text-[10px] font-bold tracking-[3px] uppercase text-gold/55 mb-3">APPLY NOW</p>
                            <h3 class="font-serif font-semibold text-white leading-tight mb-4"
                                style="font-size:clamp(18px,2vw,22px)">
                                Pre-Bar Course<br>2026 &ndash; 2027
                            </h3>
                            <p class="text-[14px] text-cloud/50 mb-6 leading-[1.65]">
                                Applications open.<br>Deadline: July 2026.
                            </p>
                            <a href="https://forms.gslaw.school/surveys/23"
                                class="inline-block bg-gold text-navy px-6 py-2.5 text-[10px] font-bold tracking-[2px] uppercase rounded hover:bg-gold-light transition-colors">
                                APPLY NOW
                            </a>
                        </div>
                    </div>

                </aside>
            </div>
        </div>
    </section>

@endsection
