<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IdeRe - Pinjaman</title>
      <link rel="stylesheet" href="{{ asset('css/indeks_inovator.css') }}">
      <script src="https://cdn.tailwindcss.com"></script> 
</head>
  <style>
    body {
      font-family: system-ui, sans-serif;
      margin: 0;
    }
  </style>
<body class="font-sans bg-gray-100">
  @include('components.navbar_inovator') 
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

  @include('components.footer')
</body>
</html>