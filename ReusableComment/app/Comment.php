<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body'];

    protected $dates = [
        'edited_at'
    ];

    public static function boot()
    {
        parent::boot();

        static::updating(function ($comment) {
            $comment->edited_at = Carbon::now();
        });
    }

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
