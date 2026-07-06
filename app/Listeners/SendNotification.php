<?php

namespace App\Listeners;

use App\Events\NotificationSent;
use Illuminate\Support\Facades\Log;

class SendNotification
{
    public function handle(NotificationSent $event): void
    {
        Log::info('Notification: ' . $event->message);
    }
}