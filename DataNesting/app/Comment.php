<?php

namespace App;

use Illuminate\Database\Eloquent\{Model, Builder};

class Comment extends Model
{
    public static function boot()
    {
        parent::boot();

        parent::created(function ($comment) {
            $c = $comment;

            while ($c->parent !== null) {
                $c = $c->parent;
            }

            $comment->base_id = $c->id;
            
            $comment->save();
        });
    }

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
