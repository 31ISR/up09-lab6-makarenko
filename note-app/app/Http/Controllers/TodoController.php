<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::query()->orderBy('created_at', 'desc')->paginate();
        return view('todo.index', ['todos' => $todos]);
    }
    
    public function create()
    {
        return view('todo.create');
    }
    
    public function show(Todo $todo)
    {
        return view('todo.show', ['todo' => $todo]);
    }
    
    public function edit(Todo $todo)
    {
        return view('todo.edit', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        //
    }
}
