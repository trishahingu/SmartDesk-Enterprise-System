<?php

namespace App\Services;

use App\Models\Company;
use App\Models\Project;
use App\Models\ActivityLog;
use App\Events\ProjectCreated;
use Illuminate\Support\Facades\Auth;

class ProjectService
{
    public function getProjects()
    {
        return Project::where(
            'company_id',
            Auth::user()->company_id
        )->get();
    }

    public function createProject(array $data)
    {
        $company = Company::find(Auth::user()->company_id);

        $projectCount = Project::where(
            'company_id',
            Auth::user()->company_id
        )->count();

        if ($company && $projectCount >= $company->max_projects) {
            return [
                'status' => false,
                'message' => 'Project limit reached. Please upgrade your plan.'
            ];
        }

        $project = Project::create([
            'company_id' => Auth::user()->company_id,
            'title' => $data['title'],
            'description' => $data['description'],
        ]);
        $project = Project::create([
    'company_id' => Auth::user()->company_id,
    'title' => $data['title'],
    'description' => $data['description'],
]);

event(new ProjectCreated($project));

return [
    'status' => true,
    'project' => $project,
];
       
    
        
    }
}