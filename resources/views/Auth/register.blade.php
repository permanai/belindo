<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Tambahkan link CSS Bootstrap atau CSS lainnya di sini jika diperlukan -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #ffffff; /* Ubah latar belakang menjadi putih */
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
            background-color: rgba(0, 0, 0, 0.8); /* Untuk memberi efek transparan pada kartu */
            padding: 20px;
            border-radius: 10px;
            width: 400px; /* Lebar kartu */
            text-align: center; /* Membuat teks menjadi di tengah */
            position: relative; /* Memungkinkan penempatan absolut */
            overflow: hidden; /* Agar gambar tidak keluar dari card */
        }

        .card-header {
            background-color: transparent; /* Ubah latar belakang menjadi transparan */
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: inline-block; /* Menjadikan elemen inline-block */
            text-decoration: underline; /* Menambahkan garis bawah */
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
            background-color: rgba(0, 0, 0, 0.1); /* Warna latar belakang hitam agak cerah */
            color: #333; /* Warna teks hitam */
        }

        .form-control:focus {
            border-color: #007bff; /* Warna border saat input difokuskan */
            outline: none; /* Hilangkan outline */
        }

        .input-group-prepend span {
            padding: 10px;
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

        .side-image {
            height: 100vh; /* Tinggi gambar mengikuti tinggi layar */
            margin-right: 60px; /* Jarak yang lebih jauh ke kiri */
        }

        .side-image img {
            width: auto; /* Lebar gambar menyesuaikan proporsi */
            height: 100%; /* Tinggi gambar mengikuti tinggi layar */
        }

        .form-group label,
        .form-check-label {
            color: white; /* Warna teks putih */
        }

        .form-group label i {
            color: #007bff; /* Warna ikon */
        }

        .flex-container {
            display: flex;
            flex-direction: row-reverse; /* Letak card di sebelah kiri */
            align-items: center;
        }

        .card {
            margin-left: 20px; /* Jarak antara card dan gambar */
        }
    </style>
</head>
<body>

<div class="container">
    <div class="flex-container">
        <div class="card">
            <div class="card-header">{{ __('Register') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
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

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                        <a href="http://127.0.0.1:8000/log" class="btn btn-link">{{ __('Login') }}</a> <!-- Tombol Login -->
                    </div>
                </form>
            </div>
        </div>
        <img class="side-image" src="https://images.glints.com/unsafe/glints-dashboard.s3.amazonaws.com/company-logo/5e6a2fb0bbea356b56b3157f4ac93472.jpeg" alt="Side Image">
    </div>
</div>

</body>
</html>
