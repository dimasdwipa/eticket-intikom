<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Team;
use Illuminate\Support\Facades\Hash;

class LocalUserSeeder extends Seeder
{
    public function run()
    {
        // Buat user dengan role tertinggi
        $user = User::create([
            'name' => 'Local Administrator', // Kita ubah namanya juga agar jelas
            'email' => 'developer@local.com',
            'role' => 'supervisor-agent-user', // <-- UBAH BARIS INI
            'password' => Hash::make('password'),
        ]);

        // Buat tim default agar user bisa melewati validasi CurrentTeam
        $team = Team::create([
            'owner_id' => $user->id,
            'name' => 'Admin Team (Local)',
            'code' => 'ADMIN', // Kita ubah kodenya agar tidak masuk ke alur 'SA'
        ]);

        // Hubungkan user ke tim dan set sebagai tim aktif
        $user->attachTeam($team);
        $user->switchTeam($team);
    }
}