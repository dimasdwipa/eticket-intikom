<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Mpociot\Teamwork\Traits\UserHasTeams;
use Mpociot\Teamwork\Traits\UsedByTeams;

class SubKategori extends Model
{
    use HasFactory;
    use Loggable;
    use UserHasTeams;
    use UsedByTeams;

    protected $fillable = [
        'katagori_id',
        'sub_katagori', // Menggunakan 'g' agar cocok dengan migrasi
        'agent_id',
        'supervisor_id',
        'extend_ticket_SLA_default',
        'extend_response_SLA_default',
        'send_assignment_default',
    ];

    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }

    public function katagori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class);
    }

}
