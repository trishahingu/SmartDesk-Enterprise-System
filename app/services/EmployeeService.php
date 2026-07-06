<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\Company;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class EmployeeService
{
    public function getEmployees($search = '')
    {
        return Employee::where('company_id', Auth::user()->company_id)
            ->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                      ->orWhere('email', 'LIKE', "%$search%")
                      ->orWhere('department', 'LIKE', "%$search%");
            })
            ->paginate(5);
    }

    public function createEmployee(array $data)
    {
        $company = Company::find(Auth::user()->company_id);

        $employeeCount = Employee::where(
            'company_id',
            Auth::user()->company_id
        )->count();

        if ($company && $employeeCount >= $company->max_users) {
            return [
                'status' => false,
                'message' => 'Employee limit reached. Please upgrade your plan.'
            ];
        }

        $employee = Employee::create([
            'company_id' => Auth::user()->company_id,
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'department' => $data['department'],
        ]);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity' => 'Created Employee: ' . $employee->name,
        ]);

        return [
            'status' => true,
            'employee' => $employee,
        ];
    }

    public function updateEmployee(Employee $employee, array $data)
    {
        $employee->update($data);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity' => 'Updated Employee: ' . $employee->name,
        ]);
    }

    public function deleteEmployee(Employee $employee)
    {
        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity' => 'Deleted Employee: ' . $employee->name,
        ]);

        $employee->delete();
    }
}