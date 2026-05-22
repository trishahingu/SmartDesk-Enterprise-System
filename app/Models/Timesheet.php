<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    protected $fillable = [

        'user_id',
        'work_date',
        'clock_in',
        'clock_out',
        'total_hours',
        'work_notes'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}