<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


/**
 * TODO: ADD Gate or policy check to all methods 
 * TODO: Fix migration always returning duplicate error when run once
 */
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(Gate::denies('is-subscribed')){
            return view('pricing');
        }

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
        $validated['slug'] = Str::slug($validated['title']);
        # create Project object
        $project = Project::create($validated);

        # return to the particular project view
        return redirect(route('show-project', [$project->slug]))->with('message', 'Project created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Project $project)
    {
        $user = $request->user();
        $projects = Project::where('owner_id',$user->id)->get();
        return view('project.show', ['project'=>$project, 'projects'=>$projects]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        // get the project

        // return the page with the edit form passed to it
        $data = ['project'=>$project];

        # pass it to the view
        return view('project.edit', data:$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title'=>['required', 'min:3', 'max:255'],
            'description'=>['required', 'min:10'],
            'search' => 'nullable'
        ]);
        
        $collaborator = $validated['search'];
        if($collaborator){
            $user = User::where('email', $validated['search'])->first();
            $project->collaborator($user);
        }

        $project->update(Arr::except($validated, 'search'));
        return redirect(route('show-project', [$project->slug]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // dd($project);
        // foreach($project->tasks as $task)
        // {
        //     $task->delete();
        // }
        // $project->tasks->map->delete();
        Task::whereIn('id', $project->tasks->pluck('id'))->delete();
        $project->delete();
        return redirect(route('project'))->with('message', 'Project deleted successfully');
    }
    
    public function createTask(Request $request, Project $project)
    {
        
        return view('project.create-task', ['project'=>$project]);
    }

    /**
     * TODO: Fix bug; when task is created for a particular project, it also adisplays on normal task page
     * TODO: Duplicate entries should not be allowed - Not fixed
     */
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
        $validated['slug'] = Str::slug($validated['title']);
        $task = $request->user()->tasks()->create(Arr::except($validated, 'projects'));
        $task->project($project);
        return redirect(route('show-project', [$project]))->with('message', 'Task created successfully');
    }

    // public function pay(Request $request)
    // {
    //     $user = User::find($request->user()->id);
    //     $user->is_subscribed = True;
    //     $user->save();
    //     // dd($user->is_subscribed);
    //     return redirect('/');
    // }

    public function searchUser(Request $request)
    {
        $query = $request->get('query');
    
        $users = User::where('email', 'LIKE', "%{$query}%")->get();
    
        return response()->json($users);
    }
}
