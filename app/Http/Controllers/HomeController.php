<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     */
    public function index(Request $request): View
    {
        // Fetch approved projects
        $projects = Project::where('status', 'approved')
            ->where('start_date', '<', now())
            ->orderBy('id', 'desc')
            ->paginate(20);

        // Fetch live data for tokens
        $liveData = $this->fetchLiveData($projects);

        return view('home', compact(
            'projects',
            'liveData'
        ));
    }

    /**
     * Fetch live data for tokens using Moralis API.
     */
    private function fetchLiveData($projects)
    {
        $liveData = [];
        $supportedChains = ['eth', 'bsc', 'polygon', 'avalanche', 'fantom', 'sol'];

        foreach ($projects as $project) {
            if (!$project->contract_address || !$project->token_network) {
                Log::warning("Missing data for project: {$project->title}");
                continue;
            }

            if (!in_array($project->token_network, $supportedChains)) {
                Log::warning("Unsupported network: {$project->token_network} for contract: {$project->contract_address}");
                continue;
            }

            try {
                if ($project->token_network === 'sol') {
                    // Fetch data for Solana tokens
                    $url = "https://solana-gateway.moralis.io/token/mainnet/{$project->contract_address}/pairs";
                } else {
                    // Fetch data for ERC20 and other tokens
                    $url = "https://deep-index.moralis.io/api/v2/erc20/{$project->contract_address}/price";
                }

                $response = Http::withHeaders([
                    'X-API-Key' => env('MORALIS_API_KEY'),
                ])->get($url);

                Log::info("Request URL: $url");
                Log::info("Response: " . $response->body());

                if ($response->successful()) {
                    $data = $response->json();

                    if ($project->token_network === 'sol') {
                        $liveData[$project->contract_address] = [
                            'price' => $data['pairs'][0]['usdPrice'] ?? 0,
                            'price_change_percentage' => $data['pairs'][0]['usdPrice24hrPercentChange'] ?? 0,
                            'volume' => $data['pairs'][0]['liquidityUsd'] ?? 0,
                        ];
                    } else {
                        $liveData[$project->contract_address] = [
                            'price' => $data['usdPrice'] ?? 0,
                            'volume' => $data['volume24h'] ?? 0,
                            'market_cap' => $data['marketCap'] ?? 0,
                            'price_change_percentage' => $data['changePercent'] ?? 0,
                            'holders' => $data['holders'] ?? 'N/A',
                        ];
                    }
                } else {
                    Log::warning("Failed to fetch data for {$project->contract_address}: " . $response->body());
                }
            } catch (\Exception $e) {
                Log::error("Error fetching data for {$project->contract_address}: " . $e->getMessage());
            }
        }

        return $liveData;
    }
}
