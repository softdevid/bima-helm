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
        static $size = 6;
        return [
            "category_id" => mt_rand(1, 2),
            "name" => "HELM " . (($merk === 'KYT') ? "KYT TT COURSE PLAIN MATT BLACK" : "INK CL MAX #5 WHITE YELLOW FLUO") . $size++,
            "slug" => $this->faker->slug(5),
            "merk" => $merk,
            "price" => $this->faker->randomNumber(6, true),
            "size_id" => $size++,
            "sold" => mt_rand(1, 5),
            "image" => (($merk === 'KYT') ? "kyt-tt-course-plain-mat-black" : "INK-CL-MAX-WHITE-YELLOW-FLUO") . ".jpeg"
        ];
    }
}
