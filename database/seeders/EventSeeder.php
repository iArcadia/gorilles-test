<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'title' => 'Conférence sur le froid',
                'start_at' => '2022-01-23',
                'maximum_places' => 150
            ],
            [
                'title' => 'Loto',
                'start_at' => '2022-01-01',
                'maximum_places' => 70
            ]
        ];
        
        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
