<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class PollingTelegramNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'polling:notificationtelegram';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Polling update telegram for every 15 minutes';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $notification_url = config('app.notification_url');
        $response = Http::post($notification_url);

        if ($response->status() === 200)
        {
            $this->info('Polling Notification executed successfully!');
        }
    }
}
