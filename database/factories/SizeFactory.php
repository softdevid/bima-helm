<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SizeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "xs" => mt_rand(0,5),
            "s" => mt_rand(0,5),
            "m" => mt_rand(0,5),
            "lg" => mt_rand(0,5),
            "xl" => mt_rand(0,5),
            "xxl" => mt_rand(0,5),
        ];
    }
}
