<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - IdeRe</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

<div class="login-wrapper">
    <div class="login-container">
        <!-- Kolom Kiri: Gambar -->
        <div class="login-image">
            <img src="{{ asset('Gambar/Screen.png') }}" alt="background-image" class="gambar">
        </div>

        <!-- Kolom Kanan: Form -->
        <div class="login-form-section">
            <div class="logo-container">
                <img src="{{ asset('Gambar/Logo Idere.png') }}" alt="Logo" class="logo">
                <h1>Login IdeRe</h1>
            </div>

            <!-- Form Login -->
            <form method="POST" action="{{ route('login.submit') }}" class="login-form">
                @csrf
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="nama@email.com">

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="••••••••">

                <button type="submit" class="btn-login">Login</button>

                <p class="register-link">
                    Belum punya akun?
                    <a href="{{ route('registrasi.tampil') }}" 
                        class="{{ request()->routeIs('registrasi') ? 'registrasi' : '' }}login-btn">Registrasi</a>
                </p>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>

</body>
</html>