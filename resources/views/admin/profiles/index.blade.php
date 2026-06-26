@extends('admin.layout')

@section('title', 'Profil Perusahaan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Profil Perusahaan</h3>
    <a href="{{ route('admin.profiles.create') }}" class="btn btn-success"><i class="bi bi-plus"></i> Tambah Profil</a>
</div>

<div class="card border-0 rounded-4 shadow">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Tentang</th>
                    <th>Visi</th>
                    <th>Misi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($profiles as $profile)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ Str::limit($profile->about, 60) }}</td>
                    <td>{{ Str::limit($profile->vision, 40) ?? '-' }}</td>
                    <td>{{ Str::limit($profile->mission, 40) ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.profiles.edit', $profile) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('admin.profiles.destroy', $profile) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center text-muted py-4">Belum ada profil.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
