<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Chan',
                'first_name' => 'Jackie',
                'birthday' => '1957-04-07',
                'email' => 'j.chan@watch.com'
            ],
            [
                'name' => 'Sleig',
                'first_name' => 'Bob',
                'birthday' => '1985-06-23',
                'email' => 'b.sleig@youhou.com'
            ],
            [
                'name' => 'Bon',
                'first_name' => 'Jean',
                'birthday' => '1981-01-01',
                'email' => 'j.bon@blanc.com'
            ]
        ];
        
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
