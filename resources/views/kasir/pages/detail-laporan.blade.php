<title>{{ $title }} - KASIR BIMA HELM</title>
<style type="text/css">
  @media print(){
    .print{
      display: none;
    }
  }
</style>

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

<div class="invoice p-3 mb-3">
  <!-- title row -->
      <div class="row">
        <div class="col-12">
          <h4>
            <i class="fa-regular fa-shop"></i> Bima Helm
            <small class="float-right">Tahun: {{ $date }}</small>
          </h4>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>Admin, Inc.</strong><br>
            795 Folsom Ave, Suite 600<br>
            San Francisco, CA 94107<br>
            Phone: (804) 123-5432<br>
            Email: info@almasaeedstudio.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong>John Doe</strong><br>
            795 Folsom Ave, Suite 600<br>
            San Francisco, CA 94107<br>
            Phone: (555) 539-1037<br>
            Email: john.doe@example.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice #007612</b><br>
          <br>
          <b>Order ID:</b> 4F3S8J<br>
          <b>Payment Due:</b> 2/22/2014<br>
          <b>Account:</b> 968-34567
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-12 table-responsive">
          <table class="table">
            <thead>
            <tr>
              <th>#</th>
              <th>Nama Produk</th>
              <th>Merek</th>              
              <th>Terjual ?</th>
              <th>Harga Jual</th>
              <th>Harga Beli</th>
            </tr>
            </thead>
            <tbody>
            
            
            @foreach ($laporan as $key=> $laporan) 
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>{{ $laporan->product->name }}</td>
              <td>{{ $laporan->product->merk->name }}</td>              
              <td>{{ $laporan->qty }}</td>
              <td>{{ $laporan->product->price }}</td>
              <td>{{ $laporan->product->purchase_price }}</td>
            </tr>                  
            @endforeach                                

            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
              <!-- /.row -->
              

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-12">
              <a onclick="window.print()" class="btn btn-primary print"><i class="fas fa-print"></i> Print</a>
              <a href="{{ route('laporan.index') }}" class="btn btn-secondary"><i class="fa fa-circle-left"></i> Kembali</a>
            </div>
          </div>
        </div>
        <!-- /.invoice -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
    <!-- /.content -->
  </div>  