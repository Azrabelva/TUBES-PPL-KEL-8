<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>KosNyaman</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body {
            background-color: #fafafa;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.3rem;
            color: #2b2b2b !important;
        }
        .nav-link {
            font-weight: 500;
            color: #555 !important;
        }
        .nav-link:hover {
            color: #000 !important;
        }
        .btn-login {
            border-radius: 50px;
            padding: 6px 18px;
            font-weight: 500;
        }
        .navbar {
            z-index: 1030;
        }
        .container-content {
            padding-top: 80px;
        }
        @media (max-width: 576px) {
            .container-content { padding-top: 110px; }
        }
    </style>

    {{-- STYLE KHUSUS PER HALAMAN --}}
    @yield('styles')
</head>

<body class="d-flex flex-column min-vh-100 @yield('body_class')">

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg bg-white shadow-sm py-3 sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/">KosNyaman</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item me-3">
                    <a href="/" class="nav-link">Beranda</a>
                </li>

                <li class="nav-item me-3">
                    <a href="{{ route('kos.index') }}" class="nav-link">Kos</a>
                </li>

                <li class="nav-item me-3">
                    <a href="{{ route('helpdesk') }}" class="nav-link">Pusat Bantuan</a>
                </li>

                @if(!auth()->check())
                    <a href="{{ route('login') }}" class="btn btn-outline-primary btn-login me-2">Masuk</a>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-login">Daftar</a>
                @else
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="btn btn-danger btn-login">Logout</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

{{-- PAGE CONTENT --}}
<div class="container container-content">
    @yield('content')
</div>

{{-- FOOTER --}}
@include('layouts.footer')

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

{{-- SCRIPT KHUSUS PER HALAMAN (opsional, kalau Anda butuh) --}}
@yield('scripts')

</body>
</html>
