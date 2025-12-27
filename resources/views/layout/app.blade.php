<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title', 'Web Kalkulator Warung Sate Suka Mulya Mang Ipin')</title>
  
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- AOS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"/>

  <!-- Favicon -->
  <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #fdfaf6;
      color: #333;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    /* Navbar */
    .navbar {
      background-color: #8b2e14 !important;
    }
    .navbar-brand,
    .nav-link {
      color: #fff !important;
      font-weight: 500;
    }
    .nav-link:hover {
      color: #ffd9b3 !important;
    }

    /* Toggler */
    .navbar-toggler {
      border-color: #ffd9b3;
    }
    .navbar-toggler-icon {
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%23ffd9b3' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    /* Main Content */
    main.container {
      flex: 1;
      background: #fff;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.05);
      margin-top: 2rem;
    }

    /* Buttons */
    .btn-primary {
      background-color: #a3491a;
      border: none;
    }
    .btn-primary:hover {
      background-color: #8b2e14;
    }
    .btn-theme-pdf {
        background: #d35400;
        color: #fff;
        border: none;
    }
    .btn-theme-pdf:hover {
        background: #b94700;
        color: #fff;
    }

    .btn-theme-csv {
        background: #e67e22;
        color: #fff;
        border: none;
    }
    .btn-theme-csv:hover {
        background: #cf6f1d;
        color: #fff;
    }
    /* Footer */
    footer {
      background-color: #8b2e14;
      color: #fff;
      text-align: center;
      padding: 15px 0;
      margin-top: auto;
    }
    footer a {
      color: #ffd9b3;
      text-decoration: none;
    }
    footer a:hover {
      color: #fff;
    }

    /* Alert */
    .alert {
      border-radius: 10px;
    }

    /* Loading Screen */
    .loading-screen {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: #f6e7d8;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      z-index: 2000;
      transition: opacity .6s ease;
    }
    .loading-maskot {
      width: 160px;
      animation: float 1.6s ease-in-out infinite;
    }
    @keyframes float {
      0% { transform: translateY(0); }
      50% { transform: translateY(-12px); }
      100% { transform: translateY(0); }
    }
  </style>
</head>

<body>

@yield('loading')

{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('home') }}">
          <img src="{{ asset('images/kalkusate-icon.png') }}" alt="KalkuSate Icon"
              style="height:40px; width:auto;" class="me-2">
          KalkuSate
      </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ms-auto gap-2">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('kalkulator.index') }}">Kalkulator</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('laporan.index') }}">Laporan</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">Tentang</a></li>
            </ul>
        </div>
    </div>
</nav>

{{-- Main Content --}}
<main class="container my-4">

  @yield('content')
</main>

{{-- Footer --}}
<footer>
  <div class="container">
    <p class="mb-0">&copy; {{ date('Y') }} KalkuSate</p>
  </div>
</footer>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true
    });
</script>

@stack('scripts')

@if(session('success'))
<style>
    /* Toast posisi top-center */
    #toastSuccess {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 9999;
        min-width: 320px;
        border-radius: 10px;
        color: #fff;
        background: linear-gradient(90deg, #d35400, #e67e22); /* warna tema KalkuSate */
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        font-size: 16px;
    }
</style>

<div id="toastSuccess" class="toast text-white" role="alert">
    <div class="d-flex">
        <div class="toast-body fw-semibold">
            {{ session('success') }}
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto"
            data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var toastEl = document.getElementById('toastSuccess');
    var toast = new bootstrap.Toast(toastEl, {
        delay: 3000   // muncul selama 3 detik
    });
    toast.show();
});
</script>
@endif

</body>
</html>
