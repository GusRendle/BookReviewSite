<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Comment;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'review_id' => Review::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'content' => $this->faker->realText(150),
            'postDate' => $this->faker->dateTime(),
        ];
    }
}
