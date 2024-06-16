<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('NguoiDung')->insertOrIgnore([
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
            [
                'TenDangNhap' => 'user3',
                'MatKhau' => Hash::make('password3'),
                'Email' => 'user3@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'TenDangNhap' => 'user4',
                'MatKhau' => Hash::make('password4'),
                'Email' => 'user4@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        echo "Seeder run successfully!";
    }
}
