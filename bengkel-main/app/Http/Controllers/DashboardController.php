<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Transaction $transaction){
        return view('index', [
            'transaction' => Transaction::all()
        ]);
    }
}
