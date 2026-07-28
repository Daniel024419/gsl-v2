<?php

namespace Database\Seeders;

use App\Models\NavItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NavItem::query()->delete();

        $order = 0;
        $make = function (array $attributes, ?NavItem $parent = null) use (&$order) {
            return NavItem::create(array_merge([
                'parent_id' => $parent?->id,
                'order' => $order++,
                'link_type' => null,
                'route_name' => null,
                'page_id' => null,
                'url' => null,
                'target' => '_self',
                'is_active' => true,
            ], $attributes));
        };

        $make([
            'label' => 'Home',
            'desc' => 'Welcome & overview',
            'link_type' => 'route',
            'route_name' => 'home',
        ]);

        $about = $make(['label' => 'About']);
        $make(['label' => 'GSL & CLET', 'desc' => 'About the Ghana School of Law and CLET', 'link_type' => 'route', 'route_name' => 'about.gsl-clet'], $about);
        $make(['label' => 'Overview', 'desc' => 'Institutional overview', 'link_type' => 'route', 'route_name' => 'about.overview'], $about);
        $make(['label' => 'History', 'desc' => 'History of the Ghana School of Law', 'link_type' => 'route', 'route_name' => 'about.history'], $about);
        $make(['label' => 'Management', 'desc' => 'Leadership and management team', 'link_type' => 'route', 'route_name' => 'about.management'], $about);

        $programmes = $make([
            'label' => 'Programmes',
            'desc' => 'All GSL programmes at a glance',
            'link_type' => 'route',
            'route_name' => 'programmes',
        ]);
        $make(['label' => 'Pre-Bar Course', 'desc' => 'Transitional preparatory course for LLB graduates', 'link_type' => 'route', 'route_name' => 'programmes.pre-bar-course'], $programmes);
        $make(['label' => 'Law Practice Training (LPT)', 'desc' => 'The 1-year professional training programme', 'link_type' => 'route', 'route_name' => 'programmes.law-practice-training'], $programmes);
        $make(['label' => 'Post-Call Law Course', 'desc' => 'For lawyers called to the Bar in other Common Law jurisdictions', 'link_type' => 'route', 'route_name' => 'programmes.post-call-law-course'], $programmes);

        $academics = $make(['label' => 'Academics', 'desc' => 'Examinations, calendar, and legal research resources']);
        $make(['label' => 'Examinations', 'desc' => 'Entrance and Bar Examination information', 'link_type' => 'route', 'route_name' => 'examinations'], $academics);
        $make(['label' => 'Academic Calendar', 'desc' => 'Key dates for the 2026/2027 academic year', 'link_type' => 'route', 'route_name' => 'academic-calendar'], $academics);
        $make(['label' => 'Notices', 'desc' => 'Official notices and announcements', 'link_type' => 'route', 'route_name' => 'notices'], $academics);
        $make(['label' => 'GSL Wikipedia', 'desc' => 'Ghana School of Law on Wikipedia', 'link_type' => 'url', 'url' => 'https://en.wikipedia.org/wiki/Ghana_School_of_Law', 'target' => '_blank'], $academics);

        $library = $make(['label' => 'Library & Books', 'desc' => 'Legal research and library resources'], $academics);
        $make(['label' => 'GSL Library', 'desc' => 'Ghana School of Law library catalogue', 'link_type' => 'url', 'url' => 'https://library.gslaw.school/', 'target' => '_blank'], $library);
        $make(['label' => 'Judy Legal', 'desc' => 'Legal research platform', 'link_type' => 'url', 'url' => 'https://app.judy.legal/account/login', 'target' => '_blank'], $library);
        $make(['label' => 'Dennis Law', 'desc' => 'Legal research platform', 'link_type' => 'url', 'url' => 'https://app.dennislawgh.com/login', 'target' => '_blank'], $library);

        $admissions = $make(['label' => 'Admissions', 'desc' => 'Entry requirements and how to apply']);
        $make(['label' => 'Buy Admission Voucher', 'desc' => 'Online application code', 'link_type' => 'route', 'route_name' => 'admissions.instructions'], $admissions);
        $make(['label' => 'Applicant Portal', 'desc' => 'Submit and track your application', 'link_type' => 'url', 'url' => 'https://sms.gslaw.school/applicant', 'target' => '_blank'], $admissions);
        $make(['label' => 'Entry Requirements', 'desc' => 'Admission entry requirements', 'link_type' => 'route', 'route_name' => 'admissions'], $admissions);

        $make(['label' => 'Student Life', 'desc' => 'Campus life, community, and student experience', 'link_type' => 'route', 'route_name' => 'student-life']);
        $make(['label' => 'Events', 'desc' => 'Upcoming GSL events and ceremonies', 'link_type' => 'route', 'route_name' => 'events']);
        $make(['label' => 'News', 'desc' => 'Latest institutional news and updates', 'link_type' => 'route', 'route_name' => 'news']);
        $make(['label' => 'Alumni', 'desc' => 'GSL alumni network and community', 'link_type' => 'route', 'route_name' => 'alumni']);
        $make(['label' => 'Contact', 'desc' => 'Get in touch with GSL', 'link_type' => 'route', 'route_name' => 'contact']);
    }
}
