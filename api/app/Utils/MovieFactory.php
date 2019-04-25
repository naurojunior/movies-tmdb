<?php

namespace App\Utils;

use \App\Movie;

class MovieFactory {

    public static function JSONToMovie($json) {
        return new Movie($json->title, $json->poster_path, $json->backdrop_path, $json->popularity, $json->id);
    }

}
