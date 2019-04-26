<?php

namespace App\Utils;

use App\Utils\Interfaces\MovieFetcherInterface;

class TMDBMovieFetcher implements MovieFetcherInterface {

    /**
     * @return JSON of genres
     */
    public static function fetchGenres() {
        return TMDBMovieFetcher::execCURL("/genre/movie/list")->genres;
    }

    /**
     * @return JSON of movies
     */
    public static function fetchMovies() {
        $moviesJSON = TMDBMovieFetcher::requestMoviePage();

        $movies = $moviesJSON->results;
        for ($page = 2; $page <= $moviesJSON->total_pages; $page++) {
            $movies = array_merge($movies, TMDBMovieFetcher::requestMoviePage($page)->results);
        }

        return $movies;
    }

    /**
     * Request movies from TMDB
     * @return type
     */
    private static function requestMoviePage($page = 1) {
        return TMDBMovieFetcher::execCURL("/movie/upcoming", "&language=en-US&page=" . $page);
    }

    /**
     * Fetch the results of TMBD API
     * @param type $endPoint
     * @param type $extraParams
     * @return type
     */
    private static function execCURL($endPoint, $extraParams = "") {
        $apiKey = env('TMDB_API_KEY');
        $apiURL = env('TMDB_API_URL');

        $ch = curl_init($apiURL . $endPoint . "?api_key=" . $apiKey . $extraParams);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        $resultset = json_decode($output);
        return $resultset;
    }

}
