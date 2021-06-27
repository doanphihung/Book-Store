<?php

namespace App\Http\Repositories;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use mysql_xdevapi\Exception;

class CategoryRepository
{
    protected $categoryModel;

    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    public function getAll()
    {
        return $this->categoryModel->with('books')->orderBy('id', 'desc')->paginate(5);
    }

    public function create($category)
    {
        DB::beginTransaction();
        try {
            $category->save();
            DB::commit();
            Toastr::success('Add new category success!', 'Add new category');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Add new category fail!', 'Add new category');
        }
    }

    public function findById($id)
    {
        return $this->categoryModel->findOrFail($id);
    }

    public function update($category)
    {
        DB::beginTransaction();
        try {
            $category->save();
            DB::commit();
            Toastr::success('Update category success', 'Update category');
        } catch (\Exception $exception) {
            DB::rollBack();
            Toastr::error('Update category fail', 'Update category');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $category = $this->categoryModel->find($id);
            $category->books()->detach();
            $category->delete();
            DB::commit();
            Toastr::success('Delete category success', 'Delete category');
        } catch (\Exception $exception) {
            DB::rollBack();
            Toastr::error('Delete category fail', 'Delete category');

        }
    }

    public function filterByCategory($request)
    {
        $category = $this->categoryModel->findOrFail($request->select);
        $books = $category->books;
        return $books;

    }
}
