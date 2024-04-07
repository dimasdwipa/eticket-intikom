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

    public function ticket()
    {
        return $this->hasOne(Ticket::class);
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
