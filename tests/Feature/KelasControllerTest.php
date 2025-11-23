<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Kelas;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KelasControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_dapat_menambah_kelas()
    {
        $response = $this->post('/kelas', [
            'nama_kelas' => 'Laravel Basic',
            'deskripsi' => 'Belajar Laravel',
            'pengajar' => 'Budi Santoso',
            'durasi' => '4 Minggu'
        ]);

        $response->assertRedirect('/kelas');

        $this->assertDatabaseHas('kelas', [
            'nama_kelas' => 'Laravel Basic',
            'pengajar' => 'Budi Santoso'
        ]);
    }
}
