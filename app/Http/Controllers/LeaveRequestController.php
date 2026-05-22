<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\User;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    public function index()
    {
        $leaveRequests = LeaveRequest::latest()->get();

        return view(
            'leave_requests.index',
            compact('leaveRequests')
        );
    }

    public function create()
    {
        $users = User::all();

        return view(
            'leave_requests.create',
            compact('users')
        );
    }

    public function store(Request $request)
    {
        LeaveRequest::create($request->all());

        return redirect('/leave-requests')
            ->with('success', 'Leave Request Added');
    }

    public function approve($id)
    {
        $leave = LeaveRequest::find($id);

        $leave->status = 'Approved';

        $leave->save();

        return redirect('/leave-requests')
            ->with('success', 'Leave Approved');
    }

    public function reject($id)
    {
        $leave = LeaveRequest::find($id);

        $leave->status = 'Rejected';

        $leave->save();

        return redirect('/leave-requests')
            ->with('success', 'Leave Rejected');
    }
}