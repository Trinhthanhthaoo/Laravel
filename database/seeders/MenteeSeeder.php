<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenteeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mentee')->insert([
            [
                'IDNguoiDung' => 3,
                'IDMentor' => 1,
                'DiemGPA' => 2.9,
                'NoiDung' => 'Tôi muốn học lập trình java.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IDNguoiDung' => 4,
                'IDMentor' => 2,
                'DiemGPA' => 3.0,
                'NoiDung' => 'Tôi cần tư vấn về thiết kế website.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);
    }
}
