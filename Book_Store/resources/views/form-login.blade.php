{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <title>Login </title>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}

{{--    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">--}}

{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">--}}

{{--    <link rel="stylesheet" href="{{asset('backend/form-login/css/style.css')}}">--}}

{{--</head>--}}
{{--<body class="img js-fullheight" style="background-image: url({{asset('backend/form-login/bgr6.jpeg')}})">--}}
{{--<section class="ftco-section">--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-6 text-center mb-5">--}}
{{--                <h2 class="heading-section" style="color: saddlebrown">ADMIN</h2>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-6 col-lg-4">--}}
{{--                <div class="login-wrap p-0">--}}
{{--                    <h3 class="mb-4 text-center">Have an account?</h3>--}}
{{--                    <form action="{{route('login.submit')}}" class="signin-form" method="post">--}}
{{--                        @csrf--}}
{{--                        <div class="form-group" style="text-align: center">--}}
{{--                            @if(Session::has('login-error'))--}}
{{--                            <p class="text-danger">{{Session('login-error')}}</p>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <input type="email" class="form-control" placeholder="Email" name="email" >--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <input id="password-field" type="password" name="password" class="form-control" placeholder="Password">--}}
{{--                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <a href="#"><button type="button" class="form-control btn btn-outline-primar px-3">Resgister</button></a>--}}
{{--                        </div>--}}
{{--                        <div class="form-group d-md-flex">--}}
{{--                            <div class="w-50">--}}
{{--                                <label class="checkbox-wrap checkbox-primary">Remember Me--}}
{{--                                    <input type="checkbox" >--}}
{{--                                    <span class="checkmark"></span>--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                            <div class="w-50 text-md-right">--}}
{{--                                <a href="#" style="color: #fff">Forgot Password</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                    <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>--}}
{{--                    <div class="social d-flex text-center">--}}
{{--                        <a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>--}}
{{--                        <a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
{{--<script src="{{asset('backend/form-login/js/popper.js')}}"></script>--}}
{{--<script src="{{asset('backend/form-login/js/bootstrap.min.js')}}"></script>--}}
{{--<script src="{{asset('backend/form-login/js/main.js')}}"></script>--}}

{{--</body>--}}
{{--</html>--}}

@extends('pages.layout.master')
@section('title', 'Log in')
@section('content')
    <section id="form-login-sigup"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        @if(Session::has('login-error'))
                            <h5 class="text-danger">{{Session::get('login-error')}}</h5>
                        @endif
                        <h2>Login to your account</h2>
                        <form action="{{route('login.submit')}}" class="signin-form" method="post">
                            @csrf
                            @error('email')
                            <small class="form-text text-muted text-danger"><i>*{{$message}}</i></small>
                            @enderror
                            <input type="email" placeholder="Email*" name="email" class="form-control">
                            @error('email')
                            <small class="form-text text-muted text-danger"><i>*{{$message}}</i></small>
                            @enderror
                            <input type="password" placeholder="Password*" name="password">
                            <span>
								<input type="checkbox" class="checkbox">
								Keep me signed in
							</span>
                            <span><a  style="float: right" href="">Forget Password?</a></span>
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>

                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        @if(Session::has('signup'))
                            <h5 class="text-success">{{Session::get('signup')}}</h5>
                        @endif
                        <h2>New User Signup!</h2>
                        <form action="{{route('signup')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @error('name')
                            <small class="form-text text-muted text-danger"><i>*{{$message}}</i></small>
                            @enderror
                            <input type="text" placeholder="Name*" name="name">
                            @error('email')
                            <small class="form-text text-muted text-danger"><i>*{{$message}}</i></small>
                            @enderror
                            <input type="email" placeholder="Email Address*" name="email">
                            @error('password')
                            <small class="form-text text-muted text-danger"><i>*{{$message}}</i></small>
                            @enderror
                            <input type="password" placeholder="Password*" name="password">
                            @error('phone')
                            <small class="form-text text-muted text-danger"><i>*{{$message}}</i></small>
                            @enderror
                            <input type="number" placeholder="Phone" name="phone">
                            @error('address')
                            <small class="form-text text-muted text-danger"><i>*{{$message}}</i></small>
                            @enderror
                            <input type="text" placeholder="Address" name="address">
                            <input type="file" name="avatar">
                            <small class="form-text text-muted text-danger"><i>(*)Bạn phải nhập đầy đủ</i></small>
                            <button style="margin-top: 15px " type="submit" class="btn btn-default">Signup</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section>
@endsection

