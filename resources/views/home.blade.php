@extends('layouts.app')

@section('title', 'Home')

@section('hero')
<section class="hero-section section">
    <div class="container position-relative">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <div class="text-white">
                    <p class="mb-2 fw-semibold" style="letter-spacing: .08em; text-transform: uppercase; opacity: .9;">
                        Local Juice • Olahan Buah Segar
                    </p>
                    <h1 class="display-4 fw-bold mb-3">Rasakan segarnya buah,<br>langsung dari alam.</h1>
                    <p class="lead mb-4" style="opacity: .9; max-width: 540px;">
                        Sajian olahan buah-buahan dengan rasa autentik, kebersihan terjaga, dan kualitas yang konsisten.
                        Pilih favoritmu—dari lemon, jeruk, sampai mix kesukaan.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('product') }}" class="btn btn-light btn-lg btn-rounded px-4 fw-semibold shadow-sm">
                            <i class="bi bi-box me-2"></i>Lihat Produk
                        </a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg btn-rounded px-4 fw-semibold">
                            <i class="bi bi-whatsapp me-2"></i>Pesan / Hubungi
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card border-0 rounded-4 shadow-lg overflow-hidden">
                    <div class="p-4" style="background: rgba(255,255,255,.96);">
                        <h3 class="fw-bold mb-1">Menu Favorit</h3>
                        <p class="text-muted mb-4">Rekomendasi hari ini</p>
                        <div class="row g-3">
                            @forelse ($products->take(4) as $product)
                            <div class="col-6">
                                <div class="text-center">
                                    <div class="rounded-4 overflow-hidden border" style="background:#f7f7f7;">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                            style="width: 100%; height: 110px; object-fit: cover;" />
                                    </div>
                                    <div class="fw-semibold mt-2">{{ $product->name }}</div>
                                    <div class="small text-muted">Rp {{ number_format($product->price) }}</div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12 text-center text-muted py-3">Belum ada produk.</div>
                            @endforelse
                        </div>
                        <div class="d-flex gap-2 mt-4 flex-wrap">
                            <span class="badge text-bg-success rounded-pill px-3 py-2">Fresh sejak awal</span>
                            <span class="badge text-bg-success rounded-pill px-3 py-2">Ready to order</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<section class="section bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Kenapa Local Juice?</h2>
            <p class="text-muted" style="max-width: 600px; margin: 0 auto;">Kami hadir untuk memberikan pengalaman berbeda: konsep tempat yang menarik, proses yang bersih, dan rasa buah yang tetap natural.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-3 col-6">
                <div class="feature-card p-4 text-center h-100 shadow-sm">
                    <div class="fs-1 text-success">🧃</div>
                    <h5 class="fw-bold mt-3">Olahan Buah Segar</h5>
                    <p class="small text-muted mb-0">Rasa autentik dan fresh setiap hari.</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="feature-card p-4 text-center h-100 shadow-sm">
                    <div class="fs-1 text-success">✨</div>
                    <h5 class="fw-bold mt-3">Konsisten & Rapi</h5>
                    <p class="small text-muted mb-0">Kualitas terjaga dari awal sampai selesai.</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="feature-card p-4 text-center h-100 shadow-sm">
                    <div class="fs-1 text-success">🌿</div>
                    <h5 class="fw-bold mt-3">Bahan Pilihan</h5>
                    <p class="small text-muted mb-0">Dipilih untuk rasa yang terbaik.</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="feature-card p-4 text-center h-100 shadow-sm">
                    <div class="fs-1 text-success">🎉</div>
                    <h5 class="fw-bold mt-3">Banyak Pilihan</h5>
                    <p class="small text-muted mb-0">Dari klasik sampai mix favorit.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section bg-light">
    <div class="container">
        <div class="p-5 rounded-4 shadow-sm" style="background: linear-gradient(135deg, rgba(25,135,84,.1), rgba(13,110,253,.1));">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <h2 class="fw-bold mb-2">Siap menikmati olahan buah segar?</h2>
                    <p class="text-muted mb-0">Tanyakan menu favoritmu dan pesan cepat melalui informasi contact.</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('contact') }}" class="btn btn-success btn-lg btn-rounded px-4 fw-semibold">
                        <i class="bi bi-whatsapp me-2"></i>Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
