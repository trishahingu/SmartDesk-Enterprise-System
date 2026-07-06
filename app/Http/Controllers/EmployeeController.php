<?php

namespace App\Http\Controllers;
use App\Services\BillingService;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\EmployeeService;
use App\Models\ActivityLog;

class EmployeeController extends Controller
{
    protected $billingService;

public function __construct(
    EmployeeService $employeeService,
    BillingService $billingService
) {
    $this->employeeService = $employeeService;
    $this->billingService = $billingService;
}
    protected $employeeService;

    
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $employees = $this->employeeService->getEmployees(
        $request->search
    );
    $company = Company::find(Auth::user()->company_id);

if (!$this->billingService->canCreateEmployee($company)) {
    return redirect()->back()->with(
        'error',
        'Employee limit reached. Please upgrade your plan.'
    );
}

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
    $result = $this->employeeService->createEmployee(
    $request->only(
        'name',
        'email',
        'phone',
        'department'
    )
);

if (!$result['status']) {
    return redirect()->back()->with('error', $result['message']);
}

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
    $this->employeeService->updateEmployee(
    $employee,
    $request->only(
        'name',
        'email',
        'phone',
        'department'
    )
);

return redirect('/employees');
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
