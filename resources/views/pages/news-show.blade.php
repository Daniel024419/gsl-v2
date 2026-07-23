@extends('layouts.app')
@section('title', $article['title'].' – Ghana School of Law')
@section('description', $article['excerpt'])
@section('content')

    {{-- ══ ARTICLE HERO ══════════════════════════════════════════════════ --}}
    <section class="max-w-6xl mx-auto px-[5%] pt-[97px] md:pt-[133px] pb-16">
        <a href="{{ route('news') }}"
            class="inline-flex items-center gap-2 text-[13px] font-bold tracking-[2px] uppercase text-gold hover:underline mb-8">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" viewBox="0 0 24 24">
                <line x1="19" y1="12" x2="5" y2="12" />
                <polyline points="12 19 5 12 12 5" />
            </svg>
            Back to News
        </a>

        <span class="text-[10px] font-bold tracking-[3px] uppercase text-gold block mb-3">{{ $article['cat'] }}</span>
        <h1 class="font-serif font-semibold text-white leading-[1.2] mb-6 max-w-3xl"
            style="font-size:clamp(28px,4vw,48px)">
            {{ $article['title'] }}
        </h1>
        <div class="flex items-center gap-3.5 mb-10">
            <div
                class="w-9 h-9 rounded-full bg-gold/8 border border-gold/20 flex items-center justify-center shrink-0">
                <svg class="w-4 h-4 stroke-gold fill-none" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                    <circle cx="12" cy="7" r="4" />
                </svg>
            </div>
            <div>
                <p class="text-[14px] font-medium text-cloud/75">{{ $article['author'] }}</p>
                <p class="text-[14px] text-cloud/35 uppercase tracking-[1px] mt-0.5">{{ $article['date'] }} &bull;
                    {{ $article['read'] }}</p>
            </div>
        </div>

        <div class="aspect-[16/9] w-full overflow-hidden rounded-xl relative">
            @if (!empty($article['image']))
                <img src="{{ asset($article['image']) }}" alt="{{ $article['title'] }}" loading="lazy"
                    class="absolute inset-0 w-full h-full object-cover">
            @else
                <div class="absolute inset-0 flex items-center justify-center"
                    style="background:linear-gradient(135deg,#030f1a 0%,#071e2f 45%,#0c4a6e 100%)">
                    <img src="{{ asset('assets/clet-gsl-logo.png') }}" alt="Ghana School of Law" loading="lazy"
                        class="h-20 w-auto opacity-90">
                </div>
            @endif
        </div>
    </section>

    {{-- ══ ARTICLE BODY ═════════════════════════════════════════════════ --}}
    <section class="bg-white">
        <div class="max-w-6xl mx-auto px-[5%] py-16">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                <div class="lg:col-span-8 space-y-6">
                    @foreach ($article['body'] as $paragraph)
                        <p class="text-[16px] text-gray-600 leading-[1.85]">{{ $paragraph }}</p>
                    @endforeach
                </div>

                <aside class="lg:col-span-4 space-y-6">

                    {{-- More News --}}
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <h3
                            class="text-[10px] font-bold tracking-[3px] uppercase text-gray-500 pb-3 mb-5 border-b border-gray-200">
                            MORE NEWS</h3>
                        <div class="space-y-5">
                            @foreach (collect($articles)->reject(fn($a) => $a['slug'] === $article['slug'])->take(4) as $other)
                                <a href="{{ route('news.show', $other['slug']) }}" class="group flex gap-3 items-start">
                                    <div class="w-16 h-16 rounded-lg overflow-hidden shrink-0">
                                        @if (!empty($other['image']))
                                            <img src="{{ asset($other['image']) }}" alt="{{ $other['title'] }}"
                                                loading="lazy" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center"
                                                style="background:linear-gradient(135deg,#071e2f,#0c4a6e)">
                                                <svg class="w-5 h-5 stroke-gold/40 fill-none" stroke-width="1"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    viewBox="0 0 24 24">{!! $other['icon'] !!}</svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <p
                                            class="text-[14px] font-medium text-navy leading-snug group-hover:text-gold transition-colors duration-200">
                                            {{ $other['title'] }}</p>
                                        <p class="text-[10px] font-bold tracking-[2px] uppercase text-gray-400 mt-1">
                                            {{ $other['cat'] }}</p>
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
