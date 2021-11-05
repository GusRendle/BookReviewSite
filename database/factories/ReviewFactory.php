<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
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
            'title' => str_replace(['?', '!','\'','.',','], '', $words),
            'author' => $this->faker->name(),
            'ISBN' => Book::inRandomOrder()->first()->ISBN,
            'content' => $this->faker->realText(150),
            'postDate' => $this->faker->dateTime(),
        ];
    }
}
