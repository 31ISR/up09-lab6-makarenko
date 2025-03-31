<x-layout>
    <div class="todo-container">
        <h1>Edit todo: {{ $todo->name }}</h1>
        <form action="{{ route('todo.update', $todo) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="name" value="{{ $todo->name }}" placeholder="Task name" required>
            <label><input type="checkbox" name="done" {{ $todo->done ? 'checked' : '' }}> Done</label>
            <label><input type="checkbox" name="urgent" {{ $todo->urgent ? 'checked' : '' }}> Urgent</label>
            <div>
                <a href="{{ route('todo.index') }}">Cancel</a>
                <button>Submit</button>
            </div>
        </form>
    </div>
</x-layout>