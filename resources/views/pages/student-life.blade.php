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

    {{-- ══ PHOTO GALLERY (advanced carousel) ═══════════════════════════ --}}
    @php
        $galleryPhotos = [
            ['assets/images/homepage/campuslife.png', 'The Ghana School of Law campus'],
            ['assets/images/homepage/campuslife2.png', 'A newly-called lawyer celebrating with peers'],
            ['assets/images/homepage/career-series-img.png', 'Students at a GSL ceremony'],
            ['assets/images/homepage/award.png', 'A student receiving recognition at a GSL ceremony'],
            ['assets/images/homepage/full roll.png', 'Graduating students seated at a GSL ceremony'],
            ['assets/images/homepage/test1.png', 'Newly-called lawyers at the Call to the Bar'],
            ['assets/images/homepage/plc.png', 'GSL students'],
            ['assets/images/homepage/prgimg.png', 'A student in the law library'],
        ];
    @endphp
    <section class="py-20 px-[5%] bg-gray-50">
        <div class="max-w-6xl mx-auto">
            <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3 text-center">Moments at GSL</p>
            <h2 class="font-serif font-semibold text-navy text-[34px] leading-[1.2] mb-12 text-center">
                Campus Life in Pictures</h2>

            <div data-gallery data-gallery-autoplay="4500" class="mt-2">

                {{-- Main stage --}}
                <div data-gallery-stage
                    class="relative rounded-xl overflow-hidden bg-navy aspect-video shadow-lg select-none">
                    @foreach ($galleryPhotos as $i => $g)
                        <div data-gallery-slide
                            class="absolute inset-0 transition-opacity duration-700 ease-in-out {{ $i === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none' }}">
                            <img src="{{ asset($g[0]) }}" alt="{{ $g[1] }}" loading="{{ $i === 0 ? 'eager' : 'lazy' }}"
                                class="w-full h-full object-cover" draggable="false">
                            <div class="absolute inset-0"
                                style="background:linear-gradient(to top,rgba(3,15,26,0.8) 0%,rgba(3,15,26,0.1) 50%,transparent 70%)">
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 p-5 sm:p-7">
                                <p class="text-gold text-[11px] font-bold tracking-[2px] uppercase mb-1.5">
                                    {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }} / {{ str_pad(count($galleryPhotos), 2, '0', STR_PAD_LEFT) }}
                                </p>
                                <p class="text-white text-[15px] sm:text-[18px] font-medium leading-snug max-w-lg">
                                    {{ $g[1] }}</p>
                            </div>
                        </div>
                    @endforeach

                    {{-- Prev / Next --}}
                    <button type="button" data-gallery-prev aria-label="Previous photo"
                        class="absolute left-3 top-1/2 -translate-y-1/2 z-20 w-10 h-10 sm:w-11 sm:h-11 rounded-full bg-black/30 hover:bg-gold text-white hover:text-navy flex items-center justify-center backdrop-blur-sm transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" viewBox="0 0 24 24">
                            <polyline points="15 18 9 12 15 6" />
                        </svg>
                    </button>
                    <button type="button" data-gallery-next aria-label="Next photo"
                        class="absolute right-3 top-1/2 -translate-y-1/2 z-20 w-10 h-10 sm:w-11 sm:h-11 rounded-full bg-black/30 hover:bg-gold text-white hover:text-navy flex items-center justify-center backdrop-blur-sm transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" viewBox="0 0 24 24">
                            <polyline points="9 18 15 12 9 6" />
                        </svg>
                    </button>

                    {{-- Autoplay progress --}}
                    <div class="absolute top-0 left-0 right-0 h-0.75 bg-white/15 z-20">
                        <div data-gallery-progress class="h-full bg-gold" style="width:0%"></div>
                    </div>
                </div>

                {{-- Thumbnail rail --}}
                <div data-gallery-thumbs class="mt-4 flex gap-3 overflow-x-auto hide-scrollbar pb-1">
                    @foreach ($galleryPhotos as $i => $g)
                        <button type="button" data-gallery-thumb data-index="{{ $i }}"
                            aria-label="Show photo {{ $i + 1 }}"
                            class="relative shrink-0 w-20 h-16 sm:w-24 sm:h-18 rounded-lg overflow-hidden border-2 transition-all duration-200
                                {{ $i === 0 ? 'border-gold' : 'border-transparent opacity-55 hover:opacity-90' }}">
                            <img src="{{ asset($g[0]) }}" alt="" loading="lazy" class="w-full h-full object-cover">
                        </button>
                    @endforeach
                </div>
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
                @foreach ([
                    ['Accra (Main Campus)', 'Independence Avenue, Makola, Accra', 'The main campus and seat of the Ghana School of Law.'],
                    ['Kumasi Campus', 'Kwame Nkrumah University of Science and Technology (KNUST)', 'Serving students in the Ashanti Region and beyond.'],
                    ['Greenhill Legon Campus', 'Ghana Institute of Management and Public Administration (GIMPA) and UPSA', 'Serving students in the Greater Accra Region.'],
                ] as $c)
                    <div class="p-8 rounded-xl border border-gray-200 bg-gray-50">
                        <h3 class="font-serif font-semibold text-[18px] text-navy mb-2">{{ $c[0] }}</h3>
                        <p class="text-[13px] font-bold text-gold uppercase tracking-[1px] mb-3">{{ $c[1] }}</p>
                        <p class="text-[14px] text-gray-600 leading-[1.7]">{{ $c[2] }}</p>
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
                <img src="{{ asset('assets/images/homepage/prgimg.png') }}" alt="A student in the law library"
                    loading="lazy" class="w-full h-full object-cover">
            </div>
        </div>
    </section>

    {{-- ══ CTA ══════════════════════════════════════════════════════════ --}}
    <section class="py-20 px-[5%] text-center border-t border-b border-gold/15"
        style="background:linear-gradient(135deg,#0c4a6e 0%,#051b2c 100%)">
        <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-4">Join the Community</p>
        <h2 class="font-serif font-semibold text-white mb-4" style="font-size:clamp(28px,3.5vw,44px)">
            Start Your Journey at GSL
        </h2>
        <p class="text-[17px] text-cloud/65 max-w-[500px] mx-auto leading-[1.7] mb-9">
            Applications for the September 2026 intake are open now. Take the first step toward your Call to the
            Bar.
        </p>
        <div class="flex gap-4 flex-wrap justify-center">
            <a href="https://forms.gslaw.school/surveys/23" target="_blank" rel="noopener"
                class="inline-flex items-center gap-2 px-8 py-4 text-[15px] font-semibold
                  bg-gold text-navy rounded hover:bg-gold-light hover:-translate-y-0.5 transition-all duration-200">
                Apply for September 2026
            </a>
            <a href="{{ route('admissions') }}"
                class="inline-flex items-center gap-2 px-8 py-[15px] text-[15px] font-medium
                  border border-cloud/25 text-cloud rounded hover:border-gold hover:text-gold transition-all duration-200">
                View Admissions
            </a>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        (function() {
            'use strict';

            document.querySelectorAll('[data-gallery]').forEach(function(gallery) {
                const stage = gallery.querySelector('[data-gallery-stage]');
                const slides = Array.from(gallery.querySelectorAll('[data-gallery-slide]'));
                const thumbs = Array.from(gallery.querySelectorAll('[data-gallery-thumb]'));
                const thumbRail = gallery.querySelector('[data-gallery-thumbs]');
                const prevBtn = gallery.querySelector('[data-gallery-prev]');
                const nextBtn = gallery.querySelector('[data-gallery-next]');
                const progress = gallery.querySelector('[data-gallery-progress]');
                const autoplayMs = parseInt(gallery.getAttribute('data-gallery-autoplay'), 10) || 0;

                if (!stage || slides.length === 0) return;

                let cur = 0;
                let timer = null;
                let paused = false;

                function render() {
                    slides.forEach(function(s, i) {
                        const active = i === cur;
                        s.classList.toggle('opacity-100', active);
                        s.classList.toggle('z-10', active);
                        s.classList.toggle('opacity-0', !active);
                        s.classList.toggle('z-0', !active);
                        s.classList.toggle('pointer-events-none', !active);
                    });
                    thumbs.forEach(function(t, i) {
                        const active = i === cur;
                        t.classList.toggle('border-gold', active);
                        t.classList.toggle('opacity-100', active);
                        t.classList.toggle('border-transparent', !active);
                        t.classList.toggle('opacity-55', !active);
                        if (active) {
                            t.scrollIntoView({
                                behavior: 'smooth',
                                inline: 'center',
                                block: 'nearest'
                            });
                        }
                    });
                }

                function go(index) {
                    const n = slides.length;
                    cur = ((index % n) + n) % n;
                    render();
                    restartAutoplay();
                }

                function restartAutoplay() {
                    if (!progress) return;
                    progress.style.transition = 'none';
                    progress.style.width = '0%';
                    clearTimeout(timer);
                    if (!autoplayMs || paused) return;
                    requestAnimationFrame(function() {
                        requestAnimationFrame(function() {
                            progress.style.transition = 'width ' + autoplayMs + 'ms linear';
                            progress.style.width = '100%';
                        });
                    });
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
                thumbs.forEach(function(t) {
                    t.addEventListener('click', function() {
                        go(parseInt(t.getAttribute('data-index'), 10) || 0);
                    });
                });

                /* pause on hover / focus, resume on leave */
                [stage, thumbRail].forEach(function(el) {
                    if (!el) return;
                    el.addEventListener('mouseenter', function() {
                        paused = true;
                        clearTimeout(timer);
                        if (progress) progress.style.transition = 'none';
                    });
                    el.addEventListener('mouseleave', function() {
                        paused = false;
                        restartAutoplay();
                    });
                });

                /* keyboard navigation while gallery is hovered/focused */
                gallery.setAttribute('tabindex', '0');
                gallery.addEventListener('keydown', function(e) {
                    if (e.key === 'ArrowLeft') {
                        e.preventDefault();
                        go(cur - 1);
                    } else if (e.key === 'ArrowRight') {
                        e.preventDefault();
                        go(cur + 1);
                    }
                });

                /* swipe support on the main stage */
                let startX = null;
                stage.addEventListener('pointerdown', function(e) {
                    startX = e.clientX;
                });
                stage.addEventListener('pointerup', function(e) {
                    if (startX === null) return;
                    const delta = e.clientX - startX;
                    if (Math.abs(delta) > 40) {
                        go(delta < 0 ? cur + 1 : cur - 1);
                    }
                    startX = null;
                });

                render();
                restartAutoplay();
            });
        }());
    </script>
@endpush
