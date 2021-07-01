<?php
namespace App\Http\Services\Page;

use App\Http\Repositories\Page\CategoryRepository;

class CategoryService
{
    protected $cateRepo;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->cateRepo = $categoryRepository;
    }

    public function getAllBookByCategory($id)
    {
        return $this->cateRepo->getAllBookByCategory($id);
    }
}
