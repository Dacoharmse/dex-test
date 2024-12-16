<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class SearchController extends Controller
{
    public function searchTokens(Request $request)
    {
        $query = $request->input('query');
        $projects = Project::where('title', 'LIKE', "%{$query}%")
                           ->orWhere('contract_address', 'LIKE', "%{$query}%")
                           ->get();
                           
        $projects->each(function($project) {
            $project->exchange_listings = json_decode($project->exchange_listings, true);
        });

        $currencyIcons = [
            'usd' => 'usd-logo.png',
            'bnb' => 'bnb-logo.png',
            'eth' => 'ethereum-logo.png',
            'sol' => 'sol-logo.png',
            'base' => 'base-logo.png',
            'matic' => 'matic-logo.png',
            'arb' => 'arb-logo.png',
            'trx' => 'tron-logo.png'
        ];

        $exchangeData = [
            'Dexscreener' => ['icon' => 'dexscreener-icon.png', 'url' => 'https://dexscreener.com'],
            'Coingecko' => ['icon' => 'coingecko-icon.png', 'url' => 'https://coingecko.com'],
            'Dextools' => ['icon' => 'dextools-icon.png', 'url' => 'https://dextools.io'],
            'Coinmarketcap' => ['icon' => 'coinmarketcap-icon.png', 'url' => 'https://coinmarketcap.com']
        ];

        $output = view('partials.table_body', compact('projects', 'currencyIcons', 'exchangeData'))->render();

        return response($output);
    }
}
