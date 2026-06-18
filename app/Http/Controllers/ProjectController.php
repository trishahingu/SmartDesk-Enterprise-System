<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ActivityLog;
class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where(
            'company_id',
            Auth::user()->company_id
        )->get();

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

    $company = Company::find(
        Auth::user()->company_id
    );

    $projectCount = Project::where(
        'company_id',
        Auth::user()->company_id
    )->count();

    if ($company && $projectCount >= $company->max_projects) {

        return redirect()
            ->back()
            ->with(
                'error',
                'Project limit reached. Please upgrade your plan.'
            );
    }

    $project = Project::create([
    'company_id' => Auth::user()->company_id,
    'title' => $request->title,
    'description' => $request->description,
]);

ActivityLog::create([
    'user_id' => auth()->id(),
    'activity' => 'Created Project: ' . $project->title
]);

return redirect('/projects')
    ->with('success', 'Project created successfully');

}
}