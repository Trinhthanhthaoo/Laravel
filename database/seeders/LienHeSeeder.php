<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LienHeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        DB::table('LienHe')->insert([
            [
                'TenDangNhap' => 'admin',
                'Email' => 'admin@example.com',
                'NoiDung' => 'Xin chào bạn, cảm ơn bạn đã quan tâm đến VKUMentor.',
                'NgayTao' => now(),
            ],
            [
                'TenDangNhap' => 'user1',
                'Email' => 'user1@example.com',
                'NoiDung' => 'Tôi muốn tham gia trở thành một mentor cho VKU.',
                'NgayTao' => now(),
            ],
           
        ]);
    }
}
