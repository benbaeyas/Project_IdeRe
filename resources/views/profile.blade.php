<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>IdeRe - Profile</title>

    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> 

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script> 

    <!-- CSS Eksternal -->
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    @if(Auth::user()->role == 'investor')
        @include('components.navbar_investor')
    @elseif(Auth::user()->role == 'inovator')
        @include('components.navbar_inovator')
    @else
        <p>Role tidak dikenali.</p>
    @endif

    <!-- Notifikasi -->
    @if(session('success_password'))
        <div class="notification success-notification fixed top-20 right-5 bg-green-500 text-white px-4 py-3 rounded shadow z-50 transition-opacity duration-500 ease-in-out opacity-100">
            {{ session('success_password') }}
        </div>
    @endif

    @if(session('error_password'))
        <div class="notification error-notification fixed top-20 right-5 bg-red-500 text-white px-4 py-3 rounded shadow z-50 transition-opacity duration-500 ease-in-out opacity-100">
            {{ session('error_password') }}
        </div>
    @endif

    @if ($errors->has('password') || $errors->has('password_confirmation'))
        <div class="notification error-notification fixed top-20 right-5 bg-red-500 text-white px-4 py-3 rounded shadow z-50 transition-opacity duration-500 ease-in-out opacity-100">
            @if ($errors->has('password'))
                {{ $errors->first('password') }}
            @elseif ($errors->has('password_confirmation'))
                {{ $errors->first('password_confirmation') }}
            @endif
        </div>
    @endif

    <!-- Profil Container -->
    @if(Auth::check())
        <div class="container max-w-3xl mx-auto px-4 py-10">
            <div class="profile-card bg-white shadow-md rounded-lg p-8">
                <div class="profile-header flex justify-between items-center mb-6">
                    <h2 class="profile-title text-2xl font-bold text-gray-800">Profil Saya</h2>
                    <span class="role-badge role-inovator bg-green-100 text-green-700 text-sm font-bold px-4 py-1 rounded-full">
                        {{ ucfirst(Auth::user()->role) }}
                    </span>
                </div>

                <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <!-- Nama -->
                    <div>
                        <label for="nama" class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama"
                            value="{{ Auth::user()->nama }}"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-400">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" name="email"
                            value="{{ Auth::user()->email }}"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-400">
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label for="alamat" class="block text-sm font-semibold text-gray-700 mb-1">Alamat</label>
                        <textarea id="alamat" name="alamat" rows="4"
                                required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-400">{{ Auth::user()->alamat }}</textarea>
                    </div>

                    <!-- Password Lama -->
                    <div>
                        <label for="current_password" class="block text-sm font-semibold text-gray-700 mb-1">Password Lama</label>
                        <input type="password" id="current_password" name="current_password"
                            placeholder="Masukkan password lama"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-400">
                    </div>

                    <!-- Password Baru -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Password Baru</label>
                        <input type="password" id="password" name="password"
                            placeholder="Masukkan password baru"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-400">
                    </div>

                    <!-- Konfirmasi Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-1">Konfirmasi Password Baru</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            placeholder="Ulangi password baru"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-400">
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md transition duration-300">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @else
        <div class="container max-w-3xl mx-auto px-4 py-10">
            <div class="bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700 p-4 rounded shadow-inner">
                <p>Anda belum login. Silakan <a href="{{ route('login.tampil') }}" class="font-semibold underline">login</a> terlebih dahulu.</p>
            </div>
        </div>
    @endif

    <!-- Footer -->
    @include('components.footer')

    <!-- Script untuk notifikasi -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const notifications = document.querySelectorAll('.notification');
        notifications.forEach(notification => {
            setTimeout(() => {
                notification.style.opacity = '0';
                setTimeout(() => {
                    notification.remove();
                }, 500);
            }, 5000);
        });
    });
    </script>

</body>
</html>