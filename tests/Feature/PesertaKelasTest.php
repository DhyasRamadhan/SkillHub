<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Peserta;
use App\Models\Kelas;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PesertaKelasTest extends TestCase
{
    use RefreshDatabase;

    public function test_peserta_dapat_mendaftar_ke_kelas()
    {
        $peserta = Peserta::factory()->create();
        $kelas = Kelas::factory()->create();

        $response = $this->post("/peserta/{$peserta->id}/daftar-kelas", [
            'kelas_ids' => [$kelas->id],
        ]);

        $response->assertRedirect(route('peserta.show', $peserta->id));

        $this->assertDatabaseHas('peserta_kelas', [
            'peserta_id' => $peserta->id,
            'kelas_id' => $kelas->id,
        ]);
    }
}
