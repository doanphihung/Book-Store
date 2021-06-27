@extends('backend.layout.master')
@section('title', 'Update author')
@section('content')

    <div class="card-body"><h5 class="card-title">Add new author</h5>
        <form action="{{route('author.update', $author->id)}}" method="post" runat="server" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="position-relative form-group">
                            <label for="author-name" class="">Name:</label>
                            <input type="text" name="name" id="author-name" class="form-control" value="{{old('name') ?? $author->name}}">
                            @error('name')
                            <p><small class="form-text text-muted"><span style="color: red">*{{$message}}</span></small>
                            </p>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="position-relative form-group"><label for="image-author" class="">Image</label>
                            <input onchange="loadFile(event)" accept="image/*" name="avatar" type="file"
                                   class="form-control-file">
                            @error('avatar')
                            <p><small class="form-text text-muted"><span
                                        style="color: red">*{{$message}}</span></small></p>
                            @enderror
                        </div>
                        <div>
                            <img id="image-author" src="{{asset("storage/upload_images/images_author/$author->avatar")}}" alt="" width="150px" height=""/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="position-relative form-group">
                            <label for="author-born" class="">Born:</label>
                            <input type="date" name="born" id="author-born" class="form-control"
                                   value="{{old('born') ?? $author->born}}">
                            @error('born')
                            <p><small class="form-text text-muted"><span style="color: red">*{{$message}}</span></small>
                            </p>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="position-relative form-group">
                            <label for="country-author" class="">Country:</label>
                            <input type="text" name="country" id="country-author" class="form-control" value="{{old('country') ?? $author->country}}">
                            @error('country')
                            <p><small class="form-text text-muted"><span style="color: red">*{{$message}}</span></small>
                            </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="position-relative form-group">
                            <label for="author-die" class="">Die:</label>
                            <input type="date" name="die" id="author-die" class="form-control"
                                   value="{{old('die') ?? $author->die}}">
                            @error('die')
                            <p><small class="form-text text-muted"><span style="color: red">*{{$message}}</span></small>
                            </p>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="position-relative form-group">
                            <label for="wikipedia_link" class="">Wikipedia_link:</label>
                            <input type="text" name="wikipedia_link" id="wikipedia_link" class="form-control" value="{{old('wikipedia_link') ?? $author->wikipedia_link}}">
                            @error('wikipedia_link')
                            <p><small class="form-text text-muted"><span style="color: red">*{{$message}}</span></small>
                            </p>
                            @enderror
                        </div>
                    </div>
                </div>
                <button class="mb-2 mr-2 btn btn-success active" type="submit">Update</button>
                <button class="mb-2 mr-2 btn btn-danger active" type="button"><a style="color: white" href="{{route('author.index')}}">Cancel</a></button>
            </div>
        </form>
    </div>
@endsection
@section('javascript')
    <script text="text/javascript">
        {{--PreviewImage--}}
        let loadFile = function(event) {
            let output = document.getElementById('image-author');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };

    </script>
@endsection


