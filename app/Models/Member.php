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

    public static function generateMemberNo()
    {
        $latest = self::latest('id')->first(); // Get the latest record
        $sequence = $latest ? str_pad($latest->id + 1, 3, '0', STR_PAD_LEFT) : '001';
    
        return "PUSTAKA-{$sequence}";
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
