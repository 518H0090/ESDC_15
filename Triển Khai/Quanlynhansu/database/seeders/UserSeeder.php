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
                'regency_id' => 1,
            ],
            [
                'email' => 'nhoxhieuro6@gmail.com',
                'password' => bcrypt('123456'),
                'regency_id' => 2,
            ],
        ];
        DB::table('users')->insert($data);
    }
}
