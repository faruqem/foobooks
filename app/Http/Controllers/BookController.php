<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//use App;
class BookController extends Controller
{

    /**
    * Responds to requests to GET /books
    */
    public function index()
    {
        return 'Display all the books';
        //return \App::environment();
        //return App::environment();
    }

} # end of class
