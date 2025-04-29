<x-app-layout>
    <div class="note-container">
        <div>
            <h1>Note: {{ $note->created_at }}</h1>
            <div class="note-actions">
                <a href="{{ route('note.edit', $note) }}">Edit</a>
                <form action="{{ route('note.destroy', $note) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
        </div>
        <div class="note-content">
            {{ $note->note }}
        </div>
    </div>
</x-app-layout>