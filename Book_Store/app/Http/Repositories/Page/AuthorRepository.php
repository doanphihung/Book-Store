<?php
namespace App\Http\Repositories\Page;

use App\Models\Author;

class AuthorRepository {
    protected $authorModel;

    public function __construct(Author $author)
    {
        $this->authorModel = $author;
    }

    public function getAllBookByAuthor($id)
    {
        $author = $this->authorModel->with('books')->findOrFail($id);
        $books = $author->books;
        return $books;
    }

}
