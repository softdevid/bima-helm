<?php

namespace Database\Seeders;

use App\Models\Size;
use App\Models\User;
use App\Models\Image;
use App\Models\Product;
use App\Models\Category;
use App\Models\Merk;
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


        // Product::create([
        //     "category_id" => 1,
        //     "name" => "HELM FULLFACE KTY RC SEVEN #14 YELLOW FLUO",
        //     "slug" => "fullface-kyt-rc-seven-14-yellow-fluo",
        //     "merk_id" => 1,
        //     "price" => "420000",
        //     "weight" => "2000",
        //     "size_id" => 1,
        //     "sold" => 3,
        //     'image_main' => "HELM-FULLFACE-KYT-RC-SEVEN-14-YELLOW-FLUO.jpeg",
        //     "url" => "https://res.cloudinary.com/cv-mekar-cutting-digital/image/upload/v1659326183/products/jntsanfausuhcfncpiuo.png",
        //     "description" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit fugiat voluptatum ut necessitatibus consequuntur. Consequuntur odio perferendis nobis maiores dolore! Veniam maiores nisi magnam sequi repellendus similique ut doloribus inventore!",
        // ]);

        // Product::create([
        //     "category_id" => 1,
        //     "name" => "HELM FULLFACE INK CL MAX WHITE YELLOW FLUO",
        //     "slug" => "fullface-ink-cl-max-whiteyellow-fluo",
        //     "merk_id" => 2,
        //     "price" => "469000",
        //     "weight" => "2000",
        //     "size_id" => 2,
        //     "sold" => 2,
        //     'image_main' => "HELM-FULLFACE-KYT-RC-SEVEN-14-YELLOW-FLUO.jpeg",
        //     "url" => "https://res.cloudinary.com/cv-mekar-cutting-digital/image/upload/v1659326183/products/jntsanfausuhcfncpiuo.png",
        //     "description" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit fugiat voluptatum ut necessitatibus consequuntur. Consequuntur odio perferendis nobis maiores dolore! Veniam maiores nisi magnam sequi repellendus similique ut doloribus inventore!",
        // ]);

        // Product::create([
        //     "category_id" => 1,
        //     "name" => "KYT C5 IANONE WHITE",
        //     "slug" => "fullface-kyt-c5-ianone-white",
        //     "merk_id" => 1,
        //     "price" => "2100000",
        //     "weight" => "2000",
        //     "size_id" => 3,
        //     "sold" => 2,
        //     'image_main' => "HELM-FULLFACE-KYT-RC-SEVEN-14-YELLOW-FLUO.jpeg",
        //     "url" => "https://res.cloudinary.com/cv-mekar-cutting-digital/image/upload/v1659326183/products/jntsanfausuhcfncpiuo.png",
        //     "description" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit fugiat voluptatum ut necessitatibus consequuntur. Consequuntur odio perferendis nobis maiores dolore! Veniam maiores nisi magnam sequi repellendus similique ut doloribus inventore!",
        // ]);

        // Product::create([
        //     "category_id" => 2,
        //     "name" => "KYT DJ MARU #5 BLACK RED MAROON",
        //     "slug" => "halfface-kyt-djmaru-5-black-red-maroon",
        //     "merk_id" => 1,
        //     "price" => "350000",
        //     "weight" => "2000",
        //     "size_id" => 4,
        //     "sold" => 1,
        //     'image_main' => "HELM-FULLFACE-KYT-RC-SEVEN-14-YELLOW-FLUO.jpeg",
        //     "url" => "https://res.cloudinary.com/cv-mekar-cutting-digital/image/upload/v1659326183/products/jntsanfausuhcfncpiuo.png",
        //     "description" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit fugiat voluptatum ut necessitatibus consequuntur. Consequuntur odio perferendis nobis maiores dolore! Veniam maiores nisi magnam sequi repellendus similique ut doloribus inventore!",
        // ]);

        // Product::create([
        //     "category_id" => 1,
        //     "name" => "KYT RC SEVEN #17 BLACK DOFT GOLD",
        //     "slug" => "fullface-kyt-rc-seven-17-black-doft-gold",
        //     "merk_id" => 1,
        //     "price" => "420000",
        //     "weight" => "2000",
        //     "size_id" => 5,
        //     "sold" => 4,
        //     'image_main' => "HELM-FULLFACE-KYT-RC-SEVEN-14-YELLOW-FLUO.jpeg",
        //     "url" => "https://res.cloudinary.com/cv-mekar-cutting-digital/image/upload/v1659326183/products/jntsanfausuhcfncpiuo.png",
        //     "description" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit fugiat voluptatum ut necessitatibus consequuntur. Consequuntur odio perferendis nobis maiores dolore! Veniam maiores nisi magnam sequi repellendus similique ut doloribus inventore!",
        // ]);

        // Product::create([
        //     "category_id" => 1,
        //     "name" => "KYT TT COURSE PLAIN MATT BLACK",
        //     "slug" => "kyt-tt-course-plain-matt-black",
        //     "merk_id" => 1,
        //     "price" => "1700000",
        //     "weight" => "2000",
        //     "size_id" => 6,
        //     "sold" => 5,
        //     'image_main' => "HELM-FULLFACE-KYT-RC-SEVEN-14-YELLOW-FLUO.jpeg",
        //     "url" => "https://res.cloudinary.com/cv-mekar-cutting-digital/image/upload/v1659326183/products/jntsanfausuhcfncpiuo.png",
        //     "description" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit fugiat voluptatum ut necessitatibus consequuntur. Consequuntur odio perferendis nobis maiores dolore! Veniam maiores nisi magnam sequi repellendus similique ut doloribus inventore!",
        // ]);

        // Product::create([
        //     "category_id" => 3,
        //     "name" => "Spoiler Helm KYT K2R",
        //     "slug" => "spoiler-helm-kyt-k2r",
        //     "merk_id" => null,
        //     "price" => "70000",
        //     "weight" => "100",
        //     "size_id" => null,
        //     "stock" => 20,
        //     "sold" => 1121,
        //     'image_main' => "HELM-FULLFACE-KYT-RC-SEVEN-14-YELLOW-FLUO.jpeg",
        //     "url" => "https://res.cloudinary.com/cv-mekar-cutting-digital/image/upload/v1659326183/products/jntsanfausuhcfncpiuo.png",
        //     "description" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit fugiat voluptatum ut necessitatibus consequuntur. Consequuntur odio perferendis nobis maiores dolore! Veniam maiores nisi magnam sequi repellendus similique ut doloribus inventore!",
        // ]);

        // Product::create([
        //     "category_id" => 4,
        //     "name" => "BUSA FULLSET HELM INK CX 22",
        //     "slug" => "busa-fullset-helm-ink-cx-22",
        //     "merk_id" => 2,
        //     "price" => "50000",
        //     "weight" => "500",
        //     "size_id" => null,
        //     "stock" => 5,
        //     "sold" => 6,
        //     'image_main' => "HELM-FULLFACE-KYT-RC-SEVEN-14-YELLOW-FLUO.jpeg",
        //     "url" => "https://res.cloudinary.com/cv-mekar-cutting-digital/image/upload/v1659326183/products/jntsanfausuhcfncpiuo.png",
        //     "description" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odit fugiat voluptatum ut necessitatibus consequuntur. Consequuntur odio perferendis nobis maiores dolore! Veniam maiores nisi magnam sequi repellendus similique ut doloribus inventore!",
        // ]);

        //Product::factory(20)->create();
        // Image::factory(8)->create();

        // Size::factory(6)->create();
        DB::update('UPDATE products p INNER JOIN (SELECT sizes.id, SUM(xs+s+m+lg+xl+xxl) as total FROM sizes GROUP BY sizes.id) s ON p.size_id = s.id SET p.stock = s.total');
        // 'SELECT size_id, total FROM products as p INNER JOIN (SELECT sizes.id, SUM(xs+s+m+lg+xl+xxl) as total FROM sizes GROUP BY sizes.id) s ON p.size_id = s.id'
    }
}