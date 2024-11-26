<x-layout>
    <x-slot name="title">Add new book</x-slot>

    <form method="POST" action="{{ route('books.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" 
                value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control @error('author') is-invalid @enderror" id="author"
                name="author" value="{{ old('author') }}">
            @error('author')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>

        <div class="mb-3">
            <label for="published_year" class="form-label">Published year</label>
            <input type="number" class="form-control @error('published_year') is-invalid @enderror" id="published_year"
                name="published_year" value="{{ old('published_year') }}">
            @error('published_year')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                name="price" value="{{ old('price') }}">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}"
                        @if (old('category_id') == $category->id)
                            selected
                        @endif
                        >{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-layout>
