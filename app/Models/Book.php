<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'title','condition','quantity','borrow_quantity','price','total_pages','synopsis','cover','book_category_id','author_id','publisher_id','book_location_id'
    ];

    public function category()
    {
        return $this->belongsTo(BookCategory::class, 'book_category_id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }

    public function location()
    {
        return $this->belongsTo(BookLocation::class, 'book_location_id');
    }
}
