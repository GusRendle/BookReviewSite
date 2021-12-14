<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $words = $this->faker->realText(30);

        return [
            'user_id' => $this->faker->unique()->numberBetween(1, User::count()),
            'title' => str_replace(['?', '!','\'','.',','], '', $words),
            'description' => $this->faker->realText(150),
        ];
    }
}
