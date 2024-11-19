<?php

namespace App\Http\Controllers;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (DB::table('books')->where('id', $id)->delete())
        {
            return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
        }
        else
        {
            return redirect()->route('books.index')->with('error', 'Book not found');
        }
    }
}
