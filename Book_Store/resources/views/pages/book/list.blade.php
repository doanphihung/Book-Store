@extends('pages.layout.master')
@section('title', 'List book')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Filter by</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#authors-nav"
                                           class="collapsed">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            Authors
                                        </a>
                                    </h4>
                                </div>
                                <div id="authors-nav" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <ul>
                                            @forelse($authorsMaster as $author)
                                                <li><a class="authors-nav-choose"
                                                       data-id={{$author->id}} href="javascript:"
                                                       href="javascript:">{{$author->name}} </a></li>
                                            @empty
                                                <li class="text-danger">No data!</li>
                                            @endforelse

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#category-nav"
                                           class="collapsed">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            Categories
                                        </a>
                                    </h4>
                                </div>
                                <div id="category-nav" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <ul>
                                            @forelse($categoriesMaster as $category)
                                                <li><a class="category-nav-choose"
                                                       data-id="{{$category->id}}"
                                                       href="javascript:">{{$category->name}}</a></li>
                                            @empty
                                                <li class="text-danger">No data!</li>
                                            @endforelse

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><!--/category-products-->
                        <div class="price-range"><!--price-range-->
                            <h2>Price Range</h2>
                            <div class="well text-center">
                                <input type="ranger" class="span2" value="" data-slider-min="0" data-slider-max="100"
                                       data-slider-step="5" data-slider-value="[10, 50]" id="sl2"><br/>
                                <b class="pull-left">$ 0</b> <b class="pull-right"> $ 100</b>
                            </div>
                        </div><!--/price-range-->

                    </div>
                </div>

                <div class="col-sm-9 padding-right body-list-book">

                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Total books</h2>
                        @forelse($books as $key => $book)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="{{route('book.getDetails', $book->id)}}"><img
                                                    class="book-list-store"
                                                    src="{{asset("storage/upload_images/images_book/$book->image")}}"
                                                    alt=""></a>
                                            <h2>${{$book->price}}</h2>
                                            <p>{{$book->name}}</p>
                                            <a class="btn btn-default add-to-cart" data-id='{{$book->id}}'><i
                                                    class="fa fa-shopping-cart"></i>Add to
                                                cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h4 class="text-danger">No data!</h4>
                        @endforelse
                    </div>
                    {{ $books->appends(request()->query()) }}
                </div>
            </div>
        </div>
    </section>
@endsection
