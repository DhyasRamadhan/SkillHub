<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peserta;
use App\Models\Kelas;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $pesertas = Peserta::factory(10)->create();
        $kelas = Kelas::factory(5)->create();

        foreach ($pesertas as $peserta) {
            $peserta->kelas()->attach(
                $kelas->random(rand(1, 3))->pluck('id')->toArray(),
                ['tanggal_daftar' => now()]
            );
        }
    }
}
