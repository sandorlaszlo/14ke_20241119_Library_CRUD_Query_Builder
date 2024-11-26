<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = DB::table('books')
            ->join('categories', 'books.category_id', '=', 'categories.id')
            ->select('books.*', 'categories.name as category_name')
            ->get();
        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('books.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        // dd($request->all());
        if (DB::table('books')->insert([
            'title' => $request->title,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'published_year' => $request->published_year,
            'price' => $request->price,
            'created_at' => now(),
        ])) {
            return redirect()->route('books.index')->with('success', 'Book created successfully.');
        }
        // return redirect()->route('books.create');   
        return redirect()->back()->with('error', 'Book creation failed.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = DB::table('books')
            ->join('categories', 'books.category_id', '=', 'categories.id')
            ->select('books.*', 'categories.name as category_name')
            ->where('books.id', '=', $id)
            ->first();
        return view('books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = DB::table('books')->where('id', $id)->first();
        if (!$book) {
            return redirect()->route('books.index')->with('error', 'Book not found.');
        }
        $categories = DB::table('categories')->get();
        return view('books.edit', ['book' => $book, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBookRequest $request, string $id)
    {
        if (DB::table('books')->update([
            'title' => $request->title,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'published_year' => $request->published_year,
            'price' => $request->price,
            'updated_at' => now()
        ])) {
            return redirect()->route('books.show', $id)->with('success', 'Book updated successfully.');
        }
        return redirect()->back()->with('error', 'Book update failed.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (DB::table('books')->where('id', $id)->delete()) {
            return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
        } else {
            return redirect()->route('books.index')->with('error', 'Book not found');
        }
    }
}
