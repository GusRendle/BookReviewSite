<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ISBN')->unsigned();
            $table->bigInteger('page_id')->unsigned();
            $table->string('title');
            $table->string('content');
            $table->timestamp('postDate');
            $table->timestamps();

            $table->foreign('page_id')->references('id')->on('pages')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('ISBN')->references('ISBN')->on('books')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
