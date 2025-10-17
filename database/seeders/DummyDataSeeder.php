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
        // =================================================================
        // PERBAIKAN #1: AMBIL TEAM ID DARI ADMIN USER
        // =================================================================
        // Cari user admin dan tim-nya yang sudah dibuat oleh LocalUserSeeder
        $adminUser = User::where('email', 'developer@local.com')->first();

        if (!$adminUser || !$adminUser->currentTeam) {
            $this->command->error('User Admin atau Team Admin tidak ditemukan! Jalankan LocalUserSeeder terlebih dahulu melalui DatabaseSeeder.');
            return;
        }
        
        $adminTeamId = $adminUser->current_team_id; // Simpan ID tim admin
        
        $this->command->info('Membuat data master (Lokasi & Kategori) untuk Team ID: ' . $adminTeamId);

        // =================================================================
        // PERBAIKAN #2: SISIPKAN TEAM ID SAAT MEMBUAT DATA MASTER
        // =================================================================
        Model::withoutEvents(function () use ($adminTeamId) {
            
            // Buat 20 Lokasi dan langsung set team_id-nya
            Lokasi::factory(20)->create([
                'team_id' => $adminTeamId
            ]);

            // Buat 15 Kategori dan langsung set team_id-nya
            Kategori::factory(15)->create([
                'team_id' => $adminTeamId
            ])->each(function ($kategori) use ($adminTeamId) {
                // Buat 3 Sub Kategori untuk setiap Kategori dan set juga team_id-nya
                SubKategori::factory(3)->create([
                    'katagori_id' => $kategori->id,
                    'team_id' => $adminTeamId
                ]);
            });
        });

        $this->command->info('Data master berhasil dibuat.');
        
        // Bagian pembuatan tiket tidak perlu diubah karena sudah benar
        $this->command->info('Membuat 2000 tiket untuk Admin Team...');
        
        $subKategoris = SubKategori::allTeams()->get();
        $lokasis = Lokasi::allTeams()->get();

        for ($i = 0; $i < 20; $i++) {
            Ticket::factory(100)->make()->each(function ($ticket) use ($adminUser, $adminTeamId, $lokasis, $subKategoris) {
                $subKategori = $subKategoris->random();
                
                $ticket->user_id = $adminUser->id;
                $ticket->agent_id = $adminUser->id;
                $ticket->supervisor_id = $adminUser->id;
                $ticket->team_id = $adminTeamId; // Menggunakan team_id yang sama
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