<?php

namespace App;

use App\{User, Like};
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function likers()
    {
        return $this->hasManyThrough(
            User::class, Like::class, 'likeable_id', 'id',
            'id', "user_id"
        )
        ->where('likeable_type', Post::class)
        ->groupBy('likes.user_id', 'users.id', 'likes.likeable_id');
    }
}
