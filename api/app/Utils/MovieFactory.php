<?php

namespace App\Utils;

use \App\Movie;

class MovieFactory {

    /**
     * Convert a single JSON movie to a Movie
     * @param type $movieJSON
     * @return Movie
     */
    public static function JSONToMovie($movieJSON) {
        return new Movie(['title' => $movieJSON->title, 'backdrop' => $movieJSON->backdrop_path, 'poster' => $movieJSON->poster_path, 'id' => $movieJSON->id,
            'genres' => $movieJSON->genres]);
    }

    /**
     * Converts a JSON string to array of movies
     * @param type $jsonString
     */
    public static function JSONStringToMovieArray($jsonString) {
        $jsonDecoded = json_decode($jsonString);
        return array_map(function ($itemJSONDecoded) {
            return MovieFactory::JSONToMovie($itemJSONDecoded);
        }, $jsonDecoded);
    }

}
