<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IdeRe - Pinjaman</title>
      @include('components.navbar_inovator')
      <link rel="stylesheet" href="{{ asset('css/indeks_inovator.css') }}">
</head>
<body>
  <style>
      body {
      font-family: system-ui, sans-serif;
      margin: 0;
      background-color: #f2f2f2;
    }
  </style>
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
  @include('components.footer')
</body>
</html>