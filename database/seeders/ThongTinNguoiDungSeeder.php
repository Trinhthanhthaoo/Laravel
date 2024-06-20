<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThongTinNguoiDungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ThongTinNguoiDung')->insert([
            [
               'IDNguoiDung' => 1,
                'HoVaTen' => 'Trịnh Thị Thanh Thảo',
                'DanhXung' => 'Ms.',
                'CongViec' => 'Developer',
                'CongTy' => 'ABC Corp',
                'SoDienThoai' => '0123456789',
                'LinkFacebook' => 'https://www.facebook.com/trinhthi.thao.104?locale=vi_VN',
                'SoDienThoaiZalo' => '0123456789',
                'DiaChi' => '123 Le Loi, DaNang',
                'LinkLinkedIn' => 'https://linkedin.com/in/trinhthanhthao',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IDNguoiDung' => 2,
                'HoVaTen' => 'Nguyễn Quang Kính',
                'DanhXung' => 'Mr.',
                'CongViec' => 'Designer',
                'CongTy' => 'XYZ Ltd',
                'SoDienThoai' => '0987654321',
                'LinkFacebook' => 'https://www.facebook.com/profile.php?id=100030574112697&locale=vi_VN',
                'SoDienThoaiZalo' => '0987654321',
                'DiaChi' => '456 Tran Hung Dao, DangNang',
                'LinkLinkedIn' => 'https://linkedin.com/in/nguyenquangkinh',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
