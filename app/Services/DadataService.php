<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class DadataService
{
    protected Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://suggestions.dadata.ru/suggestions/api/4_1/rs/',
            'headers' => [
                'Authorization' => 'Token ' . env('DADATA_API_KEY'),
                'Content-Type' => 'application/json',
            ]
        ]);
    }

    public function getCompanyByInn(string $inn): ?array
    {
        try {
            $response = $this->client->post('findById/party', [
                'json' => ['query' => $inn],
            ]);

            $data = json_decode($response->getBody(), true);
            return $data['suggestions'][0] ?? null;
        } catch (\Exception $e) {
            Log::error('Dadata API error: ' . $e->getMessage());
            return null;
        }
    }
}
