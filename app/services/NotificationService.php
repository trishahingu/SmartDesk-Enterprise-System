<?php

namespace App\Services;

use App\Jobs\SendTaskAssignedEmail;
use App\Models\User;

class NotificationService
{
    public function sendTaskAssignmentNotification($task, $userId)
    {
        $user = User::find($userId);

        if ($user) {
            SendTaskAssignedEmail::dispatch(
                $task,
                $user->email
            );
        }
    }
}