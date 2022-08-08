<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\BitcoinRate;
use App\Services\BitcoinRatesService;
use App\Http\Resources\BitcoinRatesResource;

class BitcoinRatesController extends Controller
{
    public function index()
    {
        $rates = BitcoinRate::get([
            'time_period_start', 'price_open', 'price_high', 'price_low', 'price_close', 'volume_traded'
        ]);
        if (!$rates->isEmpty()) {
            return BitcoinRatesResource::collection($rates);
        }

        BitcoinRatesService::getRates();

        $rates = BitcoinRate::get([
            'time_period_start', 'price_open', 'price_high', 'price_low', 'price_close', 'volume_traded'
        ]);
        
        return BitcoinRatesResource::collection($rates);
    }
}
