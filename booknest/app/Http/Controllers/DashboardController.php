<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $recentBooks = Book::latest()->take(3)->get();
        $borrows = Borrow::where('user_id', Auth::id())->with('book')->get();

        return view('dashboard', compact('borrows', 'recentBooks'));
    }
}
