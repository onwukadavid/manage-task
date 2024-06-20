<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $projects = Project::where('owner_id',$user->id)->get();
        return view('project.index', ['projects'=>$projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        # return form to create project
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        # get validated data
        $validated = $request->validate([
            'title'=>['required', 'min:3', 'max:255'],
            'description'=>['required', 'min:10'],
        ]);
        $validated['owner_id'] = $request->user()->id;
        # create Project object
        $project = Project::create($validated);

        # return to the particular project view
        return redirect(route('show-project', [$project->id]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // dd($project->tasks)
        return view('project.show', ['project'=>$project]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
    
    public function createTask(Request $request, Project $project)
    {
        
        return view('project.create-task', ['project'=>$project]);
    }

    public function storeTask(Request $request, Project $project)
    {
        $validated =$request->validate([
            'title'=>['required', 'min:3', 'max:255'],
            'content'=>['required', 'min:10'],
            'status'=>['required'],
            'priority'=>['required'],
            'project' => 'nullable',
        ]);
        $validated['user_id'] = $project->owner->id;
        $task = $project->tasks()->create(Arr::except($validated, 'projects'));
        $task->project($project);
        return redirect(route('show-project', [$project]));
    }
}
