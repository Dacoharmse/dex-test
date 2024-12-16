<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class SolanaTokenPriceService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('BITQUERY_API_KEY');
    }

    /**
     * Fetch the USD price for a Solana token.
     *
     * @param string $mintAddress The token's mint (contract) address.
     * @return float|null
     */
    public function getTokenPrice(string $mintAddress): ?float
    {
        $query = '
        query GetTokenPrice($address: String!) {
            Solana {
                DEXTradeByTokens(
                    where: {Trade: {Currency: {MintAddress: {is: $address}}}}
                    limit: {count: 1}
                ) {
                    Trade {
                        current: PriceInUSD(maximum: Block_Time)
                    }
                }
            }
        }';

        $variables = [
            'address' => $mintAddress,
        ];

        try {
            $response = $this->client->post('https://graphql.bitquery.io', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'X-API-KEY' => $this->apiKey,
                ],
                'json' => [
                    'query' => $query,
                    'variables' => $variables,
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            // Extract price
            if (!empty($data['data']['Solana']['DEXTradeByTokens'][0]['Trade']['current'])) {
                return $data['data']['Solana']['DEXTradeByTokens'][0]['Trade']['current'];
            }

            Log::warning("No price data returned for Solana token with MintAddress: {$mintAddress}");
            return null;
        } catch (\Exception $e) {
            Log::error("Failed to fetch Solana token price for {$mintAddress}: " . $e->getMessage());
            return null;
        }
    }
}
