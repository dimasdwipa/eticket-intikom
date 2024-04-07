<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Mpociot\Teamwork\Traits\UserHasTeams;
use Mpociot\Teamwork\Traits\UsedByTeams;


class Complain extends Model
{
    use HasFactory;
    use Loggable;
    use UserHasTeams;
    use UsedByTeams;

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
