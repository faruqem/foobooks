<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'The Great Gatsby',
            'author' => 'F Scott Fitzgerald',
            'published' => 1925,
            'cover' => 'http://img2.imagesbn.com/p/9780743273565_p0_v4_s114x166.JPG',
            'purchase_link' => 'http://www.barnesandnoble.com/w/the-great-gatsby-francis-scott-fitzgerald/1116668135?ean=9780743273565',
        ]);

        DB::table('books')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'The Bell Jar',
            'author' => 'Sylvia Plath',
            'published' => 1963,
            'cover' => 'http://img1.imagesbn.com/p/9780061148514_p0_v2_s114x166.JPG',
            'purchase_link' => 'http://www.barnesandnoble.com/w/bell-jar-sylvia-plath/1100550703?ean=9780061148514',
        ]);

        DB::table('books')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'I Know Why the Caged Bird Sings',
            'author' => 'Maya Angelou',
            'published' => 1969,
            'cover' => 'http://img1.imagesbn.com/p/9780345514400_p0_v1_s114x166.JPG',
            'purchase_link' => 'http://www.barnesandnoble.com/w/i-know-why-the-caged-bird-sings-maya-angelou/1100392955?ean=9780345514400',
        ]);

        DB::table('books')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Game of Thrones',
            'author' => 'George R. R. Martin',
            'published' => 2011,
            'cover' => 'http://p4.guddi.ca',
            'purchase_link' => 'https://www.amazon.ca/George-Martins-Thrones-5-Book-Boxed-ebook/',
        ]);

        DB::table('books')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Lord of the Rings',
            'author' => 'J. R. R. Tolkien',
            'published' => 1991,
            'cover' => 'http://p4.guddi.ca',
            'purchase_link' => 'https://www.amazon.com/Game-Thrones-Song-Fire-Book/',
        ]);

        DB::table('books')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'The Matrix and Philosphy',
            'author' => 'William Irwin',
            'published' => 1991,
            'cover' => 'http://p4.guddi.ca',
            'purchase_link' => 'https://www.amazon.com/Matrix-Philosophy-Welcome-Popular-Culture/',
        ]);

        DB::table('books')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'The Will to Change',
            'author' => 'Bell Hooks',
            'published' => 2003,
            'cover' => 'https://www.amazon.com/Will-Change-Men-Masculinity-Love/dp/0743456084/ref=sr_1_3?ie=UTF8&qid=1478565667&sr=8-3&keywords=Bell+Hooks',
            'purchase_link' => 'https://www.amazon.com/Will-Change-Men-Masculinity-Love/dp/0743456084/ref=sr_1_3?ie=UTF8&qid=1478565667&sr=8-3&keywords=Bell+Hooks',
        ]);

        DB::table('books')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Harry Potter',
            'author' => 'J. K. Rowling',
            'published' => 1997,
            'cover' => 'http://prodimage.images-bn.com/pimages/9780590353427_p0_v1_s484x700.jpg',
            'purchase_link' => 'http://www.barnesandnoble.com/w/harry-potter-and-the-sorcerers-stone-j-k-rowling/1100036321?ean=9780590353427',
        ]);
    }
}
