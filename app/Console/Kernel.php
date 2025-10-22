<?php
namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\EnsureDatabase;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        // Define scheduled commands here if needed.
    }

    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        $this->commands([
            EnsureDatabase::class,
        ]);
    }
}
