<?php

namespace App\Listeners;

use App\Events\ProjectCreated;
use App\Models\ActivityLog;

class UpdateProjectStatus
{
    public function handle(ProjectCreated $event): void
    {
        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity' => 'Project Created: ' . $event->project->title,
        ]);
    }
}