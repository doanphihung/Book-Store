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
        $this->authorService->create($request);
        return redirect()->route('author.index');
    }

    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = $this->authorService->findById($id);
        return view('backend.author.edit', compact('author'));
    }

    public function update(FormUpdateAuthorRequest $request, $id)
    {
      $this->authorService->update($request, $id);
      return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorService->destroy($id);
        return redirect()->route('author.index');
    }
}
