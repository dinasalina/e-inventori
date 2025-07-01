@extends('layouts.master')

@section('title', 'Log Pergerakan Stok')

@section('content')
<div class="container-fluid mt-4"> {{-- ✅ Tukar ke container-fluid --}}
    <h4>Senarai Log Pergerakan Stok</h4>

    <a href="{{ route('pergerakan.create') }}" class="btn btn-success mb-3">+ Tambah Pergerakan</a>

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
