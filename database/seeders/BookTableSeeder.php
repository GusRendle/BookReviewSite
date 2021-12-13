<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = Book::factory()->count(30)->create();

        User::all()->each(function ($user) use ($books) { 
            $user->books()->attach(
                $books->random(rand(1, 3))->pluck('ISBN')->toArray()
            ); 
        });

    }
}
