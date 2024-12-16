<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Project;
use App\Services\ERC20TokenPriceService;

class UpdateTokenPricesCommand extends Command
{
    protected $signature = 'tokens:update-prices';
    protected $description = 'Update token prices for ERC20 networks only';

    protected $erc20Service;

    public function __construct(ERC20TokenPriceService $erc20Service)
    {
        parent::__construct();
        $this->erc20Service = $erc20Service;
    }

    public function handle()
    {
        // Fetch only projects with ERC20-compatible networks
        $projects = Project::whereNotNull('contract_address')
            ->whereNotNull('token_network')
            ->where('token_network', '!=', 'sol') // Exclude Solana (or 'solana', depending on your database value)
            ->get();

        foreach ($projects as $project) {
            $address = $project->contract_address;
            $network = $project->token_network;

            $this->updateERC20Token($project, $address, $network);
        }

        $this->info('Token prices updated successfully for ERC20 networks.');
    }

    protected function updateERC20Token($project, $address, $network)
    {
        $price = $this->erc20Service->getTokenPrice($address, $network);

        if ($price !== null) {
            $this->updateProjectPrice($project, $price, $network);
        } else {
            $this->warn("Failed to fetch price for {$project->title} | Network: {$network}");
        }
    }

    protected function updateProjectPrice($project, $price, $network)
    {
        $previousPrice = $project->usd_price;

        // Update previous price before updating the current price
        $project->previous_price = $previousPrice;
        $project->usd_price = $price;

        // Calculate percentage change
        if ($previousPrice !== null && $previousPrice > 0) {
            $percentageChange = (($price - $previousPrice) / $previousPrice) * 100;
            $project->price_change_percentage = round($percentageChange, 2);
        } else {
            $project->price_change_percentage = null; // No percentage change for new or zero-price tokens
        }

        // Update price change direction
        $project->price_change_direction = $price > $previousPrice ? 'up' : 'down';

        // Save changes
        $project->last_updated_at = now();
        $project->save();

        $this->info("Updated: {$project->title} | Prev Price: {$previousPrice} | New Price: {$price} | Change: {$project->price_change_percentage}% | Direction: {$project->price_change_direction}");
    }
}
