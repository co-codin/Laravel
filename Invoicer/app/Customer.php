<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'address', 'postcode', 'city', 'state', 'country', 'postcode', 'phone', 'email'];
}
