<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//use App;
class PracticeController extends Controller
{
    public function index($x, $y)
    {
        $sum = $x + $y;
        return "Sum = " . $sum;
    }

} # end of class
