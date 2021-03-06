<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="https://pngimage.net/wp-content/uploads/2018/05/book-store-png-6.png">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="{{asset('page/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('page/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('page/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('page/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('page/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('page/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('page/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('page/css/style.css')}}" rel="stylesheet">

    <script src="{{asset('page/js/html5shiv.js')}}"></script>
    <script src="{{asset('page/js/respond.min.js')}}"></script>

    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="{{asset('/page/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="{{asset('/page/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="{{asset('/page/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed"
          href="{{asset('/page/images/ico/apple-touch-icon-57-precomposed.png')}}">
    @toastr_css
</head><!--/head-->

<body>
<header id="header"><!--header-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="logo pull-left">
                        <a href="{{route('store.homepage')}}"><img width="80%"
                                                                   src="{{asset('page/images/logo/lo.png')}}"
                                                                   alt=""/></a>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                @lang('homepage.language')
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('lang.setLanguage', 'en')}}">EN</a></li>
                                <li><a href="{{route('lang.setLanguage', 'vi')}}">VI</a></li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{route('cart.details')}}"><i class="fa fa-shopping-cart"></i>@lang('homepage.cart')<span
                                        id="cart-master-icon">@if(session()->has('cart'))
                                            ({{session('cart')->totalQuantity}})@else (0) @endif </span></a></li>

                            @if(\Illuminate\Support\Facades\Auth::user())
                                <li><a href="{{route('checkout')}}"><i class="fa fa-crosshairs"></i> @lang('homepage.checkout')</a></li>
                            @else
                                <li><a href="{{route('login.showFormLogin')}}"><i class="fa fa-crosshairs"></i> @lang('homepage.checkout')</a></li>
                            @endif

                            @can('can-view-DashBoard')
                                <li><a href="{{route('admin.dashboard')}}"><i
                                            class="fa fa-user"></i><span>@lang('homepage.admin')</span></a></li>
                            @endcan

                            @if(\Illuminate\Support\Facades\Auth::user())
                                <li>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle usa"
                                                data-toggle="dropdown">
                                            <span
                                                style="color: orange">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{route('logout')}}">@lang('homepage.logout')</a></li>
                                        </ul>
                                    </div>
                                </li>
                            @else
                                <li><a href="{{route('login.showFormLogin')}}"><i class="fa fa-lock"></i> @lang('homepage.login')</a></li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{route('store.homepage')}}">@lang('homepage.home')</a></li>
                            <li><a href="{{route('store.list')}}">@lang('homepage.shop')</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        @if(Route::is('cart.details') || Route::is('checkout'))
                        <input type="text" style="display: none"/>
                        @else
                        <input type="text" placeholder="@lang('homepage.search')" id="search-master"/>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

@yield('content')

<footer id="footer"><!--Footer-->
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Service</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Online Help</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Change Location</a></li>
                            <li><a href="#">FAQ???s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Quock Shop</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">T-Shirt</a></li>
                            <li><a href="#">Mens</a></li>
                            <li><a href="#">Womens</a></li>
                            <li><a href="#">Gift Cards</a></li>
                            <li><a href="#">Shoes</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Policies</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privecy Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                            <li><a href="#">Billing System</a></li>
                            <li><a href="#">Ticket System</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Company Information</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Store Location</a></li>
                            <li><a href="#">Affillate Program</a></li>
                            <li><a href="#">Copyright</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address"/>
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i>
                            </button>
                            <p>Get the most recent updates from <br/>our site and be updated your self...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


</footer>
<!--/Footer-->
{{--<script src="{{asset('page/js/jquery.js')}}"></script>--}}
<script src="{{asset('page/js/bootstrap.min.js')}}"></script>
<script src="{{asset('page/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('page/js/price-range.js')}}"></script>
<script src="{{asset('page/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('page/js/main.js')}}"></script>
<script src="{{asset('page/js/myjs.js')}}"></script>
{{--Alertify--}}
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
{{--ENDalert--}}
@yield('javascript')
</body>
@yield('modal')
@jquery
@toastr_js
@toastr_render
</html>
