<?php 

namespace App\Services;

use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Models\BitcoinRate;
ini_set('max_execution_time', 180);

class BitcoinRatesService
{
	public static function getRates()
	{
		// query get parameters
		$params = [
			'query' => [
				'period_id' => '1DAY',
				'time_start' => '2015-01-01',
				'time_end' => '2018-01-01',
				'limit' => '10000',
				'apikey' => config('bitcoin_rates.coinApi.coin_api_key')
			]
		];
		$base_uri = config('bitcoin_rates.coinApi.coin_api_url');
		
		$client = new Client(['base_uri' => $base_uri]);

		$response = $client->request('GET', '', $params);
		$rates = json_decode($response->getBody()->getContents(), true);

		self::setRates($rates);

		return $rates;
	}

	public static function setRates(array $rates)
	{
		foreach ($rates as $rate) {
            BitcoinRate::create($rate);
        }

        return true;
	}
}