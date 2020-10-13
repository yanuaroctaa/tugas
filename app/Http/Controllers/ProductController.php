<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    //Read 
    public function index()
    {
        $product = Product::all();
        return $product;
    }
    //Seperti Select Alll

    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return $product;
        } else {
            return response()->json([
                'Pesan' => 'Produk tidak ada'
            ], 404);
        }
    }
}
