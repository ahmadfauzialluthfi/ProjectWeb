@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Dashboard</h2>
    <a href="{{ url('/') }}" class="btn btn-outline-success" target="_blank">
        <i class="bi bi-globe me-2"></i>Lihat Website
    </a>
</div>

<div class="row g-4">
    <div class="col-md-4 col-6">
        <a href="{{ route('admin.products.index') }}" class="text-decoration-none">
            <div class="card text-white bg-success border-0 rounded-4 shadow h-100">
                <div class="card-body text-center p-4">
                    <i class="bi bi-box fs-1"></i>
                    <h3 class="mt-2">{{ $totalProducts }}</h3>
                    <p class="mb-0">Produk</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4 col-6">
        <a href="{{ route('admin.categories.index') }}" class="text-decoration-none">
            <div class="card text-white bg-secondary border-0 rounded-4 shadow h-100">
                <div class="card-body text-center p-4">
                    <i class="bi bi-tags fs-1"></i>
                    <h3 class="mt-2">{{ $totalCategories }}</h3>
                    <p class="mb-0">Kategori</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4 col-6">
        <a href="{{ route('admin.galleries.index') }}" class="text-decoration-none">
            <div class="card text-white bg-info border-0 rounded-4 shadow h-100">
                <div class="card-body text-center p-4">
                    <i class="bi bi-images fs-1"></i>
                    <h3 class="mt-2">{{ $totalGalleries }}</h3>
                    <p class="mb-0">Galeri</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4 col-6">
        <a href="{{ route('admin.articles.index') }}" class="text-decoration-none">
            <div class="card text-white bg-warning border-0 rounded-4 shadow h-100">
                <div class="card-body text-center p-4">
                    <i class="bi bi-newspaper fs-1"></i>
                    <h3 class="mt-2">{{ $totalArticles }}</h3>
                    <p class="mb-0">Artikel</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4 col-6">
        <a href="{{ route('admin.profiles.index') }}" class="text-decoration-none">
            <div class="card text-white bg-primary border-0 rounded-4 shadow h-100">
                <div class="card-body text-center p-4">
                    <i class="bi bi-building fs-1"></i>
                    <h3 class="mt-2">{{ $totalProfiles }}</h3>
                    <p class="mb-0">Profil</p>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
