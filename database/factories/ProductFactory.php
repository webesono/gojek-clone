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
        return [
            'name' =>$this->faker->sentence(1),
            'excerpt'=>$this->faker->paragraph(),
            'body' => collect($this->faker->paragraphs(mt_rand(5, 7)))
                        ->map(fn($p)=> "<p>$p</p>")
                        ->implode('')
        ];
    }
}
