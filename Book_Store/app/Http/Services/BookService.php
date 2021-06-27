<?php

namespace App\Http\Services;

use App\Http\Repositories\BookRepository;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookService
{
    protected $bookRepo;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepo = $bookRepository;
    }

    public function getAll()
    {
        return $this->bookRepo->getAll();
    }

    public function create($request)
    {
        $authors = $request->authorID;
        $categories = $request->categoryID;
        $book = new Book();
        $book->fill($request->all());
        // Lấy ra file
        $image = $request->image;
        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->name . "." . $image->getClientOriginalExtension();
//            $image->move(public_path('backend/images/book-images'), $newImageName); // upload trực tiếp lên public
            $request->file('image')->storeAs('public/upload_images/images_book', $newImageName);
            $book->image = $newImageName;
        }
        $this->bookRepo->create($book, $authors, $categories);
    }

    public function getById($id)
    {
        return $this->bookRepo->getById($id);
    }

    public function update($request, $id)
    {
        $book = $this->bookRepo->getById($id);
        $authors = $request->authorID;
        $categories = $request->categoryID;
        $book->fill($request->all());
        if (!$request->recommend) {
            $book->recommend = 0;
        }
        if (!$request->hot) {
            $book->hot = 0;
        }
        // Lấy ra file
        if ($request->hasFile('image')) {
            $imageCurrent = $book->image;
            if ($imageCurrent) {
                Storage::delete('public/upload_images/images_book/' . $imageCurrent);
            }
            $newImageName = time() . '-' . $request->name . "." . $request->image->getClientOriginalExtension();
            $request->file('image')->storeAs('public/upload_images/images_book', $newImageName);
            $book->image = $newImageName;
        }
        $this->bookRepo->update($book, $authors, $categories);
    }

    public function forceDelete($id)
    {
        $book = $this->bookRepo->getById($id);
        $this->bookRepo->forceDelete($book);
    }

    public function softDelete($id)
    {
        $book = $this->bookRepo->getById($id);
        $this->bookRepo->softDelete($book);
    }

    public function restore($id)
    {
        $book = $this->bookRepo->getById($id);
        $this->bookRepo->restore($book);
    }

    public function search($keyWord)
    {
        $books = $this->bookRepo->search($keyWord);
        $data = '';
        if ($books) {
            foreach ($books as $key => $book) {
                $categories = '';
                    foreach ($book->categories as $category) {
                        $categories .= "<p>$category->name</p>";
                    }
                    $authors = '';
                    foreach ($book->authors as $author) {
                        $authors .= "<p>$author->name</p>";
                    }
                    if (!$book->deleted_at) {
                        $status = '<a href=' . '"/admin/books/' . $book->id . '/soft-delete"><i class="fa fa-fw" aria-hidden="true" style="color: green"></i></a>';
                    } else {
                        $status = '<a href=' . '"/admin/books/' . $book->id . '/restore"><i class="fa fa-fw" aria-hidden="true"  style="color: red"></i></a>';
                    }
                    $imagePath = asset("storage/upload_images/images_book/$book->image");
                    $image = '<img src="' . $imagePath . '"' . 'width="90px" height="100px">';

                    $data .= '<tr>' .
                        '<th scope="row">' . ++$key . '</th>' .
                        '<td class="td-list-book">' . $book->name . '</td>' .
                        '<td class="td-list-book">' . $image . '</td>' .
                        '<td class="td-list-book">' . $categories . '</td>>' .
                        '<td class="td-list-book">' . $authors . '</td>' .
                        '<td class="td-list-book">' . date('d-m-Y', strtotime($book->publication_date)) . '</td>' .
                        '<td class="td-list-book">' . $book->price . '</td>>' .
                        '<td class="td-list-book">' . $book->amount . '</td>>' .
                        '<td class="td-list-book">' . $status . '</td>' .
                        '<td class="td-list-book">' .
                        '<div style="display: flex">' .
                        '<a class="pe-7s-pen text-success text-active" href="/admin/books/' . $book->id . '/edit' . '">Edit</a>' .

                        '<a class="pe-7s-trash text-danger text deleteBook" onclick="return confirm(\'Are you sure to delete?\')" href="admin/books/' . $book->id . '">Delete</a>' .
                        '</div>' . '</td>' .
                        '</tr>';
                }
            }
        else {
                $data = '<tr><td class="td-list-book" colspan="10">' . '<p>No data</p></td></tr>';
            }

            return $data;
        }
    }
