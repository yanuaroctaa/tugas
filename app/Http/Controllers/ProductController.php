<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $product =  Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'rating' => $request->rating,
            'quantity' => $request->quantity,
        ]);
        if ($product) {
            return response()->json([
                'Message' => 'Produk berhasil dismpan',
                'data' => $product
            ], 200);
        } else {
            return response()->json([
                'Message' => 'Produk gagal disimpan'
            ], 401);
        }
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json([
                'Message' => 'Produk berhasil di hapus',
            ], 200);
        } else {
            return response()->json([
                'Message' => 'Produk tidak ada'
            ], 404);
        }
    }
    public function update(Request $request, $id)
    {
        $product =  Product::whereid($id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'rating' => $request->rating,
            'quantity' => $request->quantity,
        ]);
        if ($product) {
            return response()->json([
                'Message' => 'Produk berhasil diupdate',
                'data' => $id
            ], 200);
        } else {
            return response()->json([
                'Message' => 'Produk gagal diupdate'
            ], 401);
        }
    }
}
