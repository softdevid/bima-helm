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
        static $size = 1;
        return [
            "category_id" => mt_rand(1, 2),
            "merk" => $merk,
            "name" => "HELM " . (($merk === 'KYT') ? "KYT TT COURSE PLAIN MATT BLACK" : "INK CL MAX #5 WHITE YELLOW FLUO"),
            "slug" => $this->faker->slug(5),
            "price" => $this->faker->randomNumber(6, true),
            "size_id" => $size++,
            "image" => (($merk === 'KYT') ? "kyt-tt-course-plain-mat-black" : "INK-CL-MAX-WHITE-YELLOW-FLUO") . ".jpeg"
        ];
    }
}
