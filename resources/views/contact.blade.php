@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<section class="section bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Hubungi Kami</h2>
            <p class="text-muted" style="max-width: 500px; margin: 0 auto;">Punya pertanyaan atau ingin pesan? Hubungi kami melalui kontak di bawah.</p>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="card border-0 rounded-4 shadow-sm p-4 text-center h-100">
                    <div class="fs-1 text-success mb-3"><i class="bi bi-geo-alt"></i></div>
                    <h5 class="fw-bold">Alamat</h5>
                    <p class="text-muted mb-0">{{ optional($profile)->address ?? 'Jl. H.Dulwanih Sawangan Kota Depok' }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 rounded-4 shadow-sm p-4 text-center h-100">
                    <div class="fs-1 text-success mb-3"><i class="bi bi-telephone"></i></div>
                    <h5 class="fw-bold">Telepon</h5>
                    <p class="text-muted mb-0">{{ optional($profile)->phone ?? '0851-2353-3853' }}</p>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', optional($profile)->phone ?? '6285123533853') }}" target="_blank" class="btn btn-success btn-sm btn-rounded mt-3 px-3">
                        <i class="bi bi-whatsapp me-1"></i>Chat WhatsApp
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 rounded-4 shadow-sm p-4 text-center h-100">
                    <div class="fs-1 text-success mb-3"><i class="bi bi-envelope"></i></div>
                    <h5 class="fw-bold">Email</h5>
                    <p class="text-muted mb-0">{{ optional($profile)->email ?? 'localjuiceid@gmail.com' }}</p>
                    <a href="mailto:{{ optional($profile)->email ?? 'localjuiceid@gmail.com' }}" class="btn btn-success btn-sm btn-rounded mt-3 px-3">
                        <i class="bi bi-envelope me-1"></i>Kirim Email
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
