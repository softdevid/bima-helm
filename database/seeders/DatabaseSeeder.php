<?php

namespace Database\Seeders;

use App\Models\Size;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(2)->create();

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


        Product::create([
            "category_id" => 1,
            "name" => "HELM FULLFACE KTY RC SEVEN #14 YELLOW FLUO",
            "slug" => "fullface-kyt-rc-seven-14-yellow-fluo",
            "merk" => "KYT",
            "price" => "420000",
            "size_id" => 1,
            "sold" => 3,
            'image_id' => 1,
            "image_main" => "HELM-FULLFACE-KYT-RC-SEVEN-14-YELLOW-FLUO.jpeg"
        ]);

        Product::create([
            "category_id" => 1,
            "name" => "HELM FULLFACE INK CL MAX WHITE YELLOW FLUO",
            "slug" => "fullface-ink-cl-max-whiteyellow-fluo",
            "merk" => "INK",
            "price" => "469000",
            "size_id" => 2,
            "sold" => 2,
            'image_id' => 2,
            "image_main" => "INK-CL-MAX-WHITE-YELLOW-FLUO.jpeg"
        ]);

        Product::create([
            "category_id" => 1,
            "name" => "KYT C5 IANONE WHITE",
            "slug" => "fullface-kyt-c5-ianone-white",
            "merk" => "KYT",
            "price" => "2100000",
            "size_id" => 3,
            "sold" => 2,
            'image_id' => 3,
            "image_main" => "KYT-C5-IANONE-WHITE.jpeg"
        ]);

        Product::create([
            "category_id" => 2,
            "name" => "KYT DJ MARU #5 BLACK RED MAROON",
            "slug" => "halfface-kyt-djmaru-5-black-red-maroon",
            "merk" => "KYT",
            "price" => "350000",
            "size_id" => 4,
            "sold" => 1,
            'image_id' => 4,
            "image_main" => "KYT-DJ-MARU-5-BLACK-RED-MAROON.jpeg"
        ]);

        Product::create([
            "category_id" => 1,
            "name" => "KYT RC SEVEN #17 BLACK DOFT GOLD",
            "slug" => "fullface-kyt-rc-seven-17-black-doft-gold",
            "merk" => "KYT",
            "price" => "420000",
            "size_id" => 5,
            "sold" => 4,
            'image_id' => 5,
            "image_main" => "KYT-RC-SEVEN-17-BLACK-DOFT-GOLD.jpeg"
        ]);

        Product::create([
            "category_id" => 1,
            "name" => "KYT TT COURSE PLAIN MATT BLACK",
            "slug" => "kyt-tt-course-plain-matt-black",
            "merk" => "KYT",
            "price" => "1700000",
            "size_id" => 6,
            "sold" => 5,
            'image_id' => 6,
            "image_main" => "kyt-tt-course-plain-mat-black.jpeg"
        ]);

        Product::create([
            "category_id" => 3,
            "name" => "Spoiler Helm KYT K2R",
            "slug" => "spoiler-helm-kyt-k2r",
            "merk" => null,
            "price" => "70000",
            "size_id" => null,
            "stock" => 20,
            "sold" => 1121,
            'image_id' => 7,
            "image_main" => "Spoiler-KYT-K2R.jpeg"
        ]);

        Product::create([
            "category_id" => 4,
            "name" => "BUSA FULLSET HELM INK CX 22",
            "slug" => "busa-fullset-helm-ink-cx-22",
            "merk" => "INK",
            "price" => "50000",
            "size_id" => null,
            "stock" => 5,
            "sold" => 6,
            'image_id' => 8,
            "image_main" => "BUSA-FULLSET-HELM-INK-CX-22.jpeg"
        ]);

        Product::factory(20)->create();
        Image::factory(28)->create();

        Size::factory(26)->create();
        DB::update('UPDATE products p INNER JOIN (SELECT sizes.id, SUM(xs+s+m+lg+xl+xxl) as total FROM sizes GROUP BY sizes.id) s ON p.size_id = s.id SET p.stock = s.total');
        // 'SELECT size_id, total FROM products as p INNER JOIN (SELECT sizes.id, SUM(xs+s+m+lg+xl+xxl) as total FROM sizes GROUP BY sizes.id) s ON p.size_id = s.id'
    }
}
