<!doctype html>
<html lang="en">
<head>
    <title>Login </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('backend/form-login/css/style.css')}}">

</head>
<body class="img js-fullheight" style="background-image: url({{asset('backend/form-login/bgr6.jpeg')}})">
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section" style="color: saddlebrown">ADMIN</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <h3 class="mb-4 text-center">Have an account?</h3>
                    <form action="{{route('login.submit')}}" class="signin-form" method="post">
                        @csrf
                        <div class="form-group" style="text-align: center">
                            @if(Session::has('login-error'))
                            <p class="text-danger">{{Session('login-error')}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" name="email" >
                        </div>
                        <div class="form-group">
                            <input id="password-field" type="password" name="password" class="form-control" placeholder="Password">
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                        </div>
                        <div class="form-group">
                            <a href="#"><button type="button" class="form-control btn btn-outline-primar px-3">Resgister</button></a>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-50">
                                <label class="checkbox-wrap checkbox-primary">Remember Me
                                    <input type="checkbox" >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="w-50 text-md-right">
                                <a href="#" style="color: #fff">Forgot Password</a>
                            </div>
                        </div>
                    </form>
                    <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
                    <div class="social d-flex text-center">
                        <a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
                        <a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{asset('backend/form-login/js/popper.js')}}"></script>
<script src="{{asset('backend/form-login/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/form-login/js/main.js')}}"></script>

</body>
</html>

