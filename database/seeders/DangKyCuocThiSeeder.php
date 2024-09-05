<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DangKyCuocThiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert sample data into DangKyCuocThi table
        DB::table('DangKyCuocThi')->insert([
            [
                'IDCuocThi' => 1,
                'IDMentee' => 1,
                'IDNguoiDung' => 3,
                'NgayDangKy' => now(),
            ],
            [
                'IDCuocThi' => 2,
                'IDMentee' => 2,
                'IDNguoiDung' => 4,
                'NgayDangKy' => now(),
            ],
           
        ]);
    }
}
