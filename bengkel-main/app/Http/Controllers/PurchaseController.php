<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function invoiceNumber()
    {
        $latest = Purchase::latest()->first();

        if (!$latest) {
            return 'PO0001';
        }

        $string = preg_replace("/[^0-9\.]/", '', $latest->invoice);
        return 'PO' . sprintf('%04d', $string + 1);
    }


    public function index()
    {
        return view('purchase.list', [
            'purchase' => Purchase::all(),
            'suppliers' => Supplier::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('purchase.purchase');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = Purchase::create([
            'invoice' => $this->invoiceNumber()
        ]);
        return redirect()->route('purchase.edit', ['purchase' => $create->invoice]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        $views['trx'] = $purchase;
        $views['product'] = Product::all();
        $views['supplier'] = Supplier::all();
        $views['PurchaseDetail'] = PurchaseDetail::with('product')->where('invoice', $purchase->invoice)->get();
        $views['subtotal'] = PurchaseDetail::where('invoice', $purchase->invoice)->sum('subtotal');
        return view('purchase.purchase', $views);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //ambil data request
        $data = $request->validate([
            'supplier_id' => 'required',
            'totalPrice' => 'required',
        ]);
        //menyimpan data ke tabel transaksi
        Purchase::where('invoice', $purchase->invoice)->update($data);
        return redirect()->route('purchase.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        Purchase::destroy($purchase->id);
        return redirect()->route('purchase.index');
    }
}
