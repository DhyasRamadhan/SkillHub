<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Kelas;
use App\Models\Peserta;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KelasTest extends TestCase
{
    use RefreshDatabase;

    public function test_kelas_memiliki_banyak_peserta()
    {
        $kelas = Kelas::factory()->create();
        $peserta = Peserta::factory()->count(5)->create();

        $kelas->peserta()->attach($peserta->pluck('id'));

        $this->assertCount(5, $kelas->peserta);
    }
}
