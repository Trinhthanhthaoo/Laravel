<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Mentor')->insert([
            [
                'IDNguoiDung' => 1,
                'ChuyenMon' => 'Công nghệ thông tin',
                'ToChuc' => 'ABC Corp',
                'BietVkuMentorQua' => 'Facebook',
                'CauHoiGopY' => 'Làm thế nào để cải thiện kỹ năng lập trình?',
                'ThanhTuu' => 'Giải thưởng lập trình quốc gia',
                'Khoa' => 'CNTT',
                'Nganh' => 'Khoa học máy tính',
                'Mon' => 'Lập trình java',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IDNguoiDung' => 2,
                'ChuyenMon' => 'Thiết kế website',
                'ToChuc' => 'XYZ Ltd',
                'BietVkuMentorQua' => 'LinkedIn',
                'CauHoiGopY' => 'Làm thế nào để sáng tạo trong thiết kế?',
                'ThanhTuu' => 'Giải thưởng thiết kế quốc tế',
                'Khoa' => 'Khoa khoa học máy tính',
                'Nganh' => 'Công nghệ thông tin',
                'Mon' => 'Thiết kế website',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
