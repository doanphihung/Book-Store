@extends('backend.layout.master')
@section('title', 'Create book')
@section('content')

    <div class="card-body"><h5 class="card-title">Add new book</h5>
        <form action="{{route('book.store')}}" method="post" runat="server" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="position-relative form-group">
                            <label for="name-book" class="">Name*:</label>
                            <input type="text" name="name" id="name-book" class="form-control" value="{{old('name')}}">
                            @error('name')
                            <p><small class="form-text text-muted"><span style="color: red">*{{$message}}</span></small>
                            </p>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="position-relative form-group">
                            <label for="publication" class="">Publication_date:</label>
                            <input type="date" name="publication_date" id="publication_date" class="form-control"
                                   value="{{old('publication_date')}}">
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
                                    <option
                                        value="{{ $author->id }}" {{collect(old('authorID'))->contains($author->id) ? 'selected' : ''}}>{{ $author->name }}</option>
                                @endforeach
                            </select>
                            @error('authorID')
                            <p><small class="form-text text-muted"><span style="color: red">*{{$message}}</span></small>
                            </p>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="position-relative form-group">
                            <label for="book-author" class="">Category*:</label>
                            <select data-placeholder="Select category" multiple class="chosen-select"
                                    name="categoryID[]">
                                @foreach($categories as $category)
                                    <option
                                        value="{{ $category->id }}" {{collect(old('categoryID'))->contains($category->id) ? 'selected' : ''}}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('categoryID')
                            <p><small class="form-text text-muted"><span style="color: red">*{{$message}}</span></small>
                            </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="position-relative form-group">
                            <label for="price-book" class="">Price*:</label>
                            <input type="number" name="price" id="price-book" class="form-control"
                                   value="{{old('price')}}">
                            @error('price')
                            <p><small class="form-text text-muted"><span style="color: red">*{{$message}}</span></small></p>
                            @enderror

                        </div>
                    </div>
                    <div class="col">
                        <div class="position-relative form-group">
                            <label for="amount-book" class="">Amount*:</label>
                            <input type="number" name="amount" id="amount-book" class="form-control"
                                   value="{{old('amount')}}">
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
                            <input type="checkbox" name="recommend" value="1" {{old('recommend') ? 'checked' : ''}}>
                            <span class="slider round"></span>
                        </label>
                        <p>Recommend</p>
                    </div>
                    <div class="col" style="text-align: center">
                        <label class="switch">
                            <input type="checkbox" name="hot" value="1" {{old('hot') ? 'checked' : ''}}>
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
                            <img id="image-book" src="#" alt="" width="150px" height=""/>
                        </div>
                    </div>
                    <div class="col">

                    </div>
                </div>

                <div class="row">
                    <div class="position-relative form-group" style="width: 100%"><label for="content"
                                                                                         class="">Content:</label>
                        <textarea name="content" id="content"
                                  class="form-control ckeditor form-control">{{old('content')}}</textarea>
                        @error('content')
                        <p><small class="form-text text-muted"><span style="color: red">*{{$message}}</span></small></p>
                        @enderror
                    </div>
                </div>
                <button class="mb-2 mr-2 btn btn-success active" type="submit">Add book</button>
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

