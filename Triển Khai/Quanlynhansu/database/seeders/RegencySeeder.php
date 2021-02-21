<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegencySeeder extends Seeder
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
            [ 'name' => 'Admin',
                'parent_id' => 0,
                'basic_money' => 200000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [   'name' => 'Manage',
                'parent_id' => 0,
                'basic_money' => 100000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [   'name' => 'Staff',
                'parent_id' => 0,
                'basic_money' => 50000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        DB::table('regencies')->insert($data);
    }
}
