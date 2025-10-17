<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'lokasi_id',
        'supervisor_id',
        'agent_id',
        'user_id',
        'asset_id',
        'transaction_type',
        'transaction_date',
        'type_request',
        'est_return_date',
        'asset_custodian',
        'priority',
        'files',
        'description',
        'team_id',
        'tag_asset',
        'nama_item',
        'deskripsi',
        'merek',
        'model_type',
        'status',
        'image',
        'created_at',
        'updated_at'
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
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
