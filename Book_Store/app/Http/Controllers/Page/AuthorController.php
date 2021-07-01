<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Http\Services\Page\AuthorService;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    protected $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function getAllBookByAuthor($id)
    {
        $books = $this->authorService->getAllBookByAuthor($id);
        return response()->json($books);
    }
}
