<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @php
        $metaDescription =
            trim($__env->yieldContent('description')) ?:
            'Ghana School of Law - Centre of Excellence for Legal Education, Bar Examinations, and Professional Legal Development';
        $metaTitle = trim($__env->yieldContent('title')) ?: 'Ghana School of Law';
    @endphp
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="theme-color" content="#061d3d">
    <title>{{ $metaTitle }} | GSL</title>

    {{-- Open Graph / Social Sharing --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Ghana School of Law">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $metaTitle }} | GSL">
    <meta property="og:description" content="{{ $metaDescription }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $metaTitle }} | GSL">
    <meta name="twitter:description" content="{{ $metaDescription }}">

    {{-- Structured Data (JSON-LD) --}}
    <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@type": "EducationalOrganization",
            "name": "Ghana School of Law",
            "url": "{{ config('app.url') }}",
            "logo": "{{ asset('CLET GSL Logo .png') }}",
            "description": "Ghana School of Law - Centre of Excellence for Legal Education, Bar Examinations, and Professional Legal Development",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Independence Avenue",
                "addressLocality": "Makola",
                "addressCountry": "GH"
            },
            "telephone": "+233307003231",
            "email": "enquiries@gslaw.edu.gh",
            "sameAs": [
                "https://www.facebook.com/gslawofficial",
                "https://x.com/gslaw_official",
                "https://www.youtube.com/@gslawofficial",
                "https://www.instagram.com/gslaw_official/"
            ]
        }
    </script>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;500;700;900&family=Roboto+Serif:ital,wght@0,400;0,600;0,700;1,400&display=swap"
            rel="stylesheet">
    @endif
</head>

<body class="bg-navy text-white font-sans antialiased">

    @php
        $navItems = [
            ['route' => 'home', 'label' => 'Home', 'desc' => 'Welcome & overview'],
            [
                'label' => 'About',
                'children' => [
                    [
                        'route' => 'about.gsl-clet',
                        'label' => 'GSL & CLET',
                        'desc' => 'About the Ghana School of Law and CLET',
                    ],
                    ['route' => 'about.overview', 'label' => 'Overview', 'desc' => 'Institutional overview'],
                    ['route' => 'about.history', 'label' => 'History', 'desc' => 'History of the Ghana School of Law'],
                    [
                        'route' => 'about.management',
                        'label' => 'Management',
                        'desc' => 'Leadership and management team',
                    ],
                ],
            ],
            [
                'route' => 'programmes',
                'label' => 'Programmes',
                'desc' => 'All GSL programmes at a glance',
                'children' => [
                    [
                        'route' => 'programmes.pre-bar-course',
                        'label' => 'Pre-Bar Course',
                        'desc' => 'Transitional preparatory course for LLB graduates',
                    ],
                    [
                        'route' => 'programmes.law-practice-training',
                        'label' => 'Law Practice Training (LPT)',
                        'desc' => 'The 1-year professional training programme',
                    ],
                    [
                        'route' => 'programmes.post-call-law-course',
                        'label' => 'Post-Call Law Course',
                        'desc' => 'For lawyers called to the Bar in other Common Law jurisdictions',
                    ],
                    [
                        'route' => 'examinations',
                        'label' => 'Examinations',
                        'desc' => 'Entrance and Bar Examination information',
                    ],
                    [
                        'route' => 'academic-calendar',
                        'label' => 'Academic Calendar',
                        'desc' => 'Key dates for the 2026/2027 academic year',
                    ],
                ],
            ],
            [
                'label' => 'Admissions',
                'desc' => 'Entry requirements and how to apply',
                'children' => [
                    [
                        'href' => 'https://sms.gslaw.school/applicant',
                        'label' => 'Applicant Portal',
                        'target' => '_blank',
                        'desc' => 'Submit and track your application',
                    ],
                    [
                        'route' => 'admissions',
                        'label' => 'Entry Requirements',
                        'desc' => 'Admission entry requirements',
                    ],
                    [
                        'href' => 'https://forms.gslaw.school/surveys/23',
                        'label' => 'Apply Online',
                        'target' => '_blank',
                        'desc' => 'Online application form',
                    ],
                    [
                        'route' => 'programmes.pre-bar-course',
                        'label' => 'Apply for Pre-Bar Course',
                        'desc' => 'Preparatory course application',
                    ],
                ],
            ],
            ['route' => 'student-life', 'label' => 'Student Life', 'desc' => 'Campus life, community, and student experience'],
            ['route' => 'events', 'label' => 'Events', 'desc' => 'Upcoming GSL events and ceremonies'],
            ['route' => 'news', 'label' => 'News', 'desc' => 'Latest institutional news and updates'],
            ['route' => 'alumni', 'label' => 'Alumni', 'desc' => 'GSL alumni network and community'],
            ['route' => 'contact', 'label' => 'Contact', 'desc' => 'Get in touch with GSL'],
        ];

        $navIsActive = function ($node) use (&$navIsActive) {
            if (isset($node['route']) && request()->routeIs($node['route'])) {
                return true;
            }
            foreach ($node['children'] ?? [] as $child) {
                if ($navIsActive($child)) {
                    return true;
                }
            }
            return false;
        };

        $flattenForSearch = function (array $items, string $group = 'Main') use (&$flattenForSearch): array {
            $pages = [];
            foreach ($items as $item) {
                $label = $item['label'];
                $desc = $item['desc'] ?? '';
                if (isset($item['route'])) {
                    try {
                        $pages[] = [
                            'label' => $label,
                            'desc' => $desc,
                            'url' => route($item['route']),
                            'group' => $group,
                        ];
                    } catch (\Throwable $e) {
                    }
                } elseif (isset($item['href'])) {
                    $pages[] = ['label' => $label, 'desc' => $desc, 'url' => $item['href'], 'group' => $group];
                }
                if (!empty($item['children'])) {
                    $pages = array_merge($pages, $flattenForSearch($item['children'], $label));
                }
            }
            return $pages;
        };

        $searchPages = $flattenForSearch($navItems);

        foreach (
            [
                [
                    'label' => 'Student Portal',
                    'desc' => 'Student management system',
                    'url' => 'https://sms.gslaw.school/portal',
                ],
                [
                    'label' => 'Lecturer Portal',
                    'desc' => 'Faculty access portal',
                    'url' => 'https://sms.gslaw.school/faculty',
                ],
                [
                    'label' => 'Staff Portal',
                    'desc' => 'Staff administration portal',
                    'url' => 'https://sms.gslaw.school/admin',
                ],
            ]
            as $p
        ) {
            $searchPages[] = ['label' => $p['label'], 'desc' => $p['desc'], 'url' => $p['url'], 'group' => 'Portals'];
        }
    @endphp

    {{-- ══ UTILITY BAR ═════════════════════════════════════════ --}}
    <div class="hidden md:flex fixed inset-x-0 top-0 z-[60] h-9 bg-navy items-center justify-between px-[5%]">
        <span class="text-[11px] font-semibold tracking-[2px] uppercase text-white/50">Ghana School of Law</span>
        <nav class="flex items-center gap-5">
            @foreach ([['https://sms.gslaw.school/portal', 'Students'], ['https://sms.gslaw.school/faculty', 'Lecturers'], ['https://sms.gslaw.school/admin', 'Staff'], ['https://sms.gslaw.school/applicant', 'Applicant Portal']] as $u)
                <a href="{{ $u[0] }}" target="_blank" rel="noopener"
                    class="text-[11px] font-medium text-white/60 hover:text-white transition-colors duration-150">
                    {{ $u[1] }}
                </a>
            @endforeach
        </nav>
    </div>

    {{-- ══ NAV ══════════════════════════════════════════════════ --}}
    <nav id="site-nav"
        class="fixed inset-x-0 top-0 md:top-9 z-50 flex h-[72px] items-center justify-between
            px-[5%] bg-white border-b border-gray-200 shadow-sm transition-all duration-300">

        <a href="{{ route('home') }}" class="flex items-center gap-3 flex-shrink-0 group">
            <img class="h-10 w-auto object-contain" src="{{ asset('CLET GSL Logo .png') }}" alt="Ghana School of Law">
            <div class="hidden sm:block leading-tight">
                <span class="block text-[13px] font-black text-navy tracking-[2px] uppercase">Ghana School of
                    Law</span>
                <span class="block text-[14px] text-navy/60">A Directorate of CLET</span>
            </div>
        </a>

        <ul class="hidden lg:flex items-center gap-7">
            @foreach ($navItems as $item)
                @if (isset($item['children']))
                    @php $childActive = $navIsActive($item); @endphp
                    <li class="relative group">
                        @if (isset($item['route']))
                            <a href="{{ route($item['route']) }}"
                                class="nav-link hover-sleek flex items-center gap-1 text-[15px] font-medium tracking-wide transition-colors duration-200
                                  {{ $childActive ? 'text-navy active' : 'text-navy/60 hover:text-navy' }}">
                                {{ $item['label'] }}
                                <svg class="w-3 h-3 transition-transform duration-200 group-hover:rotate-180"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" viewBox="0 0 24 24">
                                    <polyline points="6 9 12 15 18 9" />
                                </svg>
                            </a>
                        @else
                            <button type="button"
                                class="nav-link hover-sleek flex items-center gap-1 text-[15px] font-medium tracking-wide transition-colors duration-200
                                  {{ $childActive ? 'text-navy active' : 'text-navy/60 hover:text-navy' }}">
                                {{ $item['label'] }}
                                <svg class="w-3 h-3 transition-transform duration-200 group-hover:rotate-180"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" viewBox="0 0 24 24">
                                    <polyline points="6 9 12 15 18 9" />
                                </svg>
                            </button>
                        @endif
                        <div class="absolute left-0 top-full h-3 w-full"></div>
                        <div
                            class="absolute left-0 top-full pt-3 w-56 opacity-0 invisible translate-y-1
                                  group-hover:opacity-100 group-hover:visible group-hover:translate-y-0
                                  group-focus-within:opacity-100 group-focus-within:visible group-focus-within:translate-y-0
                                  transition-all duration-200 z-50">
                            <ul class="bg-white rounded-lg shadow-xl border border-gray-200 py-2 overflow-visible">
                                @foreach ($item['children'] as $child)
                                    @if (isset($child['children']))
                                        <li class="relative group/sub">
                                            <button type="button"
                                                class="flex w-full items-center justify-between gap-2 px-4 py-2.5 text-[14px] font-medium text-navy/70 hover:text-navy hover:bg-gray-50 transition-colors duration-150">
                                                <span>{{ $child['label'] }}</span>
                                                <svg class="w-3 h-3 flex-shrink-0" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    viewBox="0 0 24 24">
                                                    <polyline points="9 5 16 12 9 19" />
                                                </svg>
                                            </button>
                                            <div
                                                class="absolute left-full top-0 pl-1 w-56 opacity-0 invisible translate-x-1
                                                      group-hover/sub:opacity-100 group-hover/sub:visible group-hover/sub:translate-x-0
                                                      transition-all duration-200 z-50">
                                                <ul
                                                    class="bg-white rounded-lg shadow-xl border border-gray-200 py-2 overflow-hidden">
                                                    @foreach ($child['children'] as $grandchild)
                                                        <li>
                                                            <a href="{{ route($grandchild['route']) }}"
                                                                class="block px-4 py-2.5 text-[14px] font-medium whitespace-nowrap transition-colors duration-150
                                                                  {{ request()->routeIs($grandchild['route']) ? 'text-gold bg-gold/5' : 'text-navy/70 hover:text-navy hover:bg-gray-50' }}">
                                                                {{ $grandchild['label'] }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </li>
                                    @else
                                        @php
                                            $childUrl = isset($child['href']) ? $child['href'] : route($child['route']);
                                            $childActive =
                                                isset($child['route']) && request()->routeIs($child['route']);
                                        @endphp
                                        <li>
                                            <a href="{{ $childUrl }}"
                                                @if (isset($child['target'])) target="{{ $child['target'] }}" rel="noopener" @endif
                                                class="block px-4 py-2.5 text-[14px] font-medium transition-colors duration-150
                                                  {{ $childActive ? 'text-gold bg-gold/5' : 'text-navy/70 hover:text-navy hover:bg-gray-50' }}">
                                                {{ $child['label'] }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @else
                    <li>
                        <a href="{{ route($item['route']) }}"
                            class="nav-link hover-sleek text-[15px] font-medium tracking-wide transition-colors duration-200
                          {{ request()->routeIs($item['route']) ? 'text-navy active' : 'text-navy/60 hover:text-navy' }}">
                            {{ $item['label'] }}
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>

        <div class="flex items-center gap-3">
            {{-- Search trigger --}}
            <button id="search-trigger" aria-label="Search..."
                class="flex items-center gap-2 px-3 py-2 rounded border border-navy/15 text-navy/50
                       hover:border-gold/40 hover:text-navy transition-all duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8" />
                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                </svg>
                <span class="hidden sm:inline text-[13px] font-medium">Search</span>
                <kbd
                    class="hidden lg:inline-flex items-center gap-0.5 px-1.5 py-0.5 text-[10px] font-mono
                            bg-gray-100 border border-gray-300 rounded text-gray-400">⌘K</kbd>
            </button>

            <a href="https://forms.gslaw.school/surveys/23" target="_blank" rel="noopener"
                class="hidden lg:inline-flex items-center gap-2 px-5 py-2.5 text-[14px] font-semibold
                        bg-gold text-navy rounded btn-sleek hover:bg-gold-light hover:-translate-y-px transition-all duration-200">
                Apply Now
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <line x1="5" y1="12" x2="19" y2="12" />
                    <polyline points="12 5 19 12 12 19" />
                </svg>
            </a>

            <button id="nav-hamburger" aria-label="Open menu" aria-expanded="false"
                class="lg:hidden flex flex-col justify-center items-center gap-[5px] w-10 h-10
                       rounded border border-navy/20 hover:border-gold/50 transition-colors duration-200">
                <span
                    class="hb block w-5 h-[1.5px] bg-navy/80 rounded-full transition-all duration-300 origin-center"></span>
                <span class="hb block w-5 h-[1.5px] bg-navy/80 rounded-full transition-all duration-300"></span>
                <span
                    class="hb block w-5 h-[1.5px] bg-navy/80 rounded-full transition-all duration-300 origin-center"></span>
            </button>
        </div>
    </nav>

    {{-- ══ SEARCH MODAL ═════════════════════════════════════════ --}}
    <div id="search-modal"
        class="fixed inset-0 z-[200] flex items-start justify-center pt-[10vh] px-4
               bg-navy-dark/60 backdrop-blur-sm
               opacity-0 pointer-events-none transition-opacity duration-200"
        role="dialog" aria-modal="true" aria-label="Site search">

        <div id="search-box"
            class="w-full max-w-xl bg-white rounded-2xl shadow-2xl overflow-hidden
                   translate-y-4 transition-transform duration-200">

            {{-- Input row --}}
            <div class="flex items-center gap-3 px-5 py-4 border-b border-gray-100">
                <svg class="w-5 h-5 text-gold flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8" />
                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                </svg>
                <input id="search-input" type="text" placeholder="Search pages&hellip;" autocomplete="off"
                    class="flex-1 text-[15px] text-navy placeholder-gray-400 bg-transparent focus:outline-none">
                <kbd
                    class="flex-shrink-0 px-2 py-1 text-[11px] font-mono bg-gray-100 border border-gray-200
                            rounded text-gray-400 hidden sm:block">Esc</kbd>
            </div>

            <ul id="search-results" class="max-h-[60vh] overflow-y-auto py-2"></ul>

            {{-- Empty state --}}
            <p id="search-empty" class="hidden px-5 py-8 text-center text-[13px] text-gray-400">
                No pages found for your search.
            </p>

            <div class="flex items-center gap-4 px-5 py-3 border-t border-gray-100 bg-gray-50">
                <span class="flex items-center gap-1.5 text-[11px] text-gray-400">
                    <kbd class="px-1.5 py-0.5 bg-white border border-gray-200 rounded font-mono text-[10px]">↑↓</kbd>
                    navigate
                </span>
                <span class="flex items-center gap-1.5 text-[11px] text-gray-400">
                    <kbd class="px-1.5 py-0.5 bg-white border border-gray-200 rounded font-mono text-[10px]">↵</kbd>
                    open
                </span>
                <span class="flex items-center gap-1.5 text-[11px] text-gray-400">
                    <kbd class="px-1.5 py-0.5 bg-white border border-gray-200 rounded font-mono text-[10px]">Esc</kbd>
                    close
                </span>
            </div>
        </div>
    </div>

    {{-- ══ OVERLAY ════════════════════════════════════════════ --}}
    <div id="mob-overlay"
        class="fixed inset-0 z-[100] bg-navy-dark/75 backdrop-blur-sm
            opacity-0 pointer-events-none transition-opacity duration-300">
    </div>

    {{-- ══ MOBILE DRAWER ══════════════════════════════════════════ --}}
    <aside id="mob-drawer"
        class="fixed top-0 right-0 bottom-0 z-[110] flex flex-col
              w-[300px] max-w-[85vw] bg-navy-dark border-l border-gold/10
              translate-x-full transition-transform duration-300 ease-in-out">

        <div class="flex items-center justify-between h-[72px] px-5 border-b border-gold/10 flex-shrink-0">
            <div class="flex items-center gap-2.5">
                <div
                    class="w-8 h-8 rounded-full border border-gold bg-gold/10 flex items-center justify-center
                        font-serif font-bold text-[14px] text-gold">
                    GSL</div>
                <span class="text-[14px] font-bold text-gold/80 tracking-[2px] uppercase">Navigation</span>
            </div>
            <button id="mob-close" aria-label="Close menu"
                class="w-9 h-9 flex items-center justify-center rounded border border-gold/20
                       text-cloud/60 hover:border-gold/50 hover:text-white text-2xl leading-none transition-colors">
                &times;
            </button>
        </div>

        <nav class="flex-1 overflow-y-auto px-4 py-5">
            <ul class="flex flex-col gap-1.5">
                @foreach ($navItems as $item)
                    @if (isset($item['children']))
                        @php $childActive = $navIsActive($item); @endphp
                        <li>
                            <div class="mob-accordion-item">
                                @if (isset($item['route']))
                                    <div
                                        class="flex items-center gap-1 rounded-lg border {{ $childActive ? 'bg-gold/10 border-gold/25' : 'border-transparent' }}">
                                        <a href="{{ route($item['route']) }}"
                                            class="mob-link flex-1 flex items-center gap-3 px-4 py-3 rounded-lg text-[14px] font-medium transition-all duration-200
                                              {{ $childActive ? 'text-gold' : 'text-cloud/70 hover:bg-white/5 hover:text-white' }}">
                                            <span
                                                class="w-1.5 h-1.5 rounded-full flex-shrink-0 {{ $childActive ? 'bg-gold' : 'bg-cloud/25' }}"></span>
                                            {{ $item['label'] }}
                                        </a>
                                        <button type="button" aria-label="Toggle {{ $item['label'] }} submenu"
                                            class="mob-accordion-btn flex items-center justify-center w-11 self-stretch rounded-lg transition-colors duration-200
                                              {{ $childActive ? 'text-gold' : 'text-cloud/50 hover:bg-white/5 hover:text-white' }}">
                                            <svg class="mob-accordion-chevron w-3.5 h-3.5 transition-transform duration-200 {{ $childActive ? 'rotate-180' : '' }}"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                                <polyline points="6 9 12 15 18 9" />
                                            </svg>
                                        </button>
                                    </div>
                                @else
                                    <button type="button" aria-label="Toggle {{ $item['label'] }} submenu"
                                        class="mob-accordion-btn w-full flex items-center justify-between gap-3 px-4 py-3 rounded-lg text-[14px] font-medium
                                          transition-all duration-200
                                          {{ $childActive
                                              ? 'bg-gold/10 text-gold border border-gold/25'
                                              : 'text-cloud/70 hover:bg-white/5 hover:text-white border border-transparent' }}">
                                        <span class="flex items-center gap-3">
                                            <span
                                                class="w-1.5 h-1.5 rounded-full flex-shrink-0 {{ $childActive ? 'bg-gold' : 'bg-cloud/25' }}"></span>
                                            {{ $item['label'] }}
                                        </span>
                                        <svg class="mob-accordion-chevron w-3.5 h-3.5 transition-transform duration-200 {{ $childActive ? 'rotate-180' : '' }}"
                                            fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                            <polyline points="6 9 12 15 18 9" />
                                        </svg>
                                    </button>
                                @endif
                                <div
                                    class="mob-accordion-panel grid transition-all duration-300 ease-in-out {{ $childActive ? 'grid-rows-[1fr]' : 'grid-rows-[0fr]' }}">
                                    <div class="overflow-hidden">
                                        <div class="flex flex-col gap-1 pl-4 pt-1.5 pb-1">
                                            @foreach ($item['children'] as $child)
                                                @if (isset($child['children']))
                                                    @php $subActive = $navIsActive($child); @endphp
                                                    <div class="mob-accordion-item">
                                                        <button type="button"
                                                            aria-label="Toggle {{ $child['label'] }} submenu"
                                                            class="mob-accordion-btn w-full flex items-center justify-between gap-3 px-4 py-2.5 rounded-lg text-[12.5px] font-medium transition-all duration-200
                                                              {{ $subActive ? 'text-gold' : 'text-cloud/55 hover:text-white' }}">
                                                            <span class="flex items-center gap-3">
                                                                <span
                                                                    class="w-1 h-1 rounded-full bg-cloud/25 flex-shrink-0"></span>
                                                                {{ $child['label'] }}
                                                            </span>
                                                            <svg class="mob-accordion-chevron w-3 h-3 transition-transform duration-200 {{ $subActive ? 'rotate-180' : '' }}"
                                                                fill="none" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                viewBox="0 0 24 24">
                                                                <polyline points="6 9 12 15 18 9" />
                                                            </svg>
                                                        </button>
                                                        <div
                                                            class="mob-accordion-panel grid transition-all duration-300 ease-in-out {{ $subActive ? 'grid-rows-[1fr]' : 'grid-rows-[0fr]' }}">
                                                            <div class="overflow-hidden">
                                                                <div class="flex flex-col gap-1 pl-4 pt-1 pb-1">
                                                                    @foreach ($child['children'] as $grandchild)
                                                                        <a href="{{ route($grandchild['route']) }}"
                                                                            class="mob-link flex items-center gap-3 px-4 py-2 rounded-lg text-[13px] font-medium transition-all duration-200
                                                                              {{ request()->routeIs($grandchild['route']) ? 'text-gold' : 'text-cloud/50 hover:text-white' }}">
                                                                            <span
                                                                                class="w-1 h-1 rounded-full bg-cloud/20 flex-shrink-0"></span>
                                                                            {{ $grandchild['label'] }}
                                                                        </a>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    @php
                                                        $childUrl = isset($child['href'])
                                                            ? $child['href']
                                                            : route($child['route']);
                                                        $childActive =
                                                            isset($child['route']) &&
                                                            request()->routeIs($child['route']);
                                                    @endphp
                                                    <a href="{{ $childUrl }}"
                                                        @if (isset($child['target'])) target="{{ $child['target'] }}" rel="noopener" @endif
                                                        class="mob-link flex items-center gap-3 px-4 py-2.5 rounded-lg text-[12.5px] font-medium transition-all duration-200
                                                          {{ $childActive ? 'text-gold' : 'text-cloud/55 hover:text-white' }}">
                                                        <span
                                                            class="w-1 h-1 rounded-full bg-cloud/25 flex-shrink-0"></span>
                                                        {{ $child['label'] }}
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @else
                        <li>
                            <a href="{{ route($item['route']) }}"
                                class="mob-link flex items-center gap-3 px-4 py-3 rounded-lg text-[14px] font-medium
                              transition-all duration-200
                              {{ request()->routeIs($item['route'])
                                  ? 'bg-gold/10 text-gold border border-gold/25'
                                  : 'text-cloud/70 hover:bg-white/5 hover:text-white border border-transparent' }}">
                                <span
                                    class="w-1.5 h-1.5 rounded-full flex-shrink-0
                                     {{ request()->routeIs($item['route']) ? 'bg-gold' : 'bg-cloud/25' }}"></span>
                                {{ $item['label'] }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>

            <div class="mt-6 pt-5 border-t border-gold/10">
                <a href="https://forms.gslaw.school/surveys/23" target="_blank" rel="noopener"
                    class="mob-link flex items-center justify-center gap-2 w-full py-3.5 text-[14px] font-semibold
                      bg-gold text-navy rounded hover:bg-gold-light transition-colors duration-200">
                    Apply Now - September 2026
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <polyline points="12 5 19 12 12 19" />
                    </svg>
                </a>
            </div>

            <div class="mt-5 pt-5 border-t border-gold/10">
                <p class="text-[9px] font-bold text-gold/40 tracking-[2px] uppercase mb-3">Portals</p>
                <div class="flex flex-col gap-2">
                    @foreach ([['https://sms.gslaw.school/portal', 'Student Portal'], ['https://sms.gslaw.school/faculty', 'Lecturer Portal'], ['https://sms.gslaw.school/admin', 'Staff Portal'], ['https://sms.gslaw.school/applicant', 'Applicant Portal']] as $u)
                        <a href="{{ $u[0] }}" target="_blank" rel="noopener"
                            class="mob-link flex items-center gap-2.5 text-[13px] text-cloud/50 hover:text-gold transition-colors">
                            <svg class="w-3 h-3 flex-shrink-0" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                viewBox="0 0 24 24">
                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                                <polyline points="15 3 21 3 21 9" />
                                <line x1="10" y1="14" x2="21" y2="3" />
                            </svg>
                            {{ $u[1] }}
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="mt-5 flex flex-col gap-2.5">
                <a href="tel:+233307003231"
                    class="flex items-center gap-2 text-[13px] text-cloud/45 hover:text-gold transition-colors">
                    <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path
                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.63 3.4 2 2 0 0 1 3.6 1.21h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.84a16 16 0 0 0 6 6l.95-.95a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 21.73 16.92z" />
                    </svg>
                    +233 307 003 231
                </a>
                <a href="mailto:enquiries@gslaw.edu.gh"
                    class="flex items-center gap-2 text-[13px] text-cloud/45 hover:text-gold transition-colors">
                    <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                        <polyline points="22,6 12,13 2,6" />
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
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-10 mb-12">

                <div class="lg:col-span-2">
                    <div class="flex items-center gap-3 mb-4">
                        <div
                            class="w-11 h-11 rounded-full border-2 border-gold bg-gold/10 flex items-center justify-center
                                font-serif font-bold text-[14px] text-gold flex-shrink-0">
                            GSL</div>
                        <div>
                            <p class="font-serif font-bold text-[14px] text-white leading-tight">Ghana School of Law
                            </p>
                            <p class="text-[10px] font-bold text-gold tracking-[1.5px] uppercase">A Directorate of CLET
                            </p>
                        </div>
                    </div>
                    <p class="text-[14px] text-cloud/50 leading-[1.75] max-w-[260px]">
                        Professional legal training and the official pathway to Ghana's Bar - under CLET Act 1170.
                    </p>
                    <div class="flex gap-2 mt-4">
                        @foreach ([['https://www.facebook.com/gslawofficial', 'f', 'Facebook'], ['https://x.com/gslaw_official', '𝕏', 'X'], ['https://www.youtube.com/@gslawofficial', '▶', 'YouTube'], ['https://www.instagram.com/gslaw_official/', '◉', 'Instagram']] as $s)
                            <a href="{{ $s[0] }}" target="_blank" rel="noopener"
                                aria-label="{{ $s[2] }}"
                                class="w-8 h-8 rounded-full border border-gold/15 flex items-center justify-center
                              text-[14px] text-cloud/40 hover:border-gold/50 hover:text-gold transition-all duration-200">
                                {{ $s[1] }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <div>
                    <h4 class="text-[14px] font-bold text-gold tracking-[2px] uppercase mb-5">Programmes</h4>
                    <ul class="space-y-2.5">
                        @foreach ([['programmes.pre-bar-course', 'Pre-Bar Course'], ['programmes.law-practice-training', 'Law Practice Training (LPT)'], ['programmes.post-call-law-course', 'Post-Call Law Course'], ['programmes', 'Bar Exam Remedial'], ['programmes', 'Specialised Development']] as $l)
                            <li><a href="{{ route($l[0]) }}"
                                    class="text-[14px] text-cloud/55 hover:text-gold transition-colors">{{ $l[1] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h4 class="text-[14px] font-bold text-gold tracking-[2px] uppercase mb-5">Latest News</h4>
                    <ul class="space-y-2.5">
                        @foreach (collect(config('news.articles'))->take(5) as $n)
                            <li><a href="{{ route('news.show', $n['slug']) }}"
                                    class="text-[14px] text-cloud/55 hover:text-gold transition-colors line-clamp-1">{{ $n['title'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h4 class="text-[14px] font-bold text-gold tracking-[2px] uppercase mb-5">Quick Links</h4>
                    <ul class="space-y-2.5">
                        @foreach ([['https://sms.gslaw.school/portal', 'Student Portal'], ['https://sms.gslaw.school/faculty', 'Lecturer Portal'], ['https://sms.gslaw.school/admin', 'Staff Portal'], ['https://forms.gslaw.school/surveys/23', 'Apply Now']] as $l)
                            <li><a href="{{ $l[0] }}" target="_blank" rel="noopener"
                                    class="text-[14px] text-cloud/55 hover:text-gold transition-colors">{{ $l[1] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h4 class="text-[14px] font-bold text-gold tracking-[2px] uppercase mb-5">Contact</h4>
                    <ul class="space-y-3 text-[14px] text-cloud/55">
                        <li class="flex items-start gap-2.5 leading-snug">
                            <svg class="w-3.5 h-3.5 flex-shrink-0 mt-0.5 stroke-gold fill-none" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                            Independence Avenue, Makola, Accra
                        </li>
                        <li class="flex items-start gap-2.5">
                            <svg class="w-3.5 h-3.5 flex-shrink-0 mt-0.5 stroke-gold fill-none" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.63 3.4 2 2 0 0 1 3.6 1.21h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.84a16 16 0 0 0 6 6l.95-.95a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 21.73 16.92z" />
                            </svg>
                            +233 307 003 231
                        </li>
                        <li class="flex items-start gap-2.5">
                            <svg class="w-3.5 h-3.5 flex-shrink-0 mt-0.5 stroke-gold fill-none" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                <polyline points="22,6 12,13 2,6" />
                            </svg>
                            enquiries@gslaw.edu.gh
                        </li>
                        <li class="flex items-start gap-2.5">
                            <svg class="w-3.5 h-3.5 flex-shrink-0 mt-0.5 stroke-gold fill-none" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                <polyline points="22,6 12,13 2,6" />
                            </svg>
                            admissions@gslaw.edu.gh
                        </li>
                    </ul>
                </div>

            </div>

            <div class="pt-6 border-t border-white/5 flex flex-col sm:flex-row items-center justify-between gap-3">
                <p class="text-[13px] text-cloud/30">&copy; Ghana School of Law {{ date('Y') }}. All rights
                    reserved. A Directorate of CLET.</p>
            </div>
        </div>
    </footer>

    {{-- ══ CHATBOT WIDGET ══════════════════════════════════════════ --}}
    <div class="fixed bottom-5 right-5 z-40 flex flex-col items-end gap-3">

        <div id="chat-panel"
            class="hidden opacity-0 scale-95 pointer-events-none origin-bottom-right transition-all duration-200
                  w-[340px] max-w-[90vw] h-[460px] max-h-[70vh] bg-white rounded-2xl shadow-2xl
                  border border-gray-200 flex flex-col overflow-hidden">

            <div
                class="flex items-center justify-between gap-3 px-4 py-3 bg-navy border-b border-gold/15 flex-shrink-0">
                <div class="flex items-center gap-2.5">
                    <div
                        class="w-8 h-8 rounded-full border border-gold bg-gold/10 flex items-center justify-center
                              font-serif font-bold text-[14px] text-gold">
                        GSL</div>
                    <div>
                        <p class="text-[14px] font-semibold text-white leading-tight">GSL Assistant</p>
                        <p class="text-[10px] text-cloud/50">Ask about admissions &amp; programmes</p>
                    </div>
                </div>
                <button id="chat-close" aria-label="Close chat"
                    class="w-7 h-7 flex items-center justify-center rounded text-cloud/50 hover:text-white
                          hover:bg-white/5 text-xl leading-none transition-colors">&times;</button>
            </div>

            <div id="chat-messages" class="flex-1 overflow-y-auto px-4 py-4 space-y-3 bg-gray-50">
                <div
                    class="max-w-[85%] bg-white border border-gray-200 text-navy text-[14px] leading-snug rounded-xl rounded-bl-sm px-3.5 py-2.5">
                    Hi, I'm the GSL Assistant. Ask me about admissions, programmes, fees, or how to get in touch - or
                    tap an option below.
                </div>
            </div>

            <div id="chat-quick-replies"
                class="flex flex-wrap gap-2 px-4 py-3 border-t border-gray-200 bg-white flex-shrink-0">
                @foreach (['Admissions', 'Programmes', 'Fees', 'Contact'] as $q)
                    <button type="button"
                        class="chat-quick px-3 py-1.5 text-[14px] font-semibold rounded-full border border-gold/30 text-gold hover:bg-gold/10 transition-colors">
                        {{ $q }}
                    </button>
                @endforeach
            </div>

            <form id="chat-form"
                class="flex items-center gap-2 px-3 py-3 border-t border-gray-200 bg-white flex-shrink-0">
                <input id="chat-input" type="text" placeholder="Type your question..." autocomplete="off"
                    class="flex-1 min-w-0 px-3 py-2 text-[14px] text-navy bg-gray-50 border border-gray-300 rounded-lg
                          focus:outline-none focus:border-gold/60 transition-colors">
                <button type="submit" aria-label="Send"
                    class="w-9 h-9 flex-shrink-0 rounded-lg bg-gold text-navy flex items-center justify-center
                          hover:bg-gold-light transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <line x1="22" y1="2" x2="11" y2="13" />
                        <polygon points="22 2 15 22 11 13 2 9 22 2" />
                    </svg>
                </button>
            </form>
        </div>

        <button id="chat-toggle" aria-label="Open chat" aria-expanded="false"
            class="w-14 h-14 rounded-full bg-gold text-navy shadow-lg shadow-black/20 flex items-center justify-center
                  hover:bg-gold-light hover:-translate-y-0.5 transition-all duration-200">
            <svg id="chat-icon-open" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <path
                    d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
            </svg>
            <svg id="chat-icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <line x1="18" y1="6" x2="6" y2="18" />
                <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
        </button>
    </div>

    <script>
        (function() {
            var nav = document.getElementById('site-nav');
            window.addEventListener('scroll', function() {
                nav.classList.toggle('shadow-md', window.scrollY > 60);
            }, {
                passive: true
            });

            var btn = document.getElementById('nav-hamburger');
            var cls = document.getElementById('mob-close');
            var drw = document.getElementById('mob-drawer');
            var ovl = document.getElementById('mob-overlay');
            var bars = btn.querySelectorAll('.hb');

            function open() {
                drw.classList.remove('translate-x-full');
                ovl.classList.remove('opacity-0', 'pointer-events-none');
                ovl.classList.add('opacity-100');
                document.body.style.overflow = 'hidden';
                btn.setAttribute('aria-expanded', 'true');
                bars[0].style.transform = 'translateY(6.5px) rotate(45deg)';
                bars[1].style.opacity = '0';
                bars[2].style.transform = 'translateY(-6.5px) rotate(-45deg)';
            }

            function close() {
                drw.classList.add('translate-x-full');
                ovl.classList.remove('opacity-100');
                ovl.classList.add('opacity-0');
                setTimeout(function() {
                    ovl.classList.add('pointer-events-none');
                }, 300);
                document.body.style.overflow = '';
                btn.setAttribute('aria-expanded', 'false');
                bars[0].style.transform = '';
                bars[1].style.opacity = '';
                bars[2].style.transform = '';
            }

            btn.addEventListener('click', open);
            cls.addEventListener('click', close);
            ovl.addEventListener('click', close);
            drw.querySelectorAll('.mob-link').forEach(function(a) {
                a.addEventListener('click', close);
            });
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') close();
            });

            drw.querySelectorAll('.mob-accordion-btn').forEach(function(accBtn) {
                var panel = accBtn.closest('.mob-accordion-item').querySelector(
                    ':scope > .mob-accordion-panel');
                var chevron = accBtn.querySelector('.mob-accordion-chevron');
                accBtn.addEventListener('click', function() {
                    var isOpen = panel.classList.contains('grid-rows-[1fr]');
                    panel.classList.toggle('grid-rows-[1fr]', !isOpen);
                    panel.classList.toggle('grid-rows-[0fr]', isOpen);
                    chevron.classList.toggle('rotate-180', !isOpen);
                });
            });
        }());
    </script>

    <script>
        (function() {
            var toggle = document.getElementById('chat-toggle');
            var panel = document.getElementById('chat-panel');
            var closeBtn = document.getElementById('chat-close');
            var iconOpen = document.getElementById('chat-icon-open');
            var iconClose = document.getElementById('chat-icon-close');
            var messages = document.getElementById('chat-messages');
            var form = document.getElementById('chat-form');
            var input = document.getElementById('chat-input');
            var quickReplies = document.getElementById('chat-quick-replies');

            var FAQ = [{
                    keys: ['admission', 'apply', 'application', 'enroll', 'enrol'],
                    answer: 'Admissions for the 2026/2027 intake are open now, with the application deadline in July 2026. Apply online at forms.gslaw.school/surveys/23 or visit the Admissions page for full requirements.'
                },
                {
                    keys: ['programme', 'program', 'course', 'lptc', 'post-call', 'remedial'],
                    answer: 'GSL runs four programmes: the Law Practice Training Course (LPTC), the Post-Call Law Course for foreign/reciprocal lawyers, Bar Examination Remedial Courses, and Specialised Professional Development. See the Programmes page for details on each.'
                },
                {
                    keys: ['fee', 'fees', 'cost', 'price', 'tuition'],
                    answer: 'Fee schedules vary by programme and are published each admissions cycle. Contact Admissions directly at +233 246 006 210 or admissions@gslaw.edu.gh for the current fee structure.'
                },
                {
                    keys: ['contact', 'phone', 'email', 'call', 'address', 'office'],
                    answer: 'You can reach us at +233 307 003 231, enquiries@gslaw.edu.gh, or visit our Accra (Independence Avenue, Makola) or Kumasi campus. Full details are on the Contact page.'
                },
                {
                    keys: ['event', 'calendar', 'ceremony', 'induction', 'call to the bar'],
                    answer: 'Upcoming events include inductions, orientations, and the annual Call to the Bar ceremony. Check the Events page for the full calendar.'
                }
            ];

            var FALLBACK =
                "I don't have an answer for that yet - our admissions team can help directly. Call +233 246 006 210 or email helpdesk@gslaw.edu.gh.";

            function addMessage(text, from) {
                var bubble = document.createElement('div');
                bubble.className = from === 'user' ?
                    'max-w-[85%] bg-gold text-navy text-[14px] leading-snug rounded-xl rounded-br-sm px-3.5 py-2.5 ml-auto' :
                    'max-w-[85%] bg-white border border-gray-200 text-navy text-[14px] leading-snug rounded-xl rounded-bl-sm px-3.5 py-2.5';
                bubble.textContent = text;
                messages.appendChild(bubble);
                messages.scrollTop = messages.scrollHeight;
            }

            function respond(userText) {
                var lower = userText.toLowerCase();
                var match = FAQ.find(function(f) {
                    return f.keys.some(function(k) {
                        return lower.indexOf(k) !== -1;
                    });
                });
                setTimeout(function() {
                    addMessage(match ? match.answer : FALLBACK, 'bot');
                }, 450);
            }

            function openChat() {
                panel.classList.remove('hidden');
                requestAnimationFrame(function() {
                    panel.classList.remove('opacity-0', 'scale-95', 'pointer-events-none');
                });
                toggle.setAttribute('aria-expanded', 'true');
                iconOpen.classList.add('hidden');
                iconClose.classList.remove('hidden');
                input.focus();
            }

            function closeChat() {
                panel.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
                toggle.setAttribute('aria-expanded', 'false');
                iconOpen.classList.remove('hidden');
                iconClose.classList.add('hidden');
                setTimeout(function() {
                    panel.classList.add('hidden');
                }, 200);
            }

            toggle.addEventListener('click', function() {
                if (panel.classList.contains('hidden')) openChat();
                else closeChat();
            });
            closeBtn.addEventListener('click', closeChat);

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                var text = input.value.trim();
                if (!text) return;
                addMessage(text, 'user');
                input.value = '';
                respond(text);
            });

            quickReplies.querySelectorAll('.chat-quick').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    addMessage(btn.textContent.trim(), 'user');
                    respond(btn.textContent.trim());
                });
            });
        }());
    </script>

    @stack('scripts')

    <script>
        /* ── Search Modal ──────────────────────────────────────────────── */
        (function() {
            'use strict';

            /* ── 1. Pages - auto-generated server-side from $navItems ── */
            var PAGES = {!! json_encode($searchPages) !!};

            /* ── 2. DOM refs ─────────────────────────────────────────── */
            var modal = document.getElementById('search-modal');
            var box = document.getElementById('search-box');
            var input = document.getElementById('search-input');
            var results = document.getElementById('search-results');
            var empty = document.getElementById('search-empty');
            var trigger = document.getElementById('search-trigger');
            var activeIdx = -1;

            /* ── 3. Open / close ─────────────────────────────────────── */
            function openSearch() {
                modal.classList.remove('opacity-0', 'pointer-events-none');
                box.classList.remove('translate-y-4');
                document.body.style.overflow = 'hidden';
                input.value = '';
                activeIdx = -1;
                renderResults('');
                setTimeout(function() {
                    input.focus();
                }, 50);
            }

            function closeSearch() {
                modal.classList.add('opacity-0', 'pointer-events-none');
                box.classList.add('translate-y-4');
                document.body.style.overflow = '';
                activeIdx = -1;
            }

            trigger.addEventListener('click', openSearch);
            modal.addEventListener('click', function(e) {
                if (!box.contains(e.target)) closeSearch();
            });

            /* ── 4. Render ───────────────────────────────────────────── */
            function renderResults(query) {
                var q = query.trim().toLowerCase();
                var filtered = q ?
                    PAGES.filter(function(p) {
                        return (p.label + ' ' + p.desc + ' ' + p.group).toLowerCase().indexOf(q) !== -1;
                    }) :
                    PAGES;

                results.innerHTML = '';
                activeIdx = -1;

                if (filtered.length === 0) {
                    empty.classList.remove('hidden');
                    return;
                }
                empty.classList.add('hidden');

                /* group items */
                var groups = {};
                filtered.forEach(function(p) {
                    (groups[p.group] = groups[p.group] || []).push(p);
                });

                Object.keys(groups).forEach(function(grp) {
                    /* group label */
                    var li = document.createElement('li');
                    li.className = 'px-5 pt-3 pb-1';
                    li.innerHTML =
                        '<span class="text-[10px] font-bold tracking-[2px] uppercase text-gold/70">' + grp +
                        '</span>';
                    results.appendChild(li);

                    groups[grp].forEach(function(p) {
                        var item = document.createElement('li');
                        item.setAttribute('role', 'option');
                        item.dataset.url = p.url;
                        item.className =
                            'search-result-item flex items-center gap-3 px-5 py-2.5 cursor-pointer transition-colors duration-100 hover:bg-gray-50';
                        item.innerHTML =
                            '<div class="w-8 h-8 rounded-lg bg-navy/5 border border-navy/10 flex items-center justify-center flex-shrink-0">' +
                            '<svg class="w-3.5 h-3.5 text-navy/40" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>' +
                            '</div>' +
                            '<div class="min-w-0">' +
                            '<p class="text-[13px] font-semibold text-navy truncate">' + p.label +
                            '</p>' +
                            '<p class="text-[11px] text-gray-400 truncate">' + p.desc + '</p>' +
                            '</div>' +
                            '<svg class="w-3.5 h-3.5 text-gray-300 flex-shrink-0 ml-auto" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>';

                        item.addEventListener('click', function() {
                            closeSearch();
                            window.location.href = p.url;
                        });
                        results.appendChild(item);
                    });
                });
            }

            input.addEventListener('input', function() {
                renderResults(input.value);
            });

            /* ── 5. Keyboard navigation ──────────────────────────────── */
            function getItems() {
                return Array.from(results.querySelectorAll('.search-result-item'));
            }

            function setActive(idx) {
                var items = getItems();
                items.forEach(function(el, i) {
                    if (i === idx) {
                        el.classList.add('bg-gold/8', 'bg-gray-100');
                        el.scrollIntoView({
                            block: 'nearest'
                        });
                    } else {
                        el.classList.remove('bg-gold/8', 'bg-gray-100');
                    }
                });
                activeIdx = idx;
            }

            document.addEventListener('keydown', function(e) {
                /* open with Cmd/Ctrl + K */
                if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
                    e.preventDefault();
                    modal.classList.contains('pointer-events-none') ? openSearch() : closeSearch();
                    return;
                }
                if (modal.classList.contains('pointer-events-none')) return;

                var items = getItems();
                if (e.key === 'Escape') {
                    closeSearch();
                    return;
                }
                if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    setActive(Math.min(activeIdx + 1, items.length - 1));
                } else if (e.key === 'ArrowUp') {
                    e.preventDefault();
                    setActive(Math.max(activeIdx - 1, 0));
                } else if (e.key === 'Enter' && activeIdx >= 0 && items[activeIdx]) {
                    e.preventDefault();
                    closeSearch();
                    window.location.href = items[activeIdx].dataset.url;
                }
            });
        }());
    </script>

    <script>
        /* ── scroll flip reveal ──────────────────────────────────────────
                                               Works on every page automatically.
                                               • Each top-level section/div inside <main> (except the hero) gets
                                                 a flip-in effect as it enters the viewport.
                                               • Direct grid/flex children of those blocks get staggered delays.
                                            ──────────────────────────────────────────────────────────────── */
        (function() {
            'use strict';
            if (!window.IntersectionObserver) return;

            var main = document.querySelector('main');
            if (!main) return;

            /* ── 1. section-level reveal ─────────────────────────────── */
            var blocks = Array.from(main.children);
            blocks.forEach(function(block, i) {
                if (i === 0) return; // hero always visible - skip

                /* target the inner .max-w-6xl container when present, else
                   fall back to the block itself (e.g. the CTA section)      */
                var target = block.querySelector(':scope > .max-w-6xl') ||
                    block.querySelector(':scope > div.max-w-6xl') ||
                    block;
                target.classList.add('reveal');
            });

            /* ── 2. staggered children inside static grids ───────────── */
            main.querySelectorAll(
                '.reveal .grid > *:not([data-carousel-slide]):not([data-carousel-dots])'
            ).forEach(function(child, i) {
                child.classList.add('reveal-child');
                /* cycle delay in groups of 3 so rows animate together     */
                child.style.transitionDelay = ((i % 3) * 90) + 'ms';
            });

            /* ── 3. observe everything ───────────────────────────────── */
            var io = new IntersectionObserver(function(entries) {
                entries.forEach(function(e) {
                    if (!e.isIntersecting) return;
                    e.target.classList.add('visible');
                    io.unobserve(e.target);
                });
            }, {
                threshold: 0.08,
                rootMargin: '0px 0px -50px 0px' /* trigger slightly before edge */
            });

            main.querySelectorAll('.reveal, .reveal-child').forEach(function(el) {
                io.observe(el);
            });
        }());
    </script>

</html>
