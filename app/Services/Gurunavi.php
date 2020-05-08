<?php

namespace App\Services;
use GuzzleHttp\Client;

class Gurunavi
{

  private const RESTAURANTS_SEARCH_API_URL = 'https://api.gnavi.co.jp/RestSearchAPI/v3/';

  // public function searchRestaurants($word)
  public function searchRestaurants(string $word): array
  {
    $client = new Client();
    $responce = $client
        // ->get('https://api.gnavi.co.jp/RestSearchAPI/v3/', [
          ->get(self::RESTAURANTS_SEARCH_API_URL, [
          'query' => [
            'keyid' => env('GURUNAVI_ACCESS_KEY'),
            'freeword' => str_replace(' ', ',', $word),
          ],
          'http_errors' => false,
        ]);
        return json_decode($responce->getBody()->getContents(), true);
        
  }
}