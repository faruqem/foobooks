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


Route::get('/books/last-x-books', 'BookController@last_x_books')->name('books.last-x-books');
Route::get('/books/published-after-year-x', 'BookController@published_after_year_x')->name('books.published_after-year-x');
Route::get('/books/all-order-by-title', 'BookController@all_order_by_title')->name('books.all-order-by-title');
Route::get('/books/all-order-by-published-desc', 'BookController@all_order_by_published_desc')->name('books.all-order-by-published-desc');
Route::get('/books/edit-a-author', 'BookController@edit_a_author')->name('books.edit-a-author');
Route::get('/books/delete-all-book-by-author', 'BookController@delete_all_book_by_author')->name('books.delete-all-book-by-author');



Route::get('/books/create', 'BookController@create')->name('books.create');
Route::get('/books', 'BookController@index')->name('books.index');
//Route::get('/books/{title}/edit', 'BookController@edit')->name('books.edit');
Route::get('/books/edit-a-book', 'BookController@edit_a_book')->name('books.edit');
Route::get('/books/delete-a-book', 'BookController@delete_a_book')->name('books.delete');
Route::get('/books/{title}', 'BookController@show')->name('books.show');
Route::get("/practice", "PracticeController@index")->name('practice.index');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/practice1', function(){
 return 'Environment: ' . \App::environment() . '<br>'
    . 'Debug setup: '.config('app.debug');
});
Route::get('/practice', function(){
    $x = ['War and Peace','Hunger Games','Sky Fall'];
    //return dd($x);
    return dump($x);
    return var_dump($x);
});
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





/*
Route::get('/books/create', function() {
    $view  = '<form method="POST" action="/books/create">';
    $view .= csrf_field(); # This will be explained more later
    $view .= '<label>Title: <input type="text" name="title"></label>';
    $view .= '<input type="submit">';
    $view .= '</form>';
    return $view;

});*/

/*
Route::post('/books/create', function() {
    dd(Request::all());
});

Route::get("books/show/{title?}", function($title = ''){
    if($title == ''){
        return "Your request did not include a title!<br>";
    }
    return "The title of the book: " . $title . "<br>";
})->name('books.show');
*/


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

Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';
});

//Drop and recreate database if environment is local
if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database foobooks');
        DB::statement('CREATE database foobooks');

        return 'Dropped foobooks; created foobooks.';
    });

};

//Create a database
if(App::environment('local')) {

    Route::get('/create-db', function() {

        //DB::statement('DROP database foobooks');
        DB::statement('CREATE database foobooks');

        return 'Dropped foobooks; created foobooks.';
    });

};
