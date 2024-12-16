<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MoralisAPIService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('MORALIS_API_KEY');
    }

    public function getTokenData($contractAddress, $network)
    {
        $url = $this->getAPIEndpoint($network, $contractAddress);

        $response = Http::withHeaders([
            'X-API-Key' => $this->apiKey,
        ])->get($url);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }

    private function getAPIEndpoint($network, $contractAddress)
    {
        switch ($network) {
            case 'solana':
                return "https://deep-index.moralis.io/api/v2/erc20/{$contractAddress}/price";

            case 'erc20':
                return "https://deep-index.moralis.io/api/v2/erc20/{$contractAddress}/price";

            default:
                throw new \Exception("Unsupported network: {$network}");
        }
    }
}
