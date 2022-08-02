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
            "services" => ['EZ'],
            "payment" => ['BCA','BRI'],
        ]);
        Shipping::create([
            "name" => "JNE",
            "services" => ['YES', 'REG', 'OKE'],
            "payment" => ['BCA','BRI'],
        ]);
        Shipping::create([
            "name" => "NINJA",
            "services" => ['REGULER'],
            "payment" => ['BCA','BRI'],
        ]);
        Shipping::create([
            "name" => "SICEPAT",
            "services" => ['SIUNTUNG', 'BEST'],
            "payment" => ['BCA','BRI'],
        ]);
        Shipping::create([
            "name" => "ANTERAJA",
            "services" => ['REGULER', 'NEXT DAY'],
            "payment" => ['BCA','BRI'],
        ]);
    }
}
