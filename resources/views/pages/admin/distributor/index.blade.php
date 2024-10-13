@extends('layouts.admin.main')
@section('title', 'Admin Distributor')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="breadcrumb-item">Distributor</div>
        </div>
        <a href="{{route('distributor.create')}}" class="btn btn-icon icon-left btn-primary">
            <i class="fas fa-plus"></i> Distributor
        </a>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th>#</th>
                        <th>Nama Distributor</th>
                        <th>Lokasi</th>
                        <th>Kontak</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $no = 0;
                    @endphp
                    @forelse ($distributor as $item)
                    <tr>
                        <td>{{ $no += 1 }}</td>
                        <td>{{ $item->nama_distributor }}</td>
                        <td>{{ $item->lokasi }} </td>
                        <td>{{ $item->kontak }}</td>
                        <td>{{ $item->email }}</td>

                        <td>
                            <a href="{{route('distributor.edit', $item->id) }}" class="badge badge-warning">Edit</a>
                            <a href="{{route('distributor.delete', $item->id) }}" class="badge badge-danger"
                            data-confirm-delete="true">Hapus</a>
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