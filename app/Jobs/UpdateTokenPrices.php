<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Project;
use App\Services\ERC20TokenPriceService;
use App\Services\SolanaTokenPriceService;
use Illuminate\Support\Facades\Log;

class UpdateTokenPrices implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $erc20Service;
    protected $solanaService;

    public function __construct()
    {
        $this->erc20Service = app(ERC20TokenPriceService::class);
        $this->solanaService = app(SolanaTokenPriceService::class);
    }

    public function handle()
    {
        $projects = Project::whereNotNull('contract_address')
            ->whereNotNull('token_network')
            ->get();

        foreach ($projects as $project) {
            $address = $project->contract_address;
            $network = strtolower($project->token_network);

            $price = null;

            try {
                // Fetch price based on network
                if ($network === 'solana') {
                    $price = $this->solanaService->getTokenPrice($address);
                } else {
                    $price = $this->erc20Service->getTokenPrice($address, $network);
                }

                if ($price !== null) {
                    $this->updateProjectPrice($project, $price);
                } else {
                    Log::warning("Failed to fetch price for {$project->title} | Network: {$network}");
                    echo "Failed to fetch price for {$project->title} | Network: {$network}\n";
                }
            } catch (\Exception $e) {
                Log::error("Error updating price for {$project->title} | Network: {$network}: {$e->getMessage()}");
                echo "Error updating price for {$project->title} | Network: {$network}\n";
            }
        }

        Log::info('Token prices update completed.');
        echo "Token prices update completed.\n";
    }

    /**
     * Update the project's price and calculate percentage change.
     *
     * @param Project $project
     * @param float $newPrice
     */
    protected function updateProjectPrice(Project $project, float $newPrice)
    {
        $previousPrice = $project->usd_price;

        // Update previous price before updating the current price
        $project->previous_price = $previousPrice;
        $project->usd_price = $newPrice;

        // Calculate percentage change
        if ($previousPrice !== null && $previousPrice > 0) {
            $percentageChange = (($newPrice - $previousPrice) / $previousPrice) * 100;
            $project->price_change_percentage = round($percentageChange, 2);
        } else {
            $project->price_change_percentage = null; // No percentage change for new or zero-price tokens
        }

        // Update price change direction
        $project->price_change_direction = $newPrice > $previousPrice ? 'up' : 'down';

        // Save changes
        $project->last_updated_at = now();
        $project->save();

        // Log success
        $direction = $project->price_change_direction === 'up' ? '↑' : '↓';
        $percentageChangeStr = $project->price_change_percentage !== null
            ? "{$project->price_change_percentage}%"
            : 'N/A';

        Log::info("Updated: {$project->title} | Price: {$newPrice} | Change: {$percentageChangeStr} {$direction}");
        echo "Updated: {$project->title} | Price: {$newPrice} | Change: {$percentageChangeStr} {$direction}\n";
    }
}
