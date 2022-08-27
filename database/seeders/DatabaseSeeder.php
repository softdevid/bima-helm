<?php

namespace Database\Seeders;

use App\Models\Size;
use App\Models\User;
use App\Models\Image;
use App\Models\Product;
use App\Models\Category;
use App\Models\Merk;
use App\Models\SizeName;
use App\Models\Gudang;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {

        User::create([
            "frontName" => 'Admin',
            "lastName" => ' ',
            "password" => Hash::make('BMadmin@2022'),
            "email" => 'bimahelm@gmail.com',
            "noTelp" => ' ',
            "level" => 2,
        ]);

        User::create([
            "frontName" => 'Kasir',
            "lastName" => ' ',
            "password" => Hash::make('BMkasir@2022'),
            "email" => 'kasirbimahelm@gmail.com',
            "noTelp" => ' ',
            "level" => 1,
        ]);

        //category
        Category::create([
            "name" => "Helm Full Face",
            "slug" => "helm-full-face"
        ]);

        Category::create([
            "name" => "Helm Half Face",
            "slug" => "helm-half-face"
        ]);

        Category::create([
            "name" => "Aksesoris",
            "slug" => "aksesoris"
        ]);

        Category::create([
            "name" => "Spare Part",
            "slug" => "spare-part"
        ]);

        Category::create([
            "name" => "Lainnya",
            "slug" => "lainnya"
        ]);

        Merk::create([
            "name" => "KYT",
            "slug" => 'kyt',
        ]);

        Merk::create([
            "name" => "INK",
            "slug" => 'ink',
        ]);

        SizeName::create([
            'name' => 'XS',
            'slug' => 'xs'
        ]);

        SizeName::create([
            'name' => 'S',
            'slug' => 's'
        ]);

        SizeName::create([
            'name' => 'M',
            'slug' => 'm'
        ]);

        SizeName::create([
            'name' => 'LG',
            'slug' => 'lg'
        ]);

        SizeName::create([
            'name' => 'XL',
            'slug' => 'xl'
        ]);

        SizeName::create([
            'name' => 'XXL',
            'slug' => 'xxl'
        ]);

        Size::create([
            'xs' => 5,
            's' => 5,
            'm' => 5,
            'lg' => 5,
            'xl' => 5,
            'xxl' => 5,
        ]);

        Size::create([
            'xs' => 5,
            's' => 5,
            'm' => 5,
            'lg' => 5,
            'xl' => 5,
            'xxl' => 5,
        ]);

        Size::create([
            'xs' => 5,
            's' => 5,
            'm' => 4,
            'lg' => 5,
            'xl' => 4,
            'xxl' => 5,
        ]);

        Size::create([
            'xs' => 5,
            's' => 5,
            'm' => 4,
            'lg' => 4,
            'xl' => 4,
            'xxl' => 5,
        ]);

        Gudang::create([
            'xs' => 5,
            's' => 5,
            'm' => 5,
            'lg' => 5,
            'xl' => 5,
            'xxl' => 5,
        ]);

        Gudang::create([
            'xs' => 5,
            's' => 5,
            'm' => 5,
            'lg' => 5,
            'xl' => 5,
            'xxl' => 5,
        ]);

        Gudang::create([
            'xs' => 4,
            's' => 4,
            'm' => 5,
            'lg' => 5,
            'xl' => 5,
            'xxl' => 5,
        ]);

        Gudang::create([
            'xs' => 4,
            's' => 4,
            'm' => 4,
            'lg' => 5,
            'xl' => 5,
            'xxl' => 5,
        ]);


        Product::create([
            "category_id" => 1,
            "barcode" => "000000000000001",
            "name" => "HELM FULLFACE KTY RC SEVEN #14 YELLOW FLUO",
            "slug" => "fullface-kyt-rc-seven-14-yellow-fluo",
            "merk_id" => 1,
            "price" => "420000",
            "purchase_price" => "200000",
            "weight" => "2000",
            "size_id" => 1,
            "gudang_id" => 1,
            "stock" => 30,
            "gd_stock" => 30,
            "sold" => 3,
            'image_main' => "products/i4xtgsg8zngm5unfbh9e",
            "url" => "https://res.cloudinary.com/cv-mekar-cutting-digital/image/upload/v1661153096/products/i4xtgsg8zngm5unfbh9e.png",
            "description" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit fugiat voluptatum ut necessitatibus consequuntur. Consequuntur odio perferendis nobis maiores dolore! Veniam maiores nisi magnam sequi repellendus similique ut doloribus inventore!",
        ]);

        Product::create([
            "category_id" => 1,
            "barcode" => "000000000000002",
            "name" => "HELM FULLFACE KTY RC SEVEN #14 GREEN FLUO",
            "slug" => "fullface-kyt-rc-seven-14-green-fluo",
            "merk_id" => 2,
            "price" => "420000",
            "purchase_price" => "200000",
            "weight" => "2000",
            "size_id" => 2,
            "gudang_id" => 2,
            "stock" => 30,
            "gd_stock" => 30,
            "sold" => 3,
            'image_main' => "products/i4xtgsg8zngm5unfbh9e",
            "url" => "https://res.cloudinary.com/cv-mekar-cutting-digital/image/upload/v1661153096/products/i4xtgsg8zngm5unfbh9e.png",
            "description" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit fugiat voluptatum ut necessitatibus consequuntur. Consequuntur odio perferendis nobis maiores dolore! Veniam maiores nisi magnam sequi repellendus similique ut doloribus inventore!",
        ]);

        Product::create([
            "category_id" => 2,
            "barcode" => "000000000000003",
            "name" => "HELM FULLFACE KTY RC SEVEN #14 GREEN",
            "slug" => "fullface-kyt-rc-seven-14-green",
            "merk_id" => 2,
            "price" => "420000",
            "purchase_price" => "200000",
            "weight" => "2000",
            "size_id" => 3,
            "gudang_id" => 3,
            "stock" => 28,
            "gd_stock" => 28,
            "sold" => 3,
            'image_main' => "products/i4xtgsg8zngm5unfbh9e",
            "url" => "https://res.cloudinary.com/cv-mekar-cutting-digital/image/upload/v1661153096/products/i4xtgsg8zngm5unfbh9e.png",
            "description" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit fugiat voluptatum ut necessitatibus consequuntur. Consequuntur odio perferendis nobis maiores dolore! Veniam maiores nisi magnam sequi repellendus similique ut doloribus inventore!",
        ]);

        Product::create([
            "category_id" => 2,
            "barcode" => "000000000000004",
            "name" => "HELM FULLFACE KTY RC SEVEN #14",
            "slug" => "fullface-kyt-rc-seven-14",
            "merk_id" => 2,
            "price" => "420000",
            "purchase_price" => "200000",
            "weight" => "2000",
            "size_id" => 4,
            "gudang_id" => 4,
            "stock" => 27,
            "gd_stock" => 27,
            "sold" => 3,
            'image_main' => "products/i4xtgsg8zngm5unfbh9e",
            "url" => "https://res.cloudinary.com/cv-mekar-cutting-digital/image/upload/v1661153096/products/i4xtgsg8zngm5unfbh9e.png",
            "description" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit fugiat voluptatum ut necessitatibus consequuntur. Consequuntur odio perferendis nobis maiores dolore! Veniam maiores nisi magnam sequi repellendus similique ut doloribus inventore!",
        ]);

        //Product::factory(20)->create();
        // Image::factory(8)->create();

        // Size::factory(6)->create();
        DB::update('UPDATE products p INNER JOIN (SELECT sizes.id, SUM(xs+s+m+lg+xl+xxl) as total FROM sizes GROUP BY sizes.id) s ON p.size_id = s.id SET p.stock = s.total');
        // 'SELECT size_id, total FROM products as p INNER JOIN (SELECT sizes.id, SUM(xs+s+m+lg+xl+xxl) as total FROM sizes GROUP BY sizes.id) s ON p.size_id = s.id'
    }
}
