<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Author\FormCreateAuthorRequest;
use App\Http\Requests\BackEnd\Author\FormUpdateAuthorRequest;
use App\Http\Services\AuthorService;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
{
    protected $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function index()
    {
        $this->isPermission('can-view-DashBoard');
       $authors = $this->authorService->getAll();
       return view('backend.author.list', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->isPermission('admin-manage');

        return view('backend.author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormCreateAuthorRequest $request)
    {
        $this->isPermission('admin-manage');

        $this->authorService->create($request);
        return redirect()->route('author.index');
    }

    public function edit($id)
    {
        $this->isPermission('admin-manage');

        $author = $this->authorService->findById($id);
        return view('backend.author.edit', compact('author'));
    }

    public function update(FormUpdateAuthorRequest $request, $id)
    {
        $this->isPermission('admin-manage');

        $this->authorService->update($request, $id);
      return redirect()->route('author.index');
    }

    public function destroy($id)
    {
        $this->isPermission('admin-manage');
        $this->authorService->destroy($id);
        return redirect()->route('author.index');
    }
}
