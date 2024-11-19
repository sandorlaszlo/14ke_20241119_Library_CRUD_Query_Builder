<x-layout>
    <h1>Books</h1>

    <div class="row">
        @foreach ($books as $book)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <h5 class="card-header">{{ $book->title }}</h5>
                    <div class="card-body">
                        <h5 class="card-title"><b>Author:</b> {{ $book->author }}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Published:</b> {{ $book->published_year }}</li>
                        <li class="list-group-item"><b>Price:</b> {{ $book->price }}</li>
                        <li class="list-group-item"><b>Category:</b> {{ $book->category_name }}</li>
                    </ul>
                    <div class="card-body">
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary btn-sm">Details</a>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
