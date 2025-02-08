<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'title','condition','quantity','borrow_quantity','price','total_pages','synopsis','cover','book_category_id','author_id','publisher_id','book_location_id'
    ];
}
