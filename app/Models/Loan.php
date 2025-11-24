<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $guarded = ['id'];
    
    // Relasi ke Unit Barang
    public function asset() { return $this->belongsTo(AssetDetail::class, 'asset_detail_id'); }
}