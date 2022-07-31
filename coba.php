<?php	
	
	$image1 = request()->file('image1');
	$image2 = request()->file('image2');
	$image3 = request()->file('image3');
	$image4 = request()->file('image4');

    $image1 ? $result1 = Cloudinary::upload($file->getRealPath(), ['folder' => 'products']) && $url1 = $result1->getSecurePath() : NULL;
    $image2 ? $result2 = Cloudinary::upload($file->getRealPath(), ['folder' => 'products']) && $url2 = $result2->getSecurePath() : NULL;
    $image1 ? $result3 = Cloudinary::upload($file->getRealPath(), ['folder' => 'products']) && $url3 = $result3->getSecurePath() : NULL;
    $image1 ? $result4 = Cloudinary::upload($file->getRealPath(), ['folder' => 'products']) && $url4 = $result4->getSecurePath() : NULL;        

	$image = Image::create([
        'img_dt_1' => $image1,
        'img_dt_2' => $image2,
        'img_dt_3' => $image3,
        'img_dt_4' => $image4,
    ]);

    $sizes = Size::create([
        'xs' => $request->xs ?? 0,
        's' => $request->s ?? 0,
        'm' => $request->m ?? 0,
        'lg' => $request->lg ?? 0,
        'xl' => $request->xl ?? 0,
        'xxl' => $request->xxl ?? 0,
    ]);

    $stock = $request->xs + $request->s + $request->m + $request->lg + $request->xl + $request->xxl;

    Product::create([
        "category_id" => $request->category_id,
        "name" => $request->name,
        "slug" => Str::slug($request->name),
        "merk" => $request->merk,
        "price" => $request->price,
        "weight" => $request->weight,
        "stock" => $stock,
        "image_id" => $image->id,
        "size_id" => $sizes->id,
    ]);

    return redirect('/admin/product')->withSuccess('success', 'Tambah Berhasil!');
?>