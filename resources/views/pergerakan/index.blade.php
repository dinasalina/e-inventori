@extends('layouts.master')

@section('title', 'Log Pergerakan Stok')

@section('content')
<div class="container-fluid mt-4"> {{-- ✅ Tukar ke container-fluid --}}
    <h4>Senarai Log Pergerakan Stok</h4>

    <a href="{{ route('pergerakan.create') }}" class="btn btn-success btn-sm mb-2">+ Tambah Pergerakan</a>
    <a href="{{ route('pergerakan.index') }}" class="btn btn-secondary btn-sm mb-2">Reset</a>


    <form method="GET" action="{{ route('pergerakan.index') }}" class="row g-3 mb-3">
    <div class="col-md-2">
        <input type="date" name="tarikh" value="{{ request('tarikh') }}" class="form-control" placeholder="Tarikh">
    </div>
    <div class="col-md-2">
        <select name="jenis" class="form-control">
            <option value="">Semua Jenis</option>
            <option value="masuk" {{ request('jenis') == 'masuk' ? 'selected' : '' }}>Masuk</option>
            <option value="keluar" {{ request('jenis') == 'keluar' ? 'selected' : '' }}>Keluar</option>
        </select>
    </div>
    <div class="col-md-3">
        <input type="text" name="barang" value="{{ request('barang') }}" class="form-control" placeholder="Nama Barang">
    </div>
    <div class="col-md-3">
        <input type="text" name="catatan" value="{{ request('catatan') }}" class="form-control" placeholder="Catatan">
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary w-100">Cari</button>
    </div>
    </form>


    <table class="table table-bordered table-striped w-100"> {{-- ✅ Tambah w-100 --}}
        <thead class="thead-dark">
            <tr>
                <th>Tarikh</th>
                <th>Barang</th>
                <th>Jenis</th>
                <th>Kuantiti</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pergerakan as $log)
                <tr>
                    <td>{{ $log->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $log->item->nama_barang }}</td>
                    <td>
                        @if ($log->jenis == 'masuk')
                            <span class="badge bg-success">Masuk</span>
                        @else
                            <span class="badge bg-danger">Keluar</span>
                        @endif
                    </td>
                    <td>{{ $log->kuantiti }}</td>
                    <td>{{ $log->catatan }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tiada rekod pergerakan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
