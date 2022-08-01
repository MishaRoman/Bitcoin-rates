<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\BitcoinRate;
use App\Services\BitcoinRatesService;
use App\Http\Resources\BitcoinRatesResource;
ini_set('max_execution_time', 180);

class BitcoinRatesController extends Controller
{
    public function index()
    {
        $rates = BitcoinRate::get();
        if ($rates) {
            return BitcoinRatesResource::collection($rates);
        }

        $rates = BitcoinRatesService::getRates();

        foreach ($rates as $rate) {
            $rate['time_period_start'] = Carbon::parse($rate['time_period_start'])->format('Y-m-d H:m:s');
            $rate['time_period_end'] = Carbon::parse($rate['time_period_end'])->format('Y-m-d H:m:s');
            $rate['time_open'] = Carbon::parse($rate['time_open'])->format('Y-m-d H:m:s');
            $rate['time_close'] = Carbon::parse($rate['time_close'])->format('Y-m-d H:m:s');
            
            BitcoinRate::create($rate);
        }
        $rates = BitcoinRate::get();
        return BitcoinRatesResource::collection($rates);

    }
}
