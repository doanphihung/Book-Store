@extends('pages.layout.master')
@section('title', 'Reset-password')
@section('content')
    <section id="form-login-sigup"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        @if(Session::has('error-token'))
                            <strong class="text-danger">{{session('error-token')}}</strong>
                        @endif
                        <h2>Reset password</h2>
                        <form action="{{route('reset-password')}}" class="signin-form" method="post">
                            @csrf
                            <input type="hidden" name="token" value="{{$token}}">
                            @error('email')
                            <small class="form-text text-muted text-danger"><i>*{{$message}}</i></small>
                            @enderror
                            <input type="email" placeholder="Email*" name="email">
                            @error('password')
                            <small class="form-text text-muted text-danger"><i>*{{$message}}</i></small>
                            @enderror
                            <input type="password" placeholder="New password*" name="password">
                            <button type="submit" class="btn btn-default">Confirm</button>
                        </form>

                    </div><!--/login form-->
                </div>
            </div>
        </div>
    </section>
@endsection



