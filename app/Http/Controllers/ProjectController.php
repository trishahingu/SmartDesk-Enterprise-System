<?php

namespace App\Http\Controllers;
use App\Services\ProjectService;
use App\Services\BillingService;
use App\Models\Company;
use App\Models\ActivityLog;
use App\Models\Project;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class ProjectController extends Controller
{
    protected $projectService;
    protected $billingService;

    public function __construct(ProjectService $projectService, BillingService $billingService)
    {
        $this->projectService = $projectService;
        $this->billingService = $billingService;
    }
    
    public function index()
{
    $projects = $this->projectService->getProjects();

    return view('projects.index', compact('projects'));
}

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
    ]);
   
    $company = Company::find(Auth::user()->company_id);

if (!$company) {
    return redirect()->back()->with(
        'error',
        'Company not found.'
    );
}

if (!$this->billingService->canCreateProject($company)) {
    return redirect()->back()->with(
        'error',
        'Project limit reached. Please upgrade your plan.'
    );
}

    $result = $this->projectService->createProject(
        $request->only('title', 'description')
    );

    if (!$result['status']) {
        return redirect()->back()->with('error', $result['message']);
    }

    return redirect('/projects')
        ->with('success', 'Project created successfully');
}
}