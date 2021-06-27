<?php
namespace App\Http\Repositories;

use App\Models\Author;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AuthorRepository
{

    protected $authorModel;

    public function __construct(Author $author)
    {
        $this->authorModel = $author;
    }

    public function getAll()
    {
        return $this->authorModel->orderBy('id', 'desc')->paginate(5);
    }

    public function create($author)
    {
        DB::beginTransaction();
        try {
            $author->save();
            DB::commit();
            Toastr::success('Add new author success!', 'Add author');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Add new author fail!', 'Add author');
        }
    }

    public function findById($id)
    {
        return $this->authorModel->findOrFail($id);
    }

    public function update($author)
    {
        DB::beginTransaction();
        try {
            $author->save();
            DB::commit();
            Toastr::success('Edit author success!', 'Edit author');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Edit author fail!', 'Edit author');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $author = $this->authorModel->find($id);
            Storage::delete('public/upload_images/images_author/' . $author->avatar);
            $author->books()->detach();
            $author->delete();
            DB::commit();
            Toastr::success('Delete author success!', 'Delete author');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Delete author fail!', 'Delete author');
        }
    }
}

