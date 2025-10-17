<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Team;
use App\Models\Ticket;
use App\Models\Kategori;
use App\Models\SubKategori;
use App\Models\Lokasi;
use Illuminate\Database\Eloquent\Model;

class DummyDataSeeder extends Seeder
{
    public function run()
    {
        // Cari user admin yang sudah dibuat oleh LocalUserSeeder
        $adminUser = User::where('email', 'developer@local.com')->first();
        if (!$adminUser) {
            $this->command->error('User Admin tidak ditemukan! Jalankan LocalUserSeeder terlebih dahulu melalui DatabaseSeeder.');
            return;
        }
        $adminTeam = $adminUser->currentTeam;

        $this->command->info('Membuat data master (Lokasi & Kategori)...');

        Model::withoutEvents(function () {
            Lokasi::factory(20)->create();
            Kategori::factory(15)->create()->each(function ($kategori) {
                SubKategori::factory(3)->create([
                    'katagori_id' => $kategori->id,
                ]);
            });
        });

        $this->command->info('Data master berhasil dibuat.');
        $this->command->info('Membuat 2000 tiket untuk Admin Team...');
        
        // VVV PERBAIKAN ADA DI BARIS INI VVV
        $subKategoris = SubKategori::allTeams()->get();
        $lokasis = Lokasi::allTeams()->get(); // Kita perbaiki juga untuk Lokasi agar aman
        
        for ($i = 0; $i < 20; $i++) {
            Ticket::factory(100)->make()->each(function ($ticket) use ($adminUser, $adminTeam, $lokasis, $subKategoris) {
                $subKategori = $subKategoris->random();
                
                $ticket->user_id = $adminUser->id;
                $ticket->agent_id = $adminUser->id;
                $ticket->supervisor_id = $adminUser->id;
                $ticket->team_id = $adminTeam->id;
                $ticket->lokasi_id = $lokasis->random()->id;
                $ticket->katagori_id = $subKategori->katagori_id;
                $ticket->sub_katagori_id = $subKategori->id;
                
                $ticket->save();
            });
            $this->command->line('-> 100 tiket berhasil dibuat...');
        }
       
        $this->command->info('Seeding 2000 data tiket dummy selesai!');
    }
}