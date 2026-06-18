<?php

namespace App\Jobs;

use App\Mail\TaskAssignedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendTaskAssignedEmail implements ShouldQueue
{
    use Queueable;

    protected $task;
    protected $email;

    public function __construct($task, $email)
    {
        $this->task = $task;
        $this->email = $email;
    }

    public function handle(): void
    {
        Mail::to($this->email)
            ->send(
                new TaskAssignedMail($this->task)
            );
    }
}