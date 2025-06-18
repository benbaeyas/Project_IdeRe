<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>IdeRe - Profile</title>
    @if(Auth::user()->role == 'investor')
        @include('components.navbar_investor')
    @elseif(Auth::user()->role == 'inovator')
        @include('components.navbar_inovator')
    @else
        <!-- Jika role tidak dikenali -->
        <p>Role tidak dikenali.</p>
    @endif
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>

{{-- Notifikasi Perubahan Password --}}
@if(session('success_password'))
    <div class="notification success-notification">
        {{ session('success_password') }}
    </div>
@endif

@if(session('error_password'))
    <div class="notification error-notification">
        {{ session('error_password') }}
    </div>
@endif

{{-- Menampilkan error validasi Laravel seperti password != password_confirmation --}}
@if ($errors->has('password') || $errors->has('password_confirmation'))
    <div class="notification error-notification">
        @if ($errors->has('password'))
            {{ $errors->first('password') }}
        @elseif ($errors->has('password_confirmation'))
            {{ $errors->first('password_confirmation') }}
        @endif
    </div>
@endif

@if(Auth::check())
    <!-- Profil Container -->
    <div class="container">
        <div class="profile-card">
            <div class="profile-header">
                <h2 class="profile-title">Profil Saya</h2>
                <span class="role-badge role-inovator">{{ ucfirst(Auth::user()->role) }}</span>
            </div>

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" value="{{ Auth::user()->nama }}" required />

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required />

                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" required>{{ Auth::user()->alamat }}</textarea>

                <!-- Tambahkan input untuk Password Lama -->
                <label for="current_password">Password Lama</label>
                <input type="password" id="current_password" name="current_password" placeholder="Masukkan password lama" required />

                <label for="password">Password Baru</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password baru" />

                <label for="password_confirmation">Konfirmasi Password Baru</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password baru" />
                <button type="submit">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@else
    <div class="container">
        <div class="alert alert-warning">
            Silakan <a href="{{ route('login.tampil') }}">login</a> terlebih dahulu untuk melihat profil Anda.
        </div>
    </div>
@endif

@include('components.footer')

<script>
document.addEventListener('DOMContentLoaded', function() {
    const notifications = document.querySelectorAll('.notification');
    notifications.forEach(notification => {
        setTimeout(() => {
            // Mulai transisi fade out
            notification.style.opacity = '0';
            // Hapus elemen dari DOM setelah transisi selesai
            setTimeout(() => {
                notification.style.display = 'none';
            }, 500); // Waktu ini harus cocok dengan durasi transisi di CSS (0.5s)
        }, 5000); // Notifikasi hilang setelah 5 detik (5000 ms)
    });
});
</script>

</body>
</html>