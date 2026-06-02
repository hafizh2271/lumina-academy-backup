<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    /**
     * Kolom yang boleh diisi secara massal.
     * Ini buat nyembuhin error MassAssignmentException tadi.
     */
    protected $fillable = [
        'title',
        'subject',
        'file_path',
        'user_id',
    ];

    /**
     * Relasi: Satu materi dimiliki oleh satu Guru (User).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}