<?php

namespace App\Support;

/**
 * Curated list of parameter-less named routes safe to offer in admin
 * Select fields (hero slide buttons, nav items). Kept to routes that
 * never need a slug/id, so picking one can never produce a broken link.
 */
class SiteRoutes
{
    public const OPTIONS = [
        'home' => 'Home',
        'about' => 'About',
        'about.gsl-clet' => 'About – GSL & CLET',
        'about.overview' => 'About – Overview',
        'about.history' => 'About – History',
        'about.management' => 'About – Management',
        'programmes' => 'Programmes',
        'programmes.pre-bar-course' => 'Programmes – Pre-Bar Course',
        'programmes.law-practice-training' => 'Programmes – Law Practice Training',
        'programmes.post-call-law-course' => 'Programmes – Post-Call Law Course',
        'examinations' => 'Examinations',
        'academic-calendar' => 'Academic Calendar',
        'admissions' => 'Admissions',
        'admissions.instructions' => 'Admissions – Instructions',
        'notices' => 'Notices',
        'student-life' => 'Student Life',
        'events' => 'Events',
        'news' => 'News',
        'alumni' => 'Alumni',
        'contact' => 'Contact',
    ];
}
