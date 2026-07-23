@extends('layouts.app')
@section('title', 'GSL & CLET – Ghana School of Law')
@section('description',
    'How the Ghana School of Law operates as a Directorate of CLET under the Legal Education Act,
    2026 (Act 1170).')
@section('content')

    <section class="relative pt-[97px] md:pt-[133px] min-h-[300px] flex items-end pb-14 px-[5%]"
        style="background:linear-gradient(135deg,#030f1a 0%,#0c4a6e 50%,#051b2c 100%)">
        <div class="max-w-6xl mx-auto w-full">
            <p class="text-[14px] font-bold text-gold/70 tracking-[3px] uppercase mb-3">About Ghana School of Law</p>
            <h1 class="font-serif font-semibold text-white leading-[1.1] mb-4" style="font-size:clamp(32px,5vw,58px)">
                GSL &amp; CLET</h1>
            <p class="text-[16px] text-cloud/62 max-w-xl leading-[1.7]">What changed under Act 1170, and where GSL
                sits within the Council for Legal Education and Training.</p>
        </div>
    </section>

    {{-- Transformation --}}
    <section class="py-20 px-[5%] bg-navy">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3">Act 1170 Transformation</p>
                <h2 class="font-serif font-semibold text-white text-[34px]">What Changed Under <span class="text-gold">Act
                        1170</span></h2>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="p-8 rounded-xl border border-red-500/20 bg-red-500/5">
                    <p class="text-[14px] font-bold text-red-400 tracking-[2px] uppercase mb-5">Before (Pre-Act 1170)</p>
                    @foreach (['Sole provider of professional legal education in Ghana', 'Set own standards and regulations independently', 'Operated autonomously with own Board of Governors', 'No external quality assurance or accreditation review', 'Delivered only the Law Practice Training Course'] as $b)
                        <div class="flex items-start gap-3 mb-3 text-[15px] text-cloud/60">
                            <span class="text-red-400 mt-0.5 flex-shrink-0">&#10005;</span>{{ $b }}
                        </div>
                    @endforeach
                </div>
                <div class="p-8 rounded-xl border border-gold/20 bg-gold/5">
                    <p class="text-[14px] font-bold text-gold tracking-[2px] uppercase mb-5">After (Under Act 1170)</p>
                    @foreach (['Directorate of CLET - part of national legal education system', 'Operates under CLET accreditation and quality standards', 'Reports to CLET Director-General; governed by CLET Board', 'Annual mandatory inspections by CLET', 'Four distinct programmes including two new statutory roles'] as $a)
                        <div class="flex items-start gap-3 mb-3 text-[15px] text-cloud/75">
                            <span class="text-gold mt-0.5 flex-shrink-0">&#10003;</span>{{ $a }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- CLET Governance --}}
    <section class="py-20 px-[5%] bg-white">
        <div class="max-w-2xl mx-auto text-center">
            <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3">Governance Structure</p>
            <h2 class="font-serif font-semibold text-navy text-[34px] mb-10">GSL within <span class="text-gold">CLET</span>
            </h2>
            <div class="flex flex-col items-center gap-2">
                @foreach ([['CLET Board', 'Governing body for all legal education in Ghana', false], ['CLET Director-General', 'Executive head of CLET', false], ['Ghana School of Law', 'Directorate of CLET - delivers all GSL programmes', true], ['GSL Principal', 'Head of GSL, reports to CLET Director-General', false]] as $i => $g)
                    @if ($i > 0)
                        <div class="w-px h-5 bg-gold/40"></div>
                    @endif
                    <div
                        class="w-full max-w-sm px-6 py-4 rounded-lg border {{ $g[2] ? 'border-gold bg-gold/10' : 'border-gray-200 bg-gray-50' }}">
                        <p class="{{ $g[2] ? 'text-gold' : 'text-navy' }} font-semibold text-[15px] mb-1">
                            {{ $g[0] }}</p>
                        <p class="text-[13px] text-gray-500">{{ $g[1] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- List of Directorates --}}
    <section class="py-20 px-[5%] bg-gray-50" data-carousel="directorates">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-wrap items-end justify-between gap-4 mb-10">
                <div>
                    <p class="text-[14px] font-bold text-gold tracking-[3px] uppercase mb-3">Directorates</p>
                    <h2 class="font-serif font-semibold text-navy text-[30px]">List of Directorates</h2>
                </div>
                <div class="flex items-center gap-3">
                    <button data-carousel-prev
                        class="w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center text-navy/50 hover:border-gold hover:text-gold shadow-sm transition-all duration-200"
                        aria-label="Previous directorate">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" viewBox="0 0 24 24">
                            <polyline points="15 18 9 12 15 6" />
                        </svg>
                    </button>
                    <button data-carousel-next
                        class="w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center text-navy/50 hover:border-gold hover:text-gold shadow-sm transition-all duration-200"
                        aria-label="Next directorate">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" viewBox="0 0 24 24">
                            <polyline points="9 18 15 12 9 6" />
                        </svg>
                    </button>
                </div>
            </div>

            <div data-carousel-track class="flex gap-5 overflow-x-auto hide-scrollbar snap-x snap-mandatory pb-2">
                @foreach ([
                    ['Ghana School of Law', 'Prof. Raymond A. Atuguba', 'assets/images/management/director.png'],
                    ['Curriculum Delivery & Testing', 'Ms. Marian Atta-Boahene', 'assets/images/management/deputy-registrar.png'],
                    ['Accreditation, Quality Assurance & Inspectorate', 'Mr. Kwame Awadzi', null],
                    ['Learning, Research & Knowledge Services', 'Mrs. Janet Odetsi-Twum', 'assets/mrs.-janet-odetsi-twum_learning-resources-&-knowledge-services.jpeg'],
                    ['Digital Transformation & Innovation', 'Ms. Lorraine Ocloo', 'assets/lorraine-e.ocloo.png'],
                    ['Corporate Communications & Partnerships', 'Ms. Francisca Kakra Forson', 'assets/whatsapp-image-2026-05-27-at-5.30.25-pm(1).jpeg'],
                    ['People, Talent & Culture', 'Mrs. Louisa D. Condobery-Asamoah', 'assets/mrs.-louisa-condobery-asamoah_-people-&-culture.jpeg'],
                    ['Finance & Resource Mobilisation', 'Mr. Yussif Osman', 'assets/mr.-yusif-osman_finance-resource-manager.jpeg'],
                    ['Safety, Facilities & Logistics', 'Mr. Enyo Tawiah', 'assets/mr.-enyo-tawiah_facilities,-operations-&-logistics.jpeg'],
                    ['Compliance & Assurance', 'Mr. Leo Yarkwa Arthur', 'assets/mr.-leo-arthur-yarkwah_assurance-&-compliance.jpeg'],
                ] as $i => $d)
                    <div data-carousel-slide
                        class="shrink-0 snap-start w-50 sm:w-55 bg-white rounded-xl border border-gray-200 p-6 text-center hover:border-gold/40 hover:shadow-md transition-all duration-300">
                        <p class="text-[11px] font-bold text-gold/60 tracking-[2px] uppercase mb-4">
                            {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</p>
                        @if ($d[2])
                            <img src="{{ asset($d[2]) }}" alt="{{ $d[1] }}" loading="lazy"
                                class="w-24 h-24 mx-auto rounded-full object-cover border-2 border-gold mb-4">
                        @else
                            <div
                                class="w-24 h-24 mx-auto rounded-full border-2 border-gold bg-gold/10 flex items-center justify-center font-serif font-bold text-[20px] text-gold mb-4">
                                {{ collect(explode(' ', str_replace(['Mr.', 'Mrs.', 'Ms.', 'Prof.'], '', $d[1])))->filter()->map(fn($w) => mb_substr($w, 0, 1))->join('') }}
                            </div>
                        @endif
                        <h3 class="font-serif font-semibold text-[15px] text-navy mb-2 leading-snug">{{ $d[1] }}</h3>
                        <p class="text-[12px] text-gray-500 leading-normal">{{ $d[0] }}</p>
                    </div>
                @endforeach
            </div>

            <div data-carousel-dots class="flex items-center justify-center gap-2 mt-8"></div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        (function() {
            'use strict';

            const DOT_ACTIVE = 'h-1.5 rounded-full bg-gold transition-all duration-300 w-6';
            const DOT_INACTIVE = 'h-1.5 rounded-full bg-navy/20 transition-all duration-300 w-1.5';

            document.querySelectorAll('[data-carousel]').forEach(function(section) {
                const track = section.querySelector('[data-carousel-track]');
                const slides = Array.from(track.querySelectorAll('[data-carousel-slide]'));
                const wrap = section.querySelector('[data-carousel-dots]');
                const prevBtn = section.querySelector('[data-carousel-prev]');
                const nextBtn = section.querySelector('[data-carousel-next]');

                if (!track || slides.length === 0) return;

                let cur = 0;

                slides.forEach(function(_, i) {
                    var d = document.createElement('button');
                    d.setAttribute('aria-label', 'Go to slide ' + (i + 1));
                    d.className = i === 0 ? DOT_ACTIVE : DOT_INACTIVE;
                    d.addEventListener('click', function() {
                        go(i);
                    });
                    wrap && wrap.appendChild(d);
                });

                function syncDots() {
                    if (!wrap) return;
                    Array.from(wrap.children).forEach(function(d, i) {
                        d.className = i === cur ? DOT_ACTIVE : DOT_INACTIVE;
                    });
                }

                function go(index) {
                    var n = slides.length;
                    cur = ((index % n) + n) % n;
                    var gap = parseFloat(getComputedStyle(track).gap) || 0;
                    track.scrollTo({
                        left: cur * (slides[0].offsetWidth + gap),
                        behavior: 'smooth'
                    });
                    syncDots();
                }

                prevBtn && prevBtn.addEventListener('click', function() {
                    go(cur - 1);
                });
                nextBtn && nextBtn.addEventListener('click', function() {
                    go(cur + 1);
                });

                var scrollTimer;
                track.addEventListener('scroll', function() {
                    clearTimeout(scrollTimer);
                    scrollTimer = setTimeout(function() {
                        var gap = parseFloat(getComputedStyle(track).gap) || 0;
                        var w = slides[0].offsetWidth + gap;
                        var n = Math.round(track.scrollLeft / w);
                        if (n !== cur) {
                            cur = n;
                            syncDots();
                        }
                    }, 60);
                }, {
                    passive: true
                });
            });
        }());
    </script>
@endpush
