<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="img/favicon.ico" /> 
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/template/auth/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/template/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/template/auth/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/template/auth/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/template/auth/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/template/auth/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/template/auth/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/template/auth/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/template/auth/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/template/auth/css/main.css') }}">
    
    <style>
        body {
            background-color: #ffffff; 
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .card {
    background-color: rgba(0, 0, 0, 0.8);
    padding: 25px; 
    border-radius: 10px;
    width: 450px;
    height: 520px; 
    text-align: center; 
    position: relative; 
    overflow: hidden; 
    margin-bottom: -23px;
    margin-top: -23px;
}

        .card-header {
            color: white; 
            background-color: transparent; 
            padding: -2px;
            border-radius: 2px;
            margin-bottom: -20px;
            display: inline-block; 
            margin-top: -20px;
            /* text-decoration: underline;  */
        }

        .form-group {
            margin-bottom: 12px;
            text-align: left; 
        }

        .form-control {
            border-radius: 0px;
            border: 1px solid #ccc; 
            padding: 4px;
            width: 100%;
            box-sizing: border-box; 
            transition: border-color 0.3s ease; 
            background-color: rgba(0, 0, 0, 0.1); 
            color: #ffffff;
        }

        .form-control:focus {
            border-color: #007bff;
            outline: none;
        }

        .input-group-prepend span {
            padding: 10px;
        }

        .btn-primary {
            width: 100%;
            border-radius: 5px;
            padding: 10px;
            background-color: #007bff; 
            border: none;
            color: white; 
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3; 
        }

        .btn-link {
            color: #007bff; 
            text-decoration: none; 
            transition: color 0.3s ease; 
        }

        .btn-link:hover {
            color: #0056b3; 
        }

        .form-check-label {
            display: inline-block; 
            margin-right: 10px; 
        }

        .side-image {
            height: 100vh; 
            margin-right: 60px; 
        }

        .side-image img {
            width: auto; 
            height: 100%; 
        }

        .form-group label,
        .form-check-label {
            color: white; 
        }

        .form-group label i {
            color: #007bff; 
        }

        .flex-container {
            display: flex;
            flex-direction: row-reverse; 
            align-items: center;
        }

        .card {
            margin-left: 20px; 
        }
        .card-body {
    margin-top: -10px;
}
    </style>
</head>
<body>

<div class="container">
    <div class="flex-container">
        <div class="card">
            <div class="card-header" style="color: white;">{{ __('Register') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('register-post') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name"><i class="fas fa-user"></i> <span>{{ __('Name') }}</span></label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email"><i class="fas fa-envelope"></i> <span>{{ __('E-Mail Address') }}</span></label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password"><i class="fas fa-lock"></i> <span>{{ __('Password') }}</span></label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password-confirm"><i class="fas fa-lock"></i> <span>{{ __('Confirm Password') }}</span></label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="form-group">
                        <label for="phone"><i class="fas fa-phone"></i> <span>{{ __('Telepon') }}</span></label>
                        <input id="phone" type="tel" class="form-control @error('telp') is-invalid @enderror" name="telp" value="{{ old('telp') }}" required autocomplete="telp" autofocus>
                        @error('telp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address"><i class="fas fa-map-marker-alt"></i> <span>{{ __('Alamat') }}</span></label>
                        <input id="address" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus>
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                        <a href="{{ route('login') }}" class="btn btn-link">{{ __('Login') }}</a> 
                    </div>
                    
                </form>
            </div>
        </div>
        <img class="side-image" src="{{ asset('img/logo belindo.png') }}" alt="logo" style="width: 300px; height: auto; margin-top: -380px;margin-right: 400px;margin-left: -700px;">
        <img class="side-image" src="{{ asset('img/register1.png') }}" alt="logo" style="width: 600px; height: auto;margin-bottom: -80px">
    </div>
</div>
<div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="{{ asset('/template/auth/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/template/auth/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/template/auth/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('/template/auth/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/template/auth/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/template/auth/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('/template/auth/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/template/auth/vendor/countdowntime/countdowntime.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/template/auth/js/main.js') }}"></script>

</body>
</html>