@extends('template.layout')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">New Purchase -</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Select Product</h6>
            </div>
            <div class="card-body">
                <form class="row gx-3 gy-2 align-items-center" action="{{ route('PurchaseDetail.store') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <input type="hidden" name="invoice" value="">
                    <div class="col-sm-3">
                        <label class="visually-hidden" for="product">Produk</label>
                        <select name="product" class="form-control form-select" id="listProduct" onchange="selectProduct()" required>
                            <option value="">Pilih Produk</option>
                           
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
                <form action="" method="POST" class="d-inline">
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
                <h6 class="m-0 font-weight-bold text-primary">Detail Purchase</h6>
            </div>
            <div class="card-body mb-4">

                <form action="" method="POST" class="row gx-3 gy-2 align-items-center">
                    @method('PUT')
                    @csrf

                    <input type="hidden" name="nominal" value="">
                    <div class="col-sm-3">
                        <label class="visually-hidden" for="supplierId">Supplier</label>
                        <select name="supplierId" class="form-control form-select" id="supplierId" required>
                            
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="totalPrice">Total Price</label>
                        <input type="text" class="form-control" id="totalPrice" name="totalPrice" value="" readonly>
                    </div>
                    <div class="col-sm-3 mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

                <div class="table-responsive mt-3">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Sub Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection