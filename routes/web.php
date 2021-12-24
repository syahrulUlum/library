<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// ------------------ Route Catalog -------------------------------
Route::get('/catalogs', [CatalogController::class, 'index'])->name('catalogs');
Route::get('/catalogs/create', [CatalogController::class, 'create'])->name('createCatalogs');
Route::post('/catalogs', [CatalogController::class, 'store'])->name('storeCatalogs');
Route::get('/catalogs/{catalog}/edit', [CatalogController::class, 'edit'])->name('editCatalogs');
Route::put('/catalogs/{catalog}', [CatalogController::class, 'update'])->name('updateCatalogs');
Route::delete('/catalogs/{catalog}', [CatalogController::class, 'destroy'])->name('deleteCatalogs');
// ------------------ End Route Catalog -------------------------------

// ------------------ Route Publisher -------------------------------
Route::resource('/publishers', PublisherController::class, [
    'except' => ['show', 'edit', 'create']
]);
Route::get('/api/publishers', [PublisherController::class, 'api'])->name('publishers.api');
// ------------------ End Route Publisher -------------------------------

// ------------------ Route Author -------------------------------
Route::resource('/authors', AuthorController::class, [
    'except' => ['show', 'edit', 'create']
]);
Route::get('/api/authors', [AuthorController::class, 'api'])->name('authors.api');
// ------------------ End Route Author -------------------------------

// ------------------ Route Member -------------------------------
Route::resource('/members', MemberController::class, [
    'except' => ['show', 'edit', 'create']
]);
Route::get('/api/members', [MemberController::class, 'api'])->name('members.api');
Route::get('/test_spatie', [MemberController::class, 'test_spatie']);
// ------------------ End Route Member -------------------------------

// ------------------ Route Book -------------------------------
Route::resource('/books', BookController::class, [
    'except' => ['show', 'edit', 'create']
]);
Route::get('/api/books', [BookController::class, 'api'])->name('books.api');
// ------------------ End Route Book -------------------------------

// ------------------ Route Loan -------------------------------
Route::resource('/loans', TransactionController::class, [
    'except' => ['destroy']
]);
Route::get('/api/loans', [TransactionController::class, 'api'])->name('loans.api');
Route::get('/loans/delete/{id}', [TransactionController::class, 'destroy']);
// ------------------ End Route Loan -------------------------------

// ------------------ Route Loan Detail -------------------------------
Route::get('/loan_details', [TransactionDetailController::class, 'store'])->name('loan_details.store');
Route::get('/loan_details/update', [TransactionDetailController::class, 'update'])->name('loan_details.update');
// ------------------ End Route Loan Detail-------------------------------
