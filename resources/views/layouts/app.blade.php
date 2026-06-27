<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Local Juice') - Local Juice</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { font-family: 'Inter', sans-serif; }

        body { padding-top: 64px; }

        /* ── Navbar ── */
        .navbar { background: #198754 !important; }
        .nav-link { font-weight: 500; position: relative; }
        .nav-link::after {
            content: ''; position: absolute;
            bottom: 0; left: 50%;
            width: 0; height: 2px;
            background: #fff;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        .nav-link:hover::after,
        .nav-link.active::after { width: 70%; }

        /* ── Hero ── */
        .hero-section {
            background: linear-gradient(135deg, #198754 0%, #2ecc71 50%, #16a085 100%);
            position: relative;
            overflow: hidden;
        }
        .hero-section::before {
            content: ''; position: absolute; inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            pointer-events: none;
        }

        /* ── Sections ── */
        .section { padding: 80px 0; }

        /* ── Product Card ── */
        .product-card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, .12);
        }
        .product-card .card-img-top { height: 220px; object-fit: cover; }

        /* ── Gallery ── */
        .gallery-item {
            overflow: hidden;
            border-radius: 16px;
            position: relative;
        }
        .gallery-img {
            width: 100%; height: 240px;
            object-fit: cover;
            border-radius: 16px;
            transition: transform 0.4s ease;
        }
        .gallery-item:hover .gallery-img { transform: scale(1.05); }
        .gallery-overlay {
            position: absolute; inset: 0;
            background: rgba(0, 0, 0, .4);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex; align-items: center; justify-content: center;
            border-radius: 16px;
            color: white; font-weight: 600;
        }
        .gallery-item:hover .gallery-overlay { opacity: 1; }

        /* ── Feature Card ── */
        .feature-card {
            border: none;
            border-radius: 16px;
            background: white;
            transition: all 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, .08);
        }

        /* ── Footer ── */
        .footer a {
            color: rgba(255, 255, 255, .75);
            text-decoration: none;
            transition: color 0.2s;
        }
        .footer a:hover { color: #fff; }

        /* ── Social Icons ── */
        .social-icon {
            width: 44px; height: 44px;
            padding: 0;
            display: flex; align-items: center; justify-content: center;
            border-radius: 50%;
        }

        /* ── Misc ── */
        .btn-rounded { border-radius: 50px; }
    </style>
</head>

<body>

    {{-- ── Navbar ── --}}
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="{{ route('home') }}">
                <i class="bi bi-cup-hot-fill me-2"></i>Local Juice
            </a>
            <button class="navbar-toggler border-0" data-bs-toggle="collapse" data-bs-target="#nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-1">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('product') }}" class="nav-link {{ request()->routeIs('product') ? 'active' : '' }}">Product</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('news') }}" class="nav-link {{ request()->routeIs('news*') ? 'active' : '' }}">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a href="{{ route('admin.login') }}" class="btn btn-outline-light btn-sm btn-rounded px-3">
                            <i class="bi bi-lock"></i> Admin
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('hero')

    <main>
        @yield('content')
    </main>

    {{-- ── Footer ── --}}
    <footer class="footer bg-success text-white pt-5 pb-3">
        <div class="container">
            <div class="row g-4">

                {{-- Deskripsi --}}
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-cup-hot-fill me-2"></i>Local Juice
                    </h5>
                    <p style="opacity: .85;">
                        {{ Str::limit(optional($profile)->about ?? 'Local Juice Kios Olahan Buah merupakan salah satu jenis usaha yang bergerak di bidang F&B dan dibentuk pada Maret 2022. Berawal dari keresahan bersama...', 150) }}
                    </p>
                </div>

                {{-- Kontak --}}
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-3">Kontak</h5>
                    <p class="mb-2" style="opacity: .85;">
                        <i class="bi bi-geo-alt me-2"></i>
                        {{ optional($profile)->address ?? 'Jl. H.Dulwanih No. 12, Sawangan, Kota Depok, Jawa Barat 16511' }}
                    </p>
                    <p class="mb-2" style="opacity: .85;">
                        <i class="bi bi-telephone me-2"></i>
                        {{ optional($profile)->phone ?? '0851-2353-3853' }}
                    </p>
                    <p class="mb-0" style="opacity: .85;">
                        <i class="bi bi-envelope me-2"></i>
                        {{ optional($profile)->email ?? 'localjuiceid@gmail.com' }}
                    </p>
                </div>

                {{-- Sosial Media --}}
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-3">Ikuti Kami</h5>
                    <div class="d-flex gap-2">
                        <a href="{{ optional($profile)->instagram ?? '#' }}" class="btn btn-light text-success social-icon">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="{{ optional($profile)->whatsapp ?? '#' }}" class="btn btn-light text-success social-icon">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                        <a href="{{ optional($profile)->facebook ?? '#' }}" class="btn btn-light text-success social-icon">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="{{ optional($profile)->tiktok ?? '#' }}" class="btn btn-light text-success social-icon">
                            <i class="bi bi-tiktok"></i>
                        </a>
                    </div>
                </div>

            </div>

            <hr class="my-4" style="opacity: .15;">

            <p class="text-center mb-0" style="opacity: .75;">
                &copy; {{ date('Y') }} Local Juice. All rights reserved.
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>