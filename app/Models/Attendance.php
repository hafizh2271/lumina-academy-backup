<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'user_id',
        'teacher_id',
        'status',
    ];

    // Relasi ke User (Siswa)
    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
