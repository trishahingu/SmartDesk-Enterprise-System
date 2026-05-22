<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;

class ActivityLogController extends Controller
{
    public function index()
    {
        $logs = ActivityLog::latest()->get();

        return view(
            'activity_logs.index',
            compact('logs')
        );
    }
}