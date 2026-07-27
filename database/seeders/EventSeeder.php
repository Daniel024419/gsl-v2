<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (config('events.events') as $event) {
            Event::updateOrCreate(
                ['slug' => $event['slug']],
                [
                    'title' => $event['title'],
                    'desc' => $event['desc'],
                    'body' => $event['body'],
                    'location' => $event['location'],
                    'image' => $event['image'],
                    'date' => $event['date'],
                    'start_time' => $event['start_time'],
                    'end_time' => $event['end_time'],
                ]
            );
        }
    }
}
