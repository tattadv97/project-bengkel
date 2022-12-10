<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.product', [
            'product' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create-product', [
            'supplier' => Supplier::all()
        ]);
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
            'product_code' => 'required',
            'product_name' => 'required',
            'base_price' => 'required',
            'selling_price' => 'required',
            'unit' => 'required',
            'stock' => 'required',
            'category' => 'required',
            'supplier_id' => 'required',
        ]);

        Product::create($validatedData);
        return redirect('/product')->with('success', 'New Product has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit-product', [
            'supplier' => Supplier::all(),
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'product_code' => 'required',
            'product_name' => 'required',
            'base_price' => 'required',
            'selling_price' => 'required',
            'unit' => 'required',
            'stock' => 'required',
            'category' => 'required',
            'supplier_id' => 'supplier_id'
        ];

        $validatedData = $request->validate($rules);

        Product::where('id', $product->id)->update($validatedData);
        return redirect('/product')->with('success', 'Product has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return redirect('/product')->with('success', 'Product has been deleted!');
    }
}
