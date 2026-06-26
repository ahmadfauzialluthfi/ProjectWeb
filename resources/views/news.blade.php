@extends('layouts.app')

@section('title', 'Berita')

@section('content')
<section class="section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Berita Terbaru</h2>
            <p class="text-muted" style="max-width: 500px; margin: 0 auto;">Ikuti perkembangan dan kabar terbaru dari Local Juice</p>
        </div>

        <div class="row g-4">
            @forelse ($articles as $article)
            <div class="col-md-4">
                <div class="card border-0 rounded-4 shadow-sm h-100 overflow-hidden">
                    <div style="height: 200px; overflow: hidden;">
                        <img src="{{ $article->image ? asset('storage/' . $article->image) : asset('images/cover.jpg') }}"
                             class="w-100 h-100" style="object-fit: cover;" alt="{{ $article->title }}">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex gap-2 mb-2">
                            <span class="badge bg-success bg-opacity-10 text-success rounded-pill">{{ $article->author ?? 'Admin' }}</span>
                            <span class="badge bg-light text-muted rounded-pill">{{ $article->created_at->format('d M Y') }}</span>
                        </div>
                        <h5 class="fw-bold">{{ $article->title }}</h5>
                        <p class="small text-muted flex-grow-1">{{ Str::limit(strip_tags($article->content), 120) }}</p>
                        <a href="{{ route('news.detail', $article->id) }}" class="btn btn-outline-success btn-sm btn-rounded px-3 mt-auto align-self-start">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-newspaper fs-1 text-muted"></i>
                <p class="text-muted mt-3">Belum ada berita.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
