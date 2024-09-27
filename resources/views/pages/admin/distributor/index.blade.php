@extends('layouts.admin.main')
@section('title', 'Admin Distributor')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="breadcrumb-item">Distributor</div>
        </div>
        <a href="#" class="btn btn-icon icon-left btn-primary">
            <i class="fas fa-plus"></i> Distributor

        </a>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Lokasi</th>
                        <th>Kontak</th>
                        <th>Email</th>
                    </tr>
                    @php
                        $no = 0;
                    @endphp
                    @forelse ($distributors as $item)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $item->nama_distributor }}</td>
                        <td>{{ $item->lokasi }} Points</td>
                        <td>{{ $item->kontak }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <a href="#" class="badge badge-info">Detail</a>
                            <a href="#" class="badge badge-warning">Edit</a>
                            <a href="#" class="badge badge-danger">Hapus</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Data Distributor Kosong</td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </section>
</div>
@endsection