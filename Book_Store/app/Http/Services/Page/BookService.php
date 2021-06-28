<?php

namespace App\Http\Services\Page;

use App\Http\Repositories\Page\BookRepository;
use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BookService
{
    protected $bookRepo;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepo = $bookRepository;
    }

    public function getAllBooks()
    {
        return $this->bookRepo->getAllBooks();
    }

    public function recommendBooks()
    {
        return $this->bookRepo->recommendBooks();
    }

    public function hotBooks()
    {
        return $this->bookRepo->hotBooks();
    }

    public function getDetails($id)
    {
        return $this->bookRepo->getDetails($id);
    }

    public function forceDelete($id)
    {
        $book = $this->bookRepo->getById($id);
        $this->bookRepo->forceDelete($book);
    }

    public function softDelete($id)
    {
        $book = $this->bookRepo->getById($id);
        $this->bookRepo->softDelete($book);
    }

    public function restore($id)
    {
        $book = $this->bookRepo->getById($id);
        $this->bookRepo->restore($book);
    }
}
