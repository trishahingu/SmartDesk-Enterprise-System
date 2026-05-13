<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index(Request $request)
{
    $search = $request->search;

    $employees = Employee::where('name', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%")
                    ->orWhere('department', 'LIKE', "%$search%")
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
    Employee::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'department' => $request->department,
    ]);

    return redirect('/employees');
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

    return redirect('/employees');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Employee $employee)
{
    $employee->delete();

    return redirect('/employees');
}
}
