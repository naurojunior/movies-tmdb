<?php

namespace App;

use App\Utils\MovieFilter;
use Illuminate\Support\Facades\Redis;
use App\Utils\Factories\MovieFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model {

    protected $fillable = ['title', 'backdrop_path', 'poster_path', 'release_date', 'popularity', 'id'];

    public function genres() {
        return $this->belongsToMany('App\Genre');
    }

}
