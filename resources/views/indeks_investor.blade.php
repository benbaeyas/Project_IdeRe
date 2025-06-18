<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>IdeRe - Beranda</title>
  <link rel="stylesheet" href="{{ asset('css/indeks_investor.css') }}">
  <script src="https://cdn.tailwindcss.com"></script> 
</head>
<body class="font-sans bg-gray-100">
  @include('components.navbar_investor')

  <!-- Hero Section -->
  <section class="hero-bg bg-gradient-to-r from-[#00CF95] to-[#CFEC01] py-8 px-5 text-center relative overflow-hidden">
    <div class="hero-section flex justify-between items-center max-w-6xl mx-auto">
      <div class="left-content max-w-xl">
        <h1 class="text-2xl md:text-3xl font-bold text-white mb-2">Pendanaan Online Jangka Pendek Untuk Bantu Wujudkan Inovasi</h1>
        <p class="text-lg text-yellow-200">10.000+ inovator</p>
        <div class="stats-grid flex gap-5 mt-5 justify-center">
          <div class="stat-box bg-white/20 backdrop-blur-md p-4 rounded-lg text-center text-white">
            <p>Total UMKM</p>
            <p>4000+</p>
          </div>
          <div class="stat-box bg-white/20 backdrop-blur-md p-4 rounded-lg text-center text-white">
            <p>Tenor Fleksibel</p>
            <p>1-2 Tahun</p>
          </div>
        </div>
      </div>
      <div>
        <img src="{{ asset('Gambar/Homepage_investor.png') }}" alt="Dashboard Image" class="right-image h-[500px] z-20 p-4 rounded-full overflow-hidden">
      </div>
    </div>
  </section>

  <!-- Trusted Section -->
  <section class="trusted-section bg-white p-10 shadow-md rounded-lg my-5 mx-5 text-center">
    <h2 class="text-2xl font-semibold mb-6">Dipercaya Oleh</h2>
    <div class="trusted-grid grid grid-cols-3 gap-5 justify-items-center">
      <img src="{{ asset('Gambar/afpi.png') }}" alt="AFPI Logo" class="trusted-logos h-20 object-contain">
      <img src="{{ asset('Gambar/legal dan aman.png') }}" alt="OJK Logo" class="trusted-logos h-20 object-contain">
      <img src="{{ asset('Gambar/OJK.png') }}" alt="ISO Logo" class="trusted-logos h-20 object-contain">
    </div>
  </section>

  <!-- Produk Pinjaman -->
  <section class="products-section bg-white p-10 shadow-md rounded-lg my-5 mx-5">
    <h2 class="text-2xl font-semibold text-center mb-6">Produk Pinjaman</h2>
    <div class="product-cards flex flex-wrap justify-center gap-6">
      <!-- Term Loan -->
      <div class="product-card bg-white border border-gray-200 rounded-2xl p-5 w-80 shadow-md">
        <img src="{{ asset('Gambar/Term Loan.png') }}" alt="Term Loan" class="h-16">
        <h3 class="text-lg font-semibold mt-2">Term Loan (Pinjaman Berjangka)</h3>
        <p class="text-sm text-gray-600">Mendukung kebutuhan permodalan usaha dengan pembayaan multiguna dengan angsuran tetap.</p>
        <ul class="mt-3 list-none p-0">
          <li class="flex items-center text-sm text-gray-700"><svg class="w-4 h-4 fill-green-500 mr-2" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>Nominal pinjaman hingga Rp 2 Miliar</li>
          <li class="flex items-center text-sm text-gray-700"><svg class="w-4 h-4 fill-green-500 mr-2" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>Tenor fleksibel hingga 24 bulan</li>
          <li class="flex items-center text-sm text-gray-700"><svg class="w-4 h-4 fill-green-500 mr-2" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>Pelunasan dengan sistem angsuran setiap bulan</li>
        </ul>
        <a href="{{ route('project.formajuan') }}" class="block text-center mt-3 bg-yellow-300 text-black py-2 px-4 rounded-lg hover:bg-yellow-400 transition">Ajukan Pinjaman</a>
      </div>

      <!-- APF -->
      <div class="product-card-tngh bg-green-500 border border-gray-200 rounded-2xl p-5 w-80 shadow-md">
        <img src="{{ asset('Gambar/APF.png') }}" alt="APF" class="h-16">
        <h3 class="text-lg font-semibold mt-2 text-white">APF (Pinjaman Po)</h3>
        <p class="text-sm text-white">Solusi modal usaha bagi Anda yang mendapatkan pendanaan untuk membiayai purchase order kepada principal/supplier.</p>
        <ul class="mt-3 list-none p-0 text-white">
          <li class="flex items-center text-sm"><svg class="w-4 h-4 fill-white mr-2" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>Nominal pinjaman hingga Rp 2 Miliar</li>
          <li class="flex items-center text-sm"><svg class="w-4 h-4 fill-white mr-2" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>Tenor hingga 120 hari</li>
          <li class="flex items-center text-sm"><svg class="w-4 h-4 fill-white mr-2" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>Pelunasan dengan sistem bullet repayment</li>
        </ul>
        <a href="{{ route('project.formajuan') }}" class="block text-center mt-3 bg-yellow-300 text-black py-2 px-4 rounded-lg hover:bg-yellow-400 transition">Ajukan Pinjaman</a>
      </div>

      <!-- Invoice Financing -->
      <div class="product-card bg-white border border-gray-200 rounded-2xl p-5 w-80 shadow-md">
        <img src="{{ asset('Gambar/Invoice Financing.png') }}" alt="Invoice Financing" class="h-16">
        <h3 class="text-lg font-semibold mt-2">Invoice Financing (Pinjaman Faktur Kerja)</h3>
        <p class="text-sm text-gray-600">Pembiayaan untuk menutup arus kas bisnis dengan menjadikan invoice Anda sebagai modal kerja.</p>
        <ul class="mt-3 list-none p-0">
          <li class="flex items-center text-sm text-gray-700"><svg class="w-4 h-4 fill-green-500 mr-2" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>Nominal pinjaman hingga Rp 2 Miliar</li>
          <li class="flex items-center text-sm text-gray-700"><svg class="w-4 h-4 fill-green-500 mr-2" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>Tenor fleksibel hingga 90 hari</li>
          <li class="flex items-center text-sm text-gray-700"><svg class="w-4 h-4 fill-green-500 mr-2" viewBox="0 0 20 20"><path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/></svg>Pelunasan dengan sistem angsuran</li>
        </ul>
        <a href="{{ route('project.formajuan') }}" class="block text-center mt-3 bg-yellow-300 text-black py-2 px-4 rounded-lg hover:bg-yellow-400 transition">Ajukan Pinjaman</a>
      </div>
    </div>
  </section>

  <!-- Testimonial Slider -->
  <section class="slider-section bg-white p-10 shadow-md rounded-lg my-5 mx-5 text-center">
    <h3 class="text-xl font-semibold mb-6">Apa Kata Mereka?</h3>
    <div class="testimonial-slider relative w-full max-w-4xl mx-auto overflow-hidden rounded-lg">
      <div class="slides flex transition-transform duration-500 ease-in-out">
        <img src="{{ asset('Gambar/Testi 1.png') }}" alt="Testimoni 1" class="w-1/7 h-auto shrink-0">
        <img src="{{ asset('Gambar/Testi 2.png') }}" alt="Testimoni 2" class="w-1/7 h-auto shrink-0">
        <img src="{{ asset('Gambar/Testi 3.png') }}" alt="Testimoni 3" class="w-1/7 h-auto shrink-0">
        <img src="{{ asset('Gambar/Testi 4.png') }}" alt="Testimoni 4" class="w-1/7 h-auto shrink-0">
        <img src="{{ asset('Gambar/Testi 5.png') }}" alt="Testimoni 5" class="w-1/7 h-auto shrink-0">
        <img src="{{ asset('Gambar/Testi 6.png') }}" alt="Testimoni 6" class="w-1/7 h-auto shrink-0">
        <img src="{{ asset('Gambar/Testi 1.png') }}" alt="Testimoni 1 (duplikat)" class="w-1/7 h-auto shrink-0">
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
          setTimeout(() => {
            index = 0;
            slides.style.transition = 'none';
            slides.style.transform = `translateX(-${index * slideWidth}%)`;
            setTimeout(() => {
              slides.style.transition = 'transform 0.5s ease-in-out';
            }, 20);
          }, 0);
        } else {
          slides.style.transition = 'transform 0.5s ease-in-out';
          slides.style.transform = `translateX(-${index * slideWidth}%)`;
        }
      }

      setInterval(showNextSlide, 6000);
    });
  </script>

  @include('components.footer')

</body>
</html>