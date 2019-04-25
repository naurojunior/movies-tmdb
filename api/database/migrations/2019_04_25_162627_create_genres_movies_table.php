<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenresMoviesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('genres_movies', function (Blueprint $table) {
            $table->integer('genre_id')->unsigned()->nullable();
            $table->foreign('genre_id')->references('id')
                    ->on('genres')->onDelete('cascade');

            $table->integer('movie_id')->unsigned()->nullable();
            $table->foreign('movie_id')->references('id')
                    ->on('movies')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('genres_movies');
    }

}
