<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mpociot\Teamwork\TeamworkTeam;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use App\Models\User;

class Team extends TeamworkTeam
{
    protected $fillable = ['code','name', 'owner_id'];
    use Loggable;

    public function ownernya()
    {
        return $this->hasOne(User::class,'id','owner_id');
    }
}
