<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CuocThiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('CuocThi')->insert([
            [
                'IDMentor' => 1,
                'TieuDe' => 'Đồ án đẹp nhất',
                'MoTa' => 'Cuộc thi dành cho những người yêu thích lập trình web để thể hiện khả năng và tài năng của mình.',
                'NgayBatDau' => '2024-07-01',
                'NgayKetThuc' => '2024-07-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IDMentor' => 2,
                'TieuDe' => 'Best web design',
                'MoTa' => 'Thách thức cho các bạn thiết kế đồ họa trẻ trung và sáng tạo.',
                'NgayBatDau' => '2024-08-01',
                'NgayKetThuc' => '2024-08-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);
    }
}
