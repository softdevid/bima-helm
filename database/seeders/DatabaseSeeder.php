<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

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
    }
}
