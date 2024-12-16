<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ERC20TokenPriceService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('MORALIS_API_KEY');
    }

    public function getTokenPrice(string $address, string $network): ?float
    {
        $url = "https://deep-index.moralis.io/api/v2.2/erc20/{$address}/price?chain={$network}&include=percent_change";

        try {
            $response = $this->client->get($url, [
                'headers' => [
                    'Accept' => 'application/json',
                    'X-API-Key' => $this->apiKey,
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            return $data['usdPrice'] ?? null;
        } catch (\Exception $e) {
            Log::error("Failed to fetch ERC20 token price for {$address} on {$network}: " . $e->getMessage());
            return null;
        }
    }
}
