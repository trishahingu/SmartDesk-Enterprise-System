<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = ActivityLog::latest()->paginate(20);

        return view('activity.index', compact('activities'));
    }
}