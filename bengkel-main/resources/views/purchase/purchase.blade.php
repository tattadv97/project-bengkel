@extends('template.layout')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">New Purchase - {{ $trx['invoice'] }}</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Select Product</h6>
            </div>
            <div class="card-body">
                <form class="row gx-3 gy-2 align-items-center" action="{{ route('PurchaseDetail.store') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <input type="hidden" name="invoice" value="{{ $trx['invoice'] }}">
                    <div class="col-sm-3">
                        <label class="visually-hidden" for="product">Produk</label>
                        <select name="product" class="form-control form-select" id="listProduct" onchange="selectProduct()" required>
                            <option value="">Pilih Produk</option>
                            @foreach ($product as $item)
                                @if (old('product') == $item->id)
                                    <option value="{{ $item->id }}"  selected>{{ $item->product_name }}</option>
                                @else
                                    <option value="{{ $item->id }}" >{{ $item->product_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-1">
                        <label class="visually-hidden" for="qty">QTY</label>
                        <input type="number" class="form-control" id="qty" name="qty" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-outline-primary mt-4">Submit</button>
                    </div>
                    @if ($message = Session::get('message_error'))
                    <div class="alert alert-danger alert-block ml-5 mt-4">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                </form>
                <form action="{{ route('purchase.destroy', ['purchase' => $trx->invoice]) }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger mt-3"
                        onclick="return confirm('Are You Sure??')" type="submit">Cancel</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Order</h6>
            </div>
            <div class="card-body mb-4">

                <form action="{{ route('purchase.update', ['purchase' => $trx->invoice]) }}" method="POST" class="row gx-3 gy-2 align-items-center">
                    @method('PUT')
                    @csrf

                    <input type="hidden" name="nominal" value="{{ $subtotal }}">
                    <div class="col-sm-3">
                        <label class="visually-hidden" for="supplier_id">Supplier</label>
                        <select name="supplier_id" class="form-control form-select" id="supplier_id" required>
                            @foreach ($supplier as $item)
                                @if (old('supplier') == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->company_name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->company_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="totalPrice">Total Price</label>
                        <input type="text" class="form-control" id="totalPrice" name="totalPrice" value="{{ $subtotal }}" readonly>
                    </div>
                    <div class="col-sm-3 mt-3">
                        <button type="submit" class="btn btn-primary">Purchase</button>
                    </div>
                </form>

                <div class="table-responsive mt-3">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Supplier</th>
                                <th>Produk</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Sub Total</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                                @foreach ($PurchaseDetail as $detail)
                                    <tr>
                                        <td>{{ $detail->product->supplier_id }}</td>
                                        <td>{{ $detail->product->product_name }}</td>
                                        <td>Rp. {{ $detail->product->selling_price }}</td>
                                        <td>{{ $detail->qty }}</td>
                                        <td>Rp. {{ $detail->subtotal }}</td>
                                        
                                        {{---
                                        <td>
                                            <form action="{{ route('PurchaseDetail.destroy', ['PurchaseDetail' => $detail->id]) }}" method="POST" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger"
                                                    onclick="return confirm('Are You Sure??')" type="submit">Cancel</button>
                                            </form>
                                        </td>
                                        --}}
                                        
                                    </tr>
                                @endforeach
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection