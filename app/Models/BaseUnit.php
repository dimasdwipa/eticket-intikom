<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Mpociot\Teamwork\Traits\UserHasTeams;
use Mpociot\Teamwork\Traits\UsedByTeams;
use App\Models\User;

class BaseUnit extends Model
{
    use HasFactory;
    use Loggable;
    use UserHasTeams;
    use UsedByTeams;

    protected $fillable = [
        'code','desc','user_id','su_user_id'
    ];

    public function defaultSA()
    {
        return $this->belongsTo(User::class);
    }

}
