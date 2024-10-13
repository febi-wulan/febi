@extends('layouts.admin.main')
@section('title', 'Admin Flashsale')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Flashsale</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Flashsale</div>
            </div>
        </div>

        <a href="{{ route('flashsale.create') }}" class="btn btn-icon icon-left btn-primary">
            <i class="fas fa-plus"></i> Flashsale
        </a>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Produk</th>
                            <th>Harga Produk</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 0 @endphp
                        @forelse ($flashsales as $item)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }} Points</td>
                                <td>
                                    <a href="{{ route('flashsale.detail', $item->id) }}" class="badge badge-info">Detail</a>
                                    <a href="{{ route('flashsale.edit', $item->id) }}" class="badge badge-warning">Edit</a>
                                    <a href="{{ route('flashsale.delete', $item->id) }}" class="badge badge-danger"
                                    data-confirm-delete="true">Hapus</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Data Produk Flashsale Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection