<?php

namespace App\Utils\Interfaces;

interface MovieFilterInterface {

    public static function filter($movies, $fitlers = []);
}
