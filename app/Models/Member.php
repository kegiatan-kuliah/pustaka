<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    protected $fillable = [
        'name','identity_no','member_no','gender','phone_no','address','photo'
    ];
}
