<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        $products = Product::latest()->get();

        return view('products.index', [

            'products' => $products

        ]);
    }
    public function store(Request $request){

        $request->validate([
            'nom_product'   => ['required'],
            'price'         => ['required'],
        ]);
        

        Product::create([
            'nom_product' => $request->nom_product,            
            'price'       => $request->price,         
        ]);

        return back();
    }
    public function destroy(Product $product){

        $product->delete();
        
        return back();
    }
}
