@extends('layouts.master')

@section('title', 'Statistik Pergerakan Stok')

@section('content')
<div class="container-fluid mt-4">
    <h4>Statistik Pergerakan Stok</h4>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title">Graf Stok Masuk & Keluar (Harian)</h5>
        </div>
        <div class="card-body">
            <canvas id="grafPergerakan" height="100"></canvas>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('grafPergerakan').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [
                {
                    label: 'Stok Masuk',
                    backgroundColor: 'rgba(40, 167, 69, 0.6)',
                    data: {!! json_encode($dataMasuk) !!}
                },
                {
                    label: 'Stok Keluar',
                    backgroundColor: 'rgba(220, 53, 69, 0.6)',
                    data: {!! json_encode($dataKeluar) !!}
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endsection
