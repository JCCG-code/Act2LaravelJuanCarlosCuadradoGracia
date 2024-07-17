<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('home', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('newBook');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validating data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'published_at' => 'required|date',
        ]);
        // New book instance
        $newBook = new Book();
        $newBook->title = $validatedData['title'];
        $newBook->author = $validatedData['author'];
        $newBook->description = $validatedData['description'];
        $newBook->published_at = $validatedData['published_at'];
        // Saving on database
        $newBook->save();
        // Redirect to home with success message
        return redirect()->route('home')->with('success', 'Book created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return view('editBook', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate data form
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'published_at' => 'required|date',
        ]);
        // Book id exists
        $book = Book::findOrFail($id);
        // Update existing book
        $book->title = $validatedData['title'];
        $book->author = $validatedData['author'];
        $book->description = $validatedData['description'];
        $book->published_at = $validatedData['published_at'];
        $book->save();
        // Redirect to home and with message
        return redirect()->route('home')->with('success', 'Book updated successfully!');
    }
}
