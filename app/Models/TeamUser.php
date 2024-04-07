<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
use App\Models\User;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class TeamUser extends Model
{
    use HasFactory;
    use Loggable;

    protected $fillable = ['user_id','team_id'];

    protected $table ="team_user";

    
    public function team()
    {
        return $this->hasOne(Team::class,'id','team_id');
    }

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
