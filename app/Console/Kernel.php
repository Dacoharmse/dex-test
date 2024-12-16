<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\UpdateSolanaTokenPricesCommand::class,
        \App\Console\Commands\UpdateTokenPricesCommand::class, // Assume you already have this
    ];

    protected function schedule(Schedule $schedule)
    {
        // Schedule Solana token price updates
        $schedule->command('tokens:update-solana-prices')
            ->dailyAt('00:00')
            ->appendOutputTo(storage_path('logs/solana_token_update.log'));

        // Schedule ERC20 token price updates
        $schedule->command('tokens:update-erc20-prices')
            ->dailyAt('01:00') // Run after Solana updates
            ->appendOutputTo(storage_path('logs/erc20_token_update.log'));
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
