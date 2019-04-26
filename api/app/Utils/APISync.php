<?php

namespace App\Utils;

use Illuminate\Support\Facades\Redis;
use App\Genre;
use App\Movie;
use App\Utils\Factories\GenreFactory;
use App\Utils\Factories\MovieFactory;

class APISync {

    public static function genreSync() {
        $genresJSON = TMDBMovieFetcher::fetchGenres();
        $genres = GenreFactory::fromJSONArray($genresJSON);

        Genre::query()->delete();
        foreach ($genres as $genre) {
            $genre->save();
        }
    }

    public static function movieSync() {
        $moviesJSON = TMDBMovieFetcher::fetchMovies();
        $movies = MovieFactory::fromJSONArray($moviesJSON);
        
        Movie::query()->delete();
        foreach ($movies as $movie) {
            $movie->save();
            $movie->genres()->attach($movie->getGenreIds());
        }

    }

}
