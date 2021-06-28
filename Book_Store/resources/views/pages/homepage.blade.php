@extends('pages.layout.master')
@section('title', 'Home page')
@section('content')

    <div class="recommended_items"><!--recommended_items-->
        <h2 class="title text-center">recommended books</h2>

        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    @forelse($recommendBooks as $key => $book)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img class="book-rcm-homepage" src="{{asset("storage/upload_images/images_book/$book->image")}}" alt=""/>
                                        <h2>${{$book->price}}</h2>
                                        <p>{{$book->name}}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h4 class="title text-center text-danger">No data!</h4>
                    @endforelse

                </div>
                <div class="item">
                    @forelse($recommendBooks as $key => $book)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img class="book-rcm-homepage" src="{{asset("storage/upload_images/images_book/$book->image")}}" alt=""/>
                                        <h2>${{$book->price}}</h2>
                                        <p>{{$book->name}}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h4 class="title text-center text-danger">No data!</h4>
                    @endforelse
                </div>
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
    <!--hot books-->
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Hot books</h2>
        @forelse($hotBooks as $key => $book)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img  class="book-hot-homepage" src="{{asset("storage/upload_images/images_book/$book->image")}}" alt="">
                            <h2>${{$book->price}}</h2>
                            <p>{{$book->name}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                                to cart</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>${{$book->price}}</h2>
                                <p>{{$book->name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        @empty
            <h3 class="text-danger">No data!</h3>
        @endforelse
    </div>
{{--    end hot book--}}

@endsection

