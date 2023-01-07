<?php

namespace App\Http\Controllers;

use App\Models\Mechanic;
use App\Models\Product;
use App\Models\PurchaseDetail;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ambil data form dari request
        $data = $request->validate([
            'invoice' => 'required',
            'product' => 'required',
            'qty' => 'required',
            'supplier' => Supplier::all()
        ]);

        // ambil informasi product berdasarkan form name product
        $product = Product::find($data['product']);
        // kali harga product * quantity = subtotal
        $data['productId'] = $product->id;
        $data['price'] = $product->selling_price;
        $data['subtotal'] = $product->selling_price * $data['qty'];
        $data['submodal'] = $product->base_price * $data['qty'];

        //cek stock produk
        $stock = $product->stock + $data['qty'];

        $product->update([
            'stock' => $stock
        ]);
        $product->save();

        // save transaction detail
        PurchaseDetail::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseDetail  $purchaseDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseDetail $purchaseDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseDetail  $purchaseDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseDetail $purchaseDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PurchaseDetail  $purchaseDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseDetail $purchaseDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseDetail  $purchaseDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseDetail $purchaseDetail)
    {
        //ambil data product
        $product = Product::find($purchaseDetail['productId']);
        //perhitungan stock
        $stock = $product->stock - $purchaseDetail['qty'];
        //Update data stock product
        $product->update([
            'stock' => $stock
        ]);
        $product->save();
        //hapus data
        PurchaseDetail::destroy($purchaseDetail->id);
        return redirect()->back();
    }
}
