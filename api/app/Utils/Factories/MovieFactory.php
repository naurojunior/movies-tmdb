<?php

namespace App\Utils\Factories;

use \App\Movie;

class MovieFactory {

    /**
     * Convert a single JSON movie to a Movie
     * @param type $movieJSON
     * @return Movie
     */
    public static function fromJSON($movieJSON) {
        $movie = new Movie(['title' => $movieJSON->title,
            'backdrop_path' => $movieJSON->backdrop_path, 'popularity' => $movieJSON->popularity,
            'release_date' => $movieJSON->release_date,
            'poster_path' => $movieJSON->poster_path, 'id' => $movieJSON->id, 'overview' => $movieJSON->overview]);
        
        $movie->setGenreIds($movieJSON->genre_ids);
        return $movie;
    }

    /**
     * Converts a JSON string to array of movies
     * @param type $jsonDecoded
     */
    public static function fromJSONArray($jsonDecoded) {
        return array_map(function ($itemJSONDecoded) {
            return MovieFactory::fromJSON($itemJSONDecoded);
        }, $jsonDecoded);
    }

}
