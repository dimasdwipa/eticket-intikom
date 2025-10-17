<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Mpociot\Teamwork\Traits\UserHasTeams;
use Mpociot\Teamwork\Traits\UsedByTeams;
use App\Models\User;

class AssetRequest extends Model
{
    use HasFactory;
    use Loggable;
    use UserHasTeams;
    use UsedByTeams;
    use HasFactory;

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
    public function assetAllTeams()
    {
        return $this->belongsTo(Asset::class,'asset_id')->allTeams();
    }
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
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
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
