<x-app-layout>
    <div class="todo-container">
        <div>
            <h1>Task: {{ $todo->name }}</h1>
            <div class="todo-actions">
                <a href="{{ route('todo.edit', $todo) }}">Edit</a>
                <form action="{{ route('todo.destroy', $todo) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
        </div>
        <div class="todo-details">
            <p>Done: <span class="status {{ $todo->done ? 'done' : '' }}">{{ $todo->done ? 'Yes' : 'No' }}</span></p>
            <p>Urgent: <span class="urgent {{ $todo->urgent ? 'urgent-on' : '' }}">{{ $todo->urgent ? 'Yes' : 'No' }}</span></p>
            <p>Completed: {{ $todo->date_completed ?? 'Not completed' }}</p>
        </div>
        <!-- @session('message')
            <div class="success-message">
                {{ session('message') }}
            </div>
        @endsession -->
    </div>
</x-app-layout>