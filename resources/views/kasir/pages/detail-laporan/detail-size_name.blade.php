<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }} - KASIR BIMA HELM</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>

    <!-- Custom fonts for this template-->
    {{-- <link href="/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> --}}
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/admin/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="/js/fas.js"></script>
    <link rel="stylesheet" type="text/css" href="/datatables/datatables.min.css" />

    <script type="text/javascript" src="/datatables/datatables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
    <style>
        @media print {
            #hide {
                visibility: hidden;
            }
        }
    </style>
</head>

<body>
    @if ($laporan->count())
        <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2>
                        <i class="fa-regular fa-shop"></i> Bima Helm
                        <small class="float-right">Jenis Ukuran: {{ $size_names->name }}</small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-6 invoice-col">
                    <address>
                        <h4>Kontak Kami:</h4>
                        <b>Phone:</b> (+62) 857-2806-0268<br>
                        <b>Email:</b> bimahelm@gmail.com<br>
                        <b>Almat:</b> Jl. Ahmad Yani No.76, Kandang Gampang, Kalikabong, Kec. Kalimanah, Kabupaten
                        Purbalingga, Jawa Tengah 53321
                    </address>
                </div>
                @php
                    $time = Carbon\Carbon::now();
                @endphp
                {{-- <div class="d-none">
                    @foreach ($laporans as $laporan)
                        {{ $profit = $laporan->profit }}
                    @endforeach
                </div> --}}
                <div class="col-sm-4 invoice-col">
                    <b>Total Keuntungan:</b> {{ number_format($totalProfit, 0, ',', '.') }} <br>
                    <b>Waktu Laporan:</b> {{ $time->toDateTimeString() }}<br>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print mb-3" id="hide">
                <div class="col-12">
                    <button class="btn btn-success" id="hide"><i class="fa fa-download"></i> Excel</button>
                    <a onclick="window.print()" class="btn btn-primary print" id="hide"><i
                            class="fas fa-print"></i> Print</a>
                    <a href="{{ route('laporan.index') }}" class="btn btn-secondary" id="hide"><i
                            class="fa fa-circle-left"></i>
                        Kembali</a>
                </div>
            </div>

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Produk</th>
                                <th>Merek</th>
                                <th>Stok Toko</th>
                                <th>Terjual ?</th>
                                <th>Harga Jual</th>
                                <th>Harga Beli</th>
                                <th>Keuntungan</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($laporan as $key => $laporan)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $laporan->product->name }}</td>
                                    <td>{{ $laporan->product->merk->name }}</td>
                                    <td>{{ $laporan->product->stock }}</td>
                                    <td>{{ $laporan->qty }}</td>
                                    <td>Rp. {{ number_format($laporan->product->purchase_price, 0, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($laporan->product->price, 0, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($laporan->profit, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <th colspan="7">Total Keuntungan:</th>
                                <th colspan="1">Rp. {{ number_format($totalProfit, 0, ',', '.') }}</th>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->


            <!-- this row will not appear when printing -->
            <div class="row no-print" id="hide">
                <div class="col-12">
                    <button class="btn btn-success"><i class="fa fa-download"></i> Excel</button>
                    <a onclick="window.print()" class="btn btn-primary print"><i class="fas fa-print"
                            id="hide"></i> Print</a>
                    <a href="{{ route('laporan.index') }}" class="btn btn-secondary"><i class="fa fa-circle-left"
                            id="hide"></i> Kembali</a>
                </div>
            </div>
        </div>
        <!-- /.invoice -->
        </div><!-- /.col -->
        </div><!-- /.row -->
        </div>
        </div>
    @else
        <h1 class="text-center mt-5">Tidak ada laporan penjualan</h1>
        <center><a href="{{ route('laporan.index') }}" class="btn btn-secondary"><i class="fa fa-circle-left"></i>
                Kembali</a></center>
    @endif

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="/js/jquery.table2excel.js"></script>

    <script>
        $("button").click(function() {
            $("#myTable").table2excel();
        });
    </script>
</body>

</html>
