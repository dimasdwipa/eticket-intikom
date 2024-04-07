<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Mpociot\Teamwork\Traits\UserHasTeams;
use Mpociot\Teamwork\Traits\UsedByTeams;

class Lokasi extends Model
{
    use HasFactory;
    use Loggable;
    use UserHasTeams;
    use UsedByTeams;

    protected $fillable = [
        'lokasi'
    ];

    public function lokasi()
    {
        return $this->hasOne(Ticket::class);
    }
}
