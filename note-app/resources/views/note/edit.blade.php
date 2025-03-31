<x-layout>
    <div class="note-container">
        <h1>Edit your note</h1>
        <form action="{{ route('note.update', $note) }}" method="POST">
            @csrf
            @method('PUT')
            <textarea name="note" rows="10" placeholder="Enter your note here">{{ $note->note }}</textarea>
            <div>
                <a href="{{ route('note.index') }}">Cancel</a>
                <button>Submit</button>
            </div>
        </form>
    </div>
</x-layout>