<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use App\Models\Team;
use App\Models\User;

class TeamRequest extends Model
{
    use HasFactory;
    use Loggable;

    protected $fillable = ['user_id','team_id'];

    
    public function team()
    {
        return $this->hasOne(Team::class,'id','team_id');
    }

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
