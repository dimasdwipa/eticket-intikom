<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Mpociot\Teamwork\Traits\UserHasTeams;
use Mpociot\Teamwork\Traits\UsedByTeams;
use App\Models\User;

class Asset extends Model
{
    use HasFactory;
    use Loggable;
    use UserHasTeams;
    use UsedByTeams;
    use HasFactory;


    protected $fillable = [
        'tag_asset',
        'nama_item',
        'deskripsi',
        'merek',
        'model_type',
        'agent_id',
        'supervisor_id',
        'image',
        'team_id',
        'asset_custodian',
    ];
    
    public function supervisor()
    {
        return $this->belongsTo(User::class);
    }
    public function agent()
    {
        return $this->belongsTo(User::class);
    }
    public function assetRequests()
    {
        return $this->hasMany(AssetRequest::class);
    }
}
