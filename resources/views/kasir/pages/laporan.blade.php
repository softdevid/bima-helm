@extends('kasir.layouts.template')
@section('content')

<div class="navbar">
  <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="/laporan-search" method="GET">
      <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small"
              placeholder="Cari laporan..." aria-label="Search" aria-describedby="basic-addon2" id="myInput" name="search">
          <div class="input-group-append">
              <button class="btn btn-primary" id="myInput" type="submit">
                  <i class="fas fa-search fa-sm"></i>
              </button>
          </div>
      </div>
  </form>

  <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Cek Laporan Waktu
  </button>
</div>

<div class="table-responsive">
  <table class="table">
    <tr>
      <th>#</th>
      <th>Nama Produk</th>
      <th>Harga beli</th>
      <th>Harga Jual</th>      
      <th>Jumlah Terjual</th>
      <th>Merk</th>
      <th>Keuntungan</th>
      <th>Kerugian</th>      
    </tr>
    @foreach ($laporan as $key => $laporan)
    <tr>
      <td>{{ $key + 1 }}</td>
      <td>{{ $laporan->product->name }}</td>
      <td>Rp. {{ number_format($laporan->product->purchase_price,0,',','.') }}</td>
      <td>Rp. {{ number_format($laporan->product->price,0,',','.') }}</td>
      <td class="text-center">{{ $laporan->qty }}</td>
      <td>{{ $laporan->product->merk->name }}</td>
      <td>
        @if(($laporan->product->price - $laporan->product->purchase_price) * $laporan->qty < 0)
        -
        @else
        Rp. {{ ($laporan->product->price - $laporan->product->purchase_price) * $laporan->qty }}</td>
        @endif
      <td>
        @if($laporan->product->price - $laporan->product->purchase_price > 0)
        -
        @else
          Rp. {{ number_format($laporan->product->purchase_price - $laporan->product->price,0,',','.') }}</td>
        @endif

        <td>{{ $laporan->created_at }}</td>
    </tr>
    @endforeach
  </table>
</div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cek Laporan Menurut Tanggal, Bulan dan Tahun</h5>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
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
                                <button type="submit" class="btn btn-primary btn-block">Cek Laporan</button>
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
                                <button type="submit" class="btn btn-primary btn-block">Cek Laporan</button>
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
                            for( $i=$max; $i>=$min; $i-- ) {
                            echo '<option value='.$i.'>'.$i.'</option>';
                          }?>
                        </select>
                        <div class="form-group">                        
                          <button type="submit" class="btn btn-primary btn-block">Cek Laporan</button>
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
