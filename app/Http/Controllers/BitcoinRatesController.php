<?php
namespace App\Http\Controllers;

use App\Models\BitcoinRate;
use App\Http\Resources\BitcoinRatesResource;

class BitcoinRatesController extends Controller
{
    public function index()
    {
        $rates = BitcoinRate::get([
            'time_period_start', 'price_open', 'price_high', 'price_low', 'price_close', 'volume_traded'
        ]);
        
        return BitcoinRatesResource::collection($rates);
    }
}
