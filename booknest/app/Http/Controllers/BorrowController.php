<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    public function borrow(Request $request, $bookId)
    {
        $book = Book::findOrFail($bookId);

        if ($book->copies_available < 1) {
            return back()->with('error', 'No copies available for borrowing.');
        }


        Borrow::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'borrowed_at' => now(),
            'due_date' => now()->addDays(14),
        ]);


        $book->decrement('copies_available');

        return back()->with('success', 'Book borrowed successfully.');
    }

    public function returnBook(Request $request, $borrowId)
    {
        $borrow = Borrow::findOrFail($borrowId);

        if ($borrow->returned_at) {
            return back()->with('error', 'Book already returned.');
        }


        $borrow->update([
            'returned_at' => now(),
        ]);


        $borrow->book->increment('copies_available');

        return back()->with('success', 'Book returned successfully.');
    }
}
