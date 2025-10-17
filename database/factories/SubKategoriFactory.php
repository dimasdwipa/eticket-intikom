<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SubKategori;
use App\Models\Kategori;

class SubKategoriFactory extends Factory
{
    protected $model = SubKategori::class;

    public function definition()
    {
        return [
            'sub_katagori' => $this->faker->sentence(3), // Contoh: "Permintaan instalasi software baru"
            // 'kategori_id' akan kita isi di seeder
        ];
    }
}