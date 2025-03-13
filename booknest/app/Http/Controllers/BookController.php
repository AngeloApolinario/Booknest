<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Admin;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        $books = Book::when($query, function ($q) use ($query) {
            $q->where('title', 'like', "%{$query}%")
                ->orWhere('author', 'like', "%{$query}%")
                ->orWhere('isbn', 'like', "%{$query}%");
        })->get();

        return view('books.index', compact('books'));
    }
    public function adminIndex(Request $request)
    {
        $query = $request->input('search');

        $books = Book::when($query, function ($q) use ($query) {
            $q->where('title', 'like', "%{$query}%")
                ->orWhere('author', 'like', "%{$query}%")
                ->orWhere('isbn', 'like', "%{$query}%");
        })->get();

        return view('admin.books.index', compact('books'));
    }





    public function adminDashboard(Request $request)
    {
        $search = $request->input('search');


        $totalBooks = Book::count();
        $totalBorrows = Borrow::count();
        $totalAdmins = Admin::count();


        $recentBorrows = Borrow::with(['book', 'user'])
            ->when($search, function ($query) use ($search) {
                $query->whereHas('book', function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%");
                })->orWhereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('totalBooks', 'totalBorrows', 'totalAdmins', 'recentBorrows', 'search'));
    }


    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books,isbn|max:20',
            'description' => 'nullable|string',
            'copies_available' => 'required|integer|min:1',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $book = new Book($request->only(['title', 'author', 'isbn', 'description', 'copies_available']));

        if ($request->hasFile('cover_image')) {
            $book->cover_image = $request->file('cover_image')->store('books', 'public');
        }

        $book->save();

        return redirect()->route('admin.books.index')->with('success', 'Book added successfully!');
    }

    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => "required|string|max:20|unique:books,isbn,{$book->id}",
            'description' => 'nullable|string',
            'copies_available' => 'required|integer|min:1',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $book->update($request->only(['title', 'author', 'isbn', 'description', 'copies_available']));

        if ($request->hasFile('cover_image')) {
            $book->cover_image = $request->file('cover_image')->store('books', 'public');
        }

        return redirect()->route('admin.books.index')->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Book deleted successfully!');
    }
}
