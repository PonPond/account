<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {

      
        $schedule->call(function () {
            app('App\Http\Controllers\LineController')->notify();
        })->everyTenSeconds()->name('monthly-notification')->withoutOverlapping(); // เรียกใช้งานทุก 10 วินาที
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
