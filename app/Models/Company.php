<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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

    public function users()
    {
        return $this->hasMany(User::class);
    }
}