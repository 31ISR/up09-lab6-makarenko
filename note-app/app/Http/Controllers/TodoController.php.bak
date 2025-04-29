<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::query()->orderBy('created_at', 'desc')->paginate();
        return view('todo.index', ['todos' => $todos]);
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'done' => ['nullable', 'boolean'],
            'urgent' => ['nullable', 'boolean'],
        ]);

        $data['done'] = $data['done'] ?? false;
        $data['urgent'] = $data['urgent'] ?? false;
        $data['user_id'] = 1;
        $data['date_completed'] = $data['done'] ? now() : null;

        $todo = Todo::create($data);

        return to_route('todo.show', $todo)->with('message', 'Task was created');
    }

    public function show(Todo $todo)
    {
        return view('todo.show', ['todo' => $todo]);
    }

    public function edit(Todo $todo)
    {
        if (!$todo->exists) {
            abort(404, 'Задача не найдена');
        }
        return view('todo.edit', ['todo' => $todo]);
    }

    public function update(Request $request, Todo $todo)
    {
        if (!$todo->exists) {
            abort(404, 'Задача не найдена');
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'done' => ['sometimes', 'boolean'],
            'urgent' => ['sometimes', 'boolean'],
        ]);

        $data['done'] = $data['done'] ?? false;
        $data['urgent'] = $data['urgent'] ?? false;
        $data['date_completed'] = $data['done'] ? now() : null;

        $todo->update($data);

        return to_route('todo.show', $todo)->with('message', 'Task was updated');
    }

    public function destroy(Todo $todo)
    {
        if (!$todo->exists) {
            abort(404, 'Задача не найдена');
        }

        $todo->delete();

        return to_route('todo.index')->with('message', 'Task was deleted');
    }
}