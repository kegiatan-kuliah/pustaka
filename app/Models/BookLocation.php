<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookLocation extends Model
{
    protected $table = 'book_locations';

    protected $fillable = [
        'code','name'
    ];
}
