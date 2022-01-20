<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->sentence(mt_rand(3, 7)),
            "slug" => $this->faker->slug(),
            "excerpt" => $this->faker->paragraph(),
            // "body" => '<p>' . implode('</p><p>', $this->faker->paragraphs(mt_rand(4, 8))) . '</p>',
            "body" => collect($this->faker->paragraphs(mt_rand(4, 8)))
                ->map(fn ($p) => "<p>$p</p>")
                ->implode(''),
            "user_id" => mt_rand(1, 3),
            "category_id" => mt_rand(1, 2)
        ];
    }
}
