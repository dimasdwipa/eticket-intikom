<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use APp\Models\Ticket;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Mpociot\Teamwork\Traits\UserHasTeams;
use Mpociot\Teamwork\Traits\UsedByTeams;


class Kategori extends Model
{
    use HasFactory;
    use Loggable;
    use UserHasTeams;
    use UsedByTeams;

    public static $snakeAttributes = false;
    protected $fillable = [
        'kategori'
    ];

    public function ticket()
    {
        return $this->hasOne(Ticket::class);
    }

    public function sub_katagori()
    {
        return $this->hasOne(Ticket::class);
    }

}
