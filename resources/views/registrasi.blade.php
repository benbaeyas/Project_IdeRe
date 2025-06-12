<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - IdeRe</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>

<div class="registrasi-wrapper">
    <div class="registrasi-container">
        <!-- Kolom Kiri: Gambar -->
        <div class="registrasi-image">
            <img src="{{ asset('Gambar/Screen.png') }}" alt="background-image" class="gambar">
        </div>

        <!-- Kolom Kanan: Form -->
        <div class="registrasi-form-section">
            <div class="logo-container">
                <img src="{{ asset('Gambar/Logo Idere.png') }}" alt="Logo" class="logo">
                <h1>Daftar IdeRe</h1>
            </div>

            <!-- Form Register -->
            <form method="POST" action="{{ route('registrasi.submit') }}" class="registrasi-form">
                @csrf

                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap">

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="nama@email.com">

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="••••••••">

                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat lengkap">

                <label for="role">Daftar sebagai</label>
                <select id="role" name="role" required>
                    <option value="" disabled selected>Pilih peran</option>
                    <option value="inovator">Inovator</option>
                    <option value="investor">Investor</option>
                </select>

                <button type="submit" class="btn-registrasi">Daftar</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>