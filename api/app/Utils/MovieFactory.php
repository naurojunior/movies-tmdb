<?php

namespace App\Utils;

use \App\Movie;

class MovieFactory {

    /**
     * Convert a single JSON movie to a Movie
     * @param type $json
     * @return Movie
     */
    public static function JSONToMovie($json) {
        return new Movie($json->title, $json->poster, $json->backdrop, $json->popularity, $json->id);
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
