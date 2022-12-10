@extends('template.layout')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Create Transaction</h1>
        <div class="card shadow mb-4">
            <div class="card-header" py-3>
                <h6 class="m-0 font-weight-bold text-primary">Add Transaction</h6>
            </div>
            <div class="card-body">
                <form action="/transaction" class="row gy-2 gx-3 align-items-center" method="POST">
                    @csrf

                    <div class="col-auto mb-3">
                        <label class="visually-hidden" for="customer_name">Product</label>
                        <input type="text" class="form-control" id="product_name" name="product_name">
                    </div>
                    <div class="col-auto mb-3">
                        <label class="visually-hidden" for="qty">QTY</label>
                        <input type="text" class="form-control" id="qty" name="qty">
                    </div>

                    <button type="submit" class="btn btn-primary">Add </button>
                </form>
                <form action="#" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are You Sure ?')">Cancel</button>
                </form>
            </div>
                <hr>
        </div>
    </div>


    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="card shadow mb-4">
            <div class="card-body">
    <form class="row gy-2 gx-3 align-items-center">
        <div class="col-auto mb-3">
            <label class="visually-hidden" for="customer_name">Customer</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name">
        </div>
        <div class="col-auto mb-3">
            <label class="visually-hidden" for="total_price">Total Price</label>
            <input type="text" class="form-control" id="total_price" name="total_price" readonly>
        </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Sparepart</th>
                        <th>Harga</th>
                        <th>QTY</th>
                        <th>Sub Total</th>
                        <th>Diskon</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                </tbody>
            </table>
        </div>
</div>
                <hr>
        </div>
    </div>
@endsection