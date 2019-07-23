<?php

namespace App\Http\Controllers;

use App\{Customer, Invoice};
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function create()
    {
        return view('invoices.create');
    }

    public function store(Request $request)
    {
         $customer = Customer::create($request->customer);
         $invoice = Invoice::create($request->invoice + ['customer_id' => $customer->id]);
         return 'finished';
    }
}
