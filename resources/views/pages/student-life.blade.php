@extends('layouts.app')
@section('title', 'Student Life – Ghana School of Law')
@section('description',
    'Life at the Ghana School of Law - our campuses, community, and the moments that shape every student\'s
    journey to the Bar.')
@section('content')

    {{-- ══ HERO ══════════════════════════════════════════════════════════ --}}
    <section class="relative pt-[97px] md:pt-[133px] min-h-[420px] flex items-end pb-14 px-[5%] overflow-hidden">
        <div class="absolute inset-0 scale-110"
            style="background:url('{{ asset('assets/images/entranceHero.jpeg') }}') center/cover no-repeat; filter:blur(1px) brightness(0.4);">
        </div>
        <div class="absolute inset-0"
            style="background:linear-gradient(135deg,rgba(3,15,26,0.8) 0%,rgba(12,74,110,0.55) 55%,rgba(5,27,44,0.8) 100%)">
        </div>
        <div class="relative z-10 max-w-6xl mx-auto w-full">
            <p class="text-[14px] font-bold text-gold/70 tracking-[3px] uppercase mb-3">Life at GSL</p>
            <h1 class="font-serif font-semibold text-white leading-[1.1] mb-4" style="font-size:clamp(32px,5vw,58px)">
                Student Life</h1>
            <p class="text-[16px] text-cloud/62 max-w-xl leading-[1.7]">
                A community of future lawyers, judges, and public servants - training together across GSL's three
                campuses.
            </p>
        </div>
    </section>

    {{-- ══ CAMPUS LIFE INTRO ═══════════════════════════════════════════ --}}
    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-4xl mx-auto text-center">
            <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3">Our Community</p>
            <h2 class="font-serif font-semibold text-navy text-[34px] leading-[1.2] mb-6">
                A Journey Shared with Peers</h2>
            <p class="text-[15px] text-gray-600 leading-[1.85]">
                The Ghana School of Law is a non-residential institution, serving law graduates from Ghana and
                other Commonwealth countries in the sub-region. From orientation to the Call to the Bar, students
                move through the programme together - in lecture halls, moot courts, and libraries - building the
                relationships and professional discipline that carry into practice.
            </p>
        </div>
    </section>

    {{-- ══ PHOTO GALLERY (paginated mosaic grid, auto-slider) ═════════════ --}}
    <section class="py-20 px-[5%] bg-gray-50">
        <div class="max-w-6xl mx-auto">
            <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3 text-center">Moments at GSL</p>
            <h2 class="font-serif font-semibold text-navy text-[34px] leading-[1.2] mb-12 text-center">
                Campus Life in Pictures</h2>

            @php $galleryPages = $galleryPhotos->chunk(4)->values(); @endphp

            <div data-mosaic-gallery data-mosaic-autoplay="6000">
                <div data-mosaic-pages class="relative">
                    @foreach ($galleryPages as $pageIndex => $page)
                        <div data-mosaic-page
                            class="{{ $pageIndex === 0 ? '' : 'hidden' }} grid grid-cols-2 sm:grid-cols-4 auto-rows-[160px] sm:auto-rows-[220px] grid-flow-dense gap-3">
                            @foreach ($page as $g)
                                <div class="group relative overflow-hidden rounded-xl shadow-sm {{ $g->span_classes }}">
                                    <img src="{{ $g->image_url }}" alt="{{ $g->caption }}" loading="lazy"
                                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-110">
                                    <div class="absolute inset-0"
                                        style="background:linear-gradient(to top,rgba(3,15,26,0.85) 0%,rgba(3,15,26,0.05) 45%,transparent 65%)">
                                    </div>
                                    <div
                                        class="absolute inset-0 bg-navy/40 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                    </div>
                                    @if ($g->caption)
                                        <p
                                            class="absolute bottom-0 left-0 right-0 p-3 sm:p-4 text-white text-[12px] sm:text-[14px] font-medium leading-snug">
                                            {{ $g->caption }}</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>

                @if ($galleryPages->count() > 1)
                    <div class="flex items-center justify-center gap-4 mt-8">
                        <button type="button" data-mosaic-prev aria-label="Previous page"
                            class="w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center text-navy/50 hover:border-gold hover:text-gold shadow-sm transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <polyline points="15 18 9 12 15 6" />
                            </svg>
                        </button>
                        <div data-mosaic-dots class="flex items-center gap-2">
                            @foreach ($galleryPages as $pageIndex => $page)
                                <button type="button" data-mosaic-dot data-index="{{ $pageIndex }}"
                                    aria-label="Go to page {{ $pageIndex + 1 }}"
                                    class="h-1.5 rounded-full transition-all duration-300 {{ $pageIndex === 0 ? 'w-6 bg-gold' : 'w-1.5 bg-navy/20' }}">
                                </button>
                            @endforeach
                        </div>
                        <button type="button" data-mosaic-next aria-label="Next page"
                            class="w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center text-navy/50 hover:border-gold hover:text-gold shadow-sm transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <polyline points="9 18 15 12 9 6" />
                            </svg>
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- ══ OUR CAMPUSES ═════════════════════════════════════════════════ --}}
    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-6xl mx-auto">
            <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3 text-center">Where We Study</p>
            <h2 class="font-serif font-semibold text-navy text-[34px] leading-[1.2] mb-4 text-center">
                Our Campuses</h2>
            <p class="text-[15px] text-gray-600 leading-[1.8] max-w-2xl mx-auto text-center mb-12">
                To cater to the increasing number of applicants both from within the country and beyond, the School
                operates across three campuses.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($campuses as $c)
                    <div class="p-8 rounded-xl border border-gray-200 bg-gray-50">
                        <h3 class="font-serif font-semibold text-[18px] text-navy mb-2">{{ $c->name }}</h3>
                        <p class="text-[13px] font-bold text-gold uppercase tracking-[1px] mb-3">{{ $c->location }}</p>
                        <p class="text-[14px] text-gray-600 leading-[1.7]">{{ $c->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ══ STUDENT SUPPORT ══════════════════════════════════════════════ --}}
    <section class="py-20 px-[5%] bg-gray-50">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="order-2 lg:order-1">
                <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3">Learning Resources</p>
                <h2 class="font-serif font-semibold text-navy text-[30px] leading-[1.2] mb-6">
                    Support Beyond the Classroom</h2>
                <ul class="flex flex-col gap-4">
                    @foreach ([
                        'Law libraries stocked with law reports, statutes, and reference material across all three campuses',
                        'Moot court practice to build advocacy and courtroom skills ahead of professional practice',
                        'Student support services covering academic administration, records, and welfare',
                        'A community of peers drawn from Ghana and other Commonwealth jurisdictions',
                    ] as $pt)
                        <li class="flex items-start gap-3 text-[15px] text-gray-600 leading-[1.6]">
                            <span
                                class="mt-1 w-5 h-5 rounded-full border border-gold bg-gold/10 flex items-center justify-center shrink-0">
                                <svg class="w-2.5 h-2.5" fill="none" stroke="#b8960c" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                            </span>
                            {{ $pt }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="order-1 lg:order-2 rounded-xl overflow-hidden aspect-[4/3]">
                <img src="{{ \App\Support\R2::url('assets/images/homepage/prgimg.png') }}" alt="A student in the law library"
                    loading="lazy" class="w-full h-full object-cover">
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        (function() {
            'use strict';

            const DOT_ACTIVE = 'h-1.5 rounded-full bg-gold transition-all duration-300 w-6';
            const DOT_INACTIVE = 'h-1.5 rounded-full bg-navy/20 transition-all duration-300 w-1.5';

            document.querySelectorAll('[data-mosaic-gallery]').forEach(function(gallery) {
                const pages = Array.from(gallery.querySelectorAll('[data-mosaic-page]'));
                const dots = Array.from(gallery.querySelectorAll('[data-mosaic-dot]'));
                const prevBtn = gallery.querySelector('[data-mosaic-prev]');
                const nextBtn = gallery.querySelector('[data-mosaic-next]');
                const autoplayMs = parseInt(gallery.getAttribute('data-mosaic-autoplay'), 10) || 0;

                if (pages.length <= 1) return;

                let cur = 0;
                let timer = null;
                let paused = false;

                function render() {
                    pages.forEach(function(p, i) {
                        p.classList.toggle('hidden', i !== cur);
                    });
                    dots.forEach(function(d, i) {
                        d.className = i === cur ? DOT_ACTIVE : DOT_INACTIVE;
                    });
                }

                function go(index) {
                    const n = pages.length;
                    cur = ((index % n) + n) % n;
                    render();
                    restartAutoplay();
                }

                function restartAutoplay() {
                    clearTimeout(timer);
                    if (!autoplayMs || paused) return;
                    timer = setTimeout(function() {
                        go(cur + 1);
                    }, autoplayMs);
                }

                prevBtn && prevBtn.addEventListener('click', function() {
                    go(cur - 1);
                });
                nextBtn && nextBtn.addEventListener('click', function() {
                    go(cur + 1);
                });
                dots.forEach(function(d) {
                    d.addEventListener('click', function() {
                        go(parseInt(d.getAttribute('data-index'), 10) || 0);
                    });
                });

                /* pause on hover, resume on leave */
                gallery.addEventListener('mouseenter', function() {
                    paused = true;
                    clearTimeout(timer);
                });
                gallery.addEventListener('mouseleave', function() {
                    paused = false;
                    restartAutoplay();
                });

                render();
                restartAutoplay();
            });
        }());
    </script>
@endpush
