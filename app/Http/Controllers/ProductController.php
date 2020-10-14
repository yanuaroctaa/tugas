<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    //Read 
    //Seperti Select Alll
    public function index()
    {
        $product = Product::all();
        return response()->json([
            'Message' => 'Menampilkan semua produk',
            'data' => $product
        ], 200);
    }


    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json([
                'Message' => 'Produk berhasil',
                'data' => $product
            ], 200);
        } else {
            return response()->json([
                'Message' => 'Produk tidak ada'
            ], 404);
        }
    }
}
