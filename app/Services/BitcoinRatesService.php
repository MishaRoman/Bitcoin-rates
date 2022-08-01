<?php 

namespace App\Services;

use GuzzleHttp\Client;

class BitcoinRatesService
{
	public static function getRates()
	{
		$period_id = '1DAY';
		$time_start = '2015-01-01';
		$time_end = '2018-01-01';
		$limit = '10000';
		$api_key = config('bitcoin_rates.coinApi.coin_api_key');
		$url = config('bitcoin_rates.coinApi.coin_api_url') . "?period_id=$period_id&time_start=$time_start&time_end=$time_end&limit=$limit&apikey=$api_key";
		
		$client = new Client();

		$response = $client->request('GET', $url);

		$rates = json_decode($response->getBody()->getContents(), true);
		return $rates;

	}
}