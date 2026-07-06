<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Project;
use App\Models\Employee;

class Company extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',

        'subscription_plan',
        'subscription_expiry',

        'plan_type',
        'max_users',
        'max_projects',
        'storage_limit',
        'subscription_status'
    ];

    /**
     * Company has many Users
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Company has many Projects
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Company has many Employees
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}