<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BinhLuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        DB::table('BinhLuan')->insert([
            [
                'IDTaiLieu' => 73,
                'IDNguoiDung' => 1,
                'NoiDung' => 'Bài viết rất hữu ích, cảm ơn bạn đã chia sẻ!',
                'NgayTao' => now(),
            ],
            [
                'IDTaiLieu' => 74,
                'IDNguoiDung' => 2,
                'NoiDung' => 'Mình có một câu hỏi về nội dung này, bạn có thể giải đáp giúp mình không?',
                'NgayTao' => now(),
            ],
               ]);
    }
}
