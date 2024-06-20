<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhSachMentorMentee extends Model
{
    use HasFactory;
    // Table name
    protected $table = 'DanhSachMentorMentee';

    // Primary Key
    protected $primaryKey = 'id';
    protected $fillable = [
        'IDMentee',
        'IDMentor'
    ];
    public function mentee()
    {
        return $this->belongsTo(Mentee::class, 'IDMentee');
    }

    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'IDMentor');
    }
}
