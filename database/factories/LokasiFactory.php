<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Lokasi;

class LokasiFactory extends Factory
{
    protected $model = Lokasi::class;

    public function definition()
    {
        return [
            'lokasi' => $this->faker->city,
        ];
    }
}