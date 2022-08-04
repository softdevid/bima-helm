@extends('admin.layouts.template')
@section('content')

<div class="row">
    <div class="col-lg-3">
        <p>Cover:</p>
        <form action="" method="post" class="d-inline">
        <button class="btn text-danger">X</button>
        @csrf
        @method('delete')
        </form>
        <img src="{{ $product->url }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
        <br>
         @if (count($images) > 0)
         <p>Images:</p>
         @foreach ($images as $image)
         <form action="" method="post" enctype="multipart/form-data">
             <button class="btn text-danger">X</button>
             @csrf
             @method('delete')
             </form>
         <img src="{{ $image->url }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
         @endforeach
         @endif
    </div>

    <div class="col-lg-9">
        <h3 class="text-center text-danger"><b>Udate Post</b> </h3>
	    <div class="form-group">
            <form action="{{ route('admin-product.update', [$product->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("put")

             <div class="mb-3 row">
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="hidden" name="size_id" value="{{ $product->size_id }}">                
                <label for="merk" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                    <select class="form-select form-control" name="category_id" aria-label="Default select example" required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if($product->category_id == $category->id) {{'selected'}} @endif>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Nama Produk</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        placeholder="Nama Produk" name="name" value="{{ $product->name }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            {{-- slug --}}
            <input type="hidden" class="form-control" id="slug" placeholder="Slug" name="slug"
                value="{{ $product->slug }}">
            {{-- end slug --}}
            <div class="mb-3 row">
                <label for="merk" class="col-sm-2 col-form-label">Merk</label>
                <div class="col-sm-10">                    
                    <select class="form-select form-control" name="merk_id" aria-label="Default select example" required>
                        <option value="">Pilih Merk</option>
                        @foreach ($merks as $merk)
                            <option value="{{ $merk->id }}" @if($product->merk_id == $merk->id) {{'selected'}} @endif>
                                {{ $merk->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="price" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="harga" placeholder="125000" name="price"
                        value="{{ $product->price }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="weight" class="col-sm-2 col-form-label">Berat produk</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col">
                            <input type="number" class="form-control" id="weight" placeholder="1000" name="weight"
                                value="{{ $product->weight }}" required>
                        </div>
                        <div class="col">
                            <b>gram</b>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="size" class="col-sm-2 col-form-label mt-4">Jumlah Stok / Ukuran</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col">
                            <label for="size" class="col-sm-2 col-form-label">XS</label>
                            <input type="number" value="{{ $product->size->xs }}" class="form-control" name="xs"
                                min="0" placeholder="0">
                        </div>
                        <div class="col">
                            <label for="size" class="col-sm-2 col-form-label">S</label>
                            <input type="number" class="form-control" name="s" value="{{ $product->size->s }}"
                                min="0" placeholder="0">
                        </div>
                        <div class="col">
                            <label for="size" class="col-sm-2 col-form-label">M</label>
                            <input type="number" class="form-control" name="m" value="{{ $product->size->m }}"
                                min="0" placeholder="0">
                        </div>
                        <div class="col">
                            <label for="size" class="col-sm-2 col-form-label">LG</label>
                            <input type="number" class="form-control" name="lg" value="{{ $product->size->lg }}"
                                min="0" placeholder="0">
                        </div>
                        <div class="col">
                            <label for="size" class="col-sm-2 col-form-label">XL</label>
                            <input type="number" class="form-control" name="xl" value="{{ $product->size->xl }}"
                                min="0" placeholder="0">
                        </div>
                        <div class="col">
                            <label for="size" class="col-sm-2 col-form-label">XXL</label>
                            <input type="number" class="form-control" name="xxl" value="{{ $product->size->xxl }}"
                                min="0" placeholder="0">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="price" class="col-sm-2 col-form-label">Deskrispsi</label>
                <div class="col-sm-10">
                    <textarea name="description" id="" cols="30" rows="10" style="height: 100px;"
                        placeholder="Deskripsi Produk" class="form-control" required>{{ $product->description }}</textarea>
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <label for="image_main" class="col-sm-2 col-form-label">Gambar utama</label>        
                    <div class="col-sm-10">                    
                        <input type="file" name="image_main" class="form-control">                    
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="size" class="col-sm-2 col-form-label">Gambar lain</label>        
                <div class="col-sm-10">                    
                    <input type="file" name="images[]" class="form-control">                                    
                </div>
            </div>
            
            <button type="submit" class="btn btn-danger mt-3 ">Submit</button>
            </form>
       </div>
    </div>
</div>

@endsection         









