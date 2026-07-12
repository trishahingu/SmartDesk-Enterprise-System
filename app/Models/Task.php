<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
   protected $fillable = [
    'company_id',
    'title',
    'description',
    'project_id',
    'assigned_to',
    'status',
    'priority',
    'deadline',
    'attachment'
];
    public function comments()
{
    return $this->hasMany(Comment::class);
}

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}