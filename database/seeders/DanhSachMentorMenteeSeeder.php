<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhSachMentorMenteeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('DanhSachMentorMentee')->insert([
            [
                'IDMentee' => 1,
                'IDMentor' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IDMentee' => 2,
                'IDMentor' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);
    }
}
