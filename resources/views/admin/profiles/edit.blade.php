@extends('admin.layout')

@section('title', 'Edit Profil')

@section('content')
<h3>Edit Profil Perusahaan</h3>

<div class="card border-0 rounded-4 shadow mt-3">
    <div class="card-body p-4">
        <form method="POST" action="{{ route('admin.profiles.update', $profile) }}">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Tentang</label>
                <textarea name="about" rows="5" class="form-control @error('about') is-invalid @enderror" required>{{ old('about', $profile->about) }}</textarea>
                @error('about')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Visi</label>
                    <textarea name="vision" rows="3" class="form-control @error('vision') is-invalid @enderror">{{ old('vision', $profile->vision) }}</textarea>
                    @error('vision')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Misi</label>
                    <textarea name="mission" rows="3" class="form-control @error('mission') is-invalid @enderror">{{ old('mission', $profile->mission) }}</textarea>
                    @error('mission')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $profile->address) }}">
                    @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Telepon</label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $profile->phone) }}">
                    @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $profile->email) }}">
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.profiles.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
