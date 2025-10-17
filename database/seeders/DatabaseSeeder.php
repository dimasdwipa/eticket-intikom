<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Panggil seeder untuk membuat user admin DULU
        $this->call(LocalUserSeeder::class);
        
        // BARU panggil seeder untuk membuat data tiket
        $this->call(DummyDataSeeder::class);
    }
}