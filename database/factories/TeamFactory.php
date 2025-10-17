<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Team;
use Illuminate\Support\Str; // <-- TAMBAHKAN BARIS INI

class TeamFactory extends Factory
{
    protected $model = Team::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company() . ' Team',
            'code' => strtoupper(Str::random(3)),
            // owner_id akan kita isi nanti di seeder
        ];
    }
}