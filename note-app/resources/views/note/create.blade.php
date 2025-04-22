<x-layout>
    <div class="note-container">
        <h1>Create new note</h1>
        <form method="POST" action="{{ route('note.store') }}" >
            @csrf
            <textarea name="note" rows="10" placeholder="Enter your note here">{{ old('note') }}</textarea>
            <div>
                <a href="{{ route('note.index') }}">Cancel</a>
                <button>Submit</button>
            </div>
        </form>
    </div>
</x-layout>