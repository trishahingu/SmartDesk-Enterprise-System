<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ActivityLog;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index(Request $request)
{
    $search = $request->search;

  $employees = Employee::where(
        'company_id',
        auth()->user()->company_id
    )
    ->where(function ($query) use ($search) {

        $query->where('name', 'LIKE', "%$search%")
              ->orWhere('email', 'LIKE', "%$search%")
              ->orWhere('department', 'LIKE', "%$search%");

    })
    ->paginate(5);
    return view('employees.index', compact('employees'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    
    
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|min:3',
        'email' => 'required|email',
        'phone' => 'required|numeric|digits:10',
        'department' => 'required'
    ]);

    $company = Company::find(
        Auth::user()->company_id
    );

    $employeeCount = Employee::where(
        'company_id',
        Auth::user()->company_id
    )->count();

    if ($company && $employeeCount >= $company->max_users) {

        return redirect()
            ->back()
            ->with(
                'error',
                'Employee limit reached. Please upgrade your plan.'
            );
    }

    Employee::create([
        'company_id' => Auth::user()->company_id,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'department' => $request->department,
    ]);
ActivityLog::create([
    'user_id' => auth()->id(),
    'activity' => 'Created Employee: ' . $request->name
]);
    return redirect('/employees')
        ->with('success', 'Employee added successfully');
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
{
    return view('employees.edit', compact('employee'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
{
$request->validate([
    'name' => 'required|min:3',
    'email' => 'required|email',
    'phone' => 'required|numeric|digits:10',
    'department' => 'required'
]);
    $employee->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'department' => $request->department,
    ]);
ActivityLog::create([
    'user_id' => auth()->id(),
    'activity' => 'Updated Employee: ' . $employee->name
]);
    return redirect('/employees');
}

    /**
     * Remove the specified resource from storage.
     */
public function destroy(Employee $employee)
{
    ActivityLog::create([
        'user_id' => auth()->id(),
        'activity' => 'Deleted Employee: ' . $employee->name
    ]);

    $employee->delete();

    return redirect('/employees');
}
}
