<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $review = Review::factory()->count(30)->create();

        // $reviews = Review::factory()->count(100)
        // ->has(Comment::factory()->count(3), 'comments')
        // ->create();
    }
}
