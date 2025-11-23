<?php

namespace Database\Factories;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;

class KelasFactory extends Factory
{
    protected $model = Kelas::class;

    public function definition()
    {
        return [
            'nama_kelas' => ucfirst($this->faker->words(2, true)),
            'pengajar' => $this->faker->name(),
            'deskripsi' => $this->faker->sentence(8),
            'durasi' => $this->faker->randomElement(['1 bulan', '2 bulan', '3 bulan']),
        ];
    }
}
