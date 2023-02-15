<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageUser extends Model
{
    use HasFactory;

    public $table = "message_user";

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'user_id',
        'message_id',
        'message_to'
    ];
}
