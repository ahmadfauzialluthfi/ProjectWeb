<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Local Juice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body>
    <div class="d-flex">
        <nav class="d-flex flex-column flex-shrink-0 p-3 text-white bg-success" style="width: 250px; min-height: 100vh;">
            <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center mb-3 text-white text-decoration-none">
                <span class="fs-5 fw-bold">Local Juice Admin</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">
                        <i class="bi bi-speedometer2 me-2"></i>Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}" class="nav-link text-white">
                        <i class="bi bi-tags me-2"></i>Kategori
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.products.index') }}" class="nav-link text-white">
                        <i class="bi bi-box me-2"></i>Produk
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.galleries.index') }}" class="nav-link text-white">
                        <i class="bi bi-images me-2"></i>Galeri
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.profiles.index') }}" class="nav-link text-white">
                        <i class="bi bi-building me-2"></i>Profil
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.articles.index') }}" class="nav-link text-white">
                        <i class="bi bi-newspaper me-2"></i>Artikel
                    </a>
                </li>
            </ul>
            <hr>
            <a href="{{ url('/') }}" class="btn btn-outline-light btn-sm mb-2" target="_blank">
                <i class="bi bi-globe me-2"></i>Lihat Website
            </a>
            <a href="{{ route('admin.logout') }}" class="btn btn-outline-light btn-sm"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-left me-2"></i>Logout
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </nav>

        <div class="flex-grow-1 p-4">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
