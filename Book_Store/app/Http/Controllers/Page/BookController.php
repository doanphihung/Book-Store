<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Http\Services\Page\BookService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }
    public function homepage()
    {
        $hotBooks = $this->bookService->hotBooks();
        $recommendBooks = $this->bookService->recommendBooks();
      return view('pages.homepage', compact('hotBooks', 'recommendBooks'));
    }

    public function getAllBooks()
    {
        $books = $this->bookService->getAllBooks();
        return view('pages.book.list', compact('books'));
    }

    public function getDetails($id)
    {
      $book = $this->bookService->getDetails($id);
      return view('pages.book.details', compact('book'));
    }

    public function search(Request $request)
    {
        $keyWord = $request->search;
        $books = $this->bookService->search($keyWord);
        return response()->json($books);
    }
}
