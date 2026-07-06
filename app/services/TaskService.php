<?php

namespace App\Services;

use App\Models\Task;
use App\Models\ActivityLog;
use App\Events\TaskCreated;
use App\Services\NotificationService;

class TaskService
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function getTasks($companyId)
    {
        return Task::where('company_id', $companyId)
            ->latest()
            ->get();
    }

    public function createTask(array $data, $companyId)
    {
        $task = Task::create([
            'company_id' => $companyId,
            'title' => $data['title'],
            'description' => $data['description'],
            'project_id' => $data['project_id'],
            'assigned_to' => $data['assigned_to'],
            'status' => $data['status'],
            'priority' => $data['priority'],
            'deadline' => $data['deadline'],
            'attachment' => $data['attachment'] ?? null,
        ]);

        // Fire Event
        event(new TaskCreated($task));

        // Send Notification
        $this->notificationService->sendTaskAssignmentNotification(
            $task,
            $data['assigned_to']
        );

        return $task;
    }

    public function updateTask(Task $task, array $data)
    {
        $task->update($data);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity' => 'Updated Task: ' . $task->title,
        ]);

        return $task;
    }

    public function deleteTask(Task $task)
    {
        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity' => 'Deleted Task: ' . $task->title,
        ]);

        $task->delete();
    }
}