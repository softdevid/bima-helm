<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $merk = $this->faker->randomElement(['KYT', 'INK']);
        return [
            "category_id" => mt_rand(1, 2),
            "merk" => $merk,
            "name" => "Helm" . ($merk === 'KYT') ? "TT COURSE PLAIN MATT BLACK" : "CL MAX #5 WHITE YELLOW FLUO",
            "slug" => $this->faker->slug(5),
            "price" => $this->faker->randomNumber(6, true),
            "size_id" => mt_rand(1, 2),
            "stock" => mt_rand(3, 8),
            "image" => (($merk === 'KYT') ? "kyt-tt-course-plain-mat-black" : "INK-CL-MAX-WHITE-YELLOW-FLUO") . ".jpeg"
        ];
    }
}
