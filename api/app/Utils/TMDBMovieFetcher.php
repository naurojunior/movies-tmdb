<?php

namespace App\Utils;

use App\Utils\Interfaces\MovieFetcherInterface;

class TMDBMovieFetcher implements MovieFetcherInterface {

    /**
     * @return JSON of movies
     */
    public static function fetch() {
        return TMDBMovieFetcher::requestAll();
    }

    /**
     * Return all movies as JSON
     * @return type
     */
    private static function requestAll() {
        $movies = [];

        $moviesJSON = TMDBMovieFetcher::request();

        $allJSONMovies = $moviesJSON->results;
        for ($page = 2; $page <= $moviesJSON->total_pages; $page++) {
            $allJSONMovies = array_merge($allJSONMovies, TMDBMovieFetcher::request($page)->results);
        }

        foreach ($allJSONMovies as $jsonMovie) {
            $movies[] = MovieFactory::JSONToMovie($jsonMovie);
        }

        return json_encode($movies);
    }

    /**
     * Request movies from TMDB
     * @return type
     */
    private static function request($page = 1) {
        $apiKey = env('TMDB_API_KEY');
        $ch = curl_init("https://api.themoviedb.org/3/movie/upcoming?api_key=" . $apiKey . "&language=en-US&page=" . $page);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        $resultset = json_decode($output);
        return $resultset;
    }

}
