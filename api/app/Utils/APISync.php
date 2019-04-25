<?php

namespace App\Utils;

use Illuminate\Support\Facades\Redis;
use App\Genre;

class APISync {

    public static function genreSync() {
        $genres = TMDBMovieFetcher::fetchGenres();

        Genre::truncate();
        foreach ($genres as $genre) {
            $genre->save();
        }
    }

    public static function sync() {
        $movies = TMDBMovieFetcher::fetch();

        Redis::set('movies', json_encode($movies));
    }

}
