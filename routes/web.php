<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\BookshopHomeController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BookshopHomeController::class, 'index'])->name('home');
// Route::get('/books', [BookController::class, 'index'])->name('books');
// Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
// Route::get('/about', [AboutController::class, 'index'])->name('about');
// Route::get('/contact', [ContactController::class, 'index'])->name('contact');


Route::get('/details/{isbn13}', [BookshopHomeController::class, 'bookDetails'])->name('book-details');

// web.php
Route::get('import', function () {
    return view('import');
});

Route::post('import', [ImportController::class, 'import']);


Route::get('importBookItem', function () {
    return view('importBookItem');
});

Route::post('importBookItem', [ImportController::class, 'importBookItem']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

