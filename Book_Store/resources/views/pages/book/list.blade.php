@extends('pages.layout.master')
@section('title', 'List book')
@section('content')
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Total books</h2>
        @forelse($books as $key => $book)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img class="book-list-store"
                                 src="{{asset("storage/upload_images/images_book/$book->image")}}" alt="">
                            <h2>${{$book->price}}</h2>
                            <p>{{$book->name}}</p>
                            <a href="{{route('book.addCart', $book->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                                cart</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>${{$book->price}}</h2>
                                <p>{{$book->name}}</p>
                                <a href="{{route('book.addCart', $book->id)}}"
                                   class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                                    cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                            <li><a href="{{route('book.getDetails', $book->id)}}"><i class="fa fa-plus-square"></i>Details</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @empty
            <h4 class="text-danger">No data!</h4>
        @endforelse
    </div>
    <div>
        <ul class="pagination">
            <li class="active"><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">»</a></li>
        </ul>
    </div>
@endsection

@section('javascript')
{{--    <script type="text/javascript">--}}
{{--        function addCart(id) {--}}
{{--                    $.ajax({--}}
{{--                        type: "GET",--}}
{{--                        url: "{{route('book.addCart')}}",--}}
{{--                        data: {--}}
{{--                            id: id--}}
{{--                        },--}}
{{--                        success: function (data) {--}}
{{--                            console.log(data);--}}
{{--                        },--}}
{{--                        error: function () {--}}
{{--                        }--}}
{{--                    });--}}
{{--        }--}}
{{--    </script>--}}
@endsection
