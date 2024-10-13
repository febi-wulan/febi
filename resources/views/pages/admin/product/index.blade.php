@extends('layouts.admin.main')
@section('title', 'Admin Product')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="breadcrumb-item">Produk</div>
        </div>
        <a href="{{route('product.create')}}" class="btn btn-icon icon-left btn-primary">
            <i class="fas fa-plus"></i> Produk
        </a>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th>#</th>
                        <th>Nama Produk</th>
                        <th>Harga Produk</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $no = 0;
                    @endphp
                    @forelse ($products as $item)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }} Points</td>
                        <td>
                            <a href="{{route('product.detail', $item->id) }}" class="badge badge-info">Detail</a>
                            <a href="{{route('product.edit', $item->id) }}" class="badge badge-warning">Edit</a>
                            <a href="{{route('product.delete', $item->id) }}" class="badge badge-danger"
                            data-confirm-delete="true">Hapus</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Data Produk Kosong</td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </section>
</div>
@endsection