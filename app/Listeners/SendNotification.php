<?php

namespace App\Listeners;

use App\Events\NotificationSent;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotification implements ShouldQueue
{
    use InteractsWithQueue;
      public function handle(NotificationSent $event): void
    {
        Log::info('Notification: ' . $event->message);
    }
}