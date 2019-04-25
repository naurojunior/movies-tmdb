<?php

namespace App;

use App\Utils\MovieFilter;
use Illuminate\Support\Facades\Redis;
use App\Utils\MovieFactory;

class Movie {

    function __construct($title, $poster, $backdrop, $popularity, $id) {
        $this->title = $title;
        $this->poster = $poster;
        $this->backdrop = $backdrop;
        $this->popularity = $popularity;
        $this->id = $id;
    }

    public static function all($filters = array()) {
        $movieArray = MovieFactory::JSONStringToMovieArray(Redis::get('movies'));
        return MovieFilter::filter($movieArray, $filters);
    }

}
