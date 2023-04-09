<?php

namespace App\Console;

use App\Console\Commands\SendBirthdayNotifications;
use App\Http\Controllers\Api\NotificationController;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected $notification;

    public function __construct(Application $app, Dispatcher $events, NotificationController $notificationController)
    {
        parent::__construct($app, $events);
        $this->notification = $notificationController;
    }

    protected function schedule(Schedule $schedule): void
    {
        $this->notification = new NotificationController();
        $schedule->command('send:birthday-notifications')->daily();
//        $schedule->call(function () {
//            return $this->notification->sendBirthdayNotifications();
//        })->everyMinute();
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
