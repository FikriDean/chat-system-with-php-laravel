<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomUser extends Model
{
    use HasFactory;

    protected $table = "room_user";

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'user_id',
        'room_id'
    ];
}
