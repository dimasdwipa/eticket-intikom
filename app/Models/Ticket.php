<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Mpociot\Teamwork\Traits\UserHasTeams;
use Mpociot\Teamwork\Traits\UsedByTeams;

class Ticket extends Model
{
    use HasFactory;
    use Loggable;
    use UserHasTeams;
    use UsedByTeams;


    // public static $snakeAttributes = false;

    protected $fillable = ["*"];

    protected $casts = [
        'cc_mails' => 'array',
    ];

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }
    public function katagori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function sub_katagori()
    {
        return $this->belongsTo(SubKategori::class);
    }
    public function supervisor()
    {
        return $this->belongsTo(User::class);
    }
    public function agent()
    {
        return $this->belongsTo(User::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function lokasiAllTeams()
    {
        return $this->belongsTo(Lokasi::class,'lokasi_id')->allTeams();
    }
    public function katagoriAllTeams()
    {
        return $this->belongsTo(Kategori::class,'katagori_id')->allTeams();
    }
    public function sub_katagoriAllTeams()
    {
        return $this->belongsTo(SubKategori::class,'sub_katagori_id')->allTeams();
    }
    public function supervisorAllTeams()
    {
        return $this->belongsTo(User::class,'supervisor_id');
    }
    public function agentAllTeams()
    {
        return $this->belongsTo(User::class,'agent_id');
    }
    public function userAllTeams()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function complains()
    {
        return $this->hasMany(Complain::class);
    }

    // file

    public function file_manager(){

        return $this->hasMany(FileManager::class, 'model_id');
    }
}
