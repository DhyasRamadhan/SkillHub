<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Peserta;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PesertaControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_dapat_menambah_peserta()
    {
        $response = $this->post('/peserta', [
            'nama' => 'John Doe',
            'email' => 'john@example.com',
            'telepon' => '08122334455',
            'alamat' => 'Jakarta'
        ]);

        $response->assertRedirect('/peserta');
        $this->assertDatabaseHas('pesertas', [
            'nama' => 'John Doe'
        ]);
    }
}
