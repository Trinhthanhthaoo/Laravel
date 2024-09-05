<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentee extends Model
{
    use HasFactory;

    protected $table = 'mentee';

    protected $fillable = [
        'IDNguoiDung',
        'IDMentor',
        'DiemGPA',
        'NoiDung'
    ];

    public function nguoiDung()
    {
        return $this->belongsTo(NguoiDung::class, 'IDNguoiDung');
    }

    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'IDMentor');
    }
}
