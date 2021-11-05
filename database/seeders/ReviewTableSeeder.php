<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Comment;
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
        $reviews = Review::factory()->count(100)
        ->has(Comment::factory()->count(3), 'comments')
        ->create();
    }
}
