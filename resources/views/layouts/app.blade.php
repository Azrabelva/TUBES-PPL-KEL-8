<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>KosNyaman</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --theme-color: #000000;
            --theme-dark: #111111;
            --soft-purple: var(--theme-color);
            --soft-purple-dark: var(--theme-dark);
            --muted: #6c757d;

            /* Global background: light blue */
            --bg-color: rgb(200, 182, 226); /* light blue tone */

            /* Card, form, footer colors (darker & harmonious) */
            --card-bg: #d9bfa8; /* deeper warm tone for cards */
            --card-border: rgba(0,0,0,0.12);
            --form-bg: #ffefe3;
            --footer-bg: #d1b08e;
        }

        body {
            font-family: 'Roboto', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
            font-weight: 400;
            background-color: var(--bg-color);
            color: #222;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Make main containers slightly elevated on the soft background */
        .container, .container-fluid {
            background: transparent;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.6rem;
            color: var(--soft-purple) !important;
        }
        .nav-link {
            font-weight: 500;
            color: #555 !important;
        }
        .nav-link:hover {
            color: var(--soft-purple-dark) !important;
        }

        /* Theme color overrides to black */
        .btn-primary {
            background-color: var(--theme-color) !important;
            border-color: var(--theme-color) !important;
            color: #fff !important;
        }
        .btn-primary:hover, .btn-primary:focus {
            background-color: var(--theme-dark) !important;
            border-color: var(--theme-dark) !important;
        }
        .btn-outline-primary {
            border-color: var(--theme-color) !important;
            color: var(--theme-color) !important;
        }
        .btn-outline-primary:hover {
            background-color: var(--theme-color) !important;
            color: #fff !important;
        }
        .btn-login {
            border-radius: 50px;
            padding: 6px 18px;
            font-weight: 500;
        }

        /* Active nav indicator */
        .nav-link.active {
            font-weight: 700;
            color: var(--soft-purple) !important;
            border-bottom: 3px solid var(--soft-purple);
            padding-bottom: calc(.5rem - 3px);
        }
        .btn-login.active-btn {
            background-color: var(--soft-purple) !important;
            color: #fff !important;
            border-color: var(--soft-purple) !important;
            transform: translateY(-1px);
        }

        .navbar {
            background: #fff;
            box-shadow: 0 1px 10px rgba(0,0,0,0.06);
            z-index: 1030;
        }

        /* Footer: use footer background and black text */
        footer {
            background: var(--footer-bg) !important;
            color: #000 !important;
        }
        footer a { color: #000 !important; }
        footer hr { border-color: rgba(0,0,0,0.06); }

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
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('images/logokos.png') }}" alt="Logo" style="height: 50px; margin-right: 10px;">
            KosNyaman
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item me-3">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
                </li>

                <li class="nav-item me-3">
                    <a href="{{ route('kos.index') }}" class="nav-link {{ request()->routeIs('kos.*') ? 'active' : '' }}">Kos</a>
                </li>

                <li class="nav-item me-3">
                    <a href="{{ route('helpdesk') }}" class="nav-link {{ request()->routeIs('helpdesk') ? 'active' : '' }}">Pusat Bantuan</a>
                </li>

                @if(!auth()->check())
                    <a href="{{ route('login') }}" class="btn btn-outline-primary btn-login me-2 {{ request()->routeIs('login') ? 'active-btn' : '' }}">Masuk</a>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-login {{ request()->routeIs('register') ? 'active-btn' : '' }}">Daftar</a>
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
