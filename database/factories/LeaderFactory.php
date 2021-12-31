<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LeaderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' =>$this->faker->name(mt_rand(1,5)),
            'position' => "ini jabatan",
            // $this->faker->sentence(mt_rand(1,3)),
            'excerpt'=>$this->faker->paragraph(),
            'body' => collect($this->faker->paragraphs(mt_rand(1, 1)))
                        ->map(fn($p)=> "<p>$p</p>")
                        ->implode('')
        ];
    }
}
