@extends('backend.layout.master')
@section('title', 'Create book')
@section('content')

    <div class="card-body"><h5 class="card-title">Edit book</h5>
        <form action="{{route('book.update', $book->id)}}" method="post" runat="server" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col">
                        {{--                        <div ><small class="form-text text-muted" style="float: right"><span style="color: red">Truong nay khong bo trong</span></small></div>--}}
                        <div class="position-relative form-group">
                            <label for="name-book" class="">Name*:</label>
                            <input type="text" name="name" id="name-book" class="form-control"
                                   value="{{ (old('name')) ? old('name') : $book->name}}">
                            @error('name')
                            <p><small class="form-text text-muted"><span style="color: red">*{{$message}}</span></small>
                            </p>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="position-relative form-group">
                            <label for="publication" class="">Publication_date*:</label>
                            <input type="date" name="publication_date" id="publication_date" class="form-control"
                                   value="{{ (old('publication_date')) ? old('publication_date') : $book->publication_date}}">
                            @error('publication_date')
                            <p><small class="form-text text-muted"><span style="color: red">*{{$message}}</span></small>
                            </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="position-relative form-group">
                            <label for="book-author" class="">Author*:</label>
                            <select data-placeholder="Select author" multiple class="chosen-select"
                                    name="authorID[]">
                                @foreach($authors as $author)
                                    @if(in_array($author->id, $bookAuthorIds))
                                        <option selected value="{{$author->id}}">{{$author->name}}</option>
                                    @else
                                        <option value="{{$author->id}}">{{$author->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="position-relative form-group">
                            <label for="book-author" class="">Category*:</label>
                            <select data-placeholder="Select category" multiple class="chosen-select"
                                    name="categoryID[]">
                                @foreach($categories as $category)
                                    @if(in_array($category->id, $bookCategoryIds))
                                        <option selected value="{{$category->id}}">{{$category->name}}</option>
                                    @else
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="position-relative form-group">
                            <label for="price-book" class="">Price*:</label>
                            <input type="number" name="price" id="price-book" class="form-control"
                                   value="{{ (old('price')) ? old('price') : $book->price}}">
                            @error('price')
                            <p><small class="form-text text-muted"><span style="color: red">*{{$message}}</span></small>
                            </p>
                            @enderror

                        </div>
                    </div>
                    <div class="col">
                        <div class="position-relative form-group">
                            <label for="amount-book" class="">Amount*:</label>
                            <input type="number" name="amount" id="amount-book" class="form-control"
                                   value="{{ (old('amount')) ? old('amount') : $book->amount}}">
                            @error('amount')
                            <p><small class="form-text text-muted"><span style="color: red">*{{$message}}</span></small>
                            </p>
                            @enderror

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col">
                    </div>
                </div>

                <div class="row">
                    <div class="col" style="text-align: center">
                        <label class="switch">
                            @if($book->recommend === 1)
                                <input type="checkbox" name="recommend" value="1" checked>
                            @else
                                <input type="checkbox" name="recommend" value="1">
                            @endif
                            <span class="slider round"></span>
                        </label>
                        <p>Recommend</p>
                    </div>
                    <div class="col" style="text-align: center">
                        <label class="switch">
                            @if($book->hot === 1)
                                <input type="checkbox" name="hot" value="1" checked>
                            @else
                                <input type="checkbox" name="hot" value="1">
                            @endif
                            <span class="slider round"></span>
                        </label>
                        <p>Hot</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="position-relative form-group"><label for="image-book" class="">Image</label>
                            <input onchange="loadFile(event)" accept="image/*" name="image" type="file"
                                   class="form-control-file">
                            @error('image')
                            <p><small class="form-text text-muted"><span
                                        style="color: red">*{{$message}}</span></small></p>
                            @enderror
                        </div>
                        <div>
                            <img id="image-book" src="{{asset("storage/upload_images/images_book/$book->image")}}" alt="" width="150px" height=""/>
                        </div>
                    </div>
                    <div class="col">

                    </div>
                </div>

                <div class="row">
                    <div class="position-relative form-group" style="width: 100%"><label for="content"
                                                                                         class="">Content:</label>
                        <textarea name="content" id="content"
                                  class="form-control ckeditor form-control">@if(old('content')){{old('content')}}@else{{$book->content}}@endif</textarea>
                        @error('content')
                        <p><small class="form-text text-muted"><span style="color: red">*{{$message}}</span></small></p>
                        @enderror
                    </div>
                </div>
                <button class="mb-2 mr-2 btn btn-success active" type="submit">Update</button>
                <button class="mb-2 mr-2 btn btn-danger active" type="button"><a style="color: white" href="{{route('book.index')}}">Cancel</a></button>
            </div>
        </form>
    </div>
@endsection
@section('javascript')
    <script text="text/javascript">
{{--select--}}
        $(".chosen-select").chosen({
      no_results_text: "Oops, nothing found!"
    })

{{--editor--}}
        $(document).ready(function () {
               $('.ckeditor').ckeditor();
           });

{{--PreviewImage--}}
        let loadFile = function(event) {
           let output = document.getElementById('image-book');
           output.src = URL.createObjectURL(event.target.files[0]);
           output.onload = function() {
           URL.revokeObjectURL(output.src) // free memory
         }
       };



    </script>
@endsection

