<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationItem extends Model
{
    protected $table = 'application_items';

    protected $fillable = [
        'title','description','quantity','application_id','return_quantity'
    ];

    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
}
