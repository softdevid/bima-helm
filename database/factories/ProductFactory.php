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

    private static $size = 6;
    private static $img = 9;

    public function definition()
    {
        $merk = $this->faker->randomElement(['KYT', 'INK']);
        return [
            "category_id" => mt_rand(1, 2),
            "name" => "HELM " . (($merk === 'KYT') ? "KYT TT COURSE PLAIN MATT BLACK" : "INK CL MAX #5 WHITE YELLOW FLUO") . self::$size++,
            "slug" => $this->faker->slug(5),
            "merk_id" => mt_rand(1, 2),
            "price" => $this->faker->randomNumber(6, true),
            "size_id" => self::$size,
            "sold" => mt_rand(1, 5),
            // 'image_id' => self::$img++,
            "image_main" => (($merk === 'KYT') ? "kyt-tt-course-plain-mat-black" : "INK-CL-MAX-WHITE-YELLOW-FLUO") . ".jpeg"
        ];
    }
}
