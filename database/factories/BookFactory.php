<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
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
            'ISBN' => $this->faker->unique()->isbn13(),
            'title' => str_replace(['?', '!','\'','.',','], '', $words),
            'author' => $this->faker->name(),
            'description' => $this->faker->realText(150),
            'publisher' => $this->faker->company(),
            'publishYear' => $this->faker->year(),
        ];
    }
}
