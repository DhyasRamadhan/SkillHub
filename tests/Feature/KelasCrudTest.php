<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Kelas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class KelasCrudTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function user_can_create_kelas()
    {
        $data = [
            'nama_kelas' => 'Laravel Dasar',
            'pengajar' => 'Andi Wijaya',
            'durasi' => '30 Hari',
            'deskripsi' => 'Belajar Laravel untuk pemula.'
        ];

        $response = $this->post('/kelas', $data);

        $response->assertStatus(302);
        $this->assertDatabaseHas('kelas', $data);
    }

    #[Test]
    public function user_can_read_kelas_list()
    {
        Kelas::factory()->count(5)->create();

        $response = $this->get('/kelas');

        $response->assertStatus(200)
            ->assertSeeText('Daftar Kelas');
    }

    #[Test]
    public function user_can_update_kelas()
    {
        $kelas = Kelas::factory()->create();

        $response = $this->put("/kelas/{$kelas->id}", [
            'nama_kelas' => 'Updated Kelas',
            'pengajar' => $kelas->pengajar,
            'durasi' => $kelas->durasi,
            'deskripsi' => $kelas->deskripsi,
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('kelas', ['nama_kelas' => 'Updated Kelas']);
    }

    #[Test]
    public function user_can_delete_kelas()
    {
        $kelas = Kelas::factory()->create();

        $response = $this->delete("/kelas/{$kelas->id}");

        $response->assertStatus(302);
        $this->assertDatabaseMissing('kelas', ['id' => $kelas->id]);
    }
}
