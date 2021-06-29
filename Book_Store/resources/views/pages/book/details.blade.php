@extends('pages.layout.master')
@section('title', 'Book details')
@section('content')
    <div class="product-details">
        <div class="col-sm-5">
            <div class="view-product">
                <img src="{{asset("storage/upload_images/images_book/$book->image")}}" alt="">
            </div>
        </div>
        <div class="col-sm-7">
            <div class="product-information">

                <h2>{{$book->name}}</h2>
                <span>
                    <span>{{number_format($book->price)}} $</span>
                    <label>Quantity:</label>
                    <input type="text" value="{{$book->amount}}" disabled>
                    <button type="button" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                        <a style="color: white" class="add-to-cart" data-id = {{$book->id}} >Add to cart</a>
                    </button>
                </span>
                <p><b>Category:</b>
                    @forelse($book->categories as $category)
                        {{$category->name}} &nbsp &nbsp
                    @empty
                        No data!
                    @endforelse
                </p>
                <p><b>Author:</b>
                    @forelse($book->authors as $author)
                    {{$author->name}} &nbsp &nbsp
                    @empty
                    No data!
                    @endforelse
                </p>
              <p><b>Content:</b>{!!$book->content!!}</p>
            </div>

        </div>

    </div>
@endsection
