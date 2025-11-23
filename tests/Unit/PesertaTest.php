<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Peserta;
use App\Models\Kelas;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PesertaTest extends TestCase
{
    use RefreshDatabase;

    public function test_peserta_memiliki_banyak_kelas()
    {
        $peserta = Peserta::factory()->create();
        $kelas = Kelas::factory()->count(3)->create();

        $peserta->kelas()->attach($kelas->pluck('id'));

        $this->assertCount(3, $peserta->kelas);
    }
}
