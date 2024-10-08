<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function Termwind\render;


/**
 * TODO: ADD Gate or policy check to all methods 
 * TODO: Fix migration always returning duplicate error when run once
 */
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $tasks = Task::where('user_id',$user->id)->doesntHave('projects')->get();
        return view('task.index', ['tasks'=>$tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated =$request->validate([
            'title'=>['required', 'min:3', 'max:255'],
            'content'=>['required', 'min:10'],
            'status'=>['required'],
            'priority'=>['required'],
        ]);
        $validated['user_id'] = $request->user()->id; # change to reflect logged in user
        $validated['slug'] = Str::slug($validated['title']);
        Task::create($validated);
        return redirect('/')->with('message', 'Task created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        # get task
        $taskObj = Task::where('slug',$task->slug)->first();
        $data = ['task'=>$taskObj];

        # diaplay task
        return view('task.show', data:$data);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        # get the task object
        $taskObj = Task::where('slug',$task->slug)->first();
        $data = ['task'=>$taskObj];

        # pass it to the view
        return view('task.edit', data:$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task = Task::where('slug', $task->slug)->first();
        $validated =$request->validate([
            'title'=>['required', 'min:3', 'max:255'],
            'content'=>['required', 'min:10'],
            'status'=>['required'],
            'priority'=>['required'],
        ]);
        $validated['user_id'] = 1;
        $task->update($validated);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task = Task::where('slug', $task->slug)->first();
        $taskProject = $task->projects;

        $task->delete();

        if($taskProject->isNotEmpty()){
            return redirect(route('show-project', [$taskProject[0]->id])); # switch to name
        }

        return redirect('/')->with('message', 'Task deleted successfully');
    }
}
