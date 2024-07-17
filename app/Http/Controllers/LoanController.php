<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Book;

class LoanController extends Controller
{
    /**
     * View all loans
     */
    public function index()
    {
        // Res data
        $res = [];
        $loans = Loan::all();
        // Check all loands obtained
        foreach ($loans as $loan) {
            // Extract book id
            $bookId = $loan->book_id;
            // Search book
            $book = Book::findOrFail($bookId);
            // Upload res
            $res[] = [
                'loan' => $loan,
                'book' => $book,
            ];
        }
        return view('loans.index', compact('res'));
    }

    /**
     * View create loan form
     */
    public function create($book_id)
    {
        $book = Book::findOrFail($book_id);
        return view('loans.create', compact('book'));
    }

    /**
     * Save a new loan
     */
    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'book_id' => 'required|exists:books,id',
            'borrowed_at' => 'required|date',
        ]);
        // Verify if book is available for loaning
        $book = Book::findOrFail($validatedData['book_id']);
        if (!$book->is_available) {
            return redirect()->back()->with('error', 'Book is not available for loan.');
        }
        // Create new loan
        $loan = new Loan();
        $loan->book_id = $validatedData['book_id'];
        $loan->borrowed_at = $validatedData['borrowed_at'];
        $loan->save();
        // Update currect book state
        $book->is_available = false;
        $book->save();

        return redirect()->route('loans.index')->with('success', 'Loan created successfully!');
    }

    /**
     * Edit one loan
     */
    public function edit($id)
    {
        $loan = Loan::findOrFail($id);
        $book = Book::findOrFail($loan->book_id);
        $res = [
            'loan' => $loan,
            'book' => $book
        ];
        return view('loans.return', compact('res'));
    }

    /**
     * Update a loan
     */
    public function update(Request $request, $id)
    {
        // Validating data
        $validatedData = $request->validate([
            'returned_at' => 'nullable|date'
        ]);
        // Extract loan by id
        $loan = Loan::findOrFail($id);
        // Update loan
        $loan->returned_at = $validatedData['returned_at'];
        $loan->save();
        // Update book state
        $book = Book::findOrFail($loan->book_id);
        $book->is_available = true;
        $book->save();
        // Redirect to loans index
        return redirect()->route('loans.index')->with('success', 'Loan updated successfully!');
    }

    // Eliminar un préstamo existente
    public function destroy($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->delete();
        return redirect()->route('loans.index')->with('success', 'Loan deleted successfully!');
    }
}
