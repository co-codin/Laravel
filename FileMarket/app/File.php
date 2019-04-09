<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'overview_short',
        'overview',
        'price',
        'live',
        'approved',
        'finished',
    ];

    public function getRouteKeyName()
    {
        return 'identifier';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
