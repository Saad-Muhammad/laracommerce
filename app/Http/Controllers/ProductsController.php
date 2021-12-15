<?php

namespace App\Http\Controllers;

use Session;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index',['products' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image',
            'description' => 'required',
            'price' => 'required'
        ]);

        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('uploads/products/', $image_new_name);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => 'uploads/products/'.$image_new_name
        ]);

        Session::flash('success' , 'Product Stored Successfully');

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //here $product is already found coz it is the instance of Product.
        return view('products.edit')->with('product', $product);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request , [
            'name'        => 'required',
            'price'       => 'required',
            'description' => 'required'
        ]);

        //here we don't have to find the product with its id since its already found.

        if ($request->hasFile('image')) {

            if (file_exists($product->image)) {

                unlink($product->image);

            }

            $image = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('uploads/products/', $image_new_name);

            $product->image = 'uploads/products/'.$image_new_name;
        }

        $product->name        = $request->name;
        $product->price       = $request->price;
        $product->description = $request->description;

        $product->save();

        Session::flash('success', 'Product Updated Successfully');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if (file_exists($product->image)) {

           unlink($product->image);

        }

        $product->delete();

        Session::flash('success', 'Product Deleted');
        return redirect()->route('products.index');
    }
}
