<?php

namespace App\Utils;

use App\Utils\Interfaces\MovieFetcherInterface;

class TMDBMovieFetcher implements MovieFetcherInterface {

    /**
     * @return JSON of movies
     */
    public static function fetch() {
        $genres = TMDBMovieFetcher::requestGenres();
        $movies = TMDBMovieFetcher::requestMovies();

        return TMDBMovieFetcher::addGenresToMoviesArray($movies, $genres);
    }

    /**
     * Return all movies as JSON
     * @return type
     */
    private static function requestMovies() {
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
     * Request Genres from TMDB
     * @return type
     */
    private static function requestGenres() {
        $genres = [];

        $jsonGenres = TMDBMovieFetcher::execCURL("/genre/movie/list")->genres;

        foreach ($jsonGenres as $jsonGenre) {
            $genres[$jsonGenre->id] = $jsonGenre->name;
        }
        return $genres;
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

    /**
     * Add genres to the JSON return
     * @param type $movies
     * @param type $genres
     * @return type
     */
    private static function addGenresToMoviesArray($movies, $genres) {
        return array_map(function ($movie) use ($genres) {
            $movieGenre = TMDBMovieFetcher::getGenresOfMovie($movie, $genres);
            $movie->genres = $movieGenre;
            return $movie;
        }, $movies);
    }

    /**
     * Search the names of the genres of one movie
     * @param type $movie
     * @param type $genres
     * @return type
     */
    private static function getGenresOfMovie($movie, $genres) {
        return array_map(function ($genresId) use ($genres) {
            return $genres[$genresId];
        }, $movie->genre_ids);
    }

}
