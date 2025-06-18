<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>IdeRe - Beranda</title>
  @include('components.navbar_inovator')
  <link rel="stylesheet" href="{{ asset('css/indeks_inovator.css') }}">

</head>
<body>

  <!-- Hero Section -->
  <section class="hero-bg">
    <div class="hero-section">
      <div class="left-content">
        <h1>Pendanaan Online Jangka Pendek Untuk Bantu Wujudkan Inovasi</h1>
        <p>10.000+ inovator</p>
        <div class="stats-grid">
          <div class="stat-box">
            <p>Total UMKM</p>
            <p>4000+</p>
          </div>
          <div class="stat-box">
            <p>Tenor Fleksibel</p>
            <p>1-2 Tahun</p>
          </div>
        </div>
      </div>
      <div>
        <img src="{{ asset('Gambar/Homepage_inovator.png') }}" alt="Dashboard Image" class="right-image">
      </div>
    </div>
  </section>

  <!-- Trusted Section -->
  <section class="trusted-section">
    <h2>Dipercaya Oleh</h2>
    <div class="trusted-grid">
      <img src="{{ asset('Gambar/afpi.png') }}" alt="AFPI Logo" class="trusted-logos">
      <img src="{{ asset('Gambar/legal dan aman.png') }}" alt="OJK Logo" class="trusted-logos">
      <img src="{{ asset('Gambar/OJK.png') }}" alt="ISO Logo" class="trusted-logos">
    </div>
  </section>

  <!-- Produk Pinjaman -->
  <section class="products-section">
    <h2>Produk Pinjaman</h2>
    <div class="product-cards">

      <!-- Term Loan -->
      <div class="product-card">
        <img src="{{ asset('Gambar/Term Loan.png') }}" alt="Term Loan" style="height:60px;">
        <h3>Term Loan (Pinjaman Berjangka)</h3>
        <p>Mendukung kebutuhan permodalan usaha dengan pembayaan multiguna dengan angsuran tetap.</p>
        <ul>
          <li><svg viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>Nominal pinjaman hingga Rp 2 Miliar</li>
          <li><svg viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>Tenor fleksibel hingga 24 bulan</li>
          <li><svg viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>Pelunasan dengan sistem angsuran setiap bulan</li>
        </ul>
        <a href="{{ route('project.formajuan') }}">Ajukan Pinjaman</a>
      </div>

      <!-- APF -->
      <div class="product-card-tngh">
        <img src="{{ asset('Gambar/APF.png') }}" alt="APF" style="height:60px;">
        <h3>APF (Pinjaman Po)</h3>
        <p>Solusi modal usaha bagi Anda yang mendapatkan pendanaan untuk membiayai purchase order kepada principal/supplier.</p>
        <ul>
          <li><svg viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>Nominal pinjaman hingga Rp 2 Miliar</li>
          <li><svg viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>Tenor hingga 120 hari</li>
          <li><svg viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>Pelunasan dengan sistem bullet repayment</li>
        </ul>
        <a href="{{ route('project.formajuan') }}">Ajukan Pinjaman</a>
      </div>

      <!-- Invoice Financing -->
      <div class="product-card">
        <img src="{{ asset('Gambar\Invoice Financing.png') }}" alt="Invoice Financing" style="height:60px;">
        <h3>Invoice Financing (Pinjaman Faktur Kerja)</h3>
        <p>Pembiayaan untuk menutup arus kas bisnis dengan menjadikan invoice Anda sebagai modal kerja.</p>
        <ul>
          <li><svg viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>Nominal pinjaman hingga Rp 2 Miliar</li>
          <li><svg viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>Tenor fleksibel hingga 90 hari</li>
          <li><svg viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>Pelunasan dengan sistem angsuran</li>
        </ul>
        <a href="{{ route('project.formajuan') }}">Ajukan Pinjaman</a>
      </div>
    </div>
  </section>

  <!-- Testimonial Slider (Gambar Statis) -->
  <section class="slider-section">
    <h3>Apa Kata Mereka?</h3>
    <div class="testimonial-slider">
      <div class="slides">
        <img src="{{ asset('Gambar/Testi 1.png') }}" alt="Testimoni 1">
        <img src="{{ asset('Gambar/Testi 2.png') }}" alt="Testimoni 2">
        <img src="{{ asset('Gambar/Testi 3.png') }}" alt="Testimoni 3">
        <img src="{{ asset('Gambar/Testi 4.png') }}" alt="Testimoni 4">
        <img src="{{ asset('Gambar/Testi 5.png') }}" alt="Testimoni 5">
        <img src="{{ asset('Gambar/Testi 6.png') }}" alt="Testimoni 6">
       <!-- Duplikasi slide pertama untuk efek looping -->
        <img src="{{ asset('Gambar/Testi 1.png') }}" alt="Testimoni 1 (duplikat)">
 
      </div>
    </div>
  </section>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
        const slides = document.querySelector('.testimonial-slider .slides');
        const images = document.querySelectorAll('.testimonial-slider .slides img');

        let index = 0;
        const totalImages = images.length - 1; // Kurangi 1 karena ada duplikat
        const slideWidth = 100 / images.length; // Lebar per gambar (%)

        function showNextSlide() {
            index++;

            if (index > totalImages) {
                // Kembali ke slide pertama secara instan (tanpa transisi)
                setTimeout(() => {
                    index = 0;
                    slides.style.transition = 'none'; // Hilangkan transisi saat reset
                    slides.style.transform = `translateX(-${index * slideWidth}%)`;
                    
                    // Kembalikan transisi setelah reset
                    setTimeout(() => {
                        slides.style.transition = 'transform 0.5s ease-in-out';
                    }, 20);
                }, 0);
            } else {
                slides.style.transition = 'transform 0.5s ease-in-out';
                slides.style.transform = `translateX(-${index * slideWidth}%)`;
            }
        }

        setInterval(showNextSlide, 6000); // Ganti slide setiap 6 detik
    });
  </script>
  @include('components.footer')

</body>
</html>