<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    protected $fillable = [
        'name','identity_no','member_no','gender','photo','user_id','room_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
