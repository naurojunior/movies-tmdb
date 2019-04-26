<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model {

    protected $fillable = ['title', 'backdrop_path', 'poster_path', 'release_date', 'popularity', 'id', 'overview'];
    protected $hidden = ['created_at', 'updated_at'];
    public $incrementing = false;
    
    //Avoid Laravel trying to save to database 
    protected $genre_ids;

    public function genres() {
        return $this->belongsToMany('App\Genre');
    }
   
    public function setGenreIds($ids = []) {
        $this->genre_ids = $ids;
    }

    public function getGenreIds() {
        return $this->genre_ids;
    }

}
