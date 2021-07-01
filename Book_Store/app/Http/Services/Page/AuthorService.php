<?php
namespace App\Http\Services\Page;

use App\Http\Repositories\Page\AuthorRepository;

class AuthorService {

    protected $authorRepo;
    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepo = $authorRepository;
    }

    public function getAllBookByAuthor($id)
    {
        return $this->authorRepo->getAllBookByAuthor($id);
    }
}
