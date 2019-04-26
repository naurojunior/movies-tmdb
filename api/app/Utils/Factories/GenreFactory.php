<?php

namespace App\Utils\Factories;

use App\Genre;

class GenreFactory {

    public static function fromJSON($json) {
        return new Genre(['id' => $json->id, 'name' => $json->name]);
    }

    public static function fromJSONArray($genresJSON) {
        return array_map(function ($genre) {
            return GenreFactory::fromJSON($genre);
        }, $genresJSON);
    }

}
