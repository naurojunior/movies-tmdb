<?php

namespace App;

use App\Utils\MovieFilter;
use Illuminate\Support\Facades\Redis;
use App\Utils\MovieFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model {

    protected $fillable = ['title', 'backdrop', 'poster', 'release_date', 'popularity', 'id', 'genres'];

    public static function all($filters = array()) {
        $movieArray = MovieFactory::JSONStringToMovieArray(Redis::get('movies'));
        return MovieFilter::filter($movieArray, $filters);
    }

}
