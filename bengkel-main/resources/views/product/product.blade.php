@extends('template.layout')

@section('content')
    
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Product Tables</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Product</h6>
        </div>
        <div class="card-body">
            <a href="/product/create" class="btn btn-primary mb-3">Add Product</a>
            <form action="/" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-3">
                        <input type="file" name="file" id="file" class="form-control">
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-success">Import</button>
                    </div>
                </div>
            </form>
            <div class="table-responsive mt-3">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Product</th>
                            <th>Nama Product</th>
                            <th>Base Price</th>
                            <th>Selling Price</th>
                            <th>Unit</th>
                            <th>Stock</th>
                            <th>Category</th>
                            <th>Supplier</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                            <tr>
                                <td>{{ $item -> product_code }}</td>
                                <td>{{ $item -> product_name }}</td>
                                <td>{{ $item -> base_price}}</td>
                                <td>{{ $item -> selling_price }}</td>
                                <td>{{ $item -> unit }}</td>
                                <td>{{ $item -> stock }}</td>
                                <td>{{ $item -> category }}</td>
                                <td>{{ $item -> supplier -> company_name }}</td>
                                <td>
                                    <a href="/product/{{ $item->id }}/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    <form action="/product/{{ $item->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger" onclick="return confirm('Are You Sure ?')"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection