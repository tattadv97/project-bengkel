<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Mechanic;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private function invoiceNumber()
    {
        $latest = Transaction::latest()->first();

        if (! $latest) {
            return 'TRX0001';
        }

        $string = preg_replace("/[^0-9\.]/", '', $latest->invoice);
        return 'TRX' . sprintf('%04d', $string+1);
    }

    public function index()
    {
        return view('transaction.list', [
            'transaction' => Transaction::all(),
            'customer' => Customer::all(),
            'mechanic' => Mechanic::all()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaction.transaction');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = Transaction::create([
            'invoice' => $this->invoiceNumber()
        ]);
        return redirect()->route('transaction.edit', ['transaction' => $create->invoice]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $views['trx'] = $transaction;
        $views['customer'] = customer::find($transaction->customerId);
        $views['product'] = product::all();
        $views['trxDetail'] = TransactionDetail::with('product')->where('invoice', $transaction->invoice)->get();
        return view('transaction.cetakTransaction', $views);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $views['trx'] = $transaction;
        $views['customer'] = Customer::all();
        $views['product'] = Product::all();
        $views['trxDetail'] = TransactionDetail::with('product')->where('invoice', $transaction->invoice)->get();
        $views['subtotal'] = TransactionDetail::where('invoice', $transaction->invoice)->sum('subtotal');
        return view('transaction.transaction', $views);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //ambil data request
        $data = $request->validate([
            'customerId' => 'required',
            'totalPrice' => 'required',
            ]);
            //menyimpan data ke tabel transaksi
            Transaction::where('invoice', $transaction->invoice)->update($data);
            return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        Transaction::destroy($transaction->id);
        return redirect()->route('transaction.index');
    }
}
