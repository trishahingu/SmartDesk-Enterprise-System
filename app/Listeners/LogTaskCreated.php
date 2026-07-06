<?php

namespace App\Listeners;

use App\Events\TaskCreated;
use App\Models\ActivityLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
class LogTaskCreated implements ShouldQueue
{
    use InteractsWithQueue;

   public function handle(TaskCreated $event): void
    {
        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity' => 'Created Task: ' . $event->task->title,
        ]);
    }
}
