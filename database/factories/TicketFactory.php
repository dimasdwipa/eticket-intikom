<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ticket;
use Illuminate\Support\Str; // Tambahkan ini untuk membuat 'code'

class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    public function definition()
    {
        $statusOptions = ['open', 'pending', 'on progress', 'closed', 'complain'];
        $priorityOptions = ['low', 'medium', 'high', 'critical', 'normal']; // Sesuaikan dengan database

        return [
            // Kolom relasi akan diisi oleh Seeder
            // 'user_id', 'agent_id', 'supervisor_id', 'team_id', dll.

            'code' => 'TIX-' . now()->format('Ymd') . '-' . Str::random(6),
            'tanggal' => $this->faker->date(),
            'problem' => $this->faker->sentence(6), // Ganti 'title' menjadi 'problem'
            'status' => $this->faker->randomElement($statusOptions),
            'prioritas' => $this->faker->randomElement($priorityOptions), // Ganti 'priority' menjadi 'prioritas'
            'cc_mails' => [$this->faker->safeEmail(), $this->faker->safeEmail()],
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            // Kolom 'description' tidak ada di migrasi, jadi kita hapus
        ];
    }
}