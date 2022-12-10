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
                <form action="{{ route('transactionDetail.store') }}" class="row gy-2 gx-3 align-items-center" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="invoice" value="{{ $trx['invoice'] }}">
                    @csrf

                    {{-- region supplier --}}
                    <div class="mb-3">
                        <label for="product" class="form-label">Product</label>
                        <select value="" name="product" class="form-control form-select" id="supplier_id">
                            @foreach ($product as $item)
                                @if (old('product') == $item -> id)
                                    <option value="{{ $item->id }}" selected>{{ $item->product_name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->product_name }}</option>
                                @endif
                            @endforeach
                        </select>
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
    <form action="{{ route('transactionDetail.store') }}" class="row gy-2 gx-3 align-items-center">
        <div class="col-auto mb-3">
            <label class="visually-hidden" for="customer_name">Customer</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name">
        </div>
        <div class="col-auto mb-3">
            <label class="visually-hidden" for="total_price">Total Price</label>
            <input type="text" class="form-control" id="total_price" name="total_price" readonly value="{{ $subtotal }}">
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($trxDetail) > 0)
                        @foreach ($trxDetail as $detail)
                            <tr>
                                <td>{{ $detail->product->productName }}</td>
                                <td>Rp. {{ $detail->product->sellingPrice }}</td>
                                <td>{{ $detail->qty }}</td>
                                <td>Rp. {{ $detail->subtotal }}</td>
                                <td>
                                    <form action="{{ route('transactionDetail.destroy', ['transactionDetail' => $detail->id]) }}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger"
                                            onclick="return confirm('Are You Sure??')" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
</div>
                <hr>
        </div>
    </div>
@endsection