<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function list()
    {
        $html = '<h1>Product Listing with Laravel</h1>';
        $html .= '<ul>';
        $products = DB::select('select * from produtos');
        foreach ($products as $p) {
            $html .= '<li> nome: ' . $p->nome . ',
                        descricao: ' . $p->descricao . '</li>';
        }
        $html .= '</ul>';
        return $html;
    }
}
