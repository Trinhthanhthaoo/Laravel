<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;   // Thêm dòng này
use Illuminate\Support\Facades\Hash; // Thêm dòng này
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('NguoiDung')->insert([
            [
                'TenDangNhap' => 'thanhthao',
                'MatKhau' => Hash::make('password'),
                'Email' => 'thanhthaooiii3@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'TenDangNhap' => 'user01',
                'MatKhau' => Hash::make('1234'),
                'Email' => 'user1@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Thêm nhiều người dùng khác nếu cần
        ]);
        echo "Seeder run successfully!";
    }
}
