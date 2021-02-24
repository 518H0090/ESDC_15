<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'email' => 'nhoxhieuro5@gmail.com',
                'password' => bcrypt('123456'),
                'role_id' => 1,
            ],
            [
                'email' => 'nhoxhieuro6@gmail.com',
                'password' => bcrypt('123456'),
                'role_id' => 2,
            ],
            [
                'email' => 'nhoxhieuro7@gmail.com',
                'password' => bcrypt('123456'),
                'role_id' => 3,
            ],
        ];
        DB::table('users')->insert($data);
    }
}
