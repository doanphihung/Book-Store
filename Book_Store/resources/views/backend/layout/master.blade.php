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
    <link rel="shortcut icon" href="data:image/jpeg;base64,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">
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
                                        <img width="42" class="rounded-circle"
                                             src="{{asset('backend/images/avatars/1.jpg')}}" alt="">
                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                    </a>
                                    <div tabindex="-1" role="menu" aria-hidden="true"
                                         class="dropdown-menu dropdown-menu-right" x-placement="bottom-end"
                                         style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(60px, 44px, 0px);">
                                        <button type="button" tabindex="0" class="dropdown-item">User Account</button>
                                        <button type="button" tabindex="0" class="dropdown-item">Settings</button>
                                        <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                        <button type="button" tabindex="0" class="dropdown-item">Actions</button>
                                        <div tabindex="-1" class="dropdown-divider"></div>
                                        <button type="button" tabindex="0" class="dropdown-item">Dividers</button>
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
                                <i class="metismenu-icon pe-7s-diamond"></i>
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
                                <i class="metismenu-icon pe-7s-diamond"></i>
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
                                <i class="metismenu-icon pe-7s-diamond"></i>
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
                            <a href="" aria-expanded="false">
                                <i class="metismenu-icon pe-7s-display2"></i>
                                Tables
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
