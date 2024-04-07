<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use LdapRecord\Laravel\Auth\LdapAuthenticatable;
use LdapRecord\Laravel\Auth\AuthenticatesWithLdap;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Mpociot\Teamwork\Traits\UserHasTeams;


class User extends Authenticatable implements LdapAuthenticatable
{
    use Notifiable, AuthenticatesWithLdap;
    use UserHasTeams;
    use Loggable;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeGetTeam($query) {
        return $query->leftJoin('team_user', 'team_user.user_id', '=', 'users.id')
        ->leftJoin('teams', 'teams.id', '=', 'team_user.team_id')
        ->where('team_user.team_id', auth()->user()->current_team_id)
        ->selectRaw('DISTINCT users.id,users.*');
    }

    public function scopeGetCurrentTeam($query) {
        return $query->join('team_user', 'team_user.user_id', '=', 'users.id')
        ->where('team_user.team_id', auth()->user()->current_team_id)
        ->selectRaw('users.id,users.*,team_user.*');
    }

    public function scopeGetAllTeam($query) {
        return $query->leftJoin('team_user', 'team_user.user_id', '=', 'users.id')
        ->leftJoin('teams', 'teams.id', '=', 'team_user.team_id')
        ->selectRaw('DISTINCT users.id,users.*,team_user.team_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class,'agent_id');
    }

    public function supervisor_tickets()
    {
        return $this->hasMany(Ticket::class,'supervisor_id');
    }
}
