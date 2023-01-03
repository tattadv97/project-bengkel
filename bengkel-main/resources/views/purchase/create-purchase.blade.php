@extends('template.layout')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Create Purchase</h1>
        <div class="card shadow mb-4">
            <div class="card-header" py-3>
                <h6 class="m-0 font-weight-bold text-primary">Add Purchase</h6>
            </div>
            <div class="card-body">
                <form action="/purchase" method="POST">
                    @csrf

                    {{-- region sparepart --}}
                    <div class="mb-3">
                        <label for="sparepart_name" class="form-label">Sparepart</label>
                        <input type="text" class="@error('sparepart_name') is-invalid @enderror form-control"
                            id="sparepart_name" name="sparepart_name" value="{{ old('sparepart_name') }}">

                        @error('sparepart_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- region price --}}
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga</label>
                        <input type="text" class="@error('price') is-invalid @enderror form-control"
                            id="price" name="price" value="{{ old('price') }}">

                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- region qty --}}
                    <div class="mb-3">
                        <label for="qty" class="form-label">QTY</label>
                        <input type="text" class="@error('qty') is-invalid @enderror form-control"
                            id="qty" name="qty" value="{{ old('qty') }}">

                        @error('qty')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Add </button>
                    <a href="/purchase" class="btn btn-danger ">Cancel</a>
                </form>
            </div>
                <hr>
            <div class="card-body">
                <form class="row gy-2 gx-3 align-items-center">
                    <div class="col-auto mb-3">
                        <label class="visually-hidden" for="customer_name">Supplier</label>
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
        </div>
    </div>
@endsection