<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Customer, Invoice, InvoicesItem};

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

         for ($i=0; $i < count($request->product); $i++) {
             if (isset($request->qty[$i]) && isset($request->price[$i])) {
                InvoicesItem::create([
                    'invoice_id' => $invoice->id,
                    'name' => $request->product[$i],
                    'quantity' => $request->qty[$i],
                    'price' => $request->price[$i]
                ]);
            }
         }
         return 'finished';
    }
}
