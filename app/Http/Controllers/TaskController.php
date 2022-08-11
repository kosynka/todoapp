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

    public function update(Request $request, Task $tasks)
    {
        $data = Task::find($id);
        $data->task = $request->input('content');
        $data->update();

        return back()->with('status','Task Updated Successfully');
    }

    public function destroy(Task $task)
    {
        $task -> delete();
        
        
        return back();
    }
}
