<?php

namespace App\Console;

use App\Console\Commands\SendEmailOnBirthday;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        SendEmailOnBirthday::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('email:Birthday')->dailyAt('17:45');
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
  
}
