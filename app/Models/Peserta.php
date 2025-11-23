<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'email', 'telepon'];

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'peserta_kelas')
            ->withPivot('tanggal_daftar')
            ->withTimestamps();
    }
}
