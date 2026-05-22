<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::latest()->get();

        return view(
            'attendance.index',
            compact('attendances')
        );
    }

    public function create()
    {
        $users = User::all();

        return view(
            'attendance.create',
            compact('users')
        );
    }

    public function store(Request $request)
    {
        Attendance::create($request->all());

        return redirect('/attendance')
            ->with('success', 'Attendance Added');
    }
}