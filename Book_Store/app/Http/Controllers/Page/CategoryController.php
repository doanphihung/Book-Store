<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Page\CategoryRepository;
use App\Http\Services\Page\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getAllBookByCategory($id)
    {
        $books = $this->categoryService->getAllBookByCategory($id);
        return response()->json($books);
    }
}
