<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//use App;
class BookController extends Controller
{
    public function index()
    {
        return view('book.index');
    }
    public function show($title)
    {
        return view('book.show')->with('title', $title);
    }
    public function create()
    {
        return view('book.create');
    }
    public function edit($title)
    {
        return view('book.edit')->with('title', $title);
    }

} # end of BookController class
