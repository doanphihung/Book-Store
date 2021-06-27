<?php

namespace App\Http\Services;

use App\Http\Repositories\CategoryRepository;
use App\Models\Category;

class CategoryService
{
    protected $categoryRepo;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepo = $categoryRepository;
    }

    public function getAll()
    {
        return $this->categoryRepo->getAll();
    }

    public function create($request)
    {
        $category = new Category();
        $category->fill($request->all());
        $this->categoryRepo->create($category);
    }

    public function findById($id)
    {
        return $this->categoryRepo->findById($id);
    }

    public function update($request, $id)
    {
        $category = $this->categoryRepo->findById($id);
        $category->fill($request->all());
        $this->categoryRepo->update($category);
    }

    public function destroy($id)
    {
        $this->categoryRepo->destroy($id);
    }

    public function filterByCategory($request)
    {
        return $this->categoryRepo->filterByCategory($request);
    }


}
