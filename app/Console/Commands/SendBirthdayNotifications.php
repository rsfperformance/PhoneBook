<?php

namespace App\Console\Commands;

use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Console\Command;

class SendBirthdayNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:birthday-notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send about contact birthday notifications to users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $notificationController = new NotificationController();
        $notificationController->sendBirthdayNotifications();
        $this->info('Birthday notifications sent successfully');
    }
}
