<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('home', compact('tasks'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => 'required|min:1',
        ]);

        Task::create($data);

        return back();
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $data = Task::find($task->id);
        $data->content = $request->input('content');
        $data->update();

        return redirect('/')->with('status', 'Task Updated Successfully');
    }

    public function destroy(Task $task)
    {
        $task -> delete();
        
        
        return back();
    }
}
