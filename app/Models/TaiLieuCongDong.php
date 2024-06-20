<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiLieuCongDong extends Model
{
    use HasFactory;

    protected $table = 'tai_lieu_cong_dong';

    protected $fillable = [
        'IDMentor',
        'IDMentee',
        'TieuDe',
        'NoiDung',
        'TrangThai',
    ];

    protected $casts = [
        'NgayTao' => 'datetime',
    ];

    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'IDMentor');
    }

    public function mentee()
    {
        return $this->belongsTo(Mentee::class, 'IDMentee');
    }
}
