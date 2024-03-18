<?php

namespace App\Http\Controllers;

use App\Models\HireHelper;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();

        $data = [
            'products'=>$products,
            'title'=>'List of products'
        ];

        return view('products.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=>'required',
            'price'=>'required|numeric'
        ];

        $this->validate($request,$rules);

        $saveProduct = new Product();

        $saveProduct->name = $request->name;

        $saveProduct->price = $request->price;

        $saveProduct->description = $request->description;

        $saveProduct->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $data = [
            'product'=>$product,
            'title'=>'Edit product'
        ];

        return view('products.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $product_id)
    {

        $product = Product::find($product_id);

        $product->name = $request->name;

        $product->price = $request->price;

        $product->description = $request->description;

        $product->save();

        if (!empty($request->file('image_files'))) {

            ProductImage::where('product_id',$product->id)->delete();

            foreach ($request->file('image_files') as $file) {

                $file_url =  HireHelper::uploadImage($file);

                $saveImage = new ProductImage();

                $saveImage->product_id = $product->id;

                $saveImage->image_url = $file_url;

                $saveImage->save();                

            }          
           
        }

        return redirect()->route('products.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
