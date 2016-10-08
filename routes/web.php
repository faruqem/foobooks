<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//use \Rych\Random\Random;
Route::get('/random', function() {

    //$random = new Rych\Random\Random();
    $random = new Random();
    return $random->getRandomString(8);

});
/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/books', function(){
    return "Return all books!";
});*/

Route::get("/practice/{var1}/{var2}", function($x, $y){
    $sum = $x + $y;
    return "Sum = " . $sum;
});


//Route::get('/practice/{var1}/{var2}', 'PracticeController@index($x,$y)')->('practice.index');

Route::get('/books',"BookController@index")->name('books.index');

Route::get('/books/create', function() {

    $view  = '<form method="POST" action="/books/create">';
    $view .= csrf_field(); # This will be explained more later
    $view .= '<label>Title: <input type="text" name="title"></label>';
    $view .= '<input type="submit">';
    $view .= '</form>';
    return $view;

});


Route::post('/books/create', function() {

    dd(Request::all());

});

Route::get("books/show/{title?}", function($title = ''){
    if($title == ''){
        return "Your request did not include a title!<br>";
    }
    return "The title of the book: " . $title . "<br>";
})->name('books.show');

Route::get('/example', function() {
    return App::environment();
});

Route::get('/debugbar', function() {

    $data = Array('foo' => 'bar');
    Debugbar::info($data);
    Debugbar::info('Current environment: '.App::environment());
    Debugbar::error('Error!');
    Debugbar::warning('Watch out…');
    Debugbar::addMessage('Another message', 'mylabel');

    return 'Just demoing some of the features of Debugbar';

});
