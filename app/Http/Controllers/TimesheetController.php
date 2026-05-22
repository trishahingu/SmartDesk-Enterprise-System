<?php

namespace App\Http\Controllers;

use App\Models\Timesheet;
use App\Models\User;
use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    public function index()
    {
        $timesheets = Timesheet::latest()->get();

        return view(
            'timesheets.index',
            compact('timesheets')
        );
    }

    public function create()
    {
        $users = User::all();

        return view(
            'timesheets.create',
            compact('users')
        );
    }

    public function store(Request $request)
    {
        $clockIn = strtotime($request->clock_in);

        $clockOut = strtotime($request->clock_out);

        $hours = ($clockOut - $clockIn) / 3600;

        Timesheet::create([

            'user_id' => $request->user_id,

            'work_date' => $request->work_date,

            'clock_in' => $request->clock_in,

            'clock_out' => $request->clock_out,

            'total_hours' => $hours,

            'work_notes' => $request->work_notes

        ]);

        return redirect('/timesheets')
            ->with('success', 'Timesheet Added');
    }
}