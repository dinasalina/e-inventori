@extends('layouts.master')

@section('title', 'Dashboard Stok')

@section('content')
<div class="container-fluid">
    <h4>Dashboard Stok Inventori</h4>

    <div class="row mt-4">
        <!-- Kad: Jumlah Barang -->
        <div class="col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $total }}</h3>
                    <p>Jumlah Barang</p>
                </div>
                <div class="icon">
                    <i class="fas fa-boxes"></i>
                </div>
                <a href="{{ route('items.index') }}" class="small-box-footer">
                    Lihat Semua <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Kad: Stok Rendah -->
        <div class="col-md-4">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $stok_rendah }}</h3>
                    <p>Stok Rendah</p>
                </div>
                <div class="icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <a href="{{ route('items.index') }}" class="small-box-footer">
                    Lihat Senarai <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Kad: Barang OK -->
        <div class="col-md-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $stok_ok }}</h3>
                    <p>Barang OK</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <a href="{{ route('items.index') }}" class="small-box-footer">
                    Semak Barang <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Graf Kuantiti -->
    <div class="card mt-4">
        <div class="card-header bg-primary text-white">
            <h5>Graf Kuantiti Stok Barang</h5>
        </div>
        <div class="card-body">
            <div style="position: relative; height: 500px; width: 100%;">
                <canvas id="stokChart"></canvas>
            </div>
        </div>
    </div>


        <div class="card mt-4">
        <div class="card-header bg-danger text-white">
            <h5>Top 5 Barang Stok Rendah</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered table-striped m-0">
                <thead class="bg-light">
                    <tr>
                        <th>Nama Barang</th>
                        <th>Kuantiti</th>
                        <th>Paras Minimum</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($top5 as $item)
                        <tr>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->kuantiti }}</td>
                            <td>{{ $item->paras_minimum }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Tiada barang.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<!-- Chart.js dari CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('stokChart').getContext('2d');
    const stokChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [{
                label: 'Kuantiti Barang',
                data: {!! json_encode($data) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    position: 'top'
                },
                title: {
                    display: false,
                }
            }
        }
    });
</script>
@endsection
