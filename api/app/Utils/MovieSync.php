<?php

namespace App\Utils;
use Illuminate\Support\Facades\Redis;

class MovieSync {

    public static function sync(){
        $movies = TMDBMovieFetcher::fetch();
        
        Redis::set('movies', json_encode($movies));
    }
    
}
