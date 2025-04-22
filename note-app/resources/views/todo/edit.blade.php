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
            <label><input type="checkbox" name="done" {{ $todo->done ? 'checked' : '' }}> Done</label>
            @error('done')
                <span class="error">{{ $message }}</span>
            @enderror
            <label><input type="checkbox" name="urgent" {{ $todo->urgent ? 'checked' : '' }}> Urgent</label>
            @error('urgent')
                <span class="error">{{ $message }}</span>
            @enderror
            <div>
                <a href="{{ route('todo.index') }}">Cancel</a>
                <button>Submit</button>
            </div>
        </form>
        @session('message')
            <div class="success-message">
                {{ session('message') }}
            </div>
        @endsession
    </div>
</x-layout>