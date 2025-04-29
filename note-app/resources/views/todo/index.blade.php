<x-app-layout>
    <div class="todo-container">
        <a href="{{ route('todo.create') }}">New Todo</a>
        <div class="todo-list">
            @foreach ($todos as $todo)
                <div class="todo-item">
                    <div class="todo-content">
                        {{ Str::words($todo->name, 30) }}
                        <span class="status {{ $todo->done ? 'done' : '' }}">{{ $todo->done ? '✓' : '✗' }}</span>
                        <span class="urgent {{ $todo->urgent ? 'urgent-on' : '' }}">{{ $todo->urgent ? '!' : '' }}</span>
                    </div>
                    <div class="todo-actions">
                        <a href="{{ route('todo.show', $todo) }}">View</a>
                        <a href="{{ route('todo.edit', $todo) }}">Edit</a>
                        <form action="{{ route('todo.destroy', $todo) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button>Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
            <div class="pagination">
                @if ($todos->onFirstPage())
                    <span class="disabled">←</span>
                @else
                    <a href="{{ $todos->previousPageUrl() }}" class="prev">←</a>
                @endif
                <span class="current">{{ $todos->currentPage() }} / {{ $todos->lastPage() }}</span>
                @if ($todos->hasMorePages())
                    <a href="{{ $todos->nextPageUrl() }}" class="next">→</a>
                @else
                    <span class="disabled">→</span>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>