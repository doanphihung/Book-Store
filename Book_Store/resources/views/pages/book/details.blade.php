@extends('pages.layout.master')
@section('title', 'Book details')
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
                                                <li><a class="authors-nav-choose" data-id = {{$author->id}} href="javascript:">{{$author->name}}</a></li>
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
                                                <li><a  class="category-nav-choose"
                                                        data-id = "{{$category->id}}"
                                                        href="javascript:">{{$category->name}}</a></li>
                                            @empty
                                                <li class="text-danger">No data!</li>
                                            @endforelse

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="price-range">
                            <h2>Price Range</h2>
                            <div class="well text-center">
                                <input type="text" class="span2" value="" data-slider-min="1" data-slider-max="200"
                                       data-slider-step="5" data-slider-value="[10, 100]" id="sl2"><br/>
                                <b class="pull-left">$ 0</b> <b class="pull-right"> $ 600</b>
                            </div>
                        </div><!--/price-range-->

                    </div>
                </div>

                <div class="col-sm-9 padding-right body-list-book">
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
                    <span>${{number_format($book->price)}}</span>
                    <label>Quantity:</label>
                    <input type="text" value="{{$book->amount}}" disabled>
                    <button type="button" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart">
                            <a style="background: none;" class="add-to-cart" data-id= {{$book->id}} >Add to cart</a>
                        </i>

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
                </div>
            </div>
        </div>
    </section>

@endsection
