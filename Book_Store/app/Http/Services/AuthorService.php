<?php

namespace App\Http\Services;

use App\Http\Repositories\AuthorRepository;
use App\Models\Author;
use Illuminate\Support\Facades\Storage;

class AuthorService
{
    protected $authorRepo;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepo = $authorRepository;
    }

    public function getAll()
    {
        return $this->authorRepo->getAll();
    }

    public function create($request)
    {
        $author = new Author();
        $author->fill($request->all());
        $avatar = $request->avatar;
        if ($request->hasFile('avatar')) {
            $newImageName = time() . '-' . $request->name . "." . $avatar->getClientOriginalExtension();
            $request->file('avatar')->storeAs('public/upload_images/images_author', $newImageName);
            $author->avatar = $newImageName;
        }
        $this->authorRepo->create($author);
    }

    public function findById($id)
    {
        return $this->authorRepo->findById($id);
    }

    public function update($request, $id)
    {
        $author = $this->authorRepo->findById($id);
        $author->fill($request->all());
        if ($request->hasFile('avatar')) {
            $imageCurrent = $author->avatar;
            Storage::delete('public/upload_images/images_author/' . $imageCurrent);
            $newImageName = time() . '-' . $request->name . "." . $request->avatar->getClientOriginalExtension();
            $request->file('avatar')->storeAs('public/upload_images/images_author', $newImageName);
            $author->avatar = $newImageName;
        }
        $this->authorRepo->update($author);
    }

    public function destroy($id)
    {
//        Storage::delete('public/upload_images/images_author/' . $author->avatar);
         $this->authorRepo->destroy($id);
    }
}
