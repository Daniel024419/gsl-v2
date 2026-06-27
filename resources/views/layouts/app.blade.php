<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description', 'Ghana School of Law – Your official pathway to the Ghana Bar under CLET Act 1170.')">
    <title>@yield('title', 'Ghana School of Law') | GSL</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;500;700;900&family=Roboto+Serif:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    @endif
</head>
<body class="bg-navy text-white font-sans antialiased">

@php
$navItems = [
    ['route'=>'home',       'label'=>'Home'],
    ['route'=>'about',      'label'=>'About'],
    ['route'=>'programmes', 'label'=>'Programmes'],
    ['route'=>'admissions', 'label'=>'Admissions'],
    ['route'=>'events',     'label'=>'Events'],
    ['route'=>'news',       'label'=>'News'],
    ['route'=>'contact',    'label'=>'Contact'],
];
@endphp

{{-- ══ NAV ══════════════════════════════════════════════════ --}}
<nav id="site-nav"
     class="fixed inset-x-0 top-0 z-50 flex h-[72px] items-center justify-between
            px-[5%] bg-navy/95 backdrop-blur-md border-b border-gold/10 transition-all duration-300">

    <a href="{{ route('home') }}" class="flex items-center gap-3 flex-shrink-0 group">
        <img class="h-10 w-auto object-contain"
             src="{{ asset('BRAND-IDENTITY-REVERSE.png') }}"
             alt="Ghana School of Law">
        <div class="hidden sm:block leading-tight">
            <span class="block text-[12px] font-black text-white tracking-[2px] uppercase">Ghana School of Law</span>
            <span class="block text-[11px] text-cloud/65">A Directorate of CLET</span>
        </div>
    </a>

    <ul class="hidden lg:flex items-center gap-7">
        @foreach($navItems as $item)
        <li>
            <a href="{{ route($item['route']) }}"
               class="nav-link hover-sleek text-[13px] font-medium tracking-wide transition-colors duration-200
                      {{ request()->routeIs($item['route']) ? 'text-white active' : 'text-cloud/75 hover:text-white' }}">
                {{ $item['label'] }}
            </a>
        </li>
        @endforeach
    </ul>

    <div class="flex items-center gap-3">
          <a href="https://forms.gslaw.school/surveys/23" target="_blank" rel="noopener"
              class="hidden lg:inline-flex items-center gap-2 px-5 py-2.5 text-[13px] font-semibold
                        bg-gold text-navy rounded btn-sleek hover:bg-gold-light hover:-translate-y-px transition-all duration-200">
            Apply Now
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
            </svg>
        </a>

        <button id="nav-hamburger" aria-label="Open menu" aria-expanded="false"
                class="lg:hidden flex flex-col justify-center items-center gap-[5px] w-10 h-10
                       rounded border border-gold/20 hover:border-gold/50 transition-colors duration-200">
            <span class="hb block w-5 h-[1.5px] bg-cloud/90 rounded-full transition-all duration-300 origin-center"></span>
            <span class="hb block w-5 h-[1.5px] bg-cloud/90 rounded-full transition-all duration-300"></span>
            <span class="hb block w-5 h-[1.5px] bg-cloud/90 rounded-full transition-all duration-300 origin-center"></span>
        </button>
    </div>
</nav>

{{-- ══ OVERLAY ════════════════════════════════════════════════ --}}
<div id="mob-overlay"
     class="fixed inset-0 z-[100] bg-navy-dark/75 backdrop-blur-sm
            opacity-0 pointer-events-none transition-opacity duration-300"></div>

{{-- ══ MOBILE DRAWER ══════════════════════════════════════════ --}}
<aside id="mob-drawer"
       class="fixed top-0 right-0 bottom-0 z-[110] flex flex-col
              w-[300px] max-w-[85vw] bg-navy-dark border-l border-gold/10
              translate-x-full transition-transform duration-300 ease-in-out">

    <div class="flex items-center justify-between h-[72px] px-5 border-b border-gold/10 flex-shrink-0">
        <div class="flex items-center gap-2.5">
            <div class="w-8 h-8 rounded-full border border-gold bg-gold/10 flex items-center justify-center
                        font-serif font-bold text-[11px] text-gold">GSL</div>
            <span class="text-[11px] font-bold text-gold/80 tracking-[2px] uppercase">Navigation</span>
        </div>
        <button id="mob-close" aria-label="Close menu"
                class="w-9 h-9 flex items-center justify-center rounded border border-gold/20
                       text-cloud/60 hover:border-gold/50 hover:text-white text-2xl leading-none transition-colors">
            &times;
        </button>
    </div>

    <nav class="flex-1 overflow-y-auto px-4 py-5">
        <ul class="flex flex-col gap-1.5">
            @foreach($navItems as $item)
            <li>
                <a href="{{ route($item['route']) }}"
                   class="mob-link flex items-center gap-3 px-4 py-3 rounded-lg text-[13px] font-medium
                          transition-all duration-200
                          {{ request()->routeIs($item['route'])
                             ? 'bg-gold/10 text-gold border border-gold/25'
                             : 'text-cloud/70 hover:bg-white/5 hover:text-white border border-transparent' }}">
                    <span class="w-1.5 h-1.5 rounded-full flex-shrink-0
                                 {{ request()->routeIs($item['route']) ? 'bg-gold' : 'bg-cloud/25' }}"></span>
                    {{ $item['label'] }}
                </a>
            </li>
            @endforeach
        </ul>

        <div class="mt-6 pt-5 border-t border-gold/10">
            <a href="https://forms.gslaw.school/surveys/23" target="_blank" rel="noopener"
               class="mob-link flex items-center justify-center gap-2 w-full py-3.5 text-[13px] font-semibold
                      bg-gold text-navy rounded hover:bg-gold-light transition-colors duration-200">
                Apply Now — September 2026
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
                </svg>
            </a>
        </div>

        <div class="mt-5 flex flex-col gap-2.5">
            <a href="tel:+233307003231"
               class="flex items-center gap-2 text-[12px] text-cloud/45 hover:text-gold transition-colors">
                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5"
                     stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.63 3.4 2 2 0 0 1 3.6 1.21h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.84a16 16 0 0 0 6 6l.95-.95a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 21.73 16.92z"/>
                </svg>
                +233 307 003 231
            </a>
            <a href="mailto:enquiries@gslaw.edu.gh"
               class="flex items-center gap-2 text-[12px] text-cloud/45 hover:text-gold transition-colors">
                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5"
                     stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                    <polyline points="22,6 12,13 2,6"/>
                </svg>
                enquiries@gslaw.edu.gh
            </a>
        </div>
    </nav>

    <div class="px-5 py-4 border-t border-gold/10 flex-shrink-0">
        <p class="text-[10px] text-cloud/25 tracking-wide">
            &copy; Ghana School of Law {{ date('Y') }}. A Directorate of CLET.
        </p>
    </div>
</aside>

{{-- ══ PAGE CONTENT ═══════════════════════════════════════════ --}}
<main>@yield('content')</main>

{{-- ══ FOOTER ══════════════════════════════════════════════════ --}}
<footer class="bg-navy-dark border-t border-gold/10 pt-16 pb-8 px-[5%]">
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">

            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-11 h-11 rounded-full border-2 border-gold bg-gold/10 flex items-center justify-center
                                font-serif font-bold text-[13px] text-gold flex-shrink-0">GSL</div>
                    <div>
                        <p class="font-serif font-bold text-[13px] text-white leading-tight">Ghana School of Law</p>
                        <p class="text-[10px] font-bold text-gold tracking-[1.5px] uppercase">A Directorate of CLET</p>
                    </div>
                </div>
                <p class="text-[13px] text-cloud/50 leading-[1.75] max-w-[260px]">
                    Professional legal training and the official pathway to Ghana's Bar — under CLET Act 1170.
                </p>
                <div class="flex gap-2 mt-4">
                    @foreach([['https://www.facebook.com/gslawofficial','f','Facebook'],['https://x.com/gslaw_official','𝕏','X'],['https://www.youtube.com/@gslawofficial','▶','YouTube'],['https://www.instagram.com/gslaw_official/','◉','Instagram']] as $s)
                    <a href="{{ $s[0] }}" target="_blank" rel="noopener" aria-label="{{ $s[2] }}"
                       class="w-8 h-8 rounded-full border border-gold/15 flex items-center justify-center
                              text-[11px] text-cloud/40 hover:border-gold/50 hover:text-gold transition-all duration-200">
                        {{ $s[1] }}
                    </a>
                    @endforeach
                </div>
            </div>

            <div>
                <h4 class="text-[11px] font-bold text-gold tracking-[2px] uppercase mb-5">Programmes</h4>
                <ul class="space-y-2.5">
                    @foreach([['programmes','Law Practice Training'],['programmes','Post-Call Law Course'],['programmes','Bar Exam Remedial'],['programmes','Specialised Development'],['admissions','Pre-Bar Course']] as $l)
                    <li><a href="{{ route($l[0]) }}" class="text-[13px] text-cloud/55 hover:text-gold transition-colors">{{ $l[1] }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h4 class="text-[11px] font-bold text-gold tracking-[2px] uppercase mb-5">Quick Links</h4>
                <ul class="space-y-2.5">
                    @foreach([['https://sms.gslaw.school/portal','Student Portal'],['https://sms.gslaw.school/faculty','Lecturer Portal'],['https://sms.gslaw.school/admin','Staff Portal'],['https://forms.gslaw.school/surveys/23','Apply Now']] as $l)
                    <li><a href="{{ $l[0] }}" target="_blank" rel="noopener" class="text-[13px] text-cloud/55 hover:text-gold transition-colors">{{ $l[1] }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h4 class="text-[11px] font-bold text-gold tracking-[2px] uppercase mb-5">Contact</h4>
                <ul class="space-y-3 text-[13px] text-cloud/55">
                    <li class="flex items-start gap-2.5 leading-snug">
                        <svg class="w-3.5 h-3.5 flex-shrink-0 mt-0.5 stroke-gold fill-none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        Independence Avenue, Makola, Accra
                    </li>
                    <li class="flex items-start gap-2.5">
                        <svg class="w-3.5 h-3.5 flex-shrink-0 mt-0.5 stroke-gold fill-none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.63 3.4 2 2 0 0 1 3.6 1.21h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.84a16 16 0 0 0 6 6l.95-.95a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 21.73 16.92z"/></svg>
                        +233 307 003 231
                    </li>
                    <li class="flex items-start gap-2.5">
                        <svg class="w-3.5 h-3.5 flex-shrink-0 mt-0.5 stroke-gold fill-none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        enquiries@gslaw.edu.gh
                    </li>
                    <li class="flex items-start gap-2.5">
                        <svg class="w-3.5 h-3.5 flex-shrink-0 mt-0.5 stroke-gold fill-none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        admissions@gslaw.edu.gh
                    </li>
                </ul>
            </div>

        </div>

        <div class="pt-6 border-t border-white/5 flex flex-col sm:flex-row items-center justify-between gap-3">
            <p class="text-[12px] text-cloud/30">&copy; Ghana School of Law {{ date('Y') }}. All rights reserved. A Directorate of CLET.</p>
        </div>
    </div>
</footer>

<script>
(function () {
    var nav = document.getElementById('site-nav');
    window.addEventListener('scroll', function () {
        nav.style.background = window.scrollY > 60 ? 'rgba(3,15,26,0.99)' : null;
    }, { passive: true });

    var btn  = document.getElementById('nav-hamburger');
    var cls  = document.getElementById('mob-close');
    var drw  = document.getElementById('mob-drawer');
    var ovl  = document.getElementById('mob-overlay');
    var bars = btn.querySelectorAll('.hb');

    function open() {
        drw.classList.remove('translate-x-full');
        ovl.classList.remove('opacity-0', 'pointer-events-none');
        ovl.classList.add('opacity-100');
        document.body.style.overflow = 'hidden';
        btn.setAttribute('aria-expanded', 'true');
        bars[0].style.transform = 'translateY(6.5px) rotate(45deg)';
        bars[1].style.opacity   = '0';
        bars[2].style.transform = 'translateY(-6.5px) rotate(-45deg)';
    }
    function close() {
        drw.classList.add('translate-x-full');
        ovl.classList.remove('opacity-100');
        ovl.classList.add('opacity-0');
        setTimeout(function() { ovl.classList.add('pointer-events-none'); }, 300);
        document.body.style.overflow = '';
        btn.setAttribute('aria-expanded', 'false');
        bars[0].style.transform = '';
        bars[1].style.opacity   = '';
        bars[2].style.transform = '';
    }

    btn.addEventListener('click', open);
    cls.addEventListener('click', close);
    ovl.addEventListener('click', close);
    drw.querySelectorAll('.mob-link').forEach(function(a) { a.addEventListener('click', close); });
    document.addEventListener('keydown', function(e) { if (e.key === 'Escape') close(); });
}());
</script>

@stack('scripts')

<script>
/* ── scroll flip reveal ──────────────────────────────────────────
   Works on every page automatically.
   • Each top-level section/div inside <main> (except the hero) gets
     a flip-in effect as it enters the viewport.
   • Direct grid/flex children of those blocks get staggered delays.
──────────────────────────────────────────────────────────────── */
(function () {
    'use strict';
    if (!window.IntersectionObserver) return;

    var main = document.querySelector('main');
    if (!main) return;

    /* ── 1. section-level reveal ─────────────────────────────── */
    var blocks = Array.from(main.children);
    blocks.forEach(function (block, i) {
        if (i === 0) return; // hero always visible — skip

        /* target the inner .max-w-6xl container when present, else
           fall back to the block itself (e.g. the CTA section)      */
        var target = block.querySelector(':scope > .max-w-6xl')
                  || block.querySelector(':scope > div.max-w-6xl')
                  || block;
        target.classList.add('reveal');
    });

    /* ── 2. staggered children inside static grids ───────────── */
    main.querySelectorAll(
        '.reveal .grid > *:not([data-carousel-slide]):not([data-carousel-dots])'
    ).forEach(function (child, i) {
        child.classList.add('reveal-child');
        /* cycle delay in groups of 3 so rows animate together     */
        child.style.transitionDelay = ((i % 3) * 90) + 'ms';
    });

    /* ── 3. observe everything ───────────────────────────────── */
    var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
            if (!e.isIntersecting) return;
            e.target.classList.add('visible');
            io.unobserve(e.target);
        });
    }, {
        threshold:   0.08,
        rootMargin: '0px 0px -50px 0px'   /* trigger slightly before edge */
    });

    main.querySelectorAll('.reveal, .reveal-child').forEach(function (el) {
        io.observe(el);
    });
}());
</script>
</html>
