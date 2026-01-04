<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function list()
    {
        $products = DB::select('select * from products');
        return view('listing', ['products' => $products]);
    }
}
