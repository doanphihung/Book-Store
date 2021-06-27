@extends('backend.layout.master')
@section('title', 'List book')
@section('content')
    <div class="card-body"><h5 class="card-title">List book</h5>
        <div style="float: left">
            <a href="{{route('book.create')}}">
                <button class="mb-2 mr-2 btn btn-secondary">Add book</button>
            </a>
            <button class="mb-2 mr-2 btn btn-light" data-toggle="modal" data-target="#exampleModal">Filter
            </button>
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
                <th><i class="fa fa-fw" aria-hidden="true" title="Copy to use hashtag"></i></th>
                <th><i class="fa fa-fw" aria-hidden="true" title="Copy to use book"></i> Name</th>
                <th><i class="fa fa-fw" aria-hidden="true" title="Copy to use picture-o"></i> Image</th>
                <th><i class="fa fa-fw" aria-hidden="true" title="Copy to use list-alt"></i> Category</th>
                <th><i class="fa fa-fw" aria-hidden="true" title="Copy to use user-circle"></i> Author</th>
                <th><i class="fa fa-fw" aria-hidden="true" title="Copy to use check-square"></i> Publication_date
                </th>
                <th><i class="fa fa-fw" aria-hidden="true" title="Copy to use money"></i> Price</th>
                <th><i class="fa fa-fw" aria-hidden="true" title="Copy to use cube"></i> Amount</th>
                <th><i class="fa fa-fw" aria-hidden="true" title="Copy to use eye"></i> Status</th>
                <th><i class="fa fa-fw" aria-hidden="true" title="Copy to use edit"></i> Action</th>
            </tr>
            </thead>
            <tbody class="tbody-table-listBook">
            @forelse($books as $key => $book)
                <tr>
                    <th scope="row" class="td-list-book">{{++$key}}</th>
                    <td class="td-list-book">{{$book->name}}</td>
                    <td class="td-list-book"><img src="{{asset("storage/upload_images/images_book/$book->image")}}"
                                                  alt="" width="90" height="100"></td>
                    <td class="td-list-book">
                        @forelse($book->categories as $category)
                            <p>{{$category->name}}</p>
                        @empty
                            <p>Chưa phân thể loại</p>
                        @endforelse
                    </td>
                    <td class="td-list-book">
                        @forelse($book->authors as $author)
                            <p>{{$author->name}}</p>
                        @empty
                            <p>Chưa có tác giả</p>
                        @endforelse
                    </td>
                    <td class="td-list-book">{{ date('d-m-Y', strtotime($book->publication_date)) }}</td>
                    <td class="td-list-book">{{$book->price}}$</td>
                    <td class="td-list-book">{{$book->amount}}</td>
                    <td class="td-list-book">
                        @if(!$book->deleted_at)
                            <a href="{{route('book.soft-delete', $book->id)}}"><i class="fa fa-fw" aria-hidden="true"
                                                                                  style="color: green"></i></a>
                        @else
                            <a href="{{route('book.restore', $book->id)}}"><i class="fa fa-fw" aria-hidden="true"
                                                                              style="color: red"></i></a>
                        @endif
                    </td>
                    <td class="td-list-book">
                        <div style="display: flex">
                            <a class="pe-7s-pen text-success text-active"
                               href="{{route('book.edit', $book->id)}}">Edit</a>
                            <a class="pe-7s-trash text-danger text deleteBook"
                               onclick="return confirm('Are you sure to delete?')"
                               href="{{route('book.force-delete', $book->id)}}" data-id="{{$book->id}}">Delete</a>
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
        {{ $books->appends(request()->query()) }}
    </div>
@endsection
{{--  AJAX DELETE--}}

{{--@section('javascript')--}}
{{--    <script>--}}
{{--           $('.deleteBook').click(function(){--}}

{{--   let id = $(this).attr('data-id');--}}

{{--   $('#lon').text(id)--}}
{{--   let url = '{{route('book.delete')}}';--}}
@section('javascript')
    <script type="text/javascript">
        // SEARCH
        $(document).ready(function () {
            $('#search-book').keyup(function () {
                let keyWord = $(this).val();
                console.log(keyWord)
                $.ajax({
                    type: "GET",
                    url: "{{route('book.search')}}",
                    data: {
                        search: keyWord
                    },
                    success: function (data) {
                        $('tbody.tbody-table-listBook').html(data);
                    },
                    error: function () {
                    }
                });
            });
        });
         // END SEARCH
    </script>
@endsection

@section('modal')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content" action="{{route('book.filter')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="position-relative form-group"><label for="exampleSelect" class="">Find books by
                            category:</label>
                            <select name="select" id="" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Choose</button>
                </div>
            </form>
        </div>
            </div>
@endsection
{{--   $.ajax({--}}
{{--        url: url,--}}
{{--        type: "get",--}}
{{--        data: {'id': id},--}}
{{--        success: function (res) {--}}
{{--         console.log(res)--}}
{{--        },--}}
{{--        error: function(e){--}}
{{--        alert('fuck')--}}
{{--        }--}}
{{--   });--}}
{{--   });--}}
{{--    </script>--}}

{{--    END AJAX DELETE--}}


