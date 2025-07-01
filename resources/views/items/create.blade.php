@extends('layouts.master')

@section('title', 'Tambah Barang')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-success text-white">Tambah Barang Baru</div>
        <div class="card-body">
            <form action="{{ route('items.store') }}" method="POST">
                @csrf
                @include('items.form')
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('items.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
