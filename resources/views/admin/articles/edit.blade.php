@extends('admin.layout')

@section('title', 'Edit Artikel')

@section('content')
<h3>Edit Artikel</h3>

<div class="card border-0 rounded-4 shadow mt-3">
    <div class="card-body p-4">
        <form method="POST" action="{{ route('admin.articles.update', $article) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $article->title) }}" required>
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Konten</label>
                <textarea name="content" rows="8" class="form-control @error('content') is-invalid @enderror" required>{{ old('content', $article->content) }}</textarea>
                @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Gambar</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                    @if ($article->image)
                        <small class="d-block mt-1">
                            <img src="{{ asset('storage/' . $article->image) }}" width="100" class="mt-1 rounded">
                        </small>
                    @endif
                    @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label">Penulis</label>
                    <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author', $article->author) }}">
                    @error('author')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option value="draft" {{ (old('status', $article->status) == 'draft') ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ (old('status', $article->status) == 'published') ? 'selected' : '' }}>Published</option>
                    </select>
                    @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
