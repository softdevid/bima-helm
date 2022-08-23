@extends('kasir.layouts.template')
@section('content')
    <div class="navbar">
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Cek Laporan
        </button>
        <div>
            <div class="d-none">
                @foreach ($laporans as $laporan)
                    {{ $profit = $laporan->profit }}
                @endforeach
            </div>
            Keuntungan = Rp. {{ number_format($profit + $profit, 0, ',', '.') }}
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>#</th>
                <th>Barcode</th>
                <th>Nama Produk</th>
                <th>Harga beli</th>
                <th>Harga Jual</th>
                <th>Jumlah Terjual</th>
                <th>Merk</th>
                <th>Keuntungan</th>
                <th>Tanggal Pelaporan</th>
            </tr>
            @foreach ($laporans as $key => $laporan)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $laporan->product->barcode }}</td>
                    <td>{{ $laporan->product->name }}</td>
                    <td>Rp. {{ number_format($laporan->product->purchase_price, 0, ',', '.') }}</td>
                    <td>Rp. {{ number_format($laporan->product->price, 0, ',', '.') }}</td>
                    <td class="text-center">{{ $laporan->qty }}</td>
                    <td>{{ $laporan->product->merk->name }}</td>
                    <td>
                        Rp.
                        {{ number_format($laporan->profit, 0, ',', '.') }}
                    </td>
                    <td>{{ date('d / m / Y', strtotime($laporan->created_at)) }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cek Laporan Menurut Tanggal, Bulan, Tahun, Merk dan
                        Ukuran</h5>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h3 class="card-title">Laporan Harian</h3>
                                </div>
                                <div class="card-body">

                                    <form action="/laporan/harian" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="date" name="harian" class="form-control mb-3" required>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-block">Cek
                                                        Laporan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h3 class="card-title">Laporan Bulanan</h3>
                                </div>
                                <div class="card-body">
                                    <form action="/laporan/bulanan" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="month" name="bulanan" class="form-control mb-3" required>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-block">Cek
                                                        Laporan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h3 class="card-title">Laporan Tahunan</h3>
                                </div>
                                <div class="card-body">
                                    <form action="/laporan/tahunan" method="POST">
                                        @csrf
                                        <div class="col-sm-12">
                                            <select type="text" name="tahunan" class="form-control mb-3" required>
                                                <option>Pilih Tahun</option>
                                                <?php
                                                $year = date('Y');
                                                $min = $year - 5;
                                                $max = $year;
                                                for ($i = $max; $i >= $min; $i--) {
                                                    echo '<option value=' . $i . '>' . $i . '</option>';
                                                } ?>
                                            </select>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block">Cek
                                                    Laporan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h3 class="card-title">Laporan menurut Merk</h3>
                                </div>
                                <div class="card-body">
                                    <form action="/laporan/merk" method="POST">
                                        @csrf
                                        <div class="col-sm-12">
                                            <select type="text" name="merk_id" class="form-control mb-3" required>
                                                <option>Pilih Merk</option>
                                                @foreach ($merks as $merk)
                                                    <option value="{{ $merk->id }}">{{ $merk->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block">Cek
                                                    Laporan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h3 class="card-title">Laporan menurut Ukuran</h3>
                                </div>
                                <div class="card-body">
                                    <form action="/laporan/size-name" method="POST">
                                        @csrf
                                        <div class="col-sm-12">
                                            <select type="text" name="size_name" class="form-control mb-3" required>
                                                <option>Pilih Ukuran</option>
                                                @foreach ($size_names as $size_names)
                                                    <option value="{{ $size_names->id }}">{{ $size_names->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block">Cek
                                                    Laporan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
