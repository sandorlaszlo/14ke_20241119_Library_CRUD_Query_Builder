<x-layout>
    <x-slot name="title">{{ $book->title }}</x-slot>

    <div class="card h-100">
        <div class="card-body">
            <h5 class="card-title"><b>Author:</b> {{ $book->author }}</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Published:</b> {{ $book->published_year }}</li>
            <li class="list-group-item"><b>Price:</b> {{ $book->price }}</li>
            <li class="list-group-item"><b>Category:</b> {{ $book->category_name }}</li>
            <li class="list-group-item"><b>Created at:</b> {{ $book->created_at }}</li>
            <li class="list-group-item"><b>Updated at:</b> {{ $book->updated_at }}</li>

        </ul>
        <div class="card-body">
            <a href="{{ route('books.index') }}" class="btn btn-primary btn-sm">Back</a>
            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('books.destroy', $book->id) }}" class="d-inline" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </div>
    </div>
</x-layout>
