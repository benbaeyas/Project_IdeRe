<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan Dana</title> {{-- Judul lebih spesifik --}}
    <link rel="stylesheet" href="{{ asset('css/formajuan.css') }}"> {{-- Pastikan path ini benar dan profile.css berisi style notifikasi --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> 
    
</head>
<body>

{{-- Notifikasi Form Ajuan --}}
@if(session('success_ajuan'))
    <div class="notification success-notification">
        {{ session('success_ajuan') }}
    </div>
@endif

{{-- Notifikasi Error Validasi (Laravel otomatis menampilkannya jika ada $errors) --}}
@if ($errors->any())
    <div class="notification error-notification">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="container">
        <div class="profile-card">
            <div class="form-actions">
                <a href="{{ route('pinjaman') }}" class="btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            <h2 class="profile-title">Form Pengajuan Dana Proyek</h2>

            <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="judul">Judul Proyek</label>
                    <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi Proyek</label>
                    <textarea name="deskripsi" id="deskripsi" rows="5" required>{{ old('deskripsi') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="foto_proyek">Foto Proyek</label>
                    <input type="file" name="foto_proyek" id="foto_proyek" accept="image/*" 
                    oninput="this.files[0].size <= 2097152 || alert('Ukuran file terlalu besar! Maksimum 2MB.')">
                </div>

                <div class="form-group">
                    <label for="target_dana">Jumlah Ajuan Dana (Rp)</label>
                    <input type="number" name="target_dana" id="target_dana" value="{{ old('target_dana') }}" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_mulai">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_berakhir">Tanggal Selesai</label>
                    <input type="date" name="tanggal_berakhir" id="tanggal_berakhir" value="{{ old('tanggal_berakhir') }}" required>
                </div>

                <div class="form-group">
                    <label for="category_id">Kategori Proyek</label>
                    <select name="category_id" id="category_id" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn-login">Simpan Proyek</button> {{-- Pertimbangkan ganti class jika btn-login spesifik untuk login --}}
            </form>
        </div>
    </div>
    
<script>
document.addEventListener('DOMContentLoaded', function() {
    const notifications = document.querySelectorAll('.notification');
    notifications.forEach(notification => {
        setTimeout(() => {
            notification.style.opacity = '0';
            setTimeout(() => {
                notification.style.display = 'none';
            }, 500); 
        }, 5000); 
    });
});
</script>

</body>
</html>