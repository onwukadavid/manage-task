<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

use function Termwind\render;

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
        Task::create($validated);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        # get task
        $taskObj = Task::where('id',$task->id)->first();
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
        $taskObj = Task::where('id',$task->id)->first();
        $data = ['task'=>$taskObj];

        # pass it to the view
        return view('task.edit', data:$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task = Task::where('id', $task->id)->first();
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
        $task = Task::where('id', $task->id)->first();
        $task->delete();
        return redirect('/');
    }
}
