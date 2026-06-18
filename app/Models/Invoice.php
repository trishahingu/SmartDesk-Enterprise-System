<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [

        'company_id',

        'invoice_number',

        'amount',

        'gst',

        'total_amount',

        'billing_date',

        'status'
    ];
}