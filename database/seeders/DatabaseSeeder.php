<?php

namespace Database\Seeders;

use App\Models\Size;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
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

        Category::create([
            "name" => "Helm Full Face",
            "slug" => "helm-full-face"
        ]);

        Category::create([
            "name" => "Helm Half Face",
            "slug" => "helm-half-face"
        ]);

        Product::factory(3)->create();

        Size::factory(3)->create();
        DB::update('UPDATE products p INNER JOIN (SELECT sizes.id, SUM(xs+s+m+lg+xl+xxl) as total FROM sizes GROUP BY sizes.id) s ON p.size_id = s.id SET p.stock = s.total');
    }
}
