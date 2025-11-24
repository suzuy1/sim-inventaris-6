<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetDetail extends Model
{
    protected $guarded = ['id'];

    public function inventory() { return $this->belongsTo(Inventory::class); }
    public function room() { return $this->belongsTo(Room::class); }
    public function fundingSource() { return $this->belongsTo(FundingSource::class); }
    public function loans() { return $this->hasMany(Loan::class); }
}