<?php 

namespace App\Services;

use GuzzleHttp\Client;

class BitcoinRatesService
{
	/**
     * Get the data from api
     *
     * @return array
     */
	public static function getRates(): array
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
		return $rates;
	}
}