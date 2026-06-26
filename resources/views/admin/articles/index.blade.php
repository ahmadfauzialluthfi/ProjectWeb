@extends('admin.layout')

@section('title', 'Artikel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Artikel</h3>
    <div>
        <a href="{{ route('admin.articles.export.pdf') }}" class="btn btn-danger"><i class="bi bi-filetype-pdf"></i> Export PDF</a>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-success"><i class="bi bi-plus"></i> Tambah Artikel</a>
    </div>
</div>

<div class="card border-0 rounded-4 shadow">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($articles as $article)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" width="60" height="40" style="object-fit:cover; border-radius:6px;">
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->author ?? '-' }}</td>
                    <td>
                        <span class="badge bg-{{ $article->status == 'published' ? 'success' : 'secondary' }}">
                            {{ $article->status }}
                        </span>
                    </td>
                    <td>{{ $article->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center text-muted py-4">Belum ada artikel.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
