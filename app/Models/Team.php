<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mpociot\Teamwork\TeamworkTeam;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Team extends TeamworkTeam
{
    protected $fillable = ['code','name', 'owner_id','year','number'];
    use Loggable,HasFactory;

    public function ownernya()
    {
        return $this->hasOne(User::class,'id','owner_id');
    }
}
