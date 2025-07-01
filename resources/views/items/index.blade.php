@extends('layouts.master')

@section('title', 'Senarai Stok')

@section('content')
<div class="container-fluid">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3 text-right">
        <a href="{{ route('items.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Barang
        </a>
    </div>


    <div class="mb-3">
    <form action="{{ route('items.index') }}" method="GET" class="d-flex">
        <input type="text" name="search" value="{{ $search ?? '' }}" class="form-control me-2" placeholder="Cari nama atau kod barang...">
        <button type="submit" class="btn btn-primary btn-sm">
        <i class="fas fa-search"></i> Cari</button>
    </form>
    </div>


    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">Senarai Barang</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kod</th>
                        <th>Kuantiti</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->kod_barang }}</td>
                            <td>{{ $item->kuantiti }}</td>
                            <td>{{ $item->lokasi_simpanan }}</td>
                            <td>
                                @if($item->kuantiti <= $item->paras_minimum)
                                    <span class="badge bg-danger">Stok Rendah</span>
                                @else
                                    <span class="badge bg-success">OK</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('items.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Padam item ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center">Tiada rekod.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
