@extends('layouts.master')

@section('title', 'Edit Barang')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-warning text-white">Edit Barang</div>
        <div class="card-body">
            <form action="{{ route('items.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('items.form', ['item' => $item])
                <button type="submit" class="btn btn-warning">Kemaskini</button>
                <a href="{{ route('items.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
