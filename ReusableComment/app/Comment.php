<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id', 'id')
                    ->orderBy('created_at', 'asc');
    }

    public function commentable()
    {
        return $this->morphTo();
    }
}
