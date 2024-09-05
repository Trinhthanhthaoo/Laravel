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
                'IDMentor' => 1,
                'IDMentee' => null,
                'TieuDe' => 'Hướng dẫn lập trình C# cơ bản',
                'NoiDung' => 'Đây là nội dung hướng dẫn lập trình C# cơ bản...',
                'TrangThai' => 'approved',
                'NgayTao' => now(),
            ],
            [
                'IDMentor' => 1,
                'IDMentee' => null,
                'TieuDe' => 'Hướng dẫn sử dụng Laravel',
                'NoiDung' => 'Nội dung hướng dẫn sử dụng Laravel để xây dựng ứng dụng web...',
                'TrangThai' => 'pending',
                'NgayTao' => now(),
            ],
            [
                'IDMentor' => 2,
                'IDMentee' => null,
                'TieuDe' => 'Hướng dẫn lập trình Python nâng cao',
                'NoiDung' => 'Đây là nội dung hướng dẫn lập trình Python nâng cao...',
                'TrangThai' => 'approved',
                'NgayTao' => now(),
            ],
            [
                'IDMentor' => 2,
                'IDMentee' => null,
                'TieuDe' => 'Hướng dẫn sử dụng Vue.js',
                'NoiDung' => 'Nội dung hướng dẫn sử dụng Vue.js để xây dựng giao diện người dùng...',
                'TrangThai' => 'pending',
                'NgayTao' => now(),
            ],
            [
                'IDMentor' => 1,
                'IDMentee' => null,
                'TieuDe' => 'Hướng dẫn lập trình PHP',
                'NoiDung' => 'Đây là nội dung hướng dẫn lập trình PHP từ cơ bản đến nâng cao...',
                'TrangThai' => 'approved',
                'NgayTao' => now(),
            ],
            [
                'IDMentor' => 2,
                'IDMentee' => null,
                'TieuDe' => 'Khởi nghiệp và đổi mới sáng tạo',
                'NoiDung' => 'Cung cấp các kiến thức nền tảng về đổi mới sáng tạo, nh thần khởi nghiệp, khởi nghiệp, khởi sự kinh doanh, từ đó nâng cao nhận thức của sinh viên và hình thành ...',
                'TrangThai' => 'approved',
                'NgayTao' => now(),
            ],
            [
                'IDMentor' => 2,
                'IDMentee' => null,
                'TieuDe' => 'Thủ thuật marketing',
                'NoiDung' => '10 CÁCH LÀM MARKETING HIỆU QUẢ GIÚP TỐI ƯU CHI PHÍ CHO DOANH NGHIỆP...',
                'TrangThai' => 'approved',
                'NgayTao' => now(),
            ],
            [
                'IDMentor' => 2,
                'IDMentee' => null,
                'TieuDe' => 'Hướng dẫn lập trình JavaScript',
                'NoiDung' => 'Nội dung hướng dẫn lập trình JavaScript để phát triển web...',
                'TrangThai' => 'pending',
                'NgayTao' => now(),
            ],
            [
                'IDMentor' => 2,
                'IDMentee' => null,
                'TieuDe' => 'Hướng dẫn lập trình HTML/CSS',
                'NoiDung' => 'Nội dung hướng dẫn lập trình JavaScript để phát triển web...',
                'TrangThai' => 'pending',
                'NgayTao' => now(),
            ],
            [
                'IDMentor' => 2,
                'IDMentee' => null,
                'TieuDe' => 'Làm quen với tailwindcss ',
                'NoiDung' => 'Nội dung hướng dẫn lập trình css với tailwindcss',
                'TrangThai' => 'pending',
                'NgayTao' => now(),
            ],
            [
                'IDMentor' => 2,
                'IDMentee' => null,
                'TieuDe' => 'Hướng dẫn lập trình bootstrap',
                'NoiDung' => 'Nội dung hướng dẫn lập trình css với bootstrap để phát triển web...',
                'TrangThai' => 'pending',
                'NgayTao' => now(),
            ],
            [
                'IDMentor' => 1,
                'IDMentee' => null,
                'TieuDe' => 'Hướng dẫn phát triển ứng dụng di động với Flutter',
                'NoiDung' => 'Nội dung hướng dẫn phát triển ứng dụng di động với Flutter...',
                'TrangThai' => 'approved',
                'NgayTao' => now(),
            ],
            [
                'IDMentor' => 2,
                'IDMentee' => null,
                'TieuDe' => 'Hướng dẫn lập trình C++',
                'NoiDung' => 'Nội dung hướng dẫn lập trình C++ cho người mới bắt đầu...',
                'TrangThai' => 'pending',
                'NgayTao' => now(),
            ],
            [
                'IDMentor' => 1,
                'IDMentee' => null,
                'TieuDe' => 'Hướng dẫn sử dụng Docker cho phát triển phần mềm',
                'NoiDung' => 'Nội dung hướng dẫn sử dụng Docker để containerize ứng dụng...',
                'TrangThai' => 'approved',
                'NgayTao' => now(),
            ],
            [
                'IDMentor' => 1,
                'IDMentee' => null,
                'TieuDe' => 'Hướng dẫn lập trình Go (Golang)',
                'NoiDung' => 'Nội dung hướng dẫn lập trình Go từ cơ bản đến nâng cao...',
                'TrangThai' => 'pending',
                'NgayTao' => now(),
            ],
            
        ]);
    }
}
