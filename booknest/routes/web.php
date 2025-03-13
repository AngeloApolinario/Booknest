<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/about', function () {
    return view('about');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/borrow/{bookId}', [BorrowController::class, 'borrow'])->name('borrow.book');
    Route::post('/return/{borrowId}', [BorrowController::class, 'returnBook'])->name('return.book');

    Route::get('/books', [BookController::class, 'index'])->name('books.index');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login']);
    });

    Route::middleware('auth:admin')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        Route::get('/dashboard', [BookController::class, 'adminDashboard'])->name('dashboard');

        Route::resource('/books', BookController::class)->except(['show']);
        Route::get('/books', [BookController::class, 'adminIndex'])->name('books.index');
        Route::get('/books-borrow', [BorrowController::class, 'booksBorrow'])
            ->name('books-borrow');
        Route::get('/manage-users', [AdminAuthController::class, 'manageUsers'])->name('manage-users');
    });
});

require __DIR__ . '/auth.php';
