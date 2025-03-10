<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    // Define fillable attributes for mass assignment
    protected $fillable = [
        'user_id',
        'friend_id',
        'status',
    ];

    // Relationship to the user who sent the friend request
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship to the user who received the friend request
    public function friend()
    {
        return $this->belongsTo(User::class, 'friend_id');
    }
}
