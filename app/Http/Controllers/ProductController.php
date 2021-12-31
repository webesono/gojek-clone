<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products', [
            "title" => "Products",
            "products" => Product::orderByDesc('id')->get()
        ]);
    }

    public function searchProduct(Request $request){
        // Get the search value from the request
        $searchProduct = $request->input('searchProduct');
    
        // Search in the title and body columns from the helps table
        $products = Product::query()
            ->where('name', 'LIKE', "%{$searchProduct}%")
            ->orWhere('body', 'LIKE', "%{$searchProduct}%")
            ->paginate(50)
            ;
    
        // Return the search view with the resluts compacted
        return view('products', compact('products'),[
            "title"=>"Products"
        ]);
    }

    public function show(Product $product)
    {
        return view('product', [
            "title" => "Products",
            "product" => $product
        ]);
    }
}
