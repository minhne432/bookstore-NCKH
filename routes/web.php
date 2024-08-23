<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\BookshopHomeController;
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

Route::get('/', [BookshopHomeController::class, 'index']);
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
