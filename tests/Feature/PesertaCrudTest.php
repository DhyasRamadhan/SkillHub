<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Peserta;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class PesertaCrudTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function user_can_create_peserta()
    {
        $data = [
            'nama' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'telepon' => '08123456789',
        ];

        $response = $this->post('/peserta', $data);

        $response->assertStatus(302);
        $this->assertDatabaseHas('pesertas', $data);
    }

    #[Test]
    public function user_can_read_peserta_list()
    {
        Peserta::factory()->count(3)->create();

        $response = $this->get('/peserta');

        $response->assertStatus(200)
            ->assertSeeText('Daftar Peserta');
    }

    #[Test]
    public function user_can_update_peserta()
    {
        $peserta = Peserta::factory()->create();

        $response = $this->put("/peserta/{$peserta->id}", [
            'nama' => 'Update Nama',
            'email' => $peserta->email,
            'telepon' => $peserta->telepon,
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('pesertas', ['nama' => 'Update Nama']);
    }

    #[Test]
    public function user_can_delete_peserta()
    {
        $peserta = Peserta::factory()->create();

        $response = $this->delete("/peserta/{$peserta->id}");

        $response->assertStatus(302);
        $this->assertDatabaseMissing('pesertas', ['id' => $peserta->id]);
    }
}
