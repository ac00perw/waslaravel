<?php

namespace App\Console;

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
        \App\Console\Commands\Inspire::class,
        \App\Console\Commands\StatusCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
                  ->daily()
                  ->sendOutputTo('/Users/a/Desktop/out.txt')
                  ->emailOutputTo('a@acdubs.com');
      $schedule->command('challenges:update')
                  ->sendOutputTo(base_path() . '/storage/logs/status.log')
                  ->emailOutputTo('a@acdubs.com')
                  ->dailyAt('14:03')->timezone('America/New_York');
        //$schedule->exec('touch /Users/a/Sites/waslaravel')
    }
}
