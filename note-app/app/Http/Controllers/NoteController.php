<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Показать список заметок пользователя.
     */
    public function index()
    {
        $notes = Note::query()
            ->where('user_id', request()->user()->id) 
            ->orderBy('created_at', 'desc')           
            ->paginate(10);                          
        return view('note.index', ['notes' => $notes]);
    }

    /**
     * Показать форму для создания новой заметки.
     */
    public function create()
    {
        return view('note.create');
    }

    /**
     * Сохранить новую заметку.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $data['user_id'] = $request->user()->id;

        $note = Note::create($data);

        return redirect()->route('note.show', $note);
    }

    /**
     * Показать конкретную заметку.
     */
    public function show(Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403, 'У вас нет прав на просмотр этой заметки');
        }
        return view('note.show', ['note' => $note]);
    }

    /**
     * Показать форму для редактирования заметки.
     */
    public function edit(Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403, 'У вас нет прав на редактирование этой заметки');
        }
        return view('note.edit', ['note' => $note]);
    }

    /**
     * Обновить заметку.
     */
    public function update(Request $request, Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403, 'У вас нет прав на редактирование этой заметки');
        }

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $note->update($data);

        return redirect()->route('note.show', $note);
    }

    /**
     * Удалить заметку.
     */
    public function destroy(Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403, 'У вас нет прав на удаление этой заметки');
        }

        $note->delete();

        return redirect()->route('note.index');
    }
}