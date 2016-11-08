<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon;
use DB;
use App\Book;
//use App;
class BookController extends Controller
{
    //Use BookModel to find a book
    public function last_x_books()
    {
        //$books = Book::all();
        $books = Book::orderBy('created_at', 'desc')->take(5)->get();

        if(!$books->isEmpty()) {

            # Output the books
            foreach($books as $book) {
                echo $book->title.'<br>';
            }
        }
        else {
            echo 'No books found';
        }
    }

    public function published_after_year_x()
    {
        //$books = Book::all();
        $books = Book::where('published','>','1950')->get();

        if(!$books->isEmpty()) {

            # Output the books
            foreach($books as $book) {
                echo $book->title.'<br>';
            }
        }
        else {
            echo 'No books found';
        }
    }

    public function all_order_by_title()
    {
        //$books = Book::all();
        $books = Book::orderBy('title','asc')->get();

        if(!$books->isEmpty()) {

            # Output the books
            foreach($books as $book) {
                echo $book->title.'<br>';
            }
        }
        else {
            echo 'No books found';
        }
    }

    public function all_order_by_published_desc()
    {
        //$books = Book::all();
        $books = Book::orderBy('published','desc')->get();

        if(!$books->isEmpty()) {

            # Output the books
            foreach($books as $book) {
                echo $book->title.'<br>';
            }
        }
        else {
            echo 'No books found';
        }
    }

    public function edit_a_author()
    {
        # First get a book to update
        $book = Book::where('author', 'LIKE', '%Bell Hooks%')->first();

        # If we found the book, update it
        if($book) {

            # Give it a different title
            $book->author = 'Bell Hooks';

            # Save the changes
            $book->save();

            echo "Update complete; check the database to see if your update worked...";
        }
        else {
            echo "Author not found, can't update.";
        }
    } //End of Edit Function

    public function delete_all_book_by_author(){
        # First get a book to delete
        $books = Book::where('author', 'LIKE', '%Rowling%')->get();

        # If we found the book, delete it
        if($books) {
            foreach($books as $book) {
            # Goodbye!
                $book->delete();
            }
            return "Deletion complete; check the database to see if it worked...";
        }
        else {
            return "Can't delete - Book not found.";
        }
    } //End of delete_a_book function


    public function index()
    {
        //return view('book.index');

        # Use the QueryBuilder to get all the books
        //-----------------------------------------
        /*
        $books = DB::table('books')->get();

        # Output the results
        foreach ($books as $book) {
            echo '<p>'. $book->title . '</p>';
        }
        */

        //Now get all the books using Book model
        //-------------------------------------
        $books = Book::all();

        # Make sure we have results before trying to print them...
        if(!$books->isEmpty()) {

            # Output the books
            foreach($books as $book) {
                echo $book->title.'<br>';
            }
        }
        else {
            echo 'No books found';
        }

    }

    //Use BookModel to find a book
    public function show($title)
    {
        # First get a book to delete
        $searchString = '%' . $title . '%';
        $book = Book::where('title', 'LIKE', $searchString)->first();

        # If we found the book, delete it
        if($book) {
            $fullTitle = $book->title;
            return view('book.show')->with('title', $fullTitle);
        }
        else {
            return "Book not found.";
        }
    }


    public function create()
    {
        //Add a book using Query Builder
        /*
        DB::table('books')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'The Power of Now',
            'author' => 'Eckhart Tolle',
            'published' => 2010,
            'cover' => 'https://www.amazon.ca/Power-Now-Guide-Spiritual-Enlightenment-ebook',
            'purchase_link' => 'https://www.amazon.ca/Power-Now-Guide-Spiritual-Enlightenment-ebook/dp/B002361MLA',
        ]);

        return 'Added a new book';
        */

        //Now add a book using Book Model and Eloquent ORM
        # Instantiate a new Book Model object
        $book = new Book();

        # Set the parameters
        # Note how each parameter corresponds to a field in the table
        /*
        $book->title = 'The Matrix and Philosphy';
        $book->author = 'William Irwin';
        $book->published = 1991;
        $book->cover = 'http://p4.guddi.ca';
        $book->purchase_link = 'https://www.amazon.com/Matrix-Philosophy-Welcome-Popular-Culture/';
        */
        /*
        $book->title = 'The Will to Change';
        $book->author = 'Bell Hooks';
        $book->published = 2003;
        $book->cover = 'https://www.amazon.com/Will-Change-Men-Masculinity-Love/dp/0743456084/ref=sr_1_3?ie=UTF8&qid=1478565667&sr=8-3&keywords=Bell+Hooks';
        $book->purchase_link = 'https://www.amazon.com/Will-Change-Men-Masculinity-Love/dp/0743456084/ref=sr_1_3?ie=UTF8&qid=1478565667&sr=8-3&keywords=Bell+Hooks';
        */

        $book->title = 'Harry Potter';
        $book->author = 'J. K. Rowling';
        $book->published = 1997;
        $book->cover = 'http://prodimage.images-bn.com/pimages/9780590353427_p0_v1_s484x700.jpg';
        $book->purchase_link = 'http://www.barnesandnoble.com/w/harry-potter-and-the-sorcerers-stone-j-k-rowling/1100036321?ean=9780590353427';


        # Invoke the Eloquent save() method
        # This will generate a new row in the `books` table, with the above data
        $book->save();

        echo 'Added: '.$book->title;
    }
    /*public function edit($title)
    {
        return view('book.edit')->with('title', $title);
    }*/

    //Update a book using book model
    public function edit_a_book()
    {
        # First get a book to update
        $book = Book::where('author', 'LIKE', '%Scott%')->first();

        # If we found the book, update it
        if($book) {

            # Give it a different title
            $book->title = 'The Great Gatsby';

            # Save the changes
            $book->save();

            echo "Update complete; check the database to see if your update worked...";
        }
        else {
            echo "Book not found, can't update.";
        }
    } //End of Edit Function



    //Delete a book using book Model
    public function delete_a_book(){
        # First get a book to delete
        $book = Book::where('author', 'LIKE', '%Rowling%')->first();

        # If we found the book, delete it
        if($book) {

            # Goodbye!
            $book->delete();

            return "Deletion complete; check the database to see if it worked...";

        }
        else {
            return "Can't delete - Book not found.";
        }
    } //End of delete_a_book function



} # end of BookController class
