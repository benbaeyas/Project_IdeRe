<div>
  <style>
    /* Navbar */
    .header {
      background-color: white;
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: sticky;
      top: 0;
      z-index: 50;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
      height: 4.4rem;
    }
    .logo {
      width: 2.5rem;
      height: 2.5rem;
    }
    h1 {
      color: #494949;
      font-size: 1.875rem;
      font-weight: bold;
    }
    .desktop-nav {
      display: flex;
      gap: 2rem;
      font-size: 1.125rem;
    }
    .desktop-nav a {
      color: #666;
      text-decoration: none;
      transition: color 0.3s ease;
    }
    .desktop-nav a:hover,
    .desktop-nav a.active {
      color: #00CF95;
      font-weight: bold;
    }
    .auth-buttons {
      display: flex;
      gap: 1rem;
    }
    .auth-buttons a,
    .auth-buttons button {
      padding: 0.5rem 1.5rem;
      border-radius: 0.5rem;
      font-weight: bold;
      text-decoration: none;
      border: none;
      cursor: pointer;
      font-family: inherit;
    }
    .logout-btn {
      background-color: #ef4444;
      color: white;
      width: auto !important;
      margin: 0 !important;
      padding: 0.5rem 1.5rem !important;
      border-radius: 0.5rem !important;
      font-size: 1rem !important;
      font-weight: bold;
    }
    .logout-btn:hover {
      background-color: #dc2626;
    }
    .mobile-toggle {
      font-size: 1.5rem;
      color: #333333;
      display: none;
    }
    .mobile-menu {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: white;
      padding: 2rem;
      box-sizing: border-box;
      z-index: 50;
      flex-direction: column;
      justify-content: flex-start;
      gap: 1.5rem;
    }
    .mobile-menu.show {
      display: flex;
    }
    .mobile-close {
      font-size: 2rem;
      text-align: right;
      cursor: pointer;
    }
    .mobile-links a {
      font-size: 1.5rem;
      color: #333333;
      text-decoration: none;
      display: block;
      transition: color 0.3s ease;
    }
    .mobile-links a:hover,
    .mobile-links a.active {
      color: #00CF95;
      font-weight: bold;
    }
    .mobile-auth {
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }
    .mobile-auth a,
    .mobile-auth button {
      padding: 0.75rem 1rem;
      border-radius: 0.5rem;
      text-align: center;
      font-weight: bold;
      text-decoration: none;
      border: none;
      cursor: pointer;
      font-family: inherit;
    }
    .mobile-login-btn {
      background-color: #00CF95;
      color: white;
    }
    .mobile-login-btn:hover {
      background-color: #00a67d;
    }
    .mobile-signup-btn {
      background-color: #CFEC01;
      color: black;
    }
    .mobile-signup-btn:hover {
      background-color: #b9d101;
    }
    .mobile-logout-btn {
      background-color: #ef4444;
      color: white;
    }
    .mobile-logout-btn:hover {
      background-color: #dc2626;
    }
    .logo-container {
      display: flex;
      align-items: center;
      gap: 1rem;
    }
    @media (max-width: 768px) {
      .desktop-nav,
      .auth-buttons {
        display: none;
      }
      .mobile-toggle {
        display: block;
      }
    }
  </style>

  <!-- HTML Navbar -->
  <nav class="header">
    <div class="logo-container">
      <img src="{{ asset('Gambar/Logo Idere.png') }}" alt="Logo" class="logo" />
      <h1>IdéRe</h1>
    </div>
    <div class="desktop-nav">
      <a href="{{ route('indeks_inovator') }}" class="{{ request()->routeIs('indeks_inovator') ? 'active' : '' }}">Home</a>
      <a href="{{ route('pinjaman') }}" class="{{ request()->routeIs('pinjaman') ? 'active' : '' }}">Pinjaman</a>
      <a href="{{ route('monitoring_inovator') }}" class="{{ request()->routeIs('monitoring_inovator') ? 'active' : '' }}">Monitoring</a>
      <a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'active' : '' }}">Profile</a>
    </div>
    <div class="auth-buttons">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">Keluar</button>
      </form>
    </div>
    <button class="mobile-toggle" wire:click="toggleMobileMenu">☰</button>
  </nav>
  <div id="mobileMenu" class="mobile-menu" style="{{ $isMobileMenuOpen ? 'display:flex;' : 'display:none;' }}">
    <div class="mobile-close" wire:click="toggleMobileMenu">&times;</div>
    <div class="mobile-links">
      <a href="{{ route('indeks_inovator') }}" class="{{ request()->routeIs('indeks_inovator') ? 'active' : '' }}">Home</a>
      <a href="{{ route('pinjaman') }}" class="{{ request()->routeIs('pinjaman') ? 'active' : '' }}">Pinjaman</a>
      <a href="{{ route('monitoring_inovator') }}" class="{{ request()->routeIs('monitoring_inovator') ? 'active' : '' }}">Monitoring</a>
      <a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'active' : '' }}">Profile</a>
    </div>
    <div class="mobile-auth">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="mobile-logout-btn">Keluar</button>
      </form>
    </div>
  </div>
</div>