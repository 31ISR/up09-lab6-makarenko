<x-layout>
    <div class="todo-container">
        <h1>Edit todo: {{ $todo->name }}</h1>
        <form action="{{ route('todo.update', $todo) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="name" value="{{ $todo->name }}" placeholder="Task name" required>
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror
            <input type="hidden" name="done" value="0">
            <label><input type="checkbox" name="done" value="1" {{ $todo->done ? 'checked' : '' }}> Done</label>
            @error('done')
                <span class="error">{{ $message }}</span>
            @enderror
            <input type="hidden" name="urgent" value="0">
            <label><input type="checkbox" name="urgent" value="1" {{ $todo->urgent ? 'checked' : '' }}> Urgent</label>
            @error('urgent')
                <span class="error">{{ $message }}</span>
            @enderror
            <div>
                <a href="{{ route('todo.index') }}">Cancel</a>
                <button>Submit</button>
            </div>
        </form>

    </div>
</x-layout>