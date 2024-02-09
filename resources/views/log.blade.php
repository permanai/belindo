<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tambahkan link CSS Bootstrap atau CSS lainnya di sini jika diperlukan -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-image: url('https://images.glints.com/unsafe/glints-dashboard.s3.amazonaws.com/company-logo/85090daf37bbc510a6e138e8adbf0933.png');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background-color: rgba(0, 0, 0, 0.8); /* Warna latar belakang hitam dengan opacity */
            padding: 20px;
            border-radius: 10px;
            width: 400px; /* Lebar kartu */
            text-align: center; /* Membuat teks menjadi di tengah */
            position: relative; /* Mengatur posisi relatif untuk penempatan absolut */
        }

        .card-header,
        .form-group label,
        .form-check-label {
            color: rgba(255, 255, 255, 0.9); /* Warna teks putih agak gelap */
            text-decoration: underline; /* Mengubah teks menjadi bergaris bawah */
        }

        .card-header i,
        .form-group label i {
            color: rgba(255, 255, 255, 0.7); /* Warna ikon putih lebih gelap */
        }

        .card-header {
            background-color: transparent; /* Menghapus latar belakang biru muda */
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: inline-block; /* Menjadikan elemen inline-block */
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left; /* Menjadikan teks berada di sebelah kiri */
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ccc; /* Warna border */
            padding: 10px;
            width: 100%;
            box-sizing: border-box; /* Agar padding tidak menambah lebar input */
            transition: border-color 0.3s ease; /* Efek transisi saat hover/fokus */
            background-color: rgba(0, 0, 0, 0.1); /* Warna latar belakang hitam agak terang */
            color: white; /* Warna teks putih */
        }

        .form-control:focus {
            border-color: #007bff; /* Warna border saat input difokuskan */
            outline: none; /* Hilangkan outline */
        }

        .btn-primary {
            width: 100%;
            border-radius: 5px;
            padding: 10px;
            background-color: #007bff; /* Warna latar belakang tombol */
            border: none;
            color: white; /* Warna teks */
            cursor: pointer;
            transition: background-color 0.3s ease; /* Efek transisi saat hover */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Warna latar belakang tombol saat dihover */
        }

        .btn-link {
            color: #007bff; /* Warna teks */
            text-decoration: none; /* Hapus dekorasi */
            transition: color 0.3s ease; /* Efek transisi saat hover */
        }

        .btn-link:hover {
            color: #0056b3; /* Warna teks saat dihover */
        }

        .form-check-label {
            display: inline-block; /* Menjadikan label checkbox berada di sebelah kiri */
            margin-right: 10px; /* Memberi jarak antara label dan checkbox */
        }

        /* Gaya untuk tombol "Login with Google" */
        .login-google-btn {
            position: absolute; /* Menjadikan posisi absolut */
            bottom: 20px; /* Menempatkan tombol di bagian bawah card */
            left: 50%; /* Menyentuh sisi kiri card */
            transform: translateX(-50%); /* Pusatkan tombol di sepanjang lebar card */
        }

        /* Gaya untuk kontainer "Register" */
        .register-container {
            text-align: center; /* Pusatkan teks */
            position: relative; /* Mengatur posisi relatif */
            margin-top: 20px; /* Beri jarak atas */
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email"><i class="fas fa-envelope"></i> {{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password"><i class="fas fa-lock"></i> {{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                            <div class="register-container">
                                <a href="{{ route('register') }}" class="btn btn-link">{{ __('Register') }}</a> <!-- Tombol Register -->
                            </div>
                        </div>
                    </form>
                    <a href="#" class="btn btn-link login-google-btn">{{ __('Login with Google') }}</a> <!-- Tombol Login with Google -->
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
