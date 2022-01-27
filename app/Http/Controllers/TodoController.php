<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $td = Todo::latest()->paginate(5);
        return view('todo.index', compact('td'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('todo.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required', 'des' => 'required',]);
        echo implode(" ", $request->all());
        Todo::create($request->all());
        return redirect()->route('todo.index')->with('success', 'ToDo created succesfully');
    }
    public function show(Todo $todo)
    {
        return view('todo.show', compact('todo'));
    }
    public function edit(Todo $todo)
    {
        return view('todo.edit', compact('todo'));
    }
    public function update(Request $request, Todo $todo)
    {
        $request->validate(['title' => 'required', 'des' => 'required',]);
        $todo->update($request->all());
        return redirect()->route('todo.index')->with('success', 'ToDo updated successfully');
    }
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todo.index')->with('success', 'Blogs deleted successfully');
    }
}
