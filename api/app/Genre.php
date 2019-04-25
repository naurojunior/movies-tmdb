<?php

namespace App;

use App\Utils\MovieFilter;
use Illuminate\Support\Facades\Redis;
use App\Utils\MovieFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model {

    protected $fillable = ['id', 'name'];

}
