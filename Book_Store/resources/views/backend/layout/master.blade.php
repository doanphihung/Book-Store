<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>
        @yield('title')
    </title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="shortcut icon" href="https://pngimage.net/wp-content/uploads/2018/05/book-store-png-6.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/> {{--Select--}}
    <link href="{{asset('backend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    @toastr_css
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <div class="app-header header-shadow">
        <div class="app-header__logo">
            <a href="{{route('admin.dashboard')}}"><div class="logo-src"></div></a>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
                <span>
                    <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
        </div>
        <div class="app-header__content">
            <div class="app-header-left">
                <div class="search-wrapper" style="display: none">
                    <div class="input-holder">
                        <input type="text" class="search-input" placeholder="Type to search">
                        <button class="search-icon"><span></span></button>
                    </div>
                    <button class="close"></button>
                </div>
            </div>
            <div class="app-header-right">
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">

                            <div class="widget-content-left">
                                <div class="btn-group">
                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                       class="p-0 btn">
                                        <img width="35px" height="35" class="rounded-circle"
                                             src="{{asset('storage/upload_images/images_user/'. \Illuminate\Support\Facades\Auth::user()->avatar)}}" alt="">
                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                    </a>
                                    <div tabindex="-1" role="menu" aria-hidden="true"
                                         class="dropdown-menu dropdown-menu-right" x-placement="bottom-end"
                                         style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(60px, 44px, 0px);">
                                        <button type="button" tabindex="0" class="dropdown-item">{{\Illuminate\Support\Facades\Auth::user()->name}}</button>
                                        <a href="{{route('logout')}}"><button type="button" tabindex="0" class="dropdown-item" style="color: deepskyblue" >Log out</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="app-main">
        <div class="app-sidebar sidebar-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                        <span>
                            <button type="button"
                                    class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
            </div>
            <div class="scrollbar-sidebar">

                <div class="app-sidebar__inner">
                    <ul class="vertical-nav-menu metismenu">
                        <li class="app-sidebar__heading">Dashboards</li>
                        <li>
                            <a href="{{route('admin.dashboard')}}" aria-expanded="false">
                                <i class="metismenu-icon pe-7s-rocket"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="app-sidebar__heading">Components</li>
                        <li class="">
                            <a href="" aria-expanded="false">
                                <i class="metismenu-icon pe-7s-bookmarks"></i>
                                Book
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul class="mm-collapse" style="height: 7.04px;">
                                <li>
                                    <a href="{{route('book.index')}}">
                                        <i class="metismenu-icon"></i>
                                        List book
                                    </a>
                                </li>
                                <li>
                                    <a href="elements-dropdowns.html">
                                        <i class="metismenu-icon">
                                        </i>
                                        Trashed
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="">
                            <a href="" aria-expanded="false">
                                <i class="metismenu-icon pe-7s-users"></i>
                                Author
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul class="mm-collapse" style="height: 7.04px;">
                                <li>
                                    <a href="{{route('author.index')}}">
                                        <i class="metismenu-icon"></i>
                                        List author
                                    </a>
                                </li>
                                <li>
                                    <a href="elements-dropdowns.html">
                                        <i class="metismenu-icon">
                                        </i>
                                        Trashed
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="">
                            <a href="" aria-expanded="false">
                                <i class="metismenu-icon pe-7s-menu"></i>
                                Category
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul class="mm-collapse" style="height: 7.04px;">
                                <li>
                                    <a href="{{route('category.index')}}">
                                        <i class="metismenu-icon"></i>
                                        List category
                                    </a>
                                </li>
                                <li>
                                    <a href="elements-dropdowns.html">
                                        <i class="metismenu-icon">
                                        </i>
                                        Trashed
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <a href="{{route('order.index')}}" aria-expanded="false">
                                <i class="metismenu-icon pe-7s-note2"></i>
                                Order
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="app-main__outer">
            <div class="app-main__inner">


                @yield('content')


            </div>
            {{--            <div class="app-wrapper-footer">--}}
            {{--                <div class="app-footer">--}}
            {{--                    <div class="app-footer__inner">--}}
            {{--                        <div class="app-footer-left">--}}
            {{--                            <ul class="nav">--}}
            {{--                                <li class="nav-item">--}}
            {{--                                    <a href="javascript:void(0);" class="nav-link">--}}
            {{--                                        Footer Link 1--}}
            {{--                                    </a>--}}
            {{--                                </li>--}}
            {{--                                <li class="nav-item">--}}
            {{--                                    <a href="javascript:void(0);" class="nav-link">--}}
            {{--                                        Footer Link 2--}}
            {{--                                    </a>--}}
            {{--                                </li>--}}
            {{--                            </ul>--}}
            {{--                        </div>--}}
            {{--                        <div class="app-footer-right">--}}
            {{--                            <ul class="nav">--}}
            {{--                                <li class="nav-item">--}}
            {{--                                    <a href="javascript:void(0);" class="nav-link">--}}
            {{--                                        Footer Link 3--}}
            {{--                                    </a>--}}
            {{--                                </li>--}}
            {{--                                <li class="nav-item">--}}
            {{--                                    <a href="javascript:void(0);" class="nav-link">--}}
            {{--                                        <div class="badge badge-success mr-1 ml-0">--}}
            {{--                                            <small>NEW</small>--}}
            {{--                                        </div>--}}
            {{--                                        Footer Link 4--}}
            {{--                                    </a>--}}
            {{--                                </li>--}}
            {{--                            </ul>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    </div>
</div>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> {{--Editor--}}
<script type="text/javascript" src="{{asset('backend/scripts/main.js')}}"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>{{-- Select: Phải để ở cuối--}}

@yield('javascript')

</body>
@jquery
@toastr_js
@toastr_render
@yield('modal')
</html>
