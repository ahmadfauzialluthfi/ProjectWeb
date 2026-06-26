@extends('layouts.app')

@section('title', $article->title)

@section('content')
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <a href="{{ route('news') }}" class="btn btn-outline-success btn-sm btn-rounded mb-4">
                    <i class="bi bi-arrow-left me-1"></i>Kembali
                </a>

                @if ($article->image)
                <div class="rounded-4 overflow-hidden mb-4 shadow-sm">
                    <img src="{{ asset('storage/' . $article->image) }}" class="w-100" style="max-height: 400px; object-fit: cover;" alt="{{ $article->title }}">
                </div>
                @endif

                <div class="d-flex gap-3 mb-3 text-muted small">
                    <span><i class="bi bi-person me-1"></i>{{ $article->author ?? 'Admin' }}</span>
                    <span><i class="bi bi-calendar me-1"></i>{{ $article->created_at->format('d M Y') }}</span>
                </div>

                <h1 class="fw-bold mb-4">{{ $article->title }}</h1>

                <div style="line-height: 1.8;">
                    {{ $article->content }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
