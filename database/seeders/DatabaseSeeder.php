<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\EventSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ReservationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        (new EventSeeder)->run();
        (new UserSeeder)->run();
        (new ReservationSeeder)->run();
    }
}
