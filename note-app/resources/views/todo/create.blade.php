<x-layout>
    <div class="todo-container">
        <h1>Create new todo</h1>
        <form action="{{ route('todo.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Task name" value="{{ old('name') }}" required>
            <label><input type="checkbox" name="done" {{ old('done') ? 'checked' : '' }}> Done</label>
            <label><input type="checkbox" name="urgent" {{ old('urgent') ? 'checked' : '' }}> Urgent</label>
            <div>
                <a href="{{ route('todo.index') }}">Cancel</a>
                <button>Submit</button>
            </div>
        </form>
    </div>
</x-layout>