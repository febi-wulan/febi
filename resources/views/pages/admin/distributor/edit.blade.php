@extends('layouts.admin.main')
@section('title', 'Admin Edit Distributor')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Distributor</h1>
        </div>

        <form action="{{ route('distributor.update', $distributor->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
            <label>Nama Distributor</label>
            <input type="text" name="nama_distributor" class="form-control" value="{{ old('nama_distributor', $distributor->nama_distributor) }}">

            </div>
            <div class="form-group">
                <label>Lokasi</label>
                <input type="text" name="lokasi" class="form-control" value="{{ $distributor->lokasi }}">
            </div>
            <div class="form-group">
                <label>Kontak</label>
                <input type="text" name="kontak" class="form-control" value="{{ $distributor->kontak }}">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $distributor->email }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </section>
</div>
@endsection