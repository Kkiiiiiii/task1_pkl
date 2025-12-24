<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Educate extends Model
{
    //
    protected $fillable = [
        'jenjang_pendidikan',
        'nama_sekolah',
        'tahun_masuk',
        'tahun_lulus',
        'pilihan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
