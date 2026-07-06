<?php

namespace App\Services;

use App\Models\Company;
use App\Models\Project;
use App\Models\Employee;

class BillingService
{
    /**
     * Check if company can create a new project
     */
    public function canCreateProject(Company $company)
    {
        return Project::where(
            'company_id',
            $company->id
        )->count() < $company->max_projects;
    }

    /**
     * Check if company can create a new employee
     */
    public function canCreateEmployee(Company $company)
    {
        return Employee::where(
            'company_id',
            $company->id
        )->count() < $company->max_users;
    }

    /**
     * Get company subscription details
     */
    public function getSubscriptionDetails(Company $company)
    {
        return [
            'plan' => $company->subscription_plan,
            'max_projects' => $company->max_projects,
            'max_users' => $company->max_users,
            'expiry_date' => $company->subscription_expiry,
            'storage_limit' => $company->storage_limit,
            'status' => $company->subscription_status,
        ];
    }
}