<?php

namespace App\Utils;
use Interfaces\MovieFilterInterface;

class MovieFilter implements MovieFilterInterface {

    /**
     * 
     * Apply filters to a movie array
     * @param type $movies
     * @param type $filters
     */
    public static function filter($movies, $filters = []) {
        if (!$filters || !$filters['title']) {
            return $movies;
        }

        return array_filter($movies, function ($movie) use ($filters) {
            return (strpos(strtolower($movie->title), strtolower($filters['title'])) !== false);
        });
    }

}
