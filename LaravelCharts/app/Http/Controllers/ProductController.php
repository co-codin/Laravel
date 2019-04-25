<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(
            Product::orderBy('year', 'ASC')->get()
        );
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->year = $request->year;
        $product->price = $request->price;
        $product->save();
        return response()->json(['success'=>'The product was created succesfully']);
    }
}
