@extends('backend.layout.master')
@section('title', 'List category')
@section('content')
    <div class="card-body"><h5 class="card-title">List category</h5>
        <div style="float: left">
            <a href="{{route('category.create')}}">
                <button class="mb-2 mr-2 btn btn-secondary">Add category</button>
            </a>
        </div>

        <div style="float: right; margin-bottom: 7px">
            <div class="search-wrapper active">
                <div class="input-holder">
                    <input id="search-book" type="text" class="search-input" placeholder="Type to search">
                    <button class="search-icon"><span></span></button>
                </div>
                <button class="close"></button>
            </div>
        </div>

        <table class="mb-0 table  table-bordered  table-hover">
            <thead class="thead-dark">
            <tr>
                <th style="text-align: center"><i class="fa fa-fw" aria-hidden="true" title="Copy to use hashtag"></i></th>
                <th style="text-align: center"><i class="fa fa-fw" aria-hidden="true" title="Copy to use book"></i>Name</th>
                <th style="text-align: center"><i class="fa fa-fw" aria-hidden="true" title="Copy to use list-alt"></i>Description</th>
                <th style="text-align: center"><i class="fa fa-fw" aria-hidden="true" title="Copy to use edit"></i> Action</th>
            </tr>
            </thead>
            <tbody class="tbody-table-listBook">
            @forelse($categories as $key => $category)
                <tr>
                    <th scope="row" class="td-list-book">{{++$key}}</th>
                    <td class="td-list-book">{{$category->name}}</td>
                    <td class="td-list-book">{!!$category->content!!}</td>
                    <td class="td-list-book">
                        <div style="text-align: center">
                            <a class="pe-7s-pen text-success text-active"
                                    href="{{route('category.edit', $category->id)}}">Edit</a>
                            <a class="pe-7s-trash text-danger text deleteBook"
                                    onclick="return confirm('Are you sure to delete?')" href="{{route('category.destroy', $category->id)}}">Delete</a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-danger td-list-book">No data!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $categories->appends(request()->query()) }}
    </div>
@endsection
