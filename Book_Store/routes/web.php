<?php

use App\Http\Controllers\BackEnd\AuthorController;
use App\Http\Controllers\BackEnd\BookController;
use App\Http\Controllers\BackEnd\CategoryController;
use App\Http\Controllers\BackEnd\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [\App\Http\Controllers\Authentication\AuthController::class, 'showFormLogin'])->name('login.showFormLogin');
Route::post('/login', [\App\Http\Controllers\Authentication\AuthController::class, 'login'])->name('login.submit');
Route::get('/get', [\App\Http\Controllers\Authentication\AuthController::class, 'logout'])->name('logout');


// Backend
Route::middleware(['auth'])->prefix('admin')->group(function () {
//Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    //Book
    Route::group(['prefix' => 'books'], function () {
        Route::get('/', [BookController::class, 'index'])->name('book.index');
        Route::get('/create', [BookController::class, 'create'])->name('book.create');
        Route::post('/create', [BookController::class, 'store'])->name('book.store');
        Route::get('/{id}/edit', [BookController::class, 'edit'])->name('book.edit');
        Route::post('/{id}/edit', [BookController::class, 'update'])->name('book.update');
        Route::get('/{id}/force-delete', [BookController::class, 'forceDelete'])->name('book.force-delete');
        Route::get('/{id}/soft-delete', [BookController::class, 'softDelete'])->name('book.soft-delete');
        Route::get('/{id}/restore', [BookController::class, 'restore'])->name('book.restore');
        Route::get('/search', [BookController::class, 'search'])->name('book.search');
        Route::get('/filter', [BookController::class, 'filter'])->name('book.filter');
    });
    //Author
    Route::group(['prefix' => 'authors'], function () {
        Route::get('/', [AuthorController::class, 'index'])->name('author.index');
        Route::get('/create', [AuthorController::class, 'create'])->name('author.create');
        Route::post('/store', [AuthorController::class, 'store'])->name('author.store');
        Route::get('/{id}/edit', [AuthorController::class, 'edit'])->name('author.edit');
        Route::post('/{id}/edit', [AuthorController::class, 'update'])->name('author.update');
        Route::get('/{id}/destroy', [AuthorController::class, 'destroy'])->name('author.destroy');
    });
    //Category
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/create', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/{id}/edit', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/{id}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
    });
});

// Pages
    Route::group(['prefix' => 'book-store'], function () {
        Route::get('/', [\App\Http\Controllers\Page\BookController::class, 'homepage'])->name('store.homepage');
        Route::get('/list-book', [\App\Http\Controllers\Page\BookController::class, 'getAllBooks'])->name('store.list');
        Route::get('/{id}/book-details', [\App\Http\Controllers\Page\BookController::class, 'getDetails'])->name('book.getDetails');
        Route::get('/{id}/add-cart', [\App\Http\Controllers\Page\CartController::class, 'addCart'])->name('book.addCart');
        Route::get('/cart-details', [\App\Http\Controllers\Page\CartController::class, 'cartDetails'])->name('cart.details');
        Route::get('/{id}/cart-delete', [\App\Http\Controllers\Page\CartController::class, 'deleteHeadBook'])->name('cart.deleteHeadBook');
    });

