@extends('layouts.app')

@section('title', 'About')

@section('content')
<section class="section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Tentang Kami</h2>
            <p class="text-muted" style="max-width: 500px; margin: 0 auto;">Kenali lebih dekat dengan Local Juice</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 rounded-4 shadow-sm p-4 p-md-5">
                    <p class="lead mb-4" style="line-height: 1.8;">
                        {{ optional($profile)->about ?? 'Local Juice Kios Olahan Buah merupakan salah satu jenis usaha yang bergerak di bidang F&B dan dibentuk pada Maret 2022. Berawal dari keresahan bersama, terkait banyaknya Kios Jus yang disinggahi kala itu, dan jarang sekali terdapat Kios Jus yang memiliki konsep menarik, ada beberapa yang memiliki konsep serta tempat yang menarik tetapi kurang menarik di produk, begitu pula sebaliknya. Maka dari itu, kami hadir dengan berbagai keberagaman macam manfaat kebaikan dari alam, mencoba masuk dengan konsep yang signifikan berbeda dari segi tempat, kebersihan serta produk. Dengan semangat juga kebersamaan seluruh Saker Local Juice, akan memberikan pengalaman yang terbaik bagi seluruh langgan. Kami menyajikan berbagai macam sajian olahan buah-buahan yang diharapkan berkualitas dan pastinya segar sesuai dengan key message kami yakni "Olahan Buah Segar", yang berarti kesegaran yang dapat dinikmati oleh semua kalangan.' }}
                    </p>
                </div>
            </div>
        </div>

        @if (optional($profile)->vision || optional($profile)->mission)
        <div class="row g-4 mt-4 justify-content-center">
            @if (optional($profile)->vision)
            <div class="col-lg-5">
                <div class="card border-0 rounded-4 shadow-sm h-100 p-4" style="border-left: 4px solid #198754 !important;">
                    <h4 class="fw-bold text-success mb-3"><i class="bi bi-eye me-2"></i>Visi</h4>
                    <p class="mb-0" style="line-height: 1.7;">{{ optional($profile)->vision }}</p>
                </div>
            </div>
            @endif
            @if (optional($profile)->mission)
            <div class="col-lg-5">
                <div class="card border-0 rounded-4 shadow-sm h-100 p-4" style="border-left: 4px solid #0d6efd !important;">
                    <h4 class="fw-bold text-primary mb-3"><i class="bi bi-flag me-2"></i>Misi</h4>
                    <p class="mb-0" style="line-height: 1.7;">{{ optional($profile)->mission }}</p>
                </div>
            </div>
            @endif
        </div>
        @endif
    </div>
</section>
@endsection
