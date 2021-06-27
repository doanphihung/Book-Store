
@extends('backend.layout.master')
@section('title', 'Create category')
@section('content')

    <div class="card-body"><h5 class="card-title">Add new category</h5>
        <form action="{{route('category.update', $category->id)}}" method="post" runat="server">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="position-relative form-group">
                            <label for="category-name" class="">Name:</label>
                            <input type="text" name="name" id="category-name" class="form-control"
                                   value="{{old('name') ?? $category->name}}">
                            @error('name')
                            <p><small class="form-text text-muted"><span style="color: red">*{{$message}}</span></small>
                            </p>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="position-relative form-group" style="width: 100%"><label for="content"
                                                                                             class="">Description:</label>
                            <textarea name="content" id="content" class="form-control ckeditor form-control">@if(old('content')){{old('content')}}@else{{$category->content}}@endif</textarea>
                            @error('content')
                            <p><small class="form-text text-muted"><span style="color: red">*{{$message}}</span></small></p>
                            @enderror
                        </div>
                    </div>
                </div>
                <button class="mb-2 mr-2 btn btn-success active" type="submit">Update</button>
                <button class="mb-2 mr-2 btn btn-danger active" type="button"><a style="color: white" href="{{route('category.index')}}">Cancel</a></button>
            </div>
        </form>
    </div>
@endsection

