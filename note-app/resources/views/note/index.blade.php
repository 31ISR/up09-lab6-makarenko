<x-layout>
    <div class="note-container">
        <a href="{{ route('note.create') }}">New Note</a>
        <div class="note-list">
            @foreach ($notes as $note)
                <div class="note-item">
                    <div class="note-content">
                        {{ Str::words($note->note, 30) }}
                    </div>
                    <div class="note-actions">
                        <a href="{{ route('note.show', $note) }}">View</a>
                        <a href="{{ route('note.edit', $note) }}">Edit</a>
                        <form action="{{ route('note.destroy', $note) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button>Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
            <div class="pagination">
                @if ($notes->onFirstPage())
                    <span class="disabled">←</span>
                @else
                    <a href="{{ $notes->previousPageUrl() }}" class="prev">←</a>
                @endif
                <span class="current">{{ $notes->currentPage() }} / {{ $notes->lastPage() }}</span>
                @if ($notes->hasMorePages())
                    <a href="{{ $notes->nextPageUrl() }}" class="next">→</a>
                @else
                    <span class="disabled">→</span>
                @endif
            </div>
        </div>
    </div>
</x-layout>