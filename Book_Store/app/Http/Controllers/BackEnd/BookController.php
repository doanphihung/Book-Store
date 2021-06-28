<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Book\FormCreateBookRequest;
use App\Http\Requests\BackEnd\Book\FormUpdateBookRequest;
use App\Http\Services\AuthorService;
use App\Http\Services\BookService;
use App\Http\Services\CategoryService;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $bookService;
    protected $authorService;
    protected $categoryService;

    public function __construct(BookService $bookService, AuthorService $authorService, CategoryService $categoryService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $books = $this->bookService->getAll();
        $categories = Category::all();
        return view('backend.book.list', compact('books', 'categories'));

    }

    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('backend.book.create', compact('authors', 'categories'));
    }
    public function store(FormCreateBookRequest $request)
    {

        $this->bookService->create($request);
        return redirect()->route('book.index');
    }

    public function edit($id)
    {
        $bookAuthorIds = [];
        $bookCategoryIds = [];
        $book = $this->bookService->getById($id);
        $authors = $this->authorService->getAll();
        $categories = $this->categoryService->getAll();
        // Đổ lại dữ liệu multi select
        foreach ($book->authors as $author)
        {
            $bookAuthorIds[] = $author->id;
        }
        foreach ($book->categories as $category)
        {
            $bookCategoryIds[] = $category->id;
        }
        return view('backend.book.edit', compact('book', 'authors', 'categories', 'bookAuthorIds', 'bookCategoryIds'));

    }

    public function update(FormUpdateBookRequest $request, $id)
    {



        $this->bookService->update($request, $id);
        return redirect()->route("book.index");

    }

    public function forceDelete($id)
    {
        $this->bookService->forceDelete($id);
        return redirect()->route('book.index');
    }

    public function softDelete($id)
    {

        $this->bookService->softDelete($id);
        return redirect()->route('book.index');
    }

    public function restore($id)
    {
        $this->bookService->restore($id);
        return redirect()->route('book.index');
    }

    public function search(Request $request)
    {

        $keyWord = $request->get('search');
        $data = $this->bookService->search($keyWord);
        return response()->json($data);
    }

    public function filter(Request $request)
    {
        $books =  $this->categoryService->filterByCategory($request);
        $categories = Category::all();
        $totalBooksFiltered = count($books);
        return view('backend.book.list', compact('books','categories', 'totalBooksFiltered'));
    }

}
