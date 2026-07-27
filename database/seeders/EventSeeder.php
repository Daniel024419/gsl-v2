<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'slug' => 'induction-ceremony-2027',
                'title' => 'Induction Ceremony',
                'desc' => 'New student induction for the 2026/2027 academic year across all GSL campuses.',
                'body' => [
                    'New students joining the Ghana School of Law for the 2026/2027 academic year will be formally welcomed at the Induction Ceremony, held simultaneously across the Accra, Kumasi, and Greenhill Legon campuses.',
                    'The ceremony introduces students to the academic structure of their programme, campus facilities, student support services, and the standards of conduct expected of members of the legal profession.',
                    'Attendance is mandatory for all newly admitted students. Further logistical details will be communicated to admitted applicants ahead of the date.',
                ],
                'location' => 'All Campuses',
                'image' => '/files/assets/images/homepage/induction.png',
                'date' => '2027-01-14',
                'start_time' => '10:00',
                'end_time' => '12:00',
            ],
            [
                'slug' => 'orientation-kumasi-2026',
                'title' => 'Orientation – Kumasi',
                'desc' => 'Orientation for new students joining the Kumasi campus cohort.',
                'body' => [
                    'New students joining the Kumasi campus, based at the Kwame Nkrumah University of Science and Technology (KNUST), will take part in an orientation session ahead of the start of lectures.',
                    'The session covers the academic calendar, campus facilities, library access, and introductions to faculty and student support staff at the Kumasi campus.',
                ],
                'location' => 'Kumasi Campus',
                'image' => '/files/assets/images/news/orientation.png',
                'date' => '2026-11-07',
                'start_time' => '10:00',
                'end_time' => '12:00',
            ],
            [
                'slug' => 'call-to-the-bar-2026',
                'title' => 'Call to the Bar 2026',
                'desc' => 'Annual ceremony calling qualified lawyers to the Ghana Bar.',
                'body' => [
                    'The annual Call to the Bar ceremony formally admits qualified candidates who have completed the Law Practice Training Course to the Ghana Bar, presided over by the General Legal Council.',
                    'The ceremony is attended by members of the judiciary, the Ghana Bar Association, and the families of the newly admitted lawyers, marking the culmination of years of legal education and professional training.',
                ],
                'location' => 'Accra',
                'image' => '/files/assets/images/news/call_to_bar.png',
                'date' => '2026-11-10',
                'start_time' => '10:00',
                'end_time' => '12:00',
            ],
            [
                'slug' => 'pre-bar-course-commences-2026',
                'title' => 'Pre-Bar Course Commences',
                'desc' => 'The official start of the 2026/2027 Pre-Bar Course academic year.',
                'body' => [
                    'Lectures begin for the 2026/2027 Pre-Bar Course intake, open to LLB graduates (Class of 2026), existing graduates, Ghanaians with an LLB from common law jurisdictions, and graduates of GTEC/GLC-accredited law faculties.',
                    'Students should ensure all registration and enrolment requirements are completed ahead of the start date. Enquiries can be directed to the Admissions Office.',
                ],
                'location' => 'All Campuses',
                'image' => '/files/assets/professional_course.png',
                'date' => '2026-09-01',
                'start_time' => '08:00',
                'end_time' => '17:00',
            ],
            [
                'slug' => 'entrance-examination-2026',
                'title' => 'Entrance Examination',
                'desc' => 'Entrance examination for shortlisted LPTC 2026/2027 applicants.',
                'body' => [
                    'Shortlisted applicants for the 2026/2027 Law Practice Training Course (LPTC) will sit the entrance examination at the Accra campus.',
                    'Candidates should arrive early with valid identification and their examination admission notice. Full guidance on examination requirements is issued directly to shortlisted candidates.',
                ],
                'location' => 'Accra',
                'image' => '/files/assets/images/examinationsHero.avif',
                'date' => '2026-08-15',
                'start_time' => '09:00',
                'end_time' => '13:00',
            ],
            [
                'slug' => 'application-deadline-2026',
                'title' => 'Application Deadline',
                'desc' => 'Deadline for all 2026/2027 programme applications.',
                'body' => [
                    'All applications for GSL\'s 2026/2027 programmes - including the Pre-Bar Course, Law Practice Training Course, and Post-Call Law Course - close at 23:59 on this date.',
                    'Applicants are encouraged to submit their applications and supporting documents well ahead of the deadline via the online applicant portal to avoid last-minute technical issues.',
                ],
                'location' => 'Online Portal',
                'image' => '/files/assets/images/apply-online-hero.png',
                'date' => '2026-07-31',
                'start_time' => '23:59',
                'end_time' => '23:59',
            ],
        ];

        foreach ($events as $event) {
            Event::updateOrCreate(
                ['slug' => $event['slug']],
                $event
            );
        }
    }
}