<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Beranda') | Front Page</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="navbar">
        <a href="{{ route('home') }}" class="brand">FrontPage</a>
        <nav>
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">Tentang</a>
            <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">Layanan</a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Kontak</a>
        </nav>
    </header>

    <main class="container">
        @yield('content')
    </main>

    <footer class="footer">
        &copy; {{ date('Y') }} FrontPage. Dibuat dengan Laravel.
    </footer>
</body>
</html>