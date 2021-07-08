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
                        @if(Session::has('resetPasswordSuccess'))
                            <h5 class="text-success">{{Session::get('resetPasswordSuccess')}}</h5>
                        @endif
                        <h2>Login to your account</h2>
                        <form action="{{route('login.submit')}}" class="signin-form" method="post">
                            @csrf
                            @error('email')
                            <small class="form-text text-muted text-danger"><i>*{{$message}}</i></small>
                            @enderror
                            <input type="email" placeholder="Email*" name="email" class="form-control">
                            @error('password')
                            <small class="form-text text-muted text-danger"><i>*{{$message}}</i></small>
                            @enderror
                            <input type="password" placeholder="Password*" name="password">
                            <span>
								<input type="checkbox" class="checkbox">
								Keep me signed in
							</span>
                            {{--                            <a style="float: right" href="{{route('form-forgotPassword')}}"><i>Forgot password?</i></a>--}}
                            <a style="float: right" data-toggle="modal" data-target="#modalLoginForm"><i>Forgot
                                    password?</i></a>
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
                            @error('avatar')
                            <small class="form-text text-muted text-danger"><i>*{{$message}}</i></small>
                            @enderror
                            <input type="file" name="avatar" onchange="loadImg()">
                            <img src="" alt="" id="avatar-signup" width="100px">
                            <div><small class="form-text text-muted text-danger"><i>(*)Bạn phải nhập đầy đủ</i></small></div>
                            <button style="margin-top: 15px " type="submit" class="btn btn-default">Signup</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section>
@endsection
@section('javascript')
    <script type="text/javascript">
        function loadImg(){
            $('#avatar-signup').attr('src', URL.createObjectURL(event.target.files[0]));
        }
    </script>
@endsection
@section('modal')
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Reset password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('forgot.send-mail')}}" method="post">
                    @csrf
                    <div class="modal-body mx-3">
                        @error('email')
                        <small class="form-text text-muted text-danger"><i>*{{$message}}</i></small>
                        @enderror
                        <div class="md-form mb-5">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <input type="email" id="defaultForm-email" class="form-control validate"
                                   placeholder="Your email" name="email">
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" style="background: orange" class="btn btn-secondary">Recover account
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection




