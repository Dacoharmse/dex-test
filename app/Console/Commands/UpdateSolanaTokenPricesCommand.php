<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\UpdateSolanaTokenPrices;

class UpdateSolanaTokenPricesCommand extends Command
{
    protected $signature = 'tokens:update-solana-prices';
    protected $description = 'Update prices for Solana tokens using Moralis API';

    public function handle()
    {
        dispatch(new UpdateSolanaTokenPrices());
        $this->info('Solana token price update job dispatched.');
    }
}
