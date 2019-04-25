<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        return response()->json(Movie::all(['title' => $request->input('title')]));
    }

}
