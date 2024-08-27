<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getDescriptionPreviewAttribute()
    {
        return Str::limit($this->description, 150);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function collaborators()
    {
        return $this->belongsToMany(User::class);
    }

    public function collaborator(User $user)
    {
        $this->collaborators()->attach($user);
    }
}
