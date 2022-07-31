@extends('admin.layouts.template')
@section('content')
    <div class="table-responsive">
        <a href="/admin/product/create" class="btn btn-primary mb-3">Tambah</a>
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Merk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Ukuran</th>
                    <th scope="col">Stok</th>
                    {{-- <th scope="col">Aksi</th> --}}
                </tr>
            </thead>
            <tbody class="table-group-divider">                
                @foreach ($products as $key => $product)
                    <tr class="text-center" style="vertical-align: middle;">
                        <th scope="row">{{ $key + 1 }}</th>
                        <td><img src="{{ $product->image_main }}" alt="" style="width: 100px;"></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->merk }}</td>
                        <td>Rp. {{ number_format($product->price) }}</td>
                        <td>XL</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            {{-- <a href="/admin-product/detail/{{ $product->id }}" class="btn btn-primary"
                                title="Detail Produk"><i class="fa fa-paper"></i></a> --}}

                            {{-- <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit" title="Edit"><i
                                    class="fa fa-edit"></i></button> --}}

                            <form method="POST" id="deleteProduct{{$key}}" action="{{route('admin-product.destroy',[$product->id])}}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                          </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
