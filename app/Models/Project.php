<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Project extends Model
{
    protected $fillable = [
        'company_id',
        'title',
        'description',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}