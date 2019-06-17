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
}
