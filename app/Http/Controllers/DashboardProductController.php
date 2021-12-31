<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.allproducts.index', [
            'products'=>Product::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.allproducts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required| max:255 | min:3',
            'productImage' => 'image | file | max: 1024',
            'body' => 'required'
        ]);

        if($request->file('productImage')){
            $validatedData['productImage'] =$request->file('productImage')-> store('product-images');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 150, '...');
        
        Product::create($validatedData);

        return redirect('/dashboard/allproducts')->with('success', 'Produk baru berhasil ditambahkan !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('dashboard.allproducts.show', [
            'product'=>$product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('dashboard.allproducts.edit', [
            'product'=> $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $rules =[
            'name' => 'required| max:255 | min:3',
            'productImage' => 'image | file | max: 1024',
            'body' => 'required'
        ];

        $validatedData = $request->validate($rules);

        if($request->file('productImage')){
            if($request->oldproductImage){
                Storage::delete($request->oldproductImage);
            }
            $validatedData['productImage'] =$request->file('productImage')-> store('product-images');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 150, '...');
        
        Product::where('id', $product->id)
            ->update($validatedData);

        return redirect('/dashboard/allproducts')->with('success', 'Produk berhasil diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product= Product::find($id);
        if($product->productImage){
            Storage::delete($product->productImage);
        }
        Product::destroy($id);
        return redirect('/dashboard/allproducts')->with('success', 'Produk berhasil dihapus');
    }

    public function dasearchProduct(Request $request){
        // Get the search value from the request
        $searchProduct = $request->input('dasearchProduct');
    
        // Search in the title and body columns from the helps table
        $products = Product::query()
            ->where('name', 'LIKE', "%{$searchProduct}%")
            ->orWhere('body', 'LIKE', "%{$searchProduct}%")
            ->paginate(10)->withQueryString()
            ;
    
        // Return the search view with the resluts compacted
        return view('dashboard.allproducts.index', compact('products'),[
            "name"=>"Products"
        ]);
    }
}
