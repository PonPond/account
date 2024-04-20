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

      

        // $schedule->call(function () {
        //     // เรียกใช้งานฟังก์ชันใน Controller
        //     app('App\Http\Controllers\DebtorMController')->notify();
        // })->everyTenSeconds(); // เรียกใช้งานทุก 10 วินาที
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
