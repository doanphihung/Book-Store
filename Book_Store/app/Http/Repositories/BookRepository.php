<?php

namespace App\Http\Repositories;

use App\Models\Book;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class BookRepository
{
    protected $bookModel;

    public function __construct(Book $book)
    {
        $this->bookModel = $book;
    }

    public function getAll()
    {
            return $this->bookModel->withTrashed()->with('categories', 'authors')->orderBy('id', 'desc')->paginate(5);
    }

    public function create($book, $authors, $categories)
    {

        DB::beginTransaction();
        try {
            $book->save();
            $book->authors()->attach($authors);
            $book->categories()->attach($categories);
            DB::commit();
            Toastr::success('Add new book success!', 'Add book');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Create new book fail!', 'Add book');
        }

    }

    public function update($book, $authors, $categories)
    {
        DB::beginTransaction();
        try {
            $book->save();
            $book->authors()->sync($authors);
            $book->categories()->sync($categories);
            DB::commit();
            toastr()->success('Edit book success!', 'Edit book');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Edit book fail!', 'Edit book');
        }
    }

    public function getById($id)
    {
        return $this->bookModel->withTrashed()->findOrFail($id);
    }

    public function forceDelete($book)
    {
        DB::beginTransaction();
        try {
            $book->authors()->detach();  //Xóa tất record  của book trong bảng trung gian
            $book->categories()->detach();
            $book->forceDelete();             //Xóa book ra khỏi bảng book.
            DB::commit();
            toastr()->success('Delete book success!', 'Delete book');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Delete book fail!', 'Delete book');
        }
    }
    public function softDelete($book)
    {
        DB::beginTransaction();
        try {
            $book->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function restore($book)
    {
        $book->restore();
    }

    public function search($keyWord)
    {
        $books = $this->bookModel->withTrashed()->where('name', 'LIKE', "%$keyWord%")->orderBy('id', 'desc')->get();
        return $books;
    }
}
