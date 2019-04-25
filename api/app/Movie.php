<?php

namespace App;

class Movie {

    function __construct($title, $poster, $backdrop, $popularity, $id) {
        $this->title = $title;
        $this->poster = $poster;
        $this->backdrop = $backdrop;
        $this->popularity = $popularity;
        $this->id = $id;
    }

    public static function all($filters = array()) {
        return MovieFilter::filter(Redis::get('movies'), $filters);
    }
    

}
