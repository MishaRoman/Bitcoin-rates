<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BitcoinRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'time_period_start', 'time_period_end', 'time_open', 'time_close',
        'price_open', 'price_high', 'price_low', 'price_close', 'volume_traded', 'trades_count'
    ];

    protected $casts = [
        'time_period_start' => 'timestamp',
    ];
}
