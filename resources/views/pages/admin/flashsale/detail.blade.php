@extends('layouts.admin.main')
@section('title', 'Admin Detail Flahsale')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Flashsale</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.flashsale') }}">Flashsale</a>
                </div>
                <div class="breadcrumb-item">Detail Flashsale</div>
            </div>
        </div>

        <a href="{{ route('admin.flashsale') }}" class="btn btn-icon icon-left btn-warning">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="row mt-4">
            <div class="col-12 col-md-4 col-lg-12 m-auto">
                <article class="article article-style-c">
                    <div class="article-header">
                        <div class="article-image" data-background="{{ asset('images/' . $flashsale->image) }}"></div>
                    </div>
                    <div class="article-details">
                        <div class="article-category">
                            <a href="#">{{ $flashsale->name }}</a>
                            <div class="bullet"></div>
                            <a href="#">{{ $flashsale->category }}</a>
                        </div>
                        <div class="article-title">
                            <h2>
                                <a href="#">Harga: {{ $flashsale->price }} Points</a>
                            </h2>
                        </div>
                        <hr>
                        <p>{{ $flashsale->description }}</p>
                    </div>
                </article>
            </div>
        </div>
    </section>
</div>
@endsection