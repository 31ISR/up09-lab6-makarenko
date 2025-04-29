<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Показать список задач пользователя.
     */
    public function index()
    {
        $todos = Todo::query()
            ->where('user_id', request()->user()->id) 
            ->orderBy('created_at', 'desc')           
            ->paginate(10);                           
        return view('todo.index', ['todos' => $todos]);
    }

    /**
     * Показать форму для создания новой задачи.
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Сохранить новую задачу.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'done' => ['required', 'boolean'],
            'urgent' => ['required', 'boolean'],
        ]);

        $data['user_id'] = $request->user()->id;
        $data['date_completed'] = $data['done'] ? now() : null;

        $todo = Todo::create($data);

        return redirect()->route('todo.show', $todo);
    }

    /**
     * Показать конкретную задачу.
     */
    public function show(Todo $todo)
    {
        if ($todo->user_id !== request()->user()->id) {
            abort(403, 'У вас нет прав на просмотр этой задачи');
        }
        return view('todo.show', ['todo' => $todo]);
    }

    /**
     * Показать форму для редактирования задачи.
     */
    public function edit(Todo $todo)
    {
        if ($todo->user_id !== request()->user()->id) {
            abort(403, 'У вас нет прав на редактирование этой задачи');
        }
        return view('todo.edit', ['todo' => $todo]);
    }

    /**
     * Обновить задачу.
     */
    public function update(Request $request, Todo $todo)
    {
        if ($todo->user_id !== request()->user()->id) {
            abort(403, 'У вас нет прав на редактирование этой задачи');
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'done' => ['required', 'boolean'],
            'urgent' => ['required', 'boolean'],
        ]);

        $data['date_completed'] = $data['done'] ? now() : null;

        $todo->update($data);

        return redirect()->route('todo.show', $todo);
    }

    /**
     * Удалить задачу.
     */
    public function destroy(Todo $todo)
    {
        if ($todo->user_id !== request()->user()->id) {
            abort(403, 'У вас нет прав на удаление этой задачи');
        }

        $todo->delete();

        return redirect()->route('todo.index');
    }
}