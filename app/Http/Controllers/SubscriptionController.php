<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function index()
    {
        $company = Company::find(
            Auth::user()->company_id
        );

        return view(
            'subscriptions.index',
            compact('company')
        );
    }

    public function upgrade($plan)
    {
        $company = Company::find(
            Auth::user()->company_id
        );

        if (!$company) {
            return redirect()
                ->back()
                ->with('error', 'Company not found');
        }

        if ($plan == 'pro') {

            $company->update([
                'plan_type' => 'Pro',
                'max_users' => 50,
                'max_projects' => 100,
                'storage_limit' => 5000,
                'subscription_status' => 'Active'
            ]);

        } elseif ($plan == 'enterprise') {

            $company->update([
                'plan_type' => 'Enterprise',
                'max_users' => 999999,
                'max_projects' => 999999,
                'storage_limit' => 999999,
                'subscription_status' => 'Active'
            ]);
        }

        return redirect('/subscriptions')
            ->with('success', 'Plan upgraded successfully');
    }
}