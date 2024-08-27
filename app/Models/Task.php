<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Task extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo('user');
    }

    public function project(Project $project)
    {
        $project->tasks()->attach($this);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function getContentPreviewAttribute()
    {
        return Str::limit($this->content, 310);
    }
}
