@extends('layouts.app')

@section('title', 'Product')

@section('content')
<section class="section bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Produk Kami</h2>
            <p class="text-muted" style="max-width: 500px; margin: 0 auto;">Nikmati berbagai olahan buah segar pilihan kami</p>
        </div>

        @forelse ($categories as $category)
            <div class="mb-5">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <h3 class="fw-bold mb-0">{{ $category->name }}</h3>
                    <div class="flex-grow-1" style="height: 2px; background: linear-gradient(to right, #198754, transparent);"></div>
                </div>
                @if ($category->description)
                    <p class="text-muted mb-4" style="max-width: 600px;">{{ $category->description }}</p>
                @endif

                <div class="row g-4">
                    @foreach ($category->menus as $menu)
                    <div class="col-md-4 col-6">
                        <div class="card product-card h-100 shadow-sm border-0">
                            <div class="position-relative overflow-hidden">
                                <img src="{{ asset('storage/' . $menu->image) }}" class="card-img-top" alt="{{ $menu->name }}">
                                @if ($menu->price > 0)
                                <span class="position-absolute top-0 end-0 m-3 badge bg-success rounded-pill px-3 py-2">
                                    Rp {{ number_format($menu->price) }}
                                </span>
                                @endif
                            </div>
                            <div class="card-body text-center d-flex flex-column">
                                <h5 class="fw-bold mb-1">{{ $menu->name }}</h5>
                                <p class="small text-muted flex-grow-1">{{ $menu->description }}</p>
                                <div class="mt-auto">
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', optional($profile)->phone ?? '6285123533853') }}?text=Halo%20Local%20Juice,%20saya%20tertarik%20dengan%20{{ urlencode($menu->name) }}" target="_blank" class="btn btn-success btn-sm btn-rounded px-3">
                                        <i class="bi bi-whatsapp me-1"></i>Pesan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        @empty
            <div class="text-center py-5">
                <i class="bi bi-box fs-1 text-muted"></i>
                <p class="text-muted mt-3">Belum ada produk tersedia.</p>
            </div>
        @endforelse
    </div>
</section>
@endsection
