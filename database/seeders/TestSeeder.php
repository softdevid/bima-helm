<?php

namespace Database\Seeders;

use App\Models\Shipping;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    public function run()
    {
        Shipping::create([
            "name" => "JNT",
            "payment" => ['BCA','BRI'],
        ]);
        Shipping::create([
            "name" => "JNE",
            "payment" => ['BCA','BRI'],
        ]);
        Shipping::create([
            "name" => "NINJA",
            "payment" => ['BCA','BRI'],
        ]);
        Shipping::create([
            "name" => "SICEPAT",
            "payment" => ['BCA','BRI'],
        ]);
        Shipping::create([
            "name" => "ANTERAJA",
            "payment" => ['BCA','BRI'],
        ]);
    }
}
