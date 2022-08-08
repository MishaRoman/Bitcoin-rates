<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Services\BitcoinRatesService;
use App\Models\BitcoinRate;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $rates = BitcoinRatesService::getRates();

        foreach ($rates as $rate) {
            BitcoinRate::create($rate);
        }
    }
}
