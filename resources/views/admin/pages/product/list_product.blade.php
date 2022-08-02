@extends('admin.layouts.template')
@section('content')
    <div class="table-responsive">
        <a href="{{ route('admin-product.create') }}" class="btn btn-primary mb-3">Tambah</a>
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama Produk</th>                    
                    <th scope="col">Kategori</th>
                    <th scope="col">Harga</th>                    
                    <th scope="col">Stok</th>
                    <th scope="col" colspan="3">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">                
                @foreach ($products as $key => $product)
                    <tr class="text-center" style="vertical-align: middle;">
                        <th scope="row">{{ $key + 1 }}</th>
                        <td><img src="{{ $product->url }}" alt="" style="width: 100px;"></td>
                        <td>{{ $product->name }}</td>                        
                        <td>{{ $product->category->name }}</td>
                        <td>Rp. {{ number_format($product->price) }}</td>                        
                        <td>{{ $product->stock }}</td>
                        <td>
                            <a href="{{ route('admin-product.show',[$product->id]) }}" class="btn btn-outline-primary" title="Detail Produk"><i class="fa fa-book"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin-product.edit',[$product->id]) }}" class="btn btn-outline-warning" title="Edit Produk"><i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form method="POST" id="deleteProduct{{$key}}" action="{{ route('admin-product.destroy',[$product->id]) }}" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" title="Hapus Produk" onclick="confirm('Yakin mau dihapus ?')" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                          </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
