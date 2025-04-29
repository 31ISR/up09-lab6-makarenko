<x-layout>
    <div class="todo-container">
        <h1>Create new todo</h1>
        <form action="{{ route('todo.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Task name" value="{{ old('name') }}" required>
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror
            <input type="hidden" name="done" value="0">
            <label><input type="checkbox" name="done" value="1" {{ old('done') ? 'checked' : '' }}> Done</label>
            @error('done')
                <span class="error">{{ $message }}</span>
            @enderror
            <input type="hidden" name="urgent" value="0">
            <label><input type="checkbox" name="urgent" value="1" {{ old('urgent') ? 'checked' : '' }}> Urgent</label>
            @error('urgent')
                <span class="error">{{ $message }}</span>
            @enderror
            <div>
                <a href="{{ route('todo.index') }}">Cancel</a>
                <button type="submit">Submit</button>
            </div>
        </form>
        <!-- @session('message')
            <div class="success-message">
                {{ session('message') }}
            </div>
        @endsession -->
    </div>
</x-layout>