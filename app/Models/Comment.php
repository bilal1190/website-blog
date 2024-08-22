<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment', 'post_id', 'user_id'];

    // Define the relationship with the Post model
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Define the relationship with the User model (assuming you have a User model)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
