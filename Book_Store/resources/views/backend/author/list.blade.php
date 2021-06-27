@extends('backend.layout.master')
@section('title', 'List author')
@section('content')
    <div class="card-body"><h5 class="card-title">List author</h5>
        <div style="float: left">
            <a href="{{route('author.create')}}">
                <button class="mb-2 mr-2 btn btn-secondary">Add author</button>
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
                <th style="text-align: center"><i class="fa fa-fw" aria-hidden="true" title="Copy to use user-circle"></i> Name</th>
                <th style="text-align: center"><i class="fa fa-fw" aria-hidden="true" title="Copy to use picture-o"></i> Image</th>
                <th style="text-align: center"><i class="fa fa-fw" aria-hidden="true" title="Copy to use list-alt"></i> Wikipedia_link</th>
                <th style="text-align: center"><i class="fa fa-fw" aria-hidden="true" title="Copy to use edit"></i> Action</th>
            </tr>
            </thead>
            <tbody class="tbody-table-listBook">
            @forelse($authors as $key => $author)
                <tr>
                    <th scope="row" class="td-list-book">{{++$key}}</th>
                    <td class="td-list-book">{{$author->name}}</td>
                    <td class="td-list-book"><img src="{{asset("storage/upload_images/images_author/$author->avatar")}}"
                                                  alt="" width="90" height="100"></td>
                    <td class="td-list-book"><a href="{{$author->wikipedia_link}}">{{$author->wikipedia_link}}</a></td>
                    <td class="td-list-book">
                        <div style="display: flex">
                            <div><a class="pe-7s-pen text-success text-active"
                               href="{{route('author.edit', $author->id)}}">Edit</a></div>
                           <div><a class="pe-7s-trash text-danger text deleteBook"
                               onclick="return confirm('Are you sure to delete?')"
                               href="{{route('author.destroy', $author->id)}}">Delete</a></div>
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
        {{ $authors->appends(request()->query()) }}
    </div>
@endsection
