<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaiLieuCongDongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert sample data into TaiLieuCongDong table
        DB::table('TaiLieuCongDong')->insert([
            [
                'IDMentor' => 1,
                'IDMentee' => null,
                'TieuDe' => 'Hướng dẫn lập trình java cơ bản',
                'NoiDung' => 'Đây là nội dung hướng dẫn lập trình java cơ bản...',
                'TrangThai' => 'approved',
                'NgayTao' => now(),
            ],
            [
                'IDMentor' => null,
                'IDMentee' => 1,
                'TieuDe' => 'Hướng dẫn sử dụng Laravel',
                'NoiDung' => 'Nội dung hướng dẫn sử dụng Laravel để xây dựng ứng dụng web...',
                'TrangThai' => 'pending',
                'NgayTao' => now(),
            ],
           
        ]);
    }
}
