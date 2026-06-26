@extends('admin.layout')

@section('title', 'Galeri')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Galeri</h3>
    <div>
        <a href="{{ route('admin.galleries.export.pdf') }}" class="btn btn-danger"><i class="bi bi-filetype-pdf"></i> Export PDF</a>
        <a href="{{ route('admin.galleries.create') }}" class="btn btn-success"><i class="bi bi-plus"></i> Tambah Galeri</a>
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
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($galleries as $gallery)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $gallery->image) }}" width="60" height="40" style="object-fit:cover; border-radius:6px;">
                    </td>
                    <td>{{ $gallery->title }}</td>
                    <td>{{ Str::limit($gallery->description, 50) ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center text-muted py-4">Belum ada galeri.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
