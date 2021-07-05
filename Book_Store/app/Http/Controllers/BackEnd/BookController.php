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
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
        $this->isPermission('can-view-DashBoard');
        $books = $this->bookService->getAll();
        $categories = Category::all();
        return view('backend.book.list', compact('books', 'categories'));

    }

    public function create()
    {
        if (Gate::allows('admin-manage', Auth::user())) { // Phân quyền trực tiếp dùng if-else ở mỗi action!!!
            $authors = Author::all();
            $categories = Category::all();
            return view('backend.book.create', compact('authors', 'categories'));

        } else {
            Toastr::error('Bạn không đủ quyền', 'Admin');
            return back();
        }
    }
        public function store(FormCreateBookRequest $request)
        {
            $this->isPermission('admin-manage');

            $this->bookService->create($request);
            return redirect()->route('book.index');
        }

        public function edit($id)
        {
            if (Gate::allows('admin-manage', Auth::user())) {
                $bookAuthorIds = [];
                $bookCategoryIds = [];
                $book = $this->bookService->getById($id);
                $authors = Author::all();
                $categories = Category::all();
                // Đổ lại dữ liệu multi select
                foreach ($book->authors as $author) {
                    $bookAuthorIds[] = $author->id;
                }
                foreach ($book->categories as $category) {
                    $bookCategoryIds[] = $category->id;
                }
                return view('backend.book.edit', compact('book', 'authors', 'categories', 'bookAuthorIds', 'bookCategoryIds'));
            }else {
                Toastr::error('Bạn không đủ quyền', 'Admin');
                return back();
            }
        }

        public function update(FormUpdateBookRequest $request, $id)
        {
            $this->isPermission('admin-manage');

            $this->bookService->update($request, $id);
            return redirect()->route("book.index");

        }

        public function forceDelete($id)
        {
            $this->isPermission('admin-manage'); // Phân quyền dùng abort403 định nghĩa 1 function chung ở Controller, dùng ở action cần phân quyền!!!

            $this->bookService->forceDelete($id);
            return redirect()->route('book.index');
        }

        public function softDelete($id)
        {
            $this->isPermission('admin-manage');

            $this->bookService->softDelete($id);
            return redirect()->route('book.index');
        }

        public function restore($id)
        {
            $this->isPermission('admin-manage');

            $this->bookService->restore($id);
            return redirect()->route('book.index');
        }

        public function search(Request $request)
        {
            $this->isPermission('can-view-DashBoard');
            $keyWord = $request->get('search');
            $data = $this->bookService->search($keyWord);
            return response()->json($data);
        }

        public function filter(Request $request)
        {
            $this->isPermission('can-view-DashBoard');
            $books = $this->categoryService->filterByCategory($request);
            $categories = Category::all();
            $totalBooksFiltered = count($books);
            return view('backend.book.list', compact('books', 'categories', 'totalBooksFiltered'));
        }

    }
