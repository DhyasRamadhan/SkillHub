<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kelas', 'pengajar', 'deskripsi', 'durasi'];

    public function peserta()
    {
        return $this->belongsToMany(Peserta::class, 'peserta_kelas')
            ->withPivot('tanggal_daftar')
            ->withTimestamps();
    }
}
