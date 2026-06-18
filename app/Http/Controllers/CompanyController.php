<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::latest()->get();

        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'admin_name' => 'required',
        'admin_email' => 'required|email|unique:users,email',
        'password' => 'required|min:6'
    ]);

    $company = Company::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'subscription_plan' => 'Free'
    ]);

    User::create([
        'company_id' => $company->id,
        'name' => $request->admin_name,
        'email' => $request->admin_email,
        'password' => Hash::make($request->password)
    ]);

    return redirect('/companies')
        ->with('success', 'Company & Admin Created Successfully');

      
}
}