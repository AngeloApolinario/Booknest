<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();
        $totalBorrows = Borrow::count();
        $totalAdmins = Admin::count();
        $recentBorrows = Borrow::latest()->with('book', 'user')->take(5)->get();

        return view('admin.dashboard', compact('totalBooks', 'totalBorrows', 'totalAdmins', 'recentBorrows'));
    }
}
