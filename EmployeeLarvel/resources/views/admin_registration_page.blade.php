<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/85960d6561.js" crossorigin="anonymous"></script>
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="img/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('img/bg-01.jpg');">
            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41">
                    Admin Registration
                </span>
                <form class="login100-form validate-form p-b-33 p-t-5" method="POST"
                    action="{{ route('registartion_admin') }}" enctype="multipart/form-data">
                    @csrf
                    @if (Session::has('success'))
                        <div class="alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if (Session::has('failed'))
                        <div class="alert-danger">{{ Session::get('failed') }}</div>
                    @endif
                    <div class="wrap-input100 validate-input" data-validate="Enter your Name">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Enter your Email">
                        <input class="input100" type="text" name="name" placeholder="User name">
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>

                    <div class="container-login100-form-btn m-t-32">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>


</body>

</html>
