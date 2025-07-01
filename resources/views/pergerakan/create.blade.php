@extends('layouts.master')

@section('title', 'Tambah Pergerakan Stok')

@section('content')
<div class="container mt-4">
    <h4>Tambah Pergerakan Stok</h4>

    <form action="{{ route('pergerakan.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Barang</label>
            <select name="item_id" class="form-control" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($items as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-2">
            <label>Jenis Pergerakan</label>
            <select name="jenis" class="form-control" required>
                <option value="masuk">Masuk</option>
                <option value="keluar">Keluar</option>
            </select>
        </div>

        <div class="form-group mt-2">
            <label>Kuantiti</label>
            <input type="number" name="kuantiti" class="form-control" required min="1">
        </div>

        <div class="form-group mt-2">
            <label>Catatan (optional)</label>
            <input type="text" name="catatan" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
