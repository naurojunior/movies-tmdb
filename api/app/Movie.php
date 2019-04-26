<?php

namespace App;

use App\Utils\MovieFilter;
use Illuminate\Support\Facades\Redis;
use App\Utils\Factories\MovieFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model {
    
    protected $fillable = ['title', 'backdrop_path', 'poster_path', 'release_date', 'popularity', 'id'];
    protected $hidden = ['created_at', 'updated_at'];
    public $incrementing = false;
    
    protected $genre_ids;

    public function genres() {
        return $this->belongsToMany('App\Genre');
    }
    
    public function setGenreIds($ids = []){
        $this->genre_ids = $ids;
    }
    
    public function getGenreIds(){
        return $this->genre_ids;
    }

}
