<?php

namespace App\Http\Controllers;

use App\Models\ToDoList;
use Illuminate\Http\Request;

class ToDoListController extends Controller
{
    public function index()
    {
        $todolists = ToDoList::all();
        return view('home', compact('todolists'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
            'task' => 'required'
        ]);

        $todolists = ToDoList::create($data);

        return back();
    }

    public function update(Request $request, ToDoList $todolists)
    {
        $data = ToDoList::find($id);
        $data->task = $request->input('task');
        $data->update();

        return back()->with('status','Task Updated Successfully');
    }

    public function destroy(ToDoList $todolist)
    {
        $todolist -> delete();
        
        return back();
    }
}
