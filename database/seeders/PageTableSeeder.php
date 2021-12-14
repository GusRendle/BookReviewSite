<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$page = Page::factory()->count(30)->hasComments(3)->create();
        $page = Page::factory()->count(30)->hasComments(3, function (array $attributes, Page $page) {return ['commentable_id' => $page->user_id];})->create();
    }
}
