@extends('layouts.admin.main')
@section('title', 'Admin Edit Flashsale')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Flashsale</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.flashsale') }}">Flashsale</a>
                </div>
                <div class="breadcrumb-item">Edit Flashsale</div>
            </div>
        </div>

        <a href="{{ route('admin.flashsale') }}" class="btn btn-icon icon-left btn-warning">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="card mt-4">
            <form action="{{ route('flashsale.update', $flashsale->id) }}" class="needs-validation" novalidate="" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Nama Flashsale</label>
                                <input id="name" type="text" class="form-control" name="name" required="" value="{{ $flashsale->name }}">
                                <div class="invalid-feedback">
                                    Kolom ini harus di isi!
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="price">Harga Flashsale (Point)</label>
                                <input id="price" type="number" class="form-control" name="price" required="" value="{{ $flashsale->price }}">
                                <div class="invalid-feedback">
                                    Kolom ini harus di isi!
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="category">Kategori Flashsale</label>
                                <input id="category" type="text" class="form-control" name="category" required="" value="{{ $flashsale->category }}">
                                <div class="invalid-feedback">
                                    Kolom ini harus di isi!
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="description">Deskripsi Flashsale</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="40" required="">{{ $flashsale->description }}</textarea>
                                <div class="invalid-feedback">
                                    Isi berita harus di isi!
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <div class="custom-file">
                                    <input class="custom-file-input" name="image" id="customFile" type="file">
                                    <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-icon icon-left btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection