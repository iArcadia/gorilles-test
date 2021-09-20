<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Jackie Chan will go to the event #1.
        User::find(1)->events()->attach(1, ['created_at' => '2021-09-10T00:00:00']);
        
        // Bob Sleig will go to the events #1 and #2.
        User::find(2)->events()->attach(1, ['created_at' => '2021-08-01T00:00:00']);
        User::find(2)->events()->attach(2, ['created_at' => '2021-09-09T00:00:00']);
        
        // Jean Bon will go to the events #1 and #2.
        User::find(3)->events()->attach(1, ['created_at' => '2021-08-01T00:00:00']);
        User::find(3)->events()->attach(2, ['created_at' => '2021-09-08T00:00:00']);
    }
}
