@extends('admin.layouts.template')
@section('content')
    <div class="container-fluid">

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Keuntungan hari ini</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                                    {{ number_format($thisDay, 0, ',', '.') }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-rupiah-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Keuntungan bulan ini</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                                    {{ number_format($thisMonth, 0, ',', '.') }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-rupiah-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Keuntungan Tahun ini</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                                    {{ number_format($thisYear, 0, ',', '.') }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-rupiah-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Total Produk: </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalProduct }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-box fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">
            <!-- Area Chart -->
            <div class="col-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Stok Barang</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Disajikan berdasarkan : </div>
                                <a class="dropdown-item active" href="#">Mingguan</a>
                                <a class="dropdown-item" href="#">Bulanan</a>
                                <a class="dropdown-item" href="#">Tahunan</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/admin/js/chartjs/chart.min.js"></script>
        <script>
            const myChart = new Chart(document.getElementById("myChart"), {
                type: "line",
                data: {
                    labels: [{!! $tgl_mingguan !!}],
                    datasets: [{
                            label: "Full Face",
                            data: [{!! $full_face !!}],
                            fill: true,
                            backgroundColor: ["rgba(255, 99, 132, 0.2)"],
                            borderColor: ["rgb(255, 99, 132)"],
                            borderWidth: 3,
                            tension: 0.1,
                        },
                        {
                            label: "Half Face",
                            data: [{!! $half_face !!}],
                            fill: true,
                            backgroundColor: ["rgba(255, 159, 64, 0.2)"],
                            borderColor: ["rgb(255, 159, 64)"],
                            borderWidth: 3,
                            tension: 0.1,
                        },
                        {
                            label: "Helm Anak",
                            data: [{!! $helm_anak !!}],
                            fill: true,
                            backgroundColor: ["rgba(54, 162, 235, 0.2)"],
                            borderColor: ["rgb(54, 162, 235)"],
                            borderWidth: 3,
                            tension: 0.1,
                        },
                        {
                            label: "Aksesoris",
                            data: [{!! $acc !!}],
                            fill: true,
                            backgroundColor: ["rgba(255, 205, 86, 0.2)"],
                            borderColor: ["rgb(255, 205, 86)"],
                            borderWidth: 3,
                            tension: 0.1,
                        },
                        {
                            label: "Spareparts",
                            data: [{!! $sp_part !!}],
                            fill: true,
                            backgroundColor: ["rgba(75, 192, 192, 0.2)"],
                            borderColor: ["rgb(75, 192, 192)"],
                            borderWidth: 3,
                            tension: 0.1,
                        },
                        {
                            label: "Lainnya",
                            data: [{!! $others !!}],
                            fill: true,
                            backgroundColor: ["rgba(153, 102, 255, 0.2)"],
                            borderColor: ["rgb(153, 102, 255)"],
                            borderWidth: 3,
                            tension: 0.1,
                        },
                    ],
                },
                options: {
                    plugins: {
                        filler: {
                            propagate: false,
                        },
                        tooltip: {
                            mode: "index",
                        },
                    },
                    radius: 5,
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: "nearest",
                        axis: "x",
                        intersect: false,
                    },
                    scales: {
                        x: {
                            display: true,
                            title: {
                                display: true,
                            },
                        },
                        y: {
                            stacked: "single",
                            display: true,
                            title: {
                                display: true,
                                text: "Stok",
                            },
                            beginAtZero: true,
                        },
                    },
                },
            });
        </script>
    </div>
@endsection
