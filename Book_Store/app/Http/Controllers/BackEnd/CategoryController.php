<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Category\FormCreateCategoryRequest;
use App\Http\Requests\BackEnd\Category\FormUpdateCategoryRequest;
use App\Http\Services\CategoryService;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getAll();
        return view('backend.category.list', compact('categories'));
    }


    public function create()
    {
        return view('backend.category.create');
    }
    public function store(FormCreateCategoryRequest $request)
    {
       $this->categoryService->create($request);
        return redirect()->route('category.index');

    }


    public function edit($id)
    {
        $category = $this->categoryService->findById($id);
        return view('backend.category.edit', ['category' => $category]);
    }
    public function update(FormUpdateCategoryRequest $request, $id)
    {
        $this->categoryService->update($request, $id);
        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $this->categoryService->destroy($id);
        return redirect()->route('category.index');
    }

   public function filter(Request $request)
   {
       dd($request->all());
//      $books = $this->categoryService->filterByCategory($request);
//      return view('backend.book.list', compact('books'));
   }
}
