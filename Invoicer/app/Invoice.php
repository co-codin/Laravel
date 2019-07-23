<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['invoice_number', 'invoice_date', 'customer_id', 'tax_percent'];
}
