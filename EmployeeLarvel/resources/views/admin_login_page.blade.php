<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V16</title>
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
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <!--===============================================================================================-->
</head>

<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('img/bg-01.jpg');">
            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41">
                    Admin Login
                </span>

                <form class="login100-form validate-form p-b-33 p-t-5" action="{{ route('login_admin') }}"
                    method="POST">
                    @csrf
                    @if (Session::has('sucess'))
                        <div class="alert alert-success">{{ Session::get('sucess') }}</div>
                    @endif
                    @if (Session::has('failed'))
                        <div class=" alert alert-danger">{{ Session::get('failed') }}</div>
                    @endif
                    <div class="wrap-input100 validate-input" data-validate="Enter your email">
                        <input class="input100" type="text" name="email" placeholder="User name">
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                        <span class="text-danger m-4">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                        <span class="text-danger m-4">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
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
