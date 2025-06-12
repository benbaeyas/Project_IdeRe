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

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" value="{{ Auth::user()->nama }}" required />

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required />

                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" required>{{ Auth::user()->alamat }}</textarea>

                <label for="password">Password Baru</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password baru" />

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

</body>
</html>