<?php
namespace App\Http\Repositories\Page;

use App\Models\Category;

class CategoryRepository
{
    protected $categoryModel;

    public function __construct(Category $category)
    {
        $this->categoryModel = $category;
    }

    public function getAllBookByCategory($id)
    {
        $category = $this->categoryModel->with('books')->findOrFail($id);
        $books = $category->books;
        return $books;
    }
}
