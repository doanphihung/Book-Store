<?php

namespace App\Http\Repositories\Page;

use App\Models\Book;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class BookRepository
{
    protected $bookModel;

    public function __construct(Book $book)
    {
        $this->bookModel = $book;
    }

    public function getAllBooks()
    {
        return $this->bookModel->with('categories', 'authors')->orderBy('id', 'desc')->paginate(6);
    }
    public function recommendBooks()
    {
        return $this->bookModel->with('categories', 'authors')->where('recommend', '=', '1')->take(3)->get();
    }
    public function hotBooks()
    {
        return $this->bookModel->with('categories', 'authors')->where('hot', '=', '1')->take(3)->get();
    }

    public function getDetails($id)
    {
        return $this->bookModel->with('authors', 'categories')->findOrFail($id);
    }

    public function search($keyWord)
    {
        $books = $this->bookModel->with('categories', 'authors')->where('name', 'LIKE', "%$keyWord%")->get();
        return $books;
    }

}
