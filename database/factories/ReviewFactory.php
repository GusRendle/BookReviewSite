<?php

namespace Database\Factories;

use App\Models\Page;
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
            'ISBN' => Book::inRandomOrder()->first()->ISBN,
            'page_id' => Page::inRandomOrder()->first()->id,
            'title' => str_replace(['?', '!','\'','.',','], '', $words),
            'content' => $this->faker->realText(150),
            'postDate' => $this->faker->dateTime(),
        ];
    }
}
