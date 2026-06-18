<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.index');
    }

    public function success(Request $request)
    {
        return redirect('/dashboard')
            ->with('success', 'Subscription Payment Successful');
    }
}