<?php

namespace App;

use Illuminate\Database\Eloquent\{Model, Builder};

class Comment extends Model
{
    public function scopeIsParent(Builder $builder)
    {
        return $builder->whereNull('parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
