<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookTransaction extends Model
{
    protected $table = 'book_transactions';

    protected $fillable = [
        'date','member_id','book_id','condition','description','status'
    ];
}
