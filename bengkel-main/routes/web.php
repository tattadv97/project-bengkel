<?php

use App\Http\Controllers\CetakTransactionController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportTransactionController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;
use App\Imports\ProductImport;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', function(){
    return view('template.index');
});

Route::get('/form', function(){
    return view('template.form');
});

//Import
Route::post('/', function(){
    \Maatwebsite\Excel\Facades\Excel::import(new ProductImport, request()->file('file'));
    return back();
});

//Export

Route::resource('/supplier', SupplierController::class);
Route::resource('/product', ProductController::class);
Route::resource('/mechanic', MechanicController::class);
Route::resource('/customer', CustomerController::class);

Route::resource('/transaction', TransactionController::class)->parameters([
    'transaction' => 'transaction:invoice'
]);

Route::get('/cetak', [TransactionController::class, 'cetak']);

Route::resource('/transactionDetail', TransactionDetailController::class);
Route::resource('/cetakTransaction', CetakTransactionController::class);

Route::resource('/purchase',PurchaseController::class);
    
Route::resource('/reportTransaction', ReportTransactionController::class);
