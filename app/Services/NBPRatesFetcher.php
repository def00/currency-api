<?php declare(strict_types=1);
namespace App\Services;


use GuzzleHttp\Client;
use \json_decode;

class NBPRatesFetcher
{
    const NBP_URL = 'http://api.nbp.pl/api/exchangerates/tables/A/today/?format=json';

    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function fetchRates(): array
    {
        $response = $this->client->get(static::NBP_URL);
        if ($response->getStatusCode() === 200) {
            $json = json_decode($response->getBody()->getContents(), true);
            return $json[0]['rates'] ?? [];
        }
        throw new \Exception('Can not get rates from nbp');
    }
}
