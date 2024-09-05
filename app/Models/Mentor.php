<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;
    protected $table = 'mentor';
    protected $fillable = [
        'id', 
        'IDNguoiDung', 
        'ChuyenMon',
        'ToChuc',
        'BietVkuMentorQua',
        'CauHoiGopY',
        'ThanhTuu',
        'Khoa',
        'Nganh',
        'Mon',
    ];

}
