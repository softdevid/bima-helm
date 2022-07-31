<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    private static $product = 9;

    public function definition()
    {
        return [
            "image" => "HELM-FULLFACE-KYT-RC-SEVEN-14-YELLOW-FLUO.jpeg",
            'product_id' => 1,
            // "img_dt_1" => "HELM-FULLFACE-KYT-RC-SEVEN-14-YELLOW-FLUO.jpeg",
            // "img_dt_2" => "HELM-FULLFACE-KYT-RC-SEVEN-14-YELLOW-FLUO.jpeg",
            // "img_dt_3" => "HELM-FULLFACE-KYT-RC-SEVEN-14-YELLOW-FLUO.jpeg",
            // "img_dt_4" => "HELM-FULLFACE-KYT-RC-SEVEN-14-YELLOW-FLUO.jpeg",
        ];
    }
}
