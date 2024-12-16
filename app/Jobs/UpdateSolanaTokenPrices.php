<?php

namespace App\Jobs;

use App\Models\Project;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class UpdateSolanaTokenPrices
{
    public function handle()
    {
        $client = new Client();
        $apiKey = env('MORALIS_API_KEY');

        // Fetch projects with Solana network
        $projects = Project::where('token_network', 'sol')->whereNotNull('contract_address')->get();

        foreach ($projects as $project) {
            $address = $project->contract_address;

            try {
                // API request
                $response = $client->get("https://solana-gateway.moralis.io/token/mainnet/{$address}/price", [
                    'headers' => [
                        'Accept' => 'application/json',
                        'X-API-Key' => $apiKey,
                    ],
                ]);

                $data = json_decode($response->getBody(), true);

                if (isset($data['usdPrice'])) {
                    $previousPrice = $project->usd_price; // Current price becomes the previous price
                    $usdPrice = $data['usdPrice'];

                    // Calculate price change percentage
                    $priceChangePercentage = null;
                    $priceChangeDirection = null;

                    if ($previousPrice !== null && $previousPrice > 0) {
                        $priceChangePercentage = (($usdPrice - $previousPrice) / $previousPrice) * 100;
                        $priceChangeDirection = $usdPrice > $previousPrice ? 'up' : 'down';
                    }

                    // Format the percentage to 2 decimal places
                    $formattedPercentage = $priceChangePercentage !== null
                        ? number_format($priceChangePercentage, 2) . '%'
                        : null;

                    // Update project with new price and change data
                    $project->update([
                        'previous_price' => $previousPrice,
                        'usd_price' => $usdPrice,
                        'price_change_percentage' => $formattedPercentage,
                        'price_change_direction' => $priceChangeDirection,
                        'last_updated_at' => now(),
                    ]);

                    echo "Updated: {$project->title} | Network: sol | Price: {$usdPrice} | Change: {$formattedPercentage} | Direction: {$priceChangeDirection}\n";
                } else {
                    echo "Failed to fetch price for {$project->title} | Network: sol\n";
                }
            } catch (\Exception $e) {
                Log::error("Error fetching Solana token price for {$address}: {$e->getMessage()}");
                echo "Failed to fetch price for {$project->title} | Network: sol\n";
            }
        }

        echo "Solana token prices updated successfully.\n";
    }
}
