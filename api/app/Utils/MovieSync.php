<?php

namespace App\Utils;
use Illuminate\Support\Facades\Redis;

class MovieSync {

    public static function sync(){
        Redis::set('movies', TMDBMovieFetcher::fetch());
    }
    
}
