<?php

namespace Database\Seeders;

use App\Models\OverviewMessage;
use App\Models\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OverviewMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            [
                'slug' => 'director',
                'heading' => 'Welcome from the Director',
                'name' => 'Prof. Raymond Akongburo Atuguba',
                'image' => '/files/assets/images/management/director.png',
                'signature_title' => 'Ag. Director, Ghana School of Law',
                'body' => [
                    'It is a privilege to welcome you to the Ghana School of Law.',
                    "For over six decades, this institution has been the crucible through which many of Ghana's finest legal minds have passed, judges, advocates, public servants, scholars, and leaders across every sphere of national life. You now join that distinguished tradition.",
                    'The study of law is not merely an academic pursuit. It is a calling to serve, to protect justice, strengthen institutions, and contribute meaningfully to our nation\'s development. We therefore expect you to approach your training with discipline, humility, and a deep sense of responsibility.',
                    'At GSL, you will encounter rigorous teaching, practical training, and a community that is committed to excellence and ethical leadership. Engage fully. Read widely. Ask questions. Develop not only your intellect, but your character, your sense of duty, and your commitment to the rule of law.',
                    'As we continue to modernize legal education, strengthening digital systems, expanding student services, and reinforcing institutional standards, we ask for your partnership. Together, we are building a School that reflects the aspirations of Ghana and the demands of a rapidly evolving world.',
                    'I wish you a purposeful and enriching journey here. May your time at the Ghana School of Law prepare you not only to practice law, but to help shape the future of our nation.',
                ],
            ],
            [
                'slug' => 'registrar',
                'heading' => 'Message from the Registrar',
                'name' => 'Mrs. Julliet Adu-Adjei',
                'image' => '/files/assets/images/management/image 42.png',
                'signature_title' => 'Registrar, Ghana School of Law',
                'body' => [
                    'Welcome to the Ghana School of Law.',
                    'As Registrar, it is my duty and privilege to support your academic journey, ensure the smooth administration of all programmes, and uphold the standards that define this great institution. Whether you are joining us for the first time or continuing your studies, you are now part of a community built on discipline, integrity, and excellence.',
                    'The path you have chosen is demanding. Legal education requires rigour, not only in study, but in conduct, attitude, and respect for institutional systems. We encourage you to embrace the structures that guide your training, to engage actively with faculty and colleagues, and to approach every aspect of your work with professionalism.',
                    'Our administrative and support teams are here to assist you. From admissions and records, to academic scheduling, student services, IT support, and campus operations, we are committed to helping create an environment that enables learning, growth, and success. If you need guidance, request it early. If you face challenges, communicate with us. Partnership and accountability are the hallmarks of excellence.',
                    "This period also represents an important moment in the School's evolution, strengthening academic delivery, streamlining processes, digitising key systems, and enhancing the student experience. We ask for your cooperation as we implement reforms designed to create a modern, efficient, and secure learning ecosystem.",
                    'We are confident that with commitment, discipline, and respect for the profession you aspire to join, your time here will be rewarding and transformative.',
                    'We wish you the very best in your studies and in your service to the law and our nation.',
                ],
            ],
        ];

        foreach ($messages as $order => $message) {
            $person = Person::firstOrCreate(['name' => $message['name']], ['image' => $message['image']]);

            OverviewMessage::updateOrCreate(
                ['slug' => $message['slug']],
                [
                    'person_id' => $person->id,
                    'heading' => $message['heading'],
                    'signature_title' => $message['signature_title'],
                    'body' => $message['body'],
                    'order' => $order + 1,
                ]
            );
        }
    }
}
