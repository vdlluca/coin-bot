<?php

declare(strict_types=1);

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class PriceService 
{
    private HttpClientInterface $client;


    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getPrice(string $coin): ?float 
    {
        $url = sprintf('https://api.coingecko.com/api/v3/coins/%s', $coin);

        try {
            $response = $this->client->request('GET', $url);
            $content = $response->toArray();
            $price = $content['market_data']['current_price']['eur'];
        } catch (\Exception $exception) {
            return null;
        }

        return $price;
    }
}