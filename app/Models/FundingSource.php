<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundingSource extends Model
{
    // Tambahkan baris ini. Ini satpam-nya.
    protected $fillable = [
        'code',
        'name',
    ];
}